<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\appointments;
use App\Models\blood;
use App\Models\insurance;
use App\Models\user as ModelsUser;
use App\Models\volunteers;
use App\Models\announcement;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class User extends Controller
{
    //
    public function Home(){

           // Fetch announcements from the database using the Announcement model
        //  $announcement = Announcement::all(); // Fetch all announcements
         $announcement = Announcement::paginate(3);

           
        if(session("USER")){
          // Pass the fetched announcements to the view
          return view('User.home', ['announcement' => $announcement]);
        }
        elseif(session('ADMIN')||session('STAFF')){
            return redirect('dashboard');
        }
        else{
           // Pass the fetched announcements to the view
           return view('User.home', ['announcement' => $announcement]);

        }
    }
    
    //
    public function Donate(){
        return view('User.donate');
    }
    public function User_Profile(){
        if(session('USER')){
            return view('User.profile');
        }
        elseif(session('ADMIN')){
            return redirect('dashboard');
        }
        else{
            return redirect('signin');
        }
        
    }
    public function AppointmentSchedules(){
        $appointments=appointments::select('app_date')->whereIn('status',['APPROVED','ONGOING','WAITING','ARRIVED'])->groupBy('app_date')->orderBy('app_date')->get();
        if($appointments){
            return response()->json($appointments);
           }
           else{
            return response()->json(['results'=>'No scheduled appointments']);
           }
    }
    public function ListofTimeinAscheduledDate($app_date){
        $list= appointments::where('app_date',$app_date)->whereIn('status',['APPROVED','ONGOING','WAITING','ARRIVED'])->orderBy('app_time','asc')->get();
        if($list){
            return response()->json($list);
        }
        else{
            return response()->json(['error'=>'something went wrong']);
        }
    }
    public function MySchedule(){
        $data=appointments::where('u_id',session('USER')['id'])->whereIn('status',['PENDING','APPROVED','WAITING','ARRIVED','ONGOING'])->first();
        if($data){
         return response()->json($data);
        }
        else{
         return response()->json(['results'=>'No appointment exist']);
        }
    }
    public function MyAppointmentHistory(){
        $data=appointments::where('u_id',session('USER')['id'])->whereIn('status',['DECLINED','DONE'])->get();
        if($data){
            return response()->json($data);
           }
           else{
            return response()->json(['results'=>'No appointments created.']);
           }
    }
    public function ViewMyAppointmentDetails($id){
        $data=appointments::find($id);
        if($data){
            return response()->json($data);
         }
           else{
            return response()->json(['results'=>'No appointments created.']);
           }
    }


    // INSURANCE 
    public function MyInsuranceHistory(){
        $data=insurance::where('u_id',session('USER')['id'])->get();
        if($data){
            return response()->json($data);
        }
        else{
            return response()->json(['results'=>'No records created']);
        }


    }
    public function MyInsurance(){
        $ongoing= insurance::where('u_id',session('USER')['id'])->orderBy('start_at','desc')->whereIn('status',['PENDING','ACTIVATED'])->first();
        $history= insurance::where('u_id',session('USER')['id'])->whereIn('status',['DECLINED','EXPIRED'])->get();
        $classic=asset('/static/user/categories/classic.png');
        $bronze=asset('/static/user/categories/bronze.png');
        $silver=asset('/static/user/categories/silver.png');
        $gold=asset('/static/user/categories/gold.png');
        $platinum=asset('/static/user/categories/platinum.png');
        $senior=asset('/static/user/categories/senior.png');
        $plus=asset('/static/user/categories/plus.png');
        $data=[
            'ongoing'=>$ongoing,
            'history'=>$history,
            'classic'=>$classic,
            'bronze'=>$bronze,
            'silver'=>$silver,
            'gold'=>$gold,
            'platinum'=>$platinum,
            'senior'=>$senior,
            'plus'=>$plus,
        ];
        if($ongoing!=null){
    
            return response()->json($data);
        }else if($ongoing!=""){
            return response()->json($data);
        }else{
            return response()->json(['results'=> 'No active insurance found!']);
        }
    }

    public function blood_history(){
        $blood=blood::where('fname',session('USER')['fname'])
        ->where('mname',session('USER')['mname'])
        ->where('lname',session('USER')['lname'])->get();
        $latest=blood::where('status','VALIDATED')->orderBy('donated_at','desc')->limit(1)->get();
   
        $data=[
            'blood'=>$blood,
            'latest'=>$latest,
        ];

        return response()->json($data);

    
    }
    public function Volunteer_Details(){
        $withid= volunteers::where('id',session('USER')['id'])->orderBy('created_at','desc')->first();
        $noId= volunteers::where('fname',session('USER')['fname'])->where('mname',session('USER')['mname'])-> where('lname',session('USER')['lname'])->orderBy('created_at','desc')->first();
        $volunteer=asset('/static/user/categories/volunteer.jpg');
   
        if($withid!=null){
            $data=[
                'withid'=>$withid,
                'vol_card'=>$volunteer,
            ];
            return response()->json(['withid'=>$withid]);
        }else if($noId!=null){
            $data=[
                'noid'=>$noId,
                'vol_card'=>$volunteer,
            ];
            return response()->json($data);
        }else{
            return response()->json(['results'=>'No history records found!']);
        }
    }

    public function Create_Membership_Account(Request $request){
        $rules=[
            'blood_type'=>'required',
            'municipality'=>'required',
            'barangay'=>'required',
            'barangay_street'=>'required',
            'level'=>'required',
            'amount'=>'required',
            'type_of_payment'=>'required',
            'proof_of_payment'=>'required|image|max:25000',
        ];
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(['failed'=>'All fields are required!']);
        }
        DB::beginTransaction();
        $create= new insurance();
        $id= mt_rand(111111111,999999999);
        $create->id=$id;
        $create->u_id=session('USER')['id'];
        $create->fname=strtoupper(session('USER')['fname']);
        $create->mname=strtoupper(session('USER')['mname']);
        $create->lname=strtoupper(session('USER')['lname']);
        $create->birthday=session('USER')['bday'];
        $create->age=session('USER')['age'];
        $create->blood_type=$request->blood_type;
        $create->gender=strtoupper(session('USER')['gender']);
        $create->municipality=strtoupper($request->municipality);
        $create->barangay=strtoupper($request->barangay);
        $create->barangay_street=strtoupper($request->barangay_street);
        $create->level=strtoupper($request->level);
        $create->type_of_payment=strtoupper($request->type_of_payment);
        $path=$request->file('proof_of_payment')->store('public/membership/payments');
        $create->proof_of_payment=Storage::url($path);
        $create->amount=$request->amount;
        $create->notified='0';   
        $create->email=session('USER')['email'];
        $create->status="PENDING";
        $saved= $create->save();
        if($saved){
            DB::commit();
            return response()->json(['success'=>'Membership account successfully created!']);
        }else{
            return response()->json(['failed'=>'Network error!']);
        }
        
    }


    public function Membership(){
        return view('User.membership');
    }
    public function Training(){
        return view('User.training');
    }
    public function Volunteer(){
        return view('User.volunteer');
    }

    
   
}

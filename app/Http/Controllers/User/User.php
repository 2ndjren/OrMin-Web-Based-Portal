<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\appointments;
use App\Models\blood;
use App\Models\insurance;
use App\Models\user as ModelsUser;
use Illuminate\Http\Request;

class User extends Controller
{
    //
    public function Home(){
        if(session("USER")){
           return view('User.home');
        }
        elseif(session('ADMIN')||session('STAFF')){
            return redirect('dashboard');
        }
        else{
            return view('User.home');
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
        $data= insurance::where('u_id',session('USER')['id'])->whereIn('status',['PENDING','ACTIVATED'])->first();
        return response()->json($data);
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

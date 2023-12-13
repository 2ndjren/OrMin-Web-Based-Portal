<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\appointments;
use App\Models\announcement;
use App\Models\blood;
use App\Models\insurance;
use App\Models\user as ModelsUser;
use App\Models\volunteers;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class User extends Controller
{
    //
    public function Home()
    {

        // Fetch announcements from the database using the Announcement model
        //  $announcement = Announcement::all(); // Fetch all announcements
        $announcement = Announcement::paginate(3);


        if (session("USER")) {
            // Pass the fetched announcements to the view
            return view('User.home', ['announcement' => $announcement]);
        } elseif (session('ADMIN') || session('STAFF')) {
            return redirect('dashboard');
        } else {
            // Pass the fetched announcements to the view
            return view('User.home', ['announcement' => $announcement]);
        }
    }
    public function Appointment(){
        if(session('USER')['id']){
            $check=appointments::where('u_id',session('USER')['id'])->whereIn('status',['PENDING','APPROVED','ONGOING'])->count();
            if($check){
                return redirect('profile');
                return redirect('profile');
            }else{
                return view('User.appointment');
            }
        }else if(session('ADMIN')|| session('STAFF')){
            return redirect('appointments');
        }else{
            return redirect('signin');
        }
    }
    public function Register_Membership(){
        if(session('USER')['id']){
            $check1=insurance::where('u_id',session('USER')['id'])->whereIn('status',['PENDING','ACTIVATED'])->count();
            $check2=insurance::where('fname',session('USER')['fname'])->where('mname',session('USER')['mname'])->where('lname',session('USER')['lname'])->where('birthday',session('USER')['bday'])->whereIn('status',['PENDING','ACTIVATED'])->count();
            if($check1>0||$check2>0){
                return redirect('profile');
            }else{
                return view('User.register_membership');
            }
        }else if(session('ADMIN')|| session('STAFF')){
            return redirect('membership');
        }else{
            return redirect('signin');
        }
    }
    public function Register_Volunteer(){
        if(session('USER')){
            $check1=volunteers::where('u_id',session('USER')['id'])->whereIn('status',['PENDING','VALIDATED'])->count();
            $check2=volunteers::where('fname',session('USER')['fname'])->where('mname',session('USER')['mname'])->where('lname',session('USER')['lname'])->where('birthday',session('USER')['bday'])->count();
            if($check1>0){
                return redirect('profile');
            }else if($check2>0){
                return redirect('profile');
                
            }else{
                return view('User.register_volunteer');
            }
        }else{
            return redirect('signin');
        }
        
    }
    public function Scheduled_Appointements()
    {
        $checker = appointments::whereIn('status', ['PENDING', 'APPROVED', 'ONGOING'])->count();
        $schedule = appointments::whereIn('status', ['PENDING', 'APPROVED', 'ONGOING'])->orderBy('app_date', 'asc')->orderBy('app_time', 'asc')->get();
        if ($checker > 0) {
            return response()->json($schedule);
        } else {
            return response()->json(['results' => 'No appointments found!']);
        }
    }
    public function Create_User_Appointment(Request $request)
    {
        $rules = [
            'app_date' => 'required',
            'app_time' => 'required',
            'app_description' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['failed' => 'All fields are required!']);
        }
        $checker = appointments::where('app_date', $request->app_date)->where('app_time', $request->app_time)->whereIn('status', ['PENDING', 'APPROVED', 'ONGOING'])->count();
        if ($checker > 0) {
            return response()->json(['failed' => 'Schedule already taken!']);
        } else {
            $id = mt_rand(11111111, 999999999);
            $create = new appointments();
            $create->u_id = session('USER')['id'];
            $create->id = $id;
            $create->app_date = $request->app_date;
            $create->app_time = $request->app_time;
            $create->app_description = $request->app_description;
            $create->status = "PENDING";
            $saved = $create->save();
            if ($saved) {
                return response()->json(['success' => 'Appointment successfully submitted!']);
            } else {
                return response()->json(['failed' => 'Something went wrong!']);
            }
        }
    }

    public function Edit_User_Profile($id)
    {
        $user = ModelsUser::find($id);
        $user->user_profile = base64_encode($user->user_profile);
        return response()->json($user);
    }
    public function User_Update_Profile(Request $request)
    {
        $uploadedFile = $request->file('user_profile');

       if($uploadedFile !=null)
       {
        $rule = [
            'user_profile' => 'required|image|mimes:jpeg,png,jpg|max:20348',
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'phone_num' => 'required',
            'user_profile' => 'image',
            'bday' => 'required|date|before_or_equal:' . now()->subYears(15)->format('Y-m-d'),
        ];
       }else{
        $rule = [
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'phone_num' => 'required',
            'user_profile' => 'image',
            'bday' => 'required|date|before_or_equal:' . now()->subYears(15)->format('Y-m-d'),
        ];
       }
        $validator = Validator::make($request->all(), $rule);
        if ($validator->fails()) {
            return response()->json(['failed' => 'All fields are required, dont leave it blank!']);
        }

        if ($uploadedFile != null) {

$originalFilePath = $uploadedFile->getRealPath();

// Resize the image
$resizedImage = $this->resizeImage($originalFilePath, 800, null); // Resize to desired dimensions

if ($resizedImage) {
        // Convert the resized image to BLOB data with a targeted file size (approx. 400KB)
        $maxSize = 50 * 1024; // 50KB in bytes
        $imageQuality = 90; // Initial quality setting

        do {
            ob_start();
            imagejpeg($resizedImage, null, $imageQuality);
            $imageData = ob_get_contents();
            ob_end_clean();

            $imageSize = strlen($imageData);

            if ($imageSize > $maxSize && $imageQuality > 10) {
                // Reduce quality if the file size exceeds the limit
                $imageQuality -= 2;
            } else {
                break;
            }
        } while (true);
      // $image_content = file_get_contents($uploadedFile);
      $updated = ModelsUser::where('id', $request->id)->update([
        'fname' => strtoupper($request->fname),
        'mname' => strtoupper($request->mname),
        'lname' => strtoupper($request->lname),
        'bday' => $request->bday,
        'phone_num' => $request->phone_num,
        'user_profile' => $imageData,
    ]);
    if ($updated) {
    $user=ModelsUser::where('id',session('USER')['id'])->first();
    $image=base64_encode($user->user_profile);
    $data=[
        'id'=>$user->id,
        'user_profile'=>$image,
       'fname'=>$user->fname,
       'mname'=>$user->mname,
       'lname'=>$user->lname,
       'sname'=>$user->sname,
       'age'=>$user->age,
       'gender'=>$user->gender,
       'bday'=>$user->bday,
       'phone_num'=>$user->phone_num,
       'email'=>$user->email,
       'password'=>$user->password,
       'type'=>$user->type,
    ];
    session()->put('USER',$data);
    imagedestroy($resizedImage);

        return response()->json(['success' => 'Update successfull']);
    } else {

        return response()->json(['failed' => 'No changes yet!']);
    }

} else {
    // Handle case when an unsupported image type is uploaded
    return response()->json(['failed' => 'Unsupported image type']);
}





          
        } else {
            $updated = ModelsUser::where('id', $request->id)->update([
                'fname' => strtoupper($request->fname),
                'mname' => strtoupper($request->mname),
                'lname' => strtoupper($request->lname),
                'bday' => $request->bday,
                'phone_num' => $request->phone_num,
            ]);
            if ($updated) {
                return response()->json(['success' => 'Update successfull']);
            } else {
                return response()->json(['failed' => 'No changes yet!']);
            }
        }
        // Usage:
   
       
    }
    
    private function resizeImage($filePath, $newWidth, $newHeight = null)
    {
        list($width, $height, $type) = getimagesize($filePath);
    
        switch ($type) {
            case IMAGETYPE_JPEG:
            case IMAGETYPE_JPEG2000:
                $image = imagecreatefromjpeg($filePath);
                break;
            case IMAGETYPE_PNG:
                $image = imagecreatefrompng($filePath);
                break;
            default:
                return false; // Unsupported image type
        }
    
        if ($newHeight === null) {
            $newHeight = round($height * $newWidth / $width);
        }
    
        $imageResized = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($imageResized, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        imagedestroy($image);
    
        return $imageResized;
    }
    public function Check_User()
    {
        if (session('USER')['id']) {
            $check = appointments::where('u_id', session('USER')['id'])->whereIn('status', ['PENDING', 'APPROVED', 'ONGOING'])->count();
            $exist = appointments::where('u_id', session('USER')['id'])->whereIn('status', ['PENDING', 'APPROVED', 'ONGOING'])->first();
            if ($check > 0) {
                return response()->json($exist);
            } else {
                return response()->json(['results' => 'Set yours now!']);
            }
        }
    }
    public function Today_Appointments()
    {
        $today = date('Y-m-d');
        $check = appointments::where('app_date', $today)->whereIn('status', ['APPROVED', 'ONGOING'])->count();
        $exist = appointments::where('app_date', $today)->whereIn('status', ['APPROVED', 'ONGOING'])->get();
        if ($check > 0) {
            return response()->json($exist);
        } else {
            return response()->json(['results' => 'No scheduled appointments today!']);
        }
    }


    public function User_Appointments()
    {
        $check = appointments::where('u_id', session('USER')['id'])->count();
        $myapp = appointments::where('u_id', session('USER')['id'])->orderBy('updated_at', 'desc')->get();
        if ($check > 0) {
            return response()->json($myapp);
        } else {
            return response()->json(['results' => 'No history']);
        }
    }

    public function Cancel_Appointments($id)
    {
        $cancelled = appointments::where('id', $id)->update([
            'status' => 'CANCELLED',
        ]);
        if ($cancelled) {
            return response()->json(['success' => 'Appointment cancellation successfull!']);
        } else {
            return response()->json(['failed' => 'Something went wrong']);
        }
    }
    public function User_Appointment_Details($id)
    {
        $user = appointments::find($id);
        return response()->json($user);
    }

    public function Existing_Appointment()
    {
        $existing = appointments::where('u_id', session('USER')['id'])->whereIn('status', ['PENDING', 'APPROVED', 'ONGOING'])->first();
        if ($existing != null) {
            return response()->json($existing);
        } else {
            return response()->json(['results' => 'No existing appointments now!']);
        }
    }


    //
    public function Donate()
    {
        return view('User.donate');
    }
    public function User_Profile()
    {
        if (session('USER')) {
            $user = ModelsUser::find(session('USER')['id']);
            $image = base64_encode($user->user_profile);
            $data = [
                'user_profile' => $image
            ];
            return view('User.profile', $data);
        } elseif (session('ADMIN')) {
            return redirect('dashboard');
        } else {
            return redirect('signin');
        }
    }
    public function AppointmentSchedules()
    {
        $appointments = appointments::select('app_date')->whereIn('status', ['APPROVED', 'ONGOING', 'WAITING', 'ARRIVED'])->groupBy('app_date')->orderBy('app_date')->get();
        if ($appointments) {
            return response()->json($appointments);
        } else {
            return response()->json(['results' => 'No scheduled appointments']);
        }
    }
    public function ListofTimeinAscheduledDate($app_date)
    {
        $list = appointments::where('app_date', $app_date)->whereIn('status', ['APPROVED', 'ONGOING', 'WAITING', 'ARRIVED'])->orderBy('app_time', 'asc')->get();
        if ($list) {
            return response()->json($list);
        } else {
            return response()->json(['error' => 'something went wrong']);
        }
    }
    public function MySchedule()
    {
        $data = appointments::where('u_id', session('USER')['id'])->whereIn('status', ['PENDING', 'APPROVED', 'WAITING', 'ARRIVED', 'ONGOING'])->first();
        if ($data) {
            return response()->json($data);
        } else {
            return response()->json(['results' => 'No appointment exist']);
        }
    }
    public function MyAppointmentHistory()
    {
        $data = appointments::where('u_id', session('USER')['id'])->get();
        if ($data) {
            return response()->json($data);
        } else {
            return response()->json(['results' => 'No appointments created.']);
        }
    }
    public function ViewMyAppointmentDetails($id)
    {
        $data = appointments::find($id);
        if ($data) {
            return response()->json($data);
        } else {
            return response()->json(['results' => 'No appointments created.']);
        }
    }


    // INSURANCE 
    public function MyInsuranceHistory()
    {
        $data = insurance::where('u_id', session('USER')['id'])->get();
        if ($data) {
            return response()->json($data);
        } else {
            return response()->json(['results' => 'No records created']);
        }
    }
    public function MyInsurance()
    {
        
    $ongoingInsurance = insurance::where('u_id', session('USER')['id'])
    ->whereIn('status', ['PENDING', 'ACTIVATED'])
    ->first();

    if($ongoingInsurance){
    $ongoingInsurance->proof_of_payment = base64_encode($ongoingInsurance->proof_of_payment);

    $history = insurance::where('u_id', session('USER')['id'])
        ->whereIn('status', [ 'ACTIVATED','PENDING', 'DECLINED', 'EXPIRED'])
        ->get()
        ->map(function ($item) {
            $item->proof_of_payment = base64_encode($item->proof_of_payment);
            return $item;
        });

    $data = [
    'ongoing' => $ongoingInsurance,
    'history' => $history->isEmpty() ? "No results found!" : $history,
    ];
    } else {
    $data = [
    'ongoing' => 'Get yours now!',
    'history' => "No results found!",
    ];
    }

    return response()->json($data);
    }

    public function UserInsurance_Info($id){
        $user=insurance::find($id);
        $user->proof_of_payment=base64_encode($user->proof_of_payment);
        return response()->json($user);
    }

    public function blood_history()
    {
        $blood = blood::where('fname', session('USER')['fname'])
            ->where('mname', session('USER')['mname'])
            ->where('lname', session('USER')['lname'])->get();
        $latest = blood::where('status', 'VALIDATED')->orderBy('donated_at', 'desc')->limit(1)->get();

        $data = [
            'blood' => $blood,
            'latest' => $latest,
        ];

        return response()->json($data);
    }
    public function Volunteer_Details()
    {
        $withid = volunteers::where('id', session('USER')['id'])->orderBy('created_at', 'desc')->first();
        $noId = volunteers::where('fname', session('USER')['fname'])->where('mname', session('USER')['mname'])->where('lname', session('USER')['lname'])->orderBy('created_at', 'desc')->first();
        $volunteer = asset('/static/user/categories/volunteer.jpg');

        if ($withid != null) {
            $data = [
                'withid' => $withid,
                'vol_card' => $volunteer,
            ];
            return response()->json(['withid' => $withid]);
        } else if ($noId != null) {
            $data = [
                'noid' => $noId,
                'vol_card' => $volunteer,
            ];
            return response()->json($data);
        } else {
            return response()->json(['results' => 'No history records found!']);
        }
    }



    public function Create_Membership_Account(Request $request)
    {
        $rules = [
            'blood_type' => 'required',
            'municipality' => 'required',
            'barangay' => 'required',
            'barangay_street' => 'required',
            'level' => 'required',
            'amount' => 'required',
            'type_of_payment' => 'required',
            'proof_of_payment' => 'required|image',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['failed' => 'All fields are required!']);
        }
        DB::beginTransaction();
        $create = new insurance();
        $id = mt_rand(111111111, 999999999);
        $create->id = $id;
        $create->u_id = session('USER')['id'];
        $create->fname = strtoupper(session('USER')['fname']);
        $create->mname = strtoupper(session('USER')['mname']);
        $create->lname = strtoupper(session('USER')['lname']);
        $create->birthday = session('USER')['bday'];
        $create->age = session('USER')['age'];
        $create->blood_type = $request->blood_type;
        $create->gender = strtoupper(session('USER')['gender']);
        $create->municipality = strtoupper($request->municipality);
        $create->barangay = strtoupper($request->barangay);
        $create->barangay_street = strtoupper($request->barangay_street);
        $create->level = strtoupper($request->level);
        $create->type_of_payment = strtoupper($request->type_of_payment);
        $uploadedFile = $request->file('proof_of_payment');

        // $image=$request->file('user_profile');
        $fileName = time() . '_' . $uploadedFile->getClientOriginalName();
        $originalFilePath = $uploadedFile->getRealPath();
    
        // Resize the image
        $resizedImage = $this->resizeImage($originalFilePath, 800, null); // Resize to desired dimensions
    
        $maxSize = 50 * 1024; // 50KB in bytes
        $imageQuality = 90; // Initial quality setting

        do {
            ob_start();
            imagejpeg($resizedImage, null, $imageQuality);
            $imageData = ob_get_contents();
            ob_end_clean();

            $imageSize = strlen($imageData);

            if ($imageSize > $maxSize && $imageQuality > 10) {
                // Reduce quality if the file size exceeds the limit
                $imageQuality -= 2;
            } else {
                break;
            }
        } while (true);
            $create->proof_of_payment = $imageData;
            $create->amount = $request->amount;
            $create->notified = '0';
            $create->email = session('USER')['email'];
            $create->status = "PENDING";
            $saved = $create->save();
            if ($saved) {
                DB::commit();
                return response()->json(['success' => 'Membership account successfully created!']);
            } else {
                return response()->json(['failed' => 'Network error!']);
            }

      
    }
    


    public function Membership()
    {
        return view('User.membership');
    }
    public function Training()
    {
        return view('User.training');
    }
    public function Volunteer()
    {
        return view('User.volunteer');
    }



    public function Create_User_Volunteer(Request $request){
        $rules=[
            'fname'=>'required',
            'mname'=>'required',
            'lname'=>'required',
            'occupation'=>'required',
            'birthday'=>'required',
            'gender'=>'required',
            'nationality'=>'required',
            'civil_status'=>'required',
            'municipal'=>'required',
            'barangay'=>'required',
            'barangay_street'=>'required',
            'blood_type'=>'required',
            'postal_code'=>'required',
            'role'=>'required',
            'phone_no'=>'required',
            'email'=>'required',
        ];
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()]);
        }
        $create= new volunteers();
        if(session('USER')['id']){
            $create->u_id=session('USER')['id'];
        }$id=mt_rand(111111111,999999999);
        $create->id=$id;
        $create->fname=strtoupper($request->fname);
        $create->mname=strtoupper($request->mname);
        $create->lname=strtoupper($request->lname);
        $create->occupation=strtoupper($request->occupation);
        $create->birthday=$request->birthday;
        $create->gender=strtoupper($request->gender);
        $create->nationality=strtoupper($request->nationality);
        $create->civil_status=strtoupper($request->civil_status);
        $create->province='ORIENTAL MINDORO';
        $create->municipal=strtoupper($request->municipal);
        $create->barangay=strtoupper($request->barangay);
        $create->barangay_street=strtoupper($request->barangay_street);
        $create->postal_code=$request->postal_code;
        $create->role=strtoupper($request->role);
        $create->blood_type=strtoupper($request->blood_type);
        $create->occupation_address=strtoupper($request->occupation_address);
        $create->phone_no=$request->phone_no;
        $create->email=$request->email;
        $create->status='PENDING';
        $create->privacy_agreement='YES';
        $saved=$create->save();
        if($saved){
            return response()->json(['success'=>'Submitted successfully']);
        }else{
            return response()->json(['failed'=>'Something went wrong!']);

        }

    }
    public function User_Volunteer_Record(){
        if(session('USER')['id']){
            $check1=volunteers::where('u_id',session('USER')['id'])->whereIn('status',['PENDING','VALIDATED'])->count();
            $data1=volunteers::where('u_id',session('USER')['id'])->whereIn('status',['PENDING','VALIDATED'])->first();
            $check2=volunteers::where('fname',session('USER')['fname'])->where('mname',session('USER')['mname'])->where('lname',session('USER')['lname'])->where('birthday',session('USER')['bday'])->whereIn('status',['PENDING','VALIDATED'])->count();
            $data2=volunteers::where('fname',session('USER')['fname'])->where('mname',session('USER')['mname'])->where('lname',session('USER')['lname'])->where('birthday',session('USER')['bday'])->whereIn('status',['PENDING','VALIDATED'])->first();
            if($check1>0){
                return response()->json($data1);
            }else if($check2>0){
                return response()->json($data2);
            }else{
                return response()->json(['results'=>'Register now!']);
            }

        }
    }
    public function Show_My_Volunteer_Card($id){
        $check=volunteers::where('id',$id)->count();
        $mydata=volunteers::where('id',$id)->first();
        if($check>0){
        return response()->json($mydata);

        }else{
        return response()->json(['success'=>'Something went wrong!']);

        }
        }



    public function Announcement($id)
    {
        // Fetch the announcement based on the provided ID
        $announcement = announcement::find($id); // This will return null if no matching announcement is found
    
        if (!$announcement) {
            // Handle the case when the announcement is not found
            abort(404, 'Announcement not found');
        }
    
        // Return the announcement content in a view
        return view('User.announcement', compact('announcement'));
    }
    
}

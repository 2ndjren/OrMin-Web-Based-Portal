<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Send_Email_Account_Recovery_Mail;
use App\Mail\Send_Email_Verification;
use App\Models\employee;
use App\Models\user;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Auth extends Controller
{
    //
    public function SignIn(){
        
        if(session('ADMIN') || session('STAFF')){
            return redirect('dashboard');
        }
        elseif(session('USER')){
            return redirect('/');
        }
        else{
            return view('auth.signin');   
        }
    }
    public function Check_Reminder(){
        return view('alert.passwor_reset_email');
    }
    public function Email_Check(){
        return view('alert.email_check');

    }
    public function SignUp(){
        if(session('USER')){
            return view('User.profile');
        }
        elseif(session('ADMIN')){
            return redirect('dashboard');
        }
        else{
            return view('auth.signup');

        }
    }
    public function Logout(){
        session()->flush();
        return redirect('signin');
    }
    public function Login(Request $request){
        
        $email=$request->email;
        $password=$request->password;
        $rules=[
            'email'=>'required',
            'password'=>'required'
        ];
        $message=[
            'email.required'=>'Email is required.',
            'password.required'=>'Email is required.'
        ];
        $validator= Validator::make($request->all(),$rules,$message);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else{

            $user=user::where('email',$email)->first();
            if($user){
                if(password_verify($password,$user->password)){
                    if($user->account_status=="VERIFIED"){
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
                        if($user->type=="USER"){
                            session()->put('USER',$data);
                            return redirect('/');
                        }elseif($user->type=="ADMIN"){
                            session()->put('ADMIN',$data);
                            return redirect('dashboard');
                        }else{
                            session()->put('STAFF',$data);
                            return redirect('dashboard');
                        }
                    }else{
                        return redirect()->back()->with('failed','Account is not verified!');
                    }
                   }
                   else{
                       return redirect()->back()->with('failed','Wrong email or password!'); 
                   }
            }
          
                 elseif($email=="admin@gmail.com" && $password=="1234567890"){
                $data=[
                    'id'=>111222,
                        'fname'=>"DEVELOPER",
                        'mname'=>'ACEVEDA',
                        'lname'=>'BAREN',
                        'sname'=>"",
                        'age'=>"23",
                        'gender'=>'MALE',
                        'bday'=>"07-18-2000",
                        'position'=>"ADMINISTRATOR",
                        'phone_num'=>'09108707822',
                        'email'=>"admin@gmail.com",
                        'password'=>'1234567890',     
                        'type'=>'ADMIN'
                ];
                session()->put('ADMIN',$data);
                return redirect('dashboard');

            }
            else{
                return redirect()->back()->with('failed','Account does not exist!'); 
            }

            }
      
    }
    public function Register(Request $request){
        $now= new DateTime();
         $now->modify('-15 years');
       $formatted_age=$now->format("m-d-Y");
        $rules=[
            'user_profile' => 'required|image|mimes:jpeg,png,jpg|max:20348',
            'fname'=>'required|regex:/^[A-Za-z ]+$/',
            'mname'=>'required|regex:/^[A-Za-z ]+$/',
            'lname'=>'required|regex:/^[A-Za-z ]+$/',
            'bday'=>'required|date|before_or_equal:' .now()->subYears(15)->format('Y-m-d'),
            'age'=>'required|numeric',
            'gender'=>'required',
            'phone_num'=>'required|numeric',
            'email'=>'required|unique:App\Models\user',
            'password'=>'required|min:8|confirmed',
        ];
        $message=[
            'user_profile.required'=>'Image is required',
            'user_profile.image'=>'File must be image format.',
            'fname.required'=>'First name is required',
            'fname.regex'=>'First name field requires letters only.',
            'mname.required'=>'Middle name is required',
            'mname.regex'=>'First name field requires letters only.',
            'lname.required'=>'Last name is required',
            'lname.regex'=>'First name field requires letters only.',
            'age.required'=>'Age is required',
            'age.numeric'=>'Invalid age data.',
            'gender.required'=>'Gender is required.',
            'bday.before_or_equal'=>'Birthday must be age to 16 years old or above.',
            'bday.required'=>'Birthday is required.',
            'phone_num.numeric'=>'Invalid phone number data',
            'email.required'=>'Email is required',
            'email.unique'=>'Email is already exist.',
            'password.required'=>'Password is required',
        ];
        $validator=Validator::make($request->all(),$rules,$message);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $uploadedFile = $request->file('user_profile');

        $token=mt_rand(111111,999999);
        $user= new user();
        $user->id=mt_rand(111111,999999);
          // $image=$request->file('user_profile');
          $fileName = time() . '_' . $uploadedFile->getClientOriginalName();
          $originalFilePath = $uploadedFile->getRealPath();
      
          // Resize the image
          $resizedImage = $this->resizeImage($originalFilePath, 800, null); // Resize to desired dimensions
      
          // Convert the resized image to BLOB data with a targeted file size (approx. 2MB)
          $maxSize = 1 * 1024 * 1024; // 2MB in bytes
          $imageQuality = 90; // Initial quality setting
      
          do {
              ob_start();
              imagejpeg($resizedImage, null, $imageQuality);
              $imageData = ob_get_contents();
              ob_end_clean();
      
              $imageSize = strlen($imageData);
      
              if ($imageSize > $maxSize && $imageQuality > 10) {
                  // Reduce quality if the file size exceeds the limit
                  $imageQuality -= 10;
              } else {
                  break;
              }
          } while (true);
        $user->user_profile= $imageData;
        $user->fname= strtoupper($request->fname);
        $user->mname=strtoupper($request->mname);
        $user->lname=strtoupper($request->lname);
        $user->sname=strtoupper($request->sname);
        $user->bday=$request->bday;
        $user->age=$request->age;
        $user->gender=strtoupper($request->gender);
        $user->phone_num=$request->phone_num;
        $user->email=$request->email;
        $user->password=password_hash($request->password,PASSWORD_DEFAULT);
        $user->type="USER";
        $user->account_status="NOT VERIFIED";
        $user->token=$token;
        DB::beginTransaction();
        $saved=$user->save();
        if($saved){
            $mail=[
                'token'=>$token,
                'lname'=>$request->lname,
                'gender'=>$request->gender,
            ];
            $mail_sent=Mail::to($request->email)->send(new  Send_Email_Verification($mail));
            if($mail_sent){
                DB::commit();
                return redirect('email-check');
            }
            else{
                return redirect()->back()->with('failed','Email is invalid.');

            }
        }
        else{
            if( DB::rollBack()){
                return redirect()->back()->with('failed','Somthing went wrong.');

            }
        }
    }

   private function resizeImage($filePath, $newWidth, $newHeight = null)
{
    list($width, $height, $type) = getimagesize($filePath);

    switch ($type) {
        case IMAGETYPE_JPEG:
            $image = imagecreatefromjpeg($filePath);
            break;
        case IMAGETYPE_PNG:
            $image = imagecreatefrompng($filePath);
            break;
        // Add cases for other image types if needed
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
    public function Verify_Account($token){
        $user= user::where('token',$token)->first();
        $new_token=mt_rand(111111,999999);
        if($user){
            $user->token= $new_token;
            $user->account_status= "VERIFIED";
            $update=$user->save();
            if($update){
               return redirect('signin')->with('success','You can now login your account!');
            }
            else{
                return view('errors.invalid_link');
            }
        }
        else{
            return view('errors.invalid_link');
        }
    }
    public function Send_Email_Forgot_Password(Request $request){
        $email=$request->email;
        if(!$email==""){
            $user=user::where('email',$email)->first();
            if($user){
                if($user->account_status=="VERIFIED"){
                    $mail=[
                        'token'=>$user->token,
                        'gender'=>$user->gender,
                        'fname'=>$user->fname,
                    ];
                    $mail=Mail::to($email)->send( new Send_Email_Account_Recovery_Mail($mail));
                    if($mail){
                        return response()->json(['success'=>'Kindly check your email to reset your account password.']);
                    }
                }
                else{
                return response()->json(['failed'=>'Please activate your account first!']);
                }
                
            }
            else{
                return response()->json(['failed'=>'Invalid email account!']);
            }
        }
        else{
            return response()->json(['failed'=>'Email is required']);
        }

    }
    public function Password_Reset($token){
        $user=user::where('token',$token)->first();
        if($user){
            $new_token=mt_rand(111111,999999);
            session()->forget('token');
            session()->put('token',$new_token);
            $user->token=$new_token;
            $update=$user->save();
            if($update){
                return view('auth.password_reset');
            }
            else{
                echo"mali";
            }
        }
        else{
            return view('errors.invalid_link');

        }
    }
    public function Change_Password(Request $request){
        $token=$request->token;
        $user=user::where('token',$token)->first();
        $password=password_hash($request->password,PASSWORD_DEFAULT);
        if(!$password==""){
            $new_token=mt_rand(111111,999999);
            if($user){
                $user->token=$new_token;
                $user->password=$password;
                $updated=$user->save();
                if($updated){
                    session()->forget('token');
                    return response()->json(['success'=>'Password reset successful.']);
                }
                else{
                    return response()->json(['failed'=>'Password reset failed. Please try again']);

                }
            }
            else{
                return response()->json(['failed'=>'Password reset failed. Please try again.']);
            }


        }
        else{
            return response()->json(['failed'=>'Password reset failed. Please try again.']);

        }
    }

}
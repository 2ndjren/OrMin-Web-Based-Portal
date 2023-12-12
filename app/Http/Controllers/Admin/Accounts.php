<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Send_Email_Verification;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Accounts extends Controller
{
    //
    public function Accounts(){
        if(session('User'))
        {
            return view('Admin.users');

        }
        elseif(session('ADMIN')){
            return view('Admin.accounts');
        }
        else{
            return redirect('signin');
        }
       
    }

    public function Create_Account(Request $request){
        $rules=[
            'fname'=> 'required',
            'mname'=> 'required',
            'lname'=> 'required',
            'bday'=> 'required',
            'age'=> 'required',
            'gender'=> 'required',
            'phone_num'=> 'required',
            'email'=> 'required|unique:App\Models\user,email',
            'password'=> 'required',
            'type'=> 'required',
            'account_status'=> 'required',
        ];
        $validator= Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()]);
        }
        DB::beginTransaction();
        $id=mt_rand(111111111,999999999);
        $account= new user;
        $account->id=$id;
        $account->fname=strtoupper($request->fname);
        $account->mname=strtoupper($request->mname);
        $account->lname=strtoupper($request->lname);
        $account->age=$request->age;
        $account->bday=$request->bday;
        $account->gender=strtoupper($request->gender);
        $account->phone_num=$request->phone_num;
        $account->user_profile='/storage/user/profiles/noprofile.png';
        $account->email=$request->email;
        $account->password=password_hash($request->password,PASSWORD_DEFAULT) ;
        $account->type=strtoupper($request->type);
        $account->account_status=strtoupper($request->account_status);
        $token= mt_rand(111111,999999);
        $account->token=$token;
        $saved=$account->save();
        if($saved){
            $mail=[
                'token'=>$token,
                'lname'=>$request->lname,
                'gender'=>$request->gender,
            ];
            $mail_sent=Mail::to($request->email)->send(new  Send_Email_Verification($mail));
            if($mail_sent){
                DB::commit();
                return response()->json(['success'=>'Account successfully created']);
            }
            else{
                DB::rollback();
                return redirect()->back()->with('failed','Something went wrong.');

            }
        }
    }
    public function Verified_Accounts(){
        $data = User::whereIn('account_status', ['VERIFIED', 'NOT VERIFIED'])
        ->get()
        ->map(function ($item) {
            $item->user_profile = base64_encode($item->user_profile);
            return $item;
        });

return response()->json(['verified' => $data]);

    }
    public function Account_Profile($id){
        $user=user::find($id);
        $user->user_profile=base64_encode($user->user_profile);
        $data=[
            'user'=>$user
        ];
        
        return response()->json($data);
    }
    public function Delete_Profile($id){
        $data=user::where('id',$id)->delete();
        if($data){
            return response()->json(['success'=>'Account successfully deleted!']);
        }else{
            return response()->json(['failed'=>'Check your network! Something went wrong!']);
        }
    }
}


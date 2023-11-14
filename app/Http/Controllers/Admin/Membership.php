<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\Notify_Membership_Account_Mail;
use App\Mail\Send_Membership_Program_Info;
use App\Models\insurance;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Membership extends Controller
{
    //
    public function Insurance(){
        if(session('USER')){
            return redirect('/');
        }else if(session('STAFF') || session('ADMIN')){
            return view('Admin.insurance');
        }else{
            return redirect('signin');
        }
    }
    public function Members_Accounts(){
        $accounts=insurance::where('status','ACTIVATED')->where('notified','0')->get();
        return response()->json($accounts);
    }
    public function To_Notif_Accounts($id){
        DB::beginTransaction();
        $account=insurance::find($id);
        if($account->notified=='0'){
        $saved=insurance::where('id',$id)->update(['notified'=>'1']);

            $mail=[
                'level'=>$account->level,
                'program'=>$account->program,
                'end_at'=>$account->end_at,
                'start_at'=>$account->start_at,
                'status'=>$account->status,
            ];
            if($saved){
                $sent= Mail::to($account->email)->send(new Notify_Membership_Account_Mail($mail));
                if($sent){
                    DB::commit();
                    return response()->json(['success'=>'Mail sent']);
                }else{
                    DB::rollBack();
                    return response()->json(['failed'=>'Mail error']);
                }
            }else{
                return response()->json(['failed'=>'something went wrong']);

            }

            
        }else{
            return response()->json(['failed'=>'something went wrong']);

        }

        // return response()->json($);
    }
    public function Membership_Profile($id){
        $data=insurance::find($id);
        return response()->json($data);
    }
    public function Decline_Membership(Request $request){
        $id=$request->id;
        if($request->note !=""){
            $updated=insurance::where('id',$id)->update([
                'note'=>$request->note,
                'status'=>'DECLINED',
            ]);
            if($updated){
                return response()->json(['success'=>'Membership successfully declined!']);
            }else{
                return response()->json(['failed'=>'Sorry, Something went wrong!']);
    
            }
        }else{
            return response()->json(['failed'=>'Field is required!']);
        }
    }
    public function Approve_Membership($id){
        DB::beginTransaction();
        $start=date('Y-m-d');
        $now=date('Y-m-d');
        $end_at = date('Y-m-d', strtotime($now . ' +1 year'));
        $before_end= new DateTime($end_at);
        $days_before_end=$before_end->modify('-15 days');
        $account=insurance::find($id);
        $updated=insurance::where('id',$id)->update([
            'status'=>'ACTIVATED',
            'start_at'=>$start,
            'end_at'=>$end_at,
            'days_before_end'=>$start,
        ]);
        if($updated){
            $started= new DateTime($start);
            $ended= new DateTime($end_at);
            $format_start=$started->format('m-d-Y');
            $format_end=$ended->format('m-d-Y');
            $mail=[
                'validity'=>$format_start."-".$format_end,
                'level'=>$account->level,
                'status'=>'ACTIVATED',
                'message'=>'Thank you for subscribing to our membership program. Here is your program information.'
            ];
            $sent=Mail::to($account->email)->send(new Send_Membership_Program_Info($mail));
            if($sent){
                DB::commit();
                return response()->json(['success'=>'Membership successfully approved!']);
            }else{
                DB::rollBack();
                return response()->json(['failed'=>'Please try again! Network error!']);
            }
        }else{
            return response()->json(['failed'=>'Sorry, Something went wrong!']);

        }

    }
    public function Delete_Membership_Profile($id){
        $data=insurance::where('id',$id)->delete();
        if($data){
            return response()->json(['success'=>'Membership successfully deleted!']);
        }
    }
    public function Membership_Accounts(){
        $activated=insurance::where('status','ACTIVATED')->get();
        $pending=insurance::where('status','PENDING')->get();
        $others=insurance::whereIn('status',['EXPIRED','DECLINED'])->get();
        $data=[
            'activated'=>$activated,
            'pending'=>$pending,
            'others'=>$others
        ];
        return response()->json($data);
    }
    public function Create_Membership_Account(Request $request){
        $rules=[
            'mem_id'=>'required',
            'fname'=>'required',
            'mname'=>'required',
            'lname'=>'required',
            'birthday'=>'required',
            'age'=>'required',
            'gender'=>'required',
            'blood_type'=>'required',
            'municipality'=>'required',
            'barangay'=>'required',
            'barangay_street'=>'required',
            'level'=>'required',
            'amount'=>'required',
            'status'=>'required',
            'email'=>'required',
            'type_of_payment'=>'required',
            'proof_of_payment'=>'required|image|max:25000',
        ];
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()]);
        }
        DB::beginTransaction();
        $create= new insurance();
        $id= mt_rand(111111111,999999999);
        $create->id=$id;
        $create->mem_id=$request->mem_id;
        $create->fname=strtoupper($request->fname);
        $create->mname=strtoupper($request->mname);
        $create->lname=strtoupper($request->lname);
        $create->birthday=$request->birthday;
        $create->age=$request->age;
        $create->blood_type=$request->blood_type;
        $create->gender=strtoupper($request->gender);
        $create->municipality=strtoupper($request->municipality);
        $create->barangay=strtoupper($request->barangay);
        $create->barangay_street=strtoupper($request->barangay_street);
        $create->level=strtoupper($request->level);
        $create->type_of_payment=strtoupper($request->type_of_payment);
        $path=$request->file('proof_of_payment')->store('public/membership/payments');
        $create->proof_of_payment=Storage::url($path);
        $create->amount=$request->amount;
        if($request->status=="Activated"){
            $start=date('Y-m-d');
            $now=date('Y-m-d');
            $end_at = date('Y-m-d', strtotime($now . ' +1 year'));
            $before_end= new DateTime($end_at);
            $days_before_end=$before_end->modify('-15 days');

            $create->start_at=$start;
            $create->end_at=$end_at;
            // $create->days_before_end=$start;
            $create->days_before_end=$start;
            $create->notified='0';
        }else{
            $create->notified='0';
        }
        
        $create->email=$request->email;
        $create->status=strtoupper($request->status);
        $saved= $create->save();
        if($saved){
            if($request->status=="Activated"){
                
            $started= new DateTime($start);
            $ended= new DateTime($end_at);
            $format_start=$started->format('m-d-Y');
            $format_end=$ended->format('m-d-Y');
            $mail=[
                'validity'=>$format_start."-".$format_end,
                'level'=>strtoupper($request->level),
                'status'=>strtoupper($request->status),
                'message'=>'Thank you for subscribing to our membership program. Here is your program information.'
            ];
            $sent=Mail::to($request->email)->send(new Send_Membership_Program_Info($mail));
            if($sent){
                DB::commit();
                return response()->json(['success'=>'Membership account successfully created!']);
            }else{
                DB::rollBack();
                return response()->json(['failed'=>'Network error!']);
            }
            }else{
                DB::commit();
                return response()->json(['success'=>'Membership account successfully created!']);
            }
        }else{
            return response()->json(['failed'=>'Network error!']);
        }
        
    }
  
}

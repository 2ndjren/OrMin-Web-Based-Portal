<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\appointments as ModelsAppointments;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Appointments extends Controller
{
    //
    public function Appointments(){
        
        if(session('ADMIN')||session('STAFF')){
            return view('Admin.appointments');
            }
            elseif (session('USER')) {
              return redirect('/');
            }
            else{
              return redirect('signin');
            }
            
        
    }
    function Search_User($search){
      $user=strtoupper($search);
      if($user!==null){
          $check=user::where('account_status','VERIFIED')->where('type','USER')->where('fname','LIKE','%'.$user.'%')->orWhere('lname','LIKE','%'.$user.'%')->count();
          $results=user::where('account_status','VERIFIED')->where('type','USER')->where('fname','LIKE','%'.$user.'%')->orWhere('lname','LIKE','%'.$user.'%')->get();
          if($check>0){
              $data=[
                  'match'=>$results,
              ];
              return response()->json($data);
          }else{
              return response()->json(['results'=>'No results found!']);
          }
      }else{
          return response()->json(['results'=>'No results found!']);

      }
  }
  public function SetAppointment_Details($id){
    $user=user::find($id);
    $check=ModelsAppointments::where('id',$id)->where('status','APPROVED')->count();
    $existing=ModelsAppointments::where('id',$id)->where('status','APPROVED')->first();
    if($user!=null){
        $data=[
            'user'=>$user,
            'check'=>$check,
            'existing'=>$existing,
        ];
        return response()->json($data);
    }
    else{
        return response()->json(['resutl'=>'User not found!']);
    }


    
  }
  public function Scheduled_Appointments(){
    $appointments=ModelsAppointments::select('app_date')->where('status','APPROVED')->orderBy('created_at','desc')->groupBy('app_date')->get();
    $data=[
        'appointments'=>$appointments,
    ];
    return response()->json($data);

  }

  public function Create_Appointment(Request $request){ 
        $rules=[
        'app_date'=>'required',
            'app_time'=>'required',
            'app_description'=>'required',
        ];
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(['errors'=> $validator->errors()]);
        }
        $id=mt_rand(111111111,999999999);
        $app=new ModelsAppointments();
        $app->id=$id;
        $app->u_id=$request->u_id;
        $app->e_id=$request->e_id;
        $app->app_date=$request->app_date;
        $app->app_time=$request->app_time;
        $app->app_description=$request->app_description;
        $app->status=$request->status;
        $app-> note=$request->note;
        $saved=$app->save();
        if($saved){
            return response()->json(['success'=>'Appointment successfully created!']);
        }else{
            return response()->json(['failed'=>'Appointment failed to create due to unkown error']);
        }

    }
   
}

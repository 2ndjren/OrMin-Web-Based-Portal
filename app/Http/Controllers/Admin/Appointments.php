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
          ;
          $results=user::where('account_status','VERIFIED')->where('type','USER')->where('fname','LIKE','%'.$user.'%')->orWhere('lname','LIKE','%'.$user.'%')->get()->map(function ($item) {
            $item->user_profile = base64_encode($item->user_profile);
            return $item;
        });

          
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
    $check=ModelsAppointments::where('u_id',$id)->whereIn('status',['APPROVED','ONGOING','PENDING'])->count();
    $existing=ModelsAppointments::where('u_id',$id)->whereIn('status',['APPROVED','ONGOING','PENDING'])->first();
    $group=ModelsAppointments::select('app_date')->whereIn('status',['APPROVED','ONGOING'])->groupBy('app_date')->get();
    $schedules=ModelsAppointments::select('app_date','app_time')->whereIn('status',['APPROVED','ONGOING'])->orderBy('app_date')->get();
    if($user!=null){
        $data=[
            'user'=>$user,
            'check'=>$check,
            'exist'=>$existing,
            'sched'=>$schedules,
            'group_sched'=>$group,
        ];
        return response()->json($data);
    }
    else{
        return response()->json(['resutl'=>'User not found!']);
    }


    
  }
  public function Appointment_Request(){
    $check=ModelsAppointments::where('status','PENDING')->count();
    $coming=ModelsAppointments::where('status','PENDING')->get();
    if($check>0){
        $data=[
            'coming'=>$coming
        ];
        return response()->json($data);
    }else{
        return response()->json(['results'=>'No submitted appointments found!']);
    }
  }
  public function Scheduled_Appointments(){
    $check=ModelsAppointments::whereIn('status',['APPROVED'])->count();
    $list=ModelsAppointments::whereIn('status',['APPROVED'])->get();
    if($check>0){
        $data=[
            'listed'=>$list
        ];
        return response()->json($data);
    }else{
        return response()->json(['results'=>'No submitted appointments found!']);
    }
  }

  public function User_Appointment_Details($id){
    $match=ModelsAppointments::find($id);
    $user=user::where('id',$match->u_id)->first();
    $user->user_profile=base64_encode($user->user_profile);
    $data=[
        'app'=>$match,
        'user'=>$user,
    ];
    return response()->json($data);
  }
  public function Next_Appointment($id){
    $ongoing=ModelsAppointments::where('status','ONGOING')->update([
        'status'=>'DONE'
    ]);
    if(session('ADMIN')){
        $next=ModelsAppointments::where('id',$id)->update([
            'status'=>'ONGOING',
            'e_id'=>session('ADMIN')['id'],
        ]);
        if($next){
            return response()->json(['success'=>'Appointment is now ongoing!']);
        }else{
            return response()->json(['failed'=>'Something went wrong!']);
    
        }
    }else if(session('STAFF')){
        $next=ModelsAppointments::where('id',$id)->update([
            'status'=>'ONGOING',
            'e_id'=>session('STAFF')['id'],
        ]);
        if($next){
            return response()->json(['success'=>'Appointment is now ongoing!']);
        }else{
            return response()->json(['failed'=>'Something went wrong!']);
    
        }
    }

   
  }
  public function End_Appointment($id){
    if(session('ADMIN')){
        $next=ModelsAppointments::where('id',$id)->update([
            'status'=>'DONE',
            'e_id'=>session('ADMIN')['id'],
        ]);
        if($next){
            return response()->json(['success'=>'Appointment completed!']);
        }else{
            return response()->json(['failed'=>'Something went wrong!']);
    
        }
    }else if(session('STAFF')){
        $next=ModelsAppointments::where('id',$id)->update([
            'status'=>'DONE',
            'e_id'=>session('STAFF')['id'],
        ]);
        if($next){
            return response()->json(['success'=>'Appointment completed!']);
        }else{
            return response()->json(['failed'=>'Something went wrong!']);
    
        }
    }
  
  }

  public function Approve_User_Appointment(Request $request){
    if($request->note!==null){

        if(session('ADMIN')){
            $updated=ModelsAppointments::where('id',$request->approve_id)->update([
                'status'=>'APPROVED',
                'note'=>$request->note,
                'e_id'=>session('ADMIN')['id'],
            ]);
            if($updated){
                return response()->json(['success'=>'Appointment successfully approved']);

            }else{
                return response()->json(['failed'=>'All fields are required!']);
                
            }
        }else{
            $updated=ModelsAppointments::where('id',$request->approve_id)->update([
                'status'=>'APPROVED',
                'note'=>$request->note,
                'e_id'=>session('STAFF')['id'],
            ]);
            if($updated){
                return response()->json(['success'=>'Appointment successfully approved']);

            }else{
                return response()->json(['failed'=>'All fields are required!']);
                
            }
        }
    }else{
        return response()->json(['failed'=>'All fields are required!']);
    }
  }
  public function Decline_User_Appointment(Request $request){
    if($request->note!==null){

        if(session('ADMIN')){
            $updated=ModelsAppointments::where('id',$request->decline_id)->update([
                'status'=>'APPROVED',
                'note'=>$request->note,
                'e_id'=>session('ADMIN')['id'],
            ]);
            if($updated){
                return response()->json(['success'=>'Appointment successfully declined']);
            }else{
                return response()->json(['failed'=>'Somthing went wrong']);
                
            }
        }else{
            $updated=ModelsAppointments::where('id',$request->decline_id)->update([
                'status'=>'APPROVED',
                'note'=>$request->note,
                'e_id'=>session('STAFF')['id'],
            ]);
            if($updated){
                return response()->json(['success'=>'Appointment successfully declined']);

            }else{
                return response()->json(['failed'=>'Somthing went wrong']);

                
            }
        }
    }else{
        return response()->json(['failed'=>'All fields are required!']);
    }
  }


  public function Appointments_Submitted(){
    $ongoing=ModelsAppointments::where('status','ONGOING')->first();
    $next=ModelsAppointments::where('status','APPROVED')->first();
    if(!empty($ongoing)){
        $ongoing_user=user::where('id',$ongoing->u_id)->first();
        $ongoing_user->user_profile=base64_encode($ongoing_user->user_profile);
    }else{
        $ongoing_user="No ongoing meeting!";
    }
   
    $data=[
        'ongoing_user'=>$ongoing_user,
        'ongoing'=>$ongoing,


      
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
            return response()->json(['failed'=>'All fields are required!']);
        }
        if($request->status=="Ongoing"){
            $check=ModelsAppointments::where('status',$request->status)->update([
                'status'=>'ONGOING',
            ]);
            if($check){
                $id=mt_rand(111111111,999999999);
                $app=new ModelsAppointments();
                $app->id=$id;
                $app->u_id=$request->u_id;
                $app->e_id=$request->e_id;
                $app->app_date=$request->app_date;
                $app->app_time=$request->app_time;
                $app->app_description=$request->app_description;
                $app->status=strtoupper($request->status);
                $app-> note=$request->note;
                $saved=$app->save();
                if($saved){
                    return response()->json(['success'=>'Appointment successfully created!']);
                }else{
                    return response()->json(['failed'=>'Appointment failed to create due to unkown error']);
                }
            }
            
        }else{
            $id=mt_rand(111111111,999999999);
            $app=new ModelsAppointments();
            $app->id=$id;
            $app->u_id=$request->u_id;
            $app->e_id=$request->e_id;
            $app->app_date=$request->app_date;
            $app->app_time=$request->app_time;
            $app->app_description=$request->app_description;
            $app->status=strtoupper($request->status);
            $app-> note=$request->note;
            $saved=$app->save();
            if($saved){
                return response()->json(['success'=>'Appointment successfully created!']);
            }else{
                return response()->json(['failed'=>'Appointment failed to create due to unkown error']);
            }
        }
     

    }
   
}

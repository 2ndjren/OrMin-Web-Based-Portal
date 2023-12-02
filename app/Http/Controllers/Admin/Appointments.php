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
   
}

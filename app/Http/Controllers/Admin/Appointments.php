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
   
}

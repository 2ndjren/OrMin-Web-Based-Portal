<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Users extends Controller
{
    //
    public function Users(){
        if(session('User'))
        {
            return view('Admin.users');

        }
        elseif(session('ADMIN')){
            return redirect('users');
        }
        else{
            return redirect('signin');
        }
       
    }
}

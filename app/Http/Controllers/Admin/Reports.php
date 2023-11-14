<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\appointments;
use Illuminate\Http\Request;

class Reports extends Controller
{
    //
    public function Reports(){
        return view('Admin.reports');
    }
}

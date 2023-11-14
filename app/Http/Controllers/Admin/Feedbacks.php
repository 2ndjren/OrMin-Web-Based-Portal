<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Feedbacks extends Controller
{
    //
    public function Feedbacks(){
        return view('Admin.feedbacks');
    }
}

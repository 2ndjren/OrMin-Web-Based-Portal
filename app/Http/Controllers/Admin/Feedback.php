<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\feedback as ModelFeedback;
use Illuminate\Http\Request;

class Feedback extends Controller
{
    //
    public function Create_Feedback(Request $request)  {
        $message=$request->message;
        if($message!=null){
            $create= new ModelFeedback();
            $id=mt_rand(111111111,999999999);
            $create->id=$id;
            if(session('USER')){
                $create->u_id=session('USER')['id'];
                $create->identity=session('USER')['type'];
            }else{
                $create->identity='ANONYMOUS';
            }
            $create->message=$message;
            $saved=$create->save();
        if($saved){
            return response()->json(['success'=>'Thank you for sharing your feedback.']);
        }
    }else{
        return response()->json(['failed'=>'To continue please fill up the form first!']);
    }

    }
}
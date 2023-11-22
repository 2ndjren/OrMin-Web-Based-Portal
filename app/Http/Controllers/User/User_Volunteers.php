<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\volunteers as ModelsVolunteers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class User_Volunteers extends Controller
{
    //
    public function Submit_Volunteer(Request $request){
        if(session('USER')){
            $rules=[
                'fname'=>'required',
                'mname'=>'required',
                'lname'=>'required',
                'occupation'=>'required',
                'gender'=>'required',
                'birthday'=>'required|date|before_or_equal:' .now()->subYears(15)->format('Y-m-d'),
                'nationality'=>'required',
                'civil_status'=>'required',
                'municipality'=>'required',
                'barangay'=>'required',
                'barangay_street'=>'required',
                'postal_code'=>'required',
                'occupation_address'=>'required',
                'phone_no'=>'required',
                'email'=>'required',
                
            ];
        }else{
            $rules=[
                'fname'=>'required',
                'mname'=>'required',
                'lname'=>'required',
                'occupation'=>'required',
                'gender'=>'required',
                'birthday'=>'required|date|before_or_equal:' .now()->subYears(15)->format('Y-m-d'),
                'nationality'=>'required',
                'civil_status'=>'required',
                'municipality'=>'required',
                'barangay'=>'required',
                'barangay_street'=>'required',
                'postal_code'=>'required',
                'occupation_address'=>'required',
                'phone_no'=>'required',
                'email'=>'required',

                
            ];
        }
        $validator= Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()]);
        }
        $id=mt_rand(111111,999999);
        $vol= new ModelsVolunteers();
        $vol->id=$id;
      
        $vol->u_id=session('USER')['id'];
        $vol->vol_id="0000";
        
        $vol->fname=strtoupper($request->fname);
        $vol->mname=strtoupper($request->mname);
        $vol->lname=strtoupper($request->lname);
        $vol->occupation=strtoupper($request->occupation);
        $vol->gender=strtoupper($request->gender);
        $vol->birthday=$request->birthday;
        $vol->nationality=strtoupper($request->nationality);
        $vol->civil_status=strtoupper($request->civil_status);
        $vol->province="ORIENTAL MINDORO";
        $vol->municipal=strtoupper($request->municipality);
        $vol->barangay=strtoupper($request->barangay);
        $vol->barangay_street=strtoupper($request->barangay_street);
        $vol->postal_code=$request->postal_code;
        $vol->occupation_address=strtoupper($request->occupation_address);
        $vol->phone_no=$request->phone_no;
        $vol->role=strtoupper($request->role);
        $vol->privacy_agreement="AGREE";

        // if(session('USER')){
        //     $path=$request->file('consent')->store('public/admin/volunteer/consent');
        //     $vol->consent=Storage::url($path);
        // }
        $vol->email=$request->email;
        $vol->status="PENDING";
        $saved=$vol->save();
        if($saved){
            return response()->json(['success'=>'Your request has been successfully sent to the office.']);
        }else{
            return response()->json(['failed'=>'Something went wrong!']);
        }


    }
}


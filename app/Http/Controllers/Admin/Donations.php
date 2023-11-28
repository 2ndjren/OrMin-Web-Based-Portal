<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\blood;
use App\Models\donations as ModelsDonations;
use App\Models\municipality;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Donations extends Controller
{
    //
    public function Donations(){
        if(session('ADMIN')||session('STAFF')){
            return view('Admin.donations');
        }
        else if(session(('USER'))){
            return redirect('/');
        }
        else{
            return redirect('signin');
        }
    }
    public function Donation_Data($id){
        $data=ModelsDonations::find($id);
        return response()->json($data);
    }
    public function Approve_Donation($id){
        $updated=ModelsDonations::where('id',$id)->update(['status'=>'APPROVED']);
        if($updated){
            return response()->json(['success'=> 'Donation approve successfull!']);
        }else{
            return response()->json(['failed'=> 'Somthing went wrong!']);
        }
    }
    public function Donated_Funds(){
        $donated_funds= ModelsDonations::where('status','VERIFIED')->orderBy('created_at','desc')->get();
        $pending_funds= ModelsDonations::where('status','PENDING')->orderBy('created_at','desc')->get();
        $declined_funds= ModelsDonations::where('status','DECLINED')->orderBy('created_at','desc')->get();
        $data=[
            'verified'=>$donated_funds,
            'pending'=>$pending_funds,
            'declined'=>$declined_funds,
        ];
        return response()->json($data);
    }
    public function Donation_Details($id){
        $details= ModelsDonations::find($id);

        $data=[
            'details'=>$details,
        ];
        return response()->json($data);
    }
    public function Create_Donation(Request $request){
        $rules=[
            'fname'=>'required',
            'mname'=>'required',
            'lname'=>'required',
            'age'=>'required',
            'gender'=>'required',
            'municipality_city'=>'required',
            'donated_amount'=>'required',
            'donation_type'=>'required',
            'payment_type'=>'required',
            'donator_info'=>'required',
            'donation_proof'=>'required|image',
            'type'=>'required',
        ];
        $validator= Validator::make(request()->all(),$rules);
        if($validator->fails()){
            return response()->json(['failed'=>'All fields are required!']);
        }

        $id=mt_rand(111111111,999999999);
        $create= new ModelsDonations();
        $create->id=$id;
        if(session('ADMIN')){
        $create->e_id=session('ADMIN')['id'];
        }
        $create->fname=strtoupper($request->fname);
        $create->mname=strtoupper($request->mname);
        $create->lname=strtoupper($request->lname);
        $create->age=$request->age;
        $create->gender=strtoupper($request->gender);
        $create->municipality_city=strtoupper($request->municipality_city);
        $create->donated_amount=$request->donated_amount;
        $create->payment_type=strtoupper($request->payment_type);
        $create->type=strtoupper($request->type);
        $create->donation_type=strtoupper($request->donation_type);
        $create->donator_info=$request->donator_info;
        $path=$request->file('donation_proof')->store('public/donations/proof_of_payments');
        $create->donation_proof=Storage::url($path);
        $create->status='PENDING';
        $saved=$create->save();
        if($saved){
            return response()->json(['success'=>'Record added successfully!']);
        }else{
            return response()->json(['failed'=>'Something went wrong!']);

        }
    }
    

}

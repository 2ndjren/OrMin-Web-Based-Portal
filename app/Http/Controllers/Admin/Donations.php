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
    public function Decline_Donation(Request $request){
        $updated=ModelsDonations::where('id',$request->id)->update([
            'status'=>'DECLINED',
            'note'=>$request->note
        ]);
        if($updated){
            return response()->json(['success'=> 'Declined successfull!']);
        }else{
            return response()->json(['failed'=> 'Something went wrong!']);
        }
    }
    public function Donation_Data($id){
        $data=ModelsDonations::find($id);
        $data->donation_proof=base64_encode($data->donation_proof);
        return response()->json($data);
    }
    public function Approve_Donation(Request $request){
        $updated=ModelsDonations::where('id',$request->id)->update([
            'status'=>'VERIFIED',
            'note'=>$request->note
        ]);
        if($updated){
            return response()->json(['success'=> 'Donation approve successfull!']);
        }else{
            return response()->json(['failed'=> 'Somthing went wrong!']);
        }
    }
    public function Donated_Funds(){
        $donated_funds= ModelsDonations::where('status','VERIFIED')->orderBy('created_at','desc')->get()->map(function ($item) {
            $item->donation_proof = base64_encode($item->donation_proof);
            return $item;
        });
        $pending_funds= ModelsDonations::where('status','PENDING')->orderBy('created_at','desc')->get()
        ->map(function ($item) {
            $item->donation_proof = base64_encode($item->donation_proof);
            return $item;
        });
        $declined_funds= ModelsDonations::where('status','DECLINED')->orderBy('created_at','desc')->get()->map(function ($item) {
            $item->donation_proof = base64_encode($item->donation_proof);
            return $item;
        });
        $data=[
            'verified'=>$donated_funds,
            'pending'=>$pending_funds,
            'declined'=>$declined_funds,
        ];
        return response()->json($data);
    }
    public function Donation_Details($id){
        $details= ModelsDonations::find($id);
        $details->donation_proof=base64_encode($details->donation_proof);
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
        $image=$request->file('donation_proof');
        $image_content=file_get_contents($image);
        $create->donation_proof=$image_content;
        $create->status='PENDING';
        $saved=$create->save();
        if($saved){
            return response()->json(['success'=>'Record added successfully!']);
        }else{
            return response()->json(['failed'=>'Something went wrong!']);

        }
    }
    

}

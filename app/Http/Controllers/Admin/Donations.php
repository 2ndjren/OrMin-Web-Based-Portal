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
    public function Municipality(){
        $data=municipality::all();
        return response()->json($data);
      }
      public function Overall_Donation_Sum(){
        $donation_sum=ModelsDonations::where('status','VALIDATED')->sum('donated_amount');
        $donators_count=ModelsDonations::where('status','VALIDATED')->count();
        $highest_donation=ModelsDonations::where('status','VALIDATED')->orderBy('donated_amount','asc')->limit(5)->get();
        return response()->json([
            'overall_donation_sum'=>$donation_sum,
            'overall_donators_count'=>$donators_count,
            'highest_donation'=>$highest_donation,
    ]);
      }
      public function Create_Donation(Request $request){
        
        $rules=[
            'fname'=>'required',
            'mname'=>'required',
            'lname'=>'required',
            'age'=>'required|numeric',
            'gender'=>'required|alpha',
            'municipality_city'=>'required',
            'donated_amount'=>'required',
            'donation_type'=>'required',
            'payment_type'=>'required',
            'donation_proof'=>'required',
        ];

        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(['failed'=>'All fields are required.']);
        }
        $id=mt_rand(111111,999999);

        $donation=new ModelsDonations();
        $donation->id=$id;        
        $donation->e_id=session('ADMIN')['id'];        
        $donation->fname=$request->fname;        
        $donation->mname=$request->mname;        
        $donation->lname=$request->lname;        
        $donation->sname=$request->sname;        
        $donation->age=$request->age;        
        $donation->gender=$request->gender;        
        $donation->municipality_city=$request->municipality_city;        
        $donation->donation_type=$request->donation_type;        
        $donation->payment_type=$request->payment_type;        
        $donation->company_name=$request->company_name; 
        $donation->donated_amount=$request->donated_amount; 
        $donation->status="VALIDATED"; 
        $path=$request->file('donation_proof')->store('public/admin/donations');
        $donation->donation_proof=Storage::url($path);
        $saved=$donation->save();        
        if($saved){
            return response()->json(['success'=>'Successfully Saved']);
        }
      }
      public function Validated_Donation(){
        $validated=ModelsDonations::where('status','VALIDATED')->get();
        $pending=ModelsDonations::where('status','PENDING')->get();
        $data=[
            'validated'=>$validated,
            'pending'=>$pending,
        ];
        return response()->json($data);
      }


      public function Create_Blood_Donors_Information(Request $request){
        $rules=[
            'fname'=>'required',
            'mname'=>'required',
            'lname'=>'required',
            'age'=>'required',
            'birthday'=>'required',
            'address'=>'required',
            'blood_type'=>'required',
            'donated_at'=>'required',
            'bag_count'=>'required',
        ];
        $validator= Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(['failed'=>'All fields are required!']);
        }
        $id=mt_rand(111111,999999);
        $saved= blood::create([
            'id' => $id,
            'e_id' => session('ADMIN')['id'],
            'fname' =>strtoupper( $request->fname),
            'mname' => strtoupper($request->mname),
            'lname' => strtoupper($request->lname),
            'sname' => strtoupper($request->sname),
            'age' => $request->age,
            'gender' => strtoupper($request->gender),
            'birthday' => $request->birthday,
            'address' => strtoupper($request->address),
            'bag_count' => $request->bag_count,
            'blood_type' => $request->blood_type,
            'donated_at' => $request->donated_at,
            'status' => "VALIDATED",
        ]);
        if($saved){
            return response()->json(['success'=>'Adding of records successfull']);
        }else{
            return response()->json(['failed'=>'Adding of records failed']);

        }
      }
      public function Blood_Overview(){
        $donors=blood::all();
        $donors_count=blood::where('status','VALIDATED')->count();
        $data=[
            'donors'=>$donors,
            'donors_count'=>$donors_count,
        ];
        return response()->json($data);
      }
}

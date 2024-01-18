<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blood as ModelsBlood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class Blood extends Controller
{
    //
    public function Blood(){
        return view('Admin.blood');
    }
    public function Create_Blood(Request $request){
        $rules=[
            'type'=>'required',
            'quantity'=>'numeric|required',
        ];
        $validotor= Validator::make($request->all(),$rules);
        if($validotor->fails()){
            return response()->json(['failed'=>$validotor->errors()]);
        }
        $blood= new ModelsBlood();
        $blood->type=$request->type;
        $blood->quantity=$request->quantity;
        $success=$blood->save();
        if($success){
            return response()->json(['success'=>'Type successfully added']);
        }
        else{
            return response()->json(['failed'=>'Type successfully failed']);

        }
        

    }

    public function DeleteData($id){
        $deleted=ModelsBlood::where('id',$id)->delete();
        if($deleted){
            return response()->json(['success'=>'Successful']);
        }else{
            return response()->json(['failed'=>'Deleting of Blood type fail.']);

        }
    }
    public function Update_Blood(Request $request){
        $rules=[
            'quantity'=>'required|numeric',
        ];
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()]);
        }
        if($request->status=="Addition"){
            $stock= ModelsBlood::where('id',$request->id)->first();
            $add=$request->quantity;
            $addition=$stock->quantity+$add;
            $updated=ModelsBlood::where('id',$request->id)->update([
                'quantity'=>$addition
            ]);
            if($updated){
                return response()->json(['success'=>'Successful']);
            }
            else{
                return response()->json(['failed'=>'Something went wrong!']);

            }
        }else{
            $stock= ModelsBlood::where('id',$request->id)->first();
            $minus=$request->quantity;
            if($minus >= $stock->quantity){
                $updated=ModelsBlood::where('id',$request->id)->update([
                    'quantity'=>'0'
                ]);
                if($updated){
                    return response()->json(['success'=>'Successful']);
                }else{
                    return response()->json(['failed'=>'Something went wrong!']);
    
    
                }
            }else{
                $subtracted=$stock->quantity-$minus;
                $updated=ModelsBlood::where('id',$request->id)->update([
                    'quantity'=>$subtracted
                ]);
                if($updated){
                    return response()->json(['success'=>'Successful']);
                }else{
                    return response()->json(['failed'=>'Something went wrong!']);
    
    
            }
        }
          

        }
    }
    public function BloodData(){
        $bloods= ModelsBlood::orderBy('type','asc')->get();
        return response()->json($bloods);
    }
    public function BloodTable(){
        $bloods= ModelsBlood::orderBy('type','asc')->get();
        return response()->json(['blood'=>$bloods]);
    }
}

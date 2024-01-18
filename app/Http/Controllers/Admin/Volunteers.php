<?php

namespace App\Http\Controllers\Admin;

use App\Exports\Export_Volunteers;
use App\Http\Controllers\Controller;
use App\Models\volunteers as ModelsVolunteers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class Volunteers extends Controller
{
    //
    public function Volunteers(){
        if(session('STAFF') || session('ADMIN')){
            return view('Admin.volunteers');
        }else if(session('USER')){
            return redirect('/');
        }else{
            return redirect('signin');
        }
    }
    public function Volunteers_Table(){
        $validated=ModelsVolunteers::where('status','VALIDATED')->get()->map(function ($item) {
            $item->vol_profile = base64_encode($item->vol_profile);
            return $item;
        });
        $pending=ModelsVolunteers::where('status','PENDING')->get()->map(function ($item) {
            $item->vol_profile = base64_encode($item->vol_profile);
            return $item;
        });
        $declined=ModelsVolunteers::where('status','DECLINED')->get()->map(function ($item) {
            $item->vol_profile = base64_encode($item->vol_profile);
            return $item;
        });
        $data=[
            'validated'=>$validated,
            'pending'=>$pending,
            'declined'=>$declined
        ];
        return response()->json($data);
    }

    
    public function Volunteers_Profile($id){
        $data=ModelsVolunteers::find($id);
        $data->vol_profile=base64_encode($data->vol_profile);
        return response()->json($data);
    }
    public function Approve_Volunteer_Request(Request $request){
        $rules =[
            'expiration_date'=>'required',
            'vol_id'=>'required'
        ];
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(['failed'=>'Field are required!']);
        }
        $approve= new ModelsVolunteers();
       if(session('ADMIN')){
        $approved= $approve::where('id',$request->approve_id)->update([
            'expiration_date'=>$request->expiration_date,
            'vol_id'=>$request->vol_id,
            'e_id'=>session('ADMIN')['id'],
            'status'=>'VALIDATED',
        ]);
       }else if(session('STAFF')){
        $approved= $approve::where('id',$request->approve_id)->update([
            'expiration_date'=>$request->expiration_date,
            'vol_id'=>$request->vol_id,
            'e_id'=>session('STAFF')['id'],
            'status'=>'VALIDATED',
        ]);
       }
        if($approved){
            return response()->json(['success'=>'Request successfully approved!']);
        }else{
            return response()->json(['failed'=>'Something went wrong!']);
            
        }
     }
    public function Decline_Volunteer_Request(Request $request){
        $rules =[
            'note'=>'required'
        ];
        $validator=Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(['failed'=>'Field are required!']);
        }
        $approve= new ModelsVolunteers();
        $approved= $approve::where('id',$request->decline_id)->update([
            'note'=>$request->note,
            'status'=>'DECLINED',
        ]);
        if($approved){
            return response()->json(['success'=>'Request successfully approved!']);
        }else{
            return response()->json(['failed'=>'Something went wrong!']);
            
        }
     }

    public function Create_Volunteer(Request $request){
        if(session('ADMIN') || session('STAFF')){
            $rules=[
                'vol_id'=>'required',
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
                'expiration_date'=>'required',
                'email'=>'required',
                
            ];
        }else{
            $rules=[
                'vol_profile'=>'required|image|max:2048',
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
                'consent'=>'required',
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
        if(session('ADMIN')){
            $vol->e_id=session('ADMIN')['id'];
        }else if(session('STAFF')){
            $vol->e_id=session('STAFF')['id'];
        }else{
            $vol->u_id=session('USER')['id'];

        }
        $vol->vol_id=$request->vol_id;
        if($request->vol_profile!=null){


            $uploadedFile = $request->file('vol_profile');
            $fileName = time() . '_' . $uploadedFile->getClientOriginalName();
            $originalFilePath = $uploadedFile->getRealPath();
        
            // Resize the image
            $resizedImage = $this->resizeImage($originalFilePath, 800, null); // Resize to desired dimensions
        
            $maxSize = 50 * 1024; // 50KB in bytes
            $imageQuality = 90; // Initial quality setting
    
            do {
                ob_start();
                imagejpeg($resizedImage, null, $imageQuality);
                $imageData = ob_get_contents();
                ob_end_clean();
    
                $imageSize = strlen($imageData);
    
                if ($imageSize > $maxSize && $imageQuality > 10) {
                    // Reduce quality if the file size exceeds the limit
                    $imageQuality -= 2;
                } else {
                    break;
                }
            } while (true);
            $vol->vol_profile=$imageData;
        }
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
        if(session('STAFF') || session('ADMIN')){
            $vol->expiration_date=$request->expiration_date;
        }
        $vol->privacy_agreement="AGREE";
        if(session('USER')){

            $uploadedFile = $request->file('consent');

            // $image=$request->file('user_profile');
            $fileName = time() . '_' . $uploadedFile->getClientOriginalName();
            $originalFilePath = $uploadedFile->getRealPath();
        
            // Resize the image
            $resizedImage = $this->resizeImage($originalFilePath, 800, null); // Resize to desired dimensions
        
            $maxSize = 50 * 1024; // 50KB in bytes
            $imageQuality = 90; // Initial quality setting
    
            do {
                ob_start();
                imagejpeg($resizedImage, null, $imageQuality);
                $imageData = ob_get_contents();
                ob_end_clean();
    
                $imageSize = strlen($imageData);
    
                if ($imageSize > $maxSize && $imageQuality > 10) {
                    // Reduce quality if the file size exceeds the limit
                    $imageQuality -= 2;
                } else {
                    break;
                }
            } while (true);
            
            $vol->consent=$imageData;
        }
        $vol->email=$request->email;
        $vol->status="VALIDATED";
        $saved=$vol->save();
        if($saved){
            return response()->json(['success'=>'Volunteer record has been successfully saved!']);
        }else{
            return response()->json(['failed'=>'Something went wrong!']);
        }


    }

    private function resizeImage($filePath, $newWidth, $newHeight = null)
    {
        list($width, $height, $type) = getimagesize($filePath);
    
        switch ($type) {
            case IMAGETYPE_JPEG:
            case IMAGETYPE_JPEG2000:
                $image = imagecreatefromjpeg($filePath);
                break;
            case IMAGETYPE_PNG:
                $image = imagecreatefrompng($filePath);
                break;
            default:
                return false; // Unsupported image type
        }
    
        if ($newHeight === null) {
            $newHeight = round($height * $newWidth / $width);
        }
    
        $imageResized = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($imageResized, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        imagedestroy($image);
    
        return $imageResized;
    }

 
    public function Update_Volunteer_Profile(Request $request){
        if(session('ADMIN') || session('STAFF')){
            $rules=[
                'edit_vol_id'=>'required',
                'edit_fname'=>'required',
                'edit_mname'=>'required',
                'edit_lname'=>'required',
                'edit_role'=>'required',
                'edit_occupation'=>'required',
                'edit_gender'=>'required',
                'edit_birthday'=>'required|date|before_or_equal:' .now()->subYears(15)->format('Y-m-d'),
                'edit_nationality'=>'required',
                'edit_civil_status'=>'required',
                'edit_municipality'=>'required',
                'edit_barangay'=>'required',
                'edit_barangay_street'=>'required',
                'edit_postal_code'=>'required',
                'edit_occupation_address'=>'required',
                'edit_phone_no'=>'required',
                'edit_expiration_date'=>'required',
                'edit_email'=>'required',
                
            ];
        }else{
            $rules=[
               
                'edit_fname'=>'required',
                'edit_mname'=>'required',
                'edit_lname'=>'required',
                'edit_role'=>'required',
                'edit_occupation'=>'required',
                'edit_gender'=>'required',
                'edit_birthday'=>'required|date|before_or_equal:' .now()->subYears(15)->format('Y-m-d'),
                'edit_nationality'=>'required',
                'edit_civil_status'=>'required',
                'edit_municipality'=>'required',
                'edit_barangay'=>'required',
                'edit_barangay_street'=>'required',
                'edit_postal_code'=>'required',
                'edit_occupation_address'=>'required',
                'edit_phone_no'=>'required',
                'edit_consent'=>'required',
                'edit_email'=>'required',
                
            ];
        }
        $validator= Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()]);
        }
        $update= new ModelsVolunteers();
        
        if($request->file('edit_vol_profile')!=null){
            $uploadedFile = $request->file('edit_vol_profile');

            // $image=$request->file('user_profile');
            $fileName = time() . '_' . $uploadedFile->getClientOriginalName();
            $originalFilePath = $uploadedFile->getRealPath();
        
            // Resize the image
            $resizedImage = $this->resizeImage($originalFilePath, 800, null); // Resize to desired dimensions
        
            $maxSize = 50 * 1024; // 50KB in bytes
            $imageQuality = 90; // Initial quality setting
    
            do {
                ob_start();
                imagejpeg($resizedImage, null, $imageQuality);
                $imageData = ob_get_contents();
                ob_end_clean();
    
                $imageSize = strlen($imageData);
    
                if ($imageSize > $maxSize && $imageQuality > 10) {
                    // Reduce quality if the file size exceeds the limit
                    $imageQuality -= 2;
                } else {
                    break;
                }
            } while (true);
            $updated= $update::where('id',$request->edit_id)->update([
                'vol_id'=>$request->edit_vol_id,
                'vol_profile'=>$imageData,
                'fname'=>strtoupper($request->edit_fname),
                'mname'=>strtoupper($request->edit_mname),
                'lname'=>$request->edit_lname,
                'role'=>$request->edit_role,
                'occupation'=>$request->edit_occupation,
                'occupation_address'=>strtoupper($request->edit_occupation_address),
                'gender'=>strtoupper($request->edit_gender),
                'birthday'=>$request->edit_birthday,
                'nationality'=>strtoupper($request->edit_nationality),
                'civil_status'=>strtoupper($request->edit_civil_status),
                'municipal'=>strtoupper($request->edit_municipality),
                'barangay'=>strtoupper($request->edit_barangay),
                'barangay_street'=>strtoupper($request->edit_barangay_street),
                'postal_code'=>$request->edit_postal_code,
                'phone_no'=>$request->edit_phone_no,
                'email'=>$request->edit_email,
                'consent'=>$request->edit_consent,
            ]);
        }else{
            $updated= $update::where('id',$request->edit_id)->update([
                'vol_id'=>$request->edit_vol_id,
                'fname'=>strtoupper($request->edit_fname),
                'mname'=>strtoupper($request->edit_mname),
                'lname'=>strtoupper($request->edit_lname),
                'role'=>$request->edit_role,
                'occupation'=>strtoupper($request->edit_occupation),
                'occupation_address'=>strtoupper($request->edit_occupation_address),
                'gender'=>strtoupper($request->edit_gender),
                'birthday'=>$request->edit_birthday,
                'nationality'=>strtoupper($request->edit_nationality),
                'civil_status'=>strtoupper($request->edit_civil_status),
                'municipal'=>strtoupper($request->edit_municipality),
                'barangay'=>strtoupper($request->edit_barangay),
                'barangay_street'=>strtoupper($request->edit_barangay_street),
                'postal_code'=>$request->edit_postal_code,
                'phone_no'=>$request->edit_phone_no,
                'email'=>$request->edit_email,
                'consent'=>$request->edit_consent,
            ]);
        }
        if($updated){
            return response()->json(['success'=>'Update successfull!']);
        }else{
            return response()->json(['failed'=>'Something went wrong!']);
        }
        

    }
    
    

    

    public function Validated_Pending_Volunteers(){
        $validated= ModelsVolunteers::where('status','VALIDATED')->limit(10)->get();
        $pending= ModelsVolunteers::where('status','PENDING')->limit(10 )->get();
        $male= ModelsVolunteers::where('gender','MALE')->count();
        $female= ModelsVolunteers::where('gender','FEMALE')->count();
        $vol_validated_count= ModelsVolunteers::where('status','VALIDATED')->count();
        $vol_pending_count= ModelsVolunteers::where('status','PENDING')->count();
        $data=[
            'validated'=>$validated,
            'pending'=>$pending,
            'male'=>$male,
            'female'=>$female,
            'vol_validated_count'=>$vol_validated_count,
            'vol_pending_count'=>$vol_pending_count,
        ];
        if($data){
            return response()->json($data);
        }
        else{
            return response(['failed'=>'No results']);
        }
    }

    public function Delete_Profile($id){
        $data=ModelsVolunteers::where('id',$id)->delete();
        if($data){
            return response()->json(['success'=>'Profile successfully deleted!']);
        }else{
            return response()->json(['failed'=>'Something went wrong!']);

        }
        
    }
    public function Print(){
        $data['toprint']=ModelsVolunteers::where('status','VALIDATED')->limit(50)->get();
        return view('layout.admin.print.volunteers',$data);
    }

    
}

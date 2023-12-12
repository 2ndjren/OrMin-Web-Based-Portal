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
        $data->donation_proof=base64_encode($data->donation_proof);
        return response()->json($data);
    }
    public function Change_Status_Donation(Request $request){
      if($request->note!=null){
        if($request->status=='VERIFIED'){
            $updated=ModelsDonations::where('id',$request->id)->update([
                'status'=>$request->status,
                'note'=>$request->note
            ]);
            if($updated){
                return response()->json(['success'=> 'Donation approve successfull!']);
            }else{
                return response()->json(['failed'=> 'Somthing went wrong!']);
            }
        }else{
            $updated=ModelsDonations::where('id',$request->id)->update([
                'status'=>$request->status,
                'note'=>$request->note
            ]);
            if($updated){
                return response()->json(['success'=> 'Declined successfull!']);
            }else{
                return response()->json(['failed'=> 'Somthing went wrong!']);
            }
        }
      }else{
        return response()->json(['failed'=> 'Add note is required!']);

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


        $uploadedFile = $request->file('donation_proof');

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
        $create->donation_proof=$imageData;
        $create->status='VERIFIED';
        $saved=$create->save();
        if($saved){
            return response()->json(['success'=>'Record added successfully!']);
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
    

}

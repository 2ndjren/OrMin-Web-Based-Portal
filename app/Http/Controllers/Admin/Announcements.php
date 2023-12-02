<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\announcement;
use App\Models\user;
use Illuminate\Http\Request;

class Announcements extends Controller
{
    //
    public function Announcement(){
        if(session('ADMIN')||session('STAFF')){
            return view('Admin.announcements');
            }
            elseif (session('USER')) {
              return redirect('/');
            }
            else{
              return redirect('signin');
            }  
    }

    public function Create_Announcement(Request $request){
        $title=$request->title;
        $announcement= $request->announcement;
        if($title!=null && $announcement!=null){
            $id=mt_rand(111111111,999999999);
            $create= new announcement();
            $create->id=$id;
            $create->title=$title;
            $create->announcement=$announcement;
            if(session('ADMIN')){
                $create->e_id=session('ADMIN')['id'];
            }
            if(session('STAFF')){
                $create->e_id=session('STAFF')['id'];
            }
            $posted=$create->save();
            if($posted){
                return response()->json(['success'=>'Announcement successfully post!']);
            }else{
                return response()->json(['success'=>'Announcement successfully post!']);

            }
        }else{
            return response()->json(['failed'=> 'All field is required']);
        }
    }
    public function Display_Posted_Announcements(){
        $current= announcement::orderBy('created_at','desc')->take(1)->get();
        $dislay = announcement::orderBy('created_at', 'desc')->skip(1)->take(PHP_INT_MAX)->get();
        $count_post= announcement::orderBy('created_at','desc')->count();
        $user = announcement::with('user')->get();
        $data=[
            'current'=>$current,
            'post'=>$dislay,
            'count'=>$count_post,
            'user'=>$user,
        ];
        if($count_post>0){
            return response()->json($data);
        }else{
            return response()->json(['results'=>'No post yet']);
        }
        
    }
    public function Find_Who_post($id){
        $poster=user::find($id);
        return response()->json($poster);
    }
    // public function Find_Post($id){
    //     $user=announcement::find($id);
    //     $poster=$user->announcement;
    //     return response()->json($poster);
    // }

    public function Find_Post($id){
        $announcement = Announcement::find($id);
    
        if (!$announcement) {
            return response()->json(['error' => $id], 404);
        }
    
        return response()->json($announcement);
    }


    public function deleteAnnouncement($id){
        $data=Announcement::where('id',$id)->delete();
        if($data){
            return response()->json(['success'=>'Membership successfully deleted!']);
        }
    }

    
public function repostAnnouncement($id)
{
    $announcement = Announcement::findOrFail($id);
    $announcement->created_at = now(); // Set the published_at field to the current datetime
    $announcement->save();

    return response()->json(['message' => 'Announcement marked as latest']);

}
    

}

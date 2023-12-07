<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\chat;
use App\Models\chat_notification;
use App\Models\chat_threads;
use App\Models\push_notification;
use App\Models\user;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Chats extends Controller
{
    //
    public function Chats(){
        if(session('STAFF')||session('ADMIN')){
            return view('Admin.chats');
        }else if(session('USER')){
            return redirect('/');
        }else{
            return redirect('signin');
        }
    }
    function Search_User($search){
        $user=strtoupper($search);
        if($user!==null){
            $check=user::where('account_status','VERIFIED')->where('type','USER')->where('fname','LIKE','%'.$user.'%')->orWhere('lname','LIKE','%'.$user.'%')->count();
          
            $results=user::where('account_status','VERIFIED')->where('type','USER')->where('fname','LIKE','%'.$user.'%')->orWhere('lname','LIKE','%'.$user.'%')->get()->map(function ($item) {
                $item->user_profile = base64_encode($item->user_profile);
                return $item;
            });
            if($check>0){
                $data=[
                    'match'=>$results,
                ];
                return response()->json($data);
            }else{
                return response()->json(['results'=>'No results found!']);
            }
        }else{
            return response()->json(['results'=>'No results found!']);

        }
    }

    function Send_Message(Request $request){
        $id=mt_rand(111111111,999999999);
        $message=$request->message;
        $e_id=$request->e_id;
       
        DB::beginTransaction();
        $send= new chat();
        $send->id=$id;
        if(session('USER')){
            if($e_id!=null){
                $send->e_id=$request->e_id;
            }
            $send->u_id=session('USER')['id'];
            $send->type=session('USER')['type'];

         
        }else if(session('ADMIN')){
            $send->u_id=$request->u_id;
            $send->e_id=session('ADMIN')['id'];
            $send->type=session('ADMIN')['type'];
        }else if(session('STAFF')){
            $send->u_id=$request->u_id;
            $send->e_id=session('STAFF')['id'];
            $send->type=session('STAFF')['type'];
        }
        if($request->message!=null){
            $send->message=$message;
        }else{
            return response()->json(['failed'=>'Message box is empty']);
        }
        $send->view='0';
        $send->notify='0';
      
        $send->status='DELIVERED';
        $sent=$send->save();
        if($sent){
            $chat_threads= new chat_threads();
            if(session('USER')){
                $match=chat_threads::find(session('USER')['id']);
                if($match){
                    $updated=chat_threads::where('u_id',$match->u_id)->update([
                        'message'=>$message,
                        'sent_at'=>Carbon::now(),
                        'status'=>'DELIVERED',
                    ]);
                    if($updated){
                        DB::commit();
                        return response()->json(['success'=>'Message sent!']);
                    }
                    else{
                        DB::rollBack();
                        return response()->json(['failed'=>'error send!']);
                    }
                
                }else{
                $user=user::find(session('USER')['id']);
                // $user->user_profile=base64_encode($user->user_profile);
                   if($user){
                    $chat_threads->u_id=$user->id;
                    // $image=$request->file('prof_image');
                    // $image_content=file_get_contents($user->user_profile);
                    $chat_threads->prof_image=$user->user_profile;
                    $chat_threads->message=$message;
                    $chat_threads->sent_at=Carbon::now();
                    $chat_threads->status='DELIVERED';
                    $saved=$chat_threads->save();
                    if($saved){
                        DB::commit();
                        return response()->json(['success'=>'Message sent!']);
                    }else{
                        DB::rollBack();
                        return response()->json(['message'=>'Check your network!']);
                    }
                   }
                }
            }else{
                $match=chat_threads::find($request->u_id);
                if($match){
                    $updated=chat_threads::where('u_id',$match->u_id)->update([
                        'message'=>$message,
                        'sent_at'=>Carbon::now(),
                        'status'=>'DELIVERED',
                    ]);
                    if($updated){
                        DB::commit();
                        return response()->json(['success'=>'Message sent!']);
                    }
                    else{
                        DB::rollBack();
                        return response()->json(['failed'=>'Check your !']);
                    }
                
                }else{
                $user=user::find($request->u_id);
                // $user->user_profile=base64_encode($user->user_profile);
                   if($user){
                    $chat_threads->u_id=$user->id;
                    $chat_threads->prof_image=$user->user_profile;
                    $chat_threads->message=$message;
                    $chat_threads->sent_at=Carbon::now();
                    $chat_threads->status='DELIVERED';
                    $saved=$chat_threads->save();
                    if($saved){
                        DB::commit();
                        return response()->json(['success'=>'Message sent!']);
                    }else{
                        DB::rollBack();
                        return response()->json(['failed'=>'Check your network!']);
                    }
                   }else{
                    return response()->json(['failed'=>'User not found!']);

                   }
                }
                
            }
       
            
        }else{
            return response()->json(['failed'=>'Message not sent!']);
        }
        
    }


    public function User_Profile($id){
        $user=user::find($id);
        $unseen=chat::where('u_id',$id)->where('notify','0')->where('status','DELIVERED')->count();
        $message=chat::where('u_id',$user->id)->orderBy('created_at','desc')->limit(1)->get();
        $user->user_profile=base64_encode($user->user_profile);
        $data=[
            'user'=>$user,
            'message'=>$message,
            'count'=>$unseen,

        ];
        return response()->json($data);

    }
    public function Conversation($id){
        $notify=chat::where('u_id',$id)->where('notify','0')->update(['notify'=>'1']);
        $view=chat::where('u_id',$id)->where('view','0')->update(['view'=>'1']);
        $thread_status=chat_threads::where('u_id',$id)->where('status','DELIVERED')->update(['status'=>'SEEN']);
        $seen=chat::where('u_id',$id)->where('status','DELIVERED')->update(['status'=>'SEEN']);
        $user=user::find($id);
        $user->user_profile=base64_encode($user->user_profile);
        $message=chat::where('u_id',$user->id)->orderBy('created_at','asc')->get();
        $data=[
            'user'=>$user,
            'message'=>$message,
        ];
        return response()->json($data);

    }
    public function User_Messages(){
        if(session('ADMIN')|| session('STAFF'))
        {
            $messages=chat_threads::whereIn('status',['SEEN','DELIVERED'])->orderBy('sent_at','desc')->get()->map(function ($item) {
                $item->proof_image = base64_encode($item->proof_image);

                return $item;
            });
            $data = [
                'user'=>$messages,
              ];
              
              return response()->json($data);

        }
        
        if(session('USER'))
        {
            $userId=session('USER')['id'];
            
            $user = chat::where('u_id', $userId)->with('user')->orderBy('created_at','asc')->get()->map(function ($item) {
                $item->proof_image = base64_encode($item->proof_image);
                return $item;
            });
            $check = chat::where('u_id', $userId)->with('user')->count();
            // $user->user_profile=base64_encode($user->user_profile);
            
            if($check>0){
            
            $data = [
                'user' => $user,
                'check' => $check,
            ];

                return response()->json($data);
            }else{
                return response()->json(['results'=>'No messages yet!']);
        
            }
        }
    
    


    }
    public function MatchUser($id){
        $check= DB::table('user')
        ->join('chat', 'user.id', '=', 'chat.u_id')
        ->select('user.*', 'chat.*')
        ->where('chat.u_id',$id)->count();
        if($check>0){
        return response()->json(['results'=>'match found!']);
            
        }else{
        return response()->json(['results'=>'no results found!']);

        }

    }

    




}

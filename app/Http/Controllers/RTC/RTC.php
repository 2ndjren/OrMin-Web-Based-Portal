<?php

namespace App\Http\Controllers\RTC;

use App\Http\Controllers\Controller;
use App\Models\chat_notification;
use App\Models\rtc as ModelsRtc;
use Illuminate\Http\Request;

class RTC extends Controller
{
    //
    public function Send_Message(Request $request){
        $send= new ModelsRtc();
        $send->chat_id="apewa121d";
        $send->message=$request->message;
        $send->uid="acwe2af1";
        $send->eid="acwe2af3";
        $send->status="Sent";
        $send->type="User";
        $sent=$send->save();
        if($sent){
            return response()->json(['message'=>'Successfully sent']);
        }
        //     $notif= new chat_notification();
        //     $notif->id=random_bytes(7);
        //     $notif->nid=$id;
        //     $notif->content=$request->message;
        //     $notif->date=date("Y-m-d");
        //     $notif->date= date("H:i:s");
        //     $notif->status="Unseen";
        //     $notify=$notif->save();
        //     if($notify){
        //         return response()->json(['message'=>'Successfully sent',201]);
        //     }
        // }
        // else{
        //     return response()->json(['message'=>'Failed to send message. Something went wrong!',201]);
        // }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat_threads extends Model
{
    use HasFactory;
    protected $table='chat_threads';
    protected $fillable=[
        'u_id',
        'prof_image',
        'message',
        'status',
        'sent_at',
    ];
    protected $primaryKey = 'u_id';

    public function Chats(){
        return $this->hasmany(chat::class);
    }
    public function Chat_threads(){
        return $this->belongsTo(chat_threads::class,'u_id','id');
    }
}

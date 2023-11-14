<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;
    protected $table='user';
    protected $fillable=[
        'id',
        'user_profile',
        'fname',
        'mname',
        'lname',
        'sname',
        'bday',
        'age',
        'gender',
        'phone_num',
        'email',
        'password',
        'account_status',
        'type',
        'token',
    ];   protected $primaryKey = 'id';

    public function chats()
    {
        // Define a one-to-many relationship with the Chat model
        return $this->hasMany(Chat::class, 'u_id', 'id');
    }

    public function announcements()
    {
        // Define a one-to-many relationship with the Announcement model
        return $this->hasMany(announcement::class, 'e_id', 'id');
    }

}


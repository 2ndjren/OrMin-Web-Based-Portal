<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $table='employee';
    protected $fillable=[
        'id',
        'user_profile',
        'fname',
        'mname',
        'lname',
        'nname',
        'bday',
        'gender',
        'position',
        'age',
        'phone_num',
        'email',
        'password',
        'account_status',
        'type',
        'token',
    ];
    public function rtc()
{
    return $this->hasMany(rtc::class);
}
}

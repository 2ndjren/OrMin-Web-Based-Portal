<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class volunteers extends Model
{
    use HasFactory;
    protected $table='volunteers';
    protected $fillable=[
        'id',
        'vol_id',
        'u_id',
        'e_id',
        'vol_profile',
        'fname',
        'mname',
        'lname',
        'occupation',
        'birthday',
        'gender',
        'nationality',
        'civil_status',
        'province',
        'municipal',
        'barnangay',
        'barangay_street',
        'postal_code',
        'role',
        'expiration_date',
        'occupation_address',
        'phone_no',
        'consent',
        'note',
        'email',
        'status',
    ];
}

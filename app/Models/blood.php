<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blood extends Model
{
    use HasFactory;
    protected $table='blood';
    protected $fillable=[
        'id',
        'u_id',
        'e_id',
        'fname',
        'mname',
        'lname',
        'sname',
        'age',
        'gender',
        'birthday',
        'address',
        'blood_type',
        'donated_at',
        'bag_count',
        'status',
    ];
}

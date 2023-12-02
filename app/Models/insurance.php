<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class insurance extends Model
{
    use HasFactory;
    protected $table='insurance';
    protected $fillable=[
        'id',
        'mem_id',
        'u_id',
        'e_id',
        'level',
        'fname',
        'mname',
        'lname',
        'sname',
        'blood_type',
        'age',
        'gender',
        'birthday',
        'municipality',
        'barangay',
        'barangay_street',
        'email',
        'amount',
        'status',
        'pick_up_address',
        'start_at',
        'end_at',
        'type_of_payment',
        'proof_of_payment',
        'OR#',
        'note',

       
    ];
}

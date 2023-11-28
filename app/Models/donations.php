<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donations extends Model
{
    use HasFactory;
    protected $table='donations';
    protected $fillable=[
        'id',
        'u_id',
        'e_id',
        'fname',
        'mname',
        'lname',
        'age',
        'gender',
        'municipality_city',
        'donated_amount',
        'donation_type',
        'payment_type',
        'donator_info',
        'type',
        'note',
        'donation_proof',
        'status',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class push_notification extends Model
{
    use HasFactory;
    protected $table='push_notification';
    protected $fillable=[
        'id',
        'u_id',
        'e_id',
        'content',
        'status'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logs extends Model
{
    use HasFactory;

    protected $table="logs";
    protected $fillable=[
        'id',
        'u_id',
        'e_id',
        'content',
        
    ];
}

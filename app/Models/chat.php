<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    use HasFactory;
    protected $table='chat';
    protected $fillable=[
        'u_id',
        'e_id',
        'type',
        'view',
        'notify',
        'message',
        'status',
    ];
    protected $primaryKey = 'id';

    public function user()
    {
        // Define the inverse of the relationship
        return $this->belongsTo(chat::class, 'u_id', 'id');
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointments extends Model
{
    
    use HasFactory;
    protected $table='appointments';
    protected $fillable=[
        'id',
        'u_id',
        'e_id',
        'app_date',
        'app_time',
        'app_description',
        'status',
        'decline_info',
    ];
    public function employee()
    {
        // Define the inverse of the relationship
        return $this->belongsTo(appointments::class, 'e_id', 'id');
    }
    public function user()
    {
        // Define the inverse of the relationship
        return $this->belongsTo(appointments::class, 'u_id', 'id');
    }
    
}

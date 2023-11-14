<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class announcement extends Model
{
    use HasFactory;
    protected $table='announcements';
    protected $fillable = [
        'id',
        'title',
        'announcement',
        'e_id',
    ];
    public function announcement()
    {
        // Define the inverse of the relationship
        return $this->belongsTo(announcement::class, 'e_id', 'id');
    }
}

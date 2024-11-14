<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoDetection extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'detection_type',
        'file',
        'status',
        'signal_type',
        'mineral',
    ];

}

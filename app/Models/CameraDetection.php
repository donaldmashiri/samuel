<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CameraDetection extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plate_number',
        'detection_type',
        'file',
        'status',
        'signal_type',
        'lane_position',
        'wheel_crossed',
        'marking_color',
        'cross_alert',
        'driver_tendencies',
    ];
}

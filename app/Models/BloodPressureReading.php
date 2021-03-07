<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodPressureReading extends Model
{
    use HasFactory;

    protected $table = 'bp_readings';

    protected $primaryKey = 'pressure_id';
    protected $dateFormat = 'U';

    protected $attributes = [
        'systolic' => 0,
        'diastolic' => 0,
        'pulse' => 0,
        'user_id' => 0
    ];
}

<?php

namespace App\Models;

use App\Enums\DifficultyLevel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HickingTrail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'distance_kms',
        'time_minutes',
        'community_id',
        'province_id',
        'municipaliy_id',
        'origin_name',
        'origin_lat',
        'origin_lng',
        'destination_name',
        'destination_lat',
        'destination_lng',
        'difficulty_level',
    ];
    protected $casts = [ 
        'difficulty_level' => DifficultyLevel::class
    ];
}

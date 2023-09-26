<?php

namespace App\Models;

use App\Enums\DifficultyLevel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HickingTrail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'distance_kms',
        'time_minutes',
        'community_id',
        'province_id',
        'municipality_id',
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

    public function community() :BelongsTo
    {
        return $this->belongsTo(Community::class);
    }

    public function province() :BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function municipality() :BelongsTo
    {
        return $this->belongsTo(Municipality::class);
    }
}

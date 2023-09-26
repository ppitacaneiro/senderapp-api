<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Municipality extends Model
{
    use HasFactory;

    protected $fillable = [
        'province_id',
        'cod_municipality',
        'dc',
        'name'
    ];

    public function province() :BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function hickingTrails() :HasMany
    {
        return $this->hasMany(HickingTrail::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'community_id',
        'name',
    ];

    public function community() :BelongsTo
    {
        return $this->belongsTo(Community::class);
    }

    public function municipalities() :HasMany
    {
        return $this->hasMany(Municipality::class);
    }

    public function hickingtrails() :HasMany
    {
        return $this->hasMany(HickingTrail::class);
    }
}

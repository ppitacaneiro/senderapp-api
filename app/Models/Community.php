<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Community extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name'
    ];

    public function provinces() :HasMany
    {
        return $this->hasMany(Province::class);
    }

    public function hickingtrails() :HasMany
    {
        return $this->hasMany(HickingTrail::class);
    }
}

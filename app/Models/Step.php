<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;

    protected $fillable = [
        'hicking_trail_id',
        'lat',
        'lng',
    ];

    public function hickingTrail()
    {
        return $this->belongsTo(HickingTrail::class);
    }
}

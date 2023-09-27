<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ["hicking_trail_id", "url"];

    public function hickingTrail()
    {
        return $this->belongsTo(HickingTrail::class);
    }
}

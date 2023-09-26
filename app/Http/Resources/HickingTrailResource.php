<?php

namespace App\Http\Resources;

use App\Models\Community;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Resources\Json\JsonResource;

class HickingTrailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'distance_kms' => $this->distance_kms,
            'time_minutes' => $this->time_minutes,
            'community' => $this->community()->get(),
            'province' => $this->province()->get(),
            'municipality' => $this->municipality()->get(),
            "origin_name" => $this->origin_name,
            "origin_lat" => $this->origin_lat,
            "origin_lng" => $this->origin_lng,
            "destination_name" => $this->destination_name,
            "destination_lat" => $this->destination_lat,
            "destination_lng" => $this->destination_lng,
            "difficulty_level" => $this->difficulty_level,
        ];
    }
}

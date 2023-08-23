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
            'community' => $this->community(),
        ];
    }
}

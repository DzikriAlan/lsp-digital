<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class PendaftaranResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'asli' => $this->resource->toArray(),
            'jadwal' => 'halo'
        ];
    }
}

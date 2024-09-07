<?php

namespace App\Http\Resources\Api\Manager;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
class TargetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'max' =>$this->max,
            'type' =>$this->type,
            'levels' => LevelResource::collection($this->whenLoaded('levels')),
        ];
    }

}

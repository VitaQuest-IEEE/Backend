<?php

namespace App\Http\Resources\Api\Manager;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class NotificationResource extends JsonResource
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
            'data' => json_decode($this->data),   
            'is_Readed' => Carbon::parse($this->read_at)->format('Y-m-d H:i a'),   
            'created_at' =>Carbon::parse($this->created_at)->format('Y-m-d H:i a'),   
        ];
    }

}

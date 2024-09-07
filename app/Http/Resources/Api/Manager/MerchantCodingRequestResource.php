<?php

namespace App\Http\Resources\Api\Manager;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MerchantCodingRequestResource extends JsonResource
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
            'status' => $this->status,
            'comment' => $this->comment,
            'merchant' => RegisteredMerchantResource::make($this->whenLoaded('merchant')),
        ];
    }

}

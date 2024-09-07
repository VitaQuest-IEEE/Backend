<?php

namespace App\Http\Resources\Api\Manager;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\Http\Resources\Api\Manager\GiftResource;

class GiftMerchantResource extends JsonResource
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
            'serial' => $this->pivot?->serial,
            'name' => $this->name_ar,
            'gift_qr' => $this->pivot?->gift_qr,
            'created_at' => Carbon::parse($this->pivot?->created_at)->format('Y-m-d H:i a'),
            'is_received' => $this->pivot?->is_received,
            'image' => $this->image,
        ];
    }

}

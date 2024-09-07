<?php

namespace App\Http\Resources\Api\Manager;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QrUserResource extends JsonResource
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
            'qr_type' => $this->Qrable_type,
            'qr' => ScannedQrResource::make($this->Qrable),
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i a'),
        ];
    }

}

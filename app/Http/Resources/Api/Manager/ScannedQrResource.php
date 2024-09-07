<?php

namespace App\Http\Resources\Api\Manager;

use App\Models\ShikaraQr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScannedQrResource extends JsonResource
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
            'count' => number_format($this->kilos_count ?? $this->ton_count, 2),
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i a'),
        ];
    }

}

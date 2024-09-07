<?php

namespace App\Http\Resources\Api\Manager;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\QrUser;
class ShikaraResource extends JsonResource
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
            'serial' => $this->serial,
            'is_downloaded' => $this->is_downloaded,
            'parent_id' => $this->parent_id,
            'count' => $this->count,
            'created_by' => $this->created_by,
            'feed_category' => $this->feed_category,
            'kilos_count' => $this->kilos_count,
            'created_at' => $this->created_at,
        ];
    }

}
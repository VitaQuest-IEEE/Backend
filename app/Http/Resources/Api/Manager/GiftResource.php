<?php

namespace App\Http\Resources\Api\Manager;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
class GiftResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
           "Gift"=>[
               'id' => $this->id,
               'name' => $this->name_ar,
               'image' =>$this->image,
           ]
        ];
    }

}

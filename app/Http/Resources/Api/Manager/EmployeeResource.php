<?php

namespace App\Http\Resources\Api\Manager;

use App\Http\Resources\Api\Auth\MerchantInfoResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id ?? 0,
            "name" => $this->name ?? '',
            "avatar" => $this->avatar,
            "email" => $this->email ?? '',
            "phone" => $this->phone ?? '',
            'type' => $this->type,
            'lat' => $this->lat,
            'long' => $this->long,
            'is_active' =>  $this->password !=null ? true : false ,
            'mode_Status' => (int) $this->mode_Status,
        ];
    }
}

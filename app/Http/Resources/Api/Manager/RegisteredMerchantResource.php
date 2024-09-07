<?php

namespace App\Http\Resources\Api\Manager;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisteredMerchantResource extends JsonResource
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
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'avatar' => $this->avatar,
            'type' => $this->type,
            'is_active' => $this->status==0 ?false:true,
            'is_employee' => $this->type=="merchant" ?false:true,
            'merchantInfo' => MerchantInfoResource::make($this->merchantInfo),
        ];
    }

}

<?php

namespace App\Http\Resources\Api\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MerchantInfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "merchant_id" => $this->merchant_id,
            "center" => $this->center,
            "lat" => $this->lat,
            "status" => $this->status,
            "long" => $this->long,
            "type" => $this->type,
            "farm_capacity" => $this->farm_capacity,
            "chick_type" => $this->chick_type,
            "financier_merchant" => $this->financier_merchant,
            "traderCategory" => TraderCategoryResource::make($this->traderCategory),
            "merchantCategory" => MerchantCategoryResource::make($this->merchantCategory),
            'feedCategory' => FeedCategoryResource::make($this->feedCategory),
            'governorate' => GovernorateResource::make($this->governorateData),
            'city' => CityResource::make($this->cityData),
        ];
    }
}
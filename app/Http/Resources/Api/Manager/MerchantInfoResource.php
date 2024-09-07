<?php

namespace App\Http\Resources\Api\Manager;

use Illuminate\Http\Request;
use App\Http\Resources\Api\Manager\UserResource;
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
            'id' => $this->id,
            'type' => $this->type,
            'userData' => UserResource::make($this->whenLoaded('mainInfo')),
            'is_active' => $this->status==0 ?false:true,
            // 'is_employee' =>UserResource::make($this->whenLoaded('mainInfo'))->type == "merchant" ? false:true,
            'status' => $this->status,
            'center' => $this->center,
            'place_image' => $this->avatar,
            'merchant_id' =>auth()->user()->id,
            'lat' => $this->lat,
            'long' => $this->long,
            'farm_capacity' => $this->farm_capacity,
            'chick_type' => $this->chick_type,
            'financier_merchant' => $this->financier_merchant,
            'traderCategory' => TraderCategoryResource::make($this->traderCategory),
            'merchantCategory' => MerchantCategoryResource::make($this->merchantCategory),
            'feedCategory' => FeedCategoryResource::make($this->feedCategory),
            'governorate' => GovernorateResource::make($this->governorateData),
            'city' => CityResource::make($this->cityData),
            'lastVisit' => MerchantVisitResource::make($this->visits?->last()),
        ];
    }

}

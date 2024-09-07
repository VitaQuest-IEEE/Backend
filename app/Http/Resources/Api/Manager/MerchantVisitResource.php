<?php

namespace App\Http\Resources\Api\Manager;

use App\Models\MerchantInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MerchantVisitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $merchantInfo = MerchantInfo::where('merchant_id', $this->merchant_id)->first();
     //  return $merchantInfo;

        return [
            'id' => $this->id,
            'merchant_id' => $this->merchant_id,
            'merchantInfo' => MerchantInfoResource::make($this->whenLoaded('merchantInfo'))??$merchantInfo,
            'lat' => $this->lat,
            'long' => $this->long,
            'visit_purpose' => $this->visit_purpose,
            'notes' => $this->notes,
            'created_at' =>Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
            'created_by' => UserResource::make($this->whenLoaded('createdBy')),
        ];
    }

}

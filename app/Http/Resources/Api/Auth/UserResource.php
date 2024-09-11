<?php

namespace App\Http\Resources\Api\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            $this->mergeWhen($this->OTP != null, [
                "verification_code" => $this->OTP ?? 0000,
            ]),
            $this->mergeWhen($this->access_token != null, [
                "access_token" => $this->access_token ?? '',
            ]),
            "user" => [
                "id" => $this->id ?? 0,
                "name" => $this->name ?? '',
                "avatar" => $this->image ?? '',
                "email" => $this->email ?? '',
                "phone" => $this->phone ?? '',
                'type' => $this->type,
            ],
        ];
    }
}

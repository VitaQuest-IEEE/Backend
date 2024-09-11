<?php

namespace App\Http\Resources\Api\Notifications;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            'title' => $this->data['title']??'',
            'body'=> $this->data['body']??'',
            'read_at' => $this->read_at,
            'is_read' => $this->read_at ? true : false,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}

<?php

namespace App\Services\Api;

use App\Http\Resources\Api\Notifications\NotificationResource;
use App\Traits\ApiResponseTrait;

class NotificationService
{
    use ApiResponseTrait;


    public function index()
    {
        $notifications = auth()->user()->notifications()->paginate(10);

        return $this->respondWithCollection(NotificationResource::collection($notifications));
    }
    public function markAsRead()
    {
        $user=auth()->user();
        $user->unreadNotifications->markAsRead();
        return $this->respondWithSuccess(__( 'All notifications marked as read'));
    }
    public function markAsReadById($id)
    {
        $user=auth()->user();

        if($user->unreadNotifications->where('id', $id)->count() == 0)
        {
            return $this->respondWithError(__( 'Notification not found'));
        }
        $user->unreadNotifications->where('id', $id)->markAsRead();

        return $this->respondWithSuccess(__( 'Notification marked as read'));
    }

    public function unreadNotificationsCount()
    {
        return $this->respondWithJson(['status' => '200', 'count' => auth()->user()->unreadNotifications->count()]);
    }

    public function showNotification($id)
    {
        return $this->respondWithJson(NotificationResource::make(auth()->user()->notifications->where('id', $id)->first()));
    }
}

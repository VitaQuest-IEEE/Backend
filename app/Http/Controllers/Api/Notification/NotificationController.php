<?php

namespace App\Http\Controllers\Api\Notification;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Notifications\NotificationResource;
use App\Services\Api\NotificationService;
use App\Traits\ApiResponseTrait;

class NotificationController extends Controller
{
    use ApiResponseTrait;
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function index()
    {
        $this->notificationService->index();
    }

    public function markAsRead()
    {
        $this->notificationService->markAsRead();
    }
    public function markAsReadById($id)
    {
        $this->notificationService->markAsReadById($id);
    }
    public function unreadNotificationsCount()
    {
        $this->notificationService->unreadNotificationsCount();
    }
    public function showNotification($id)
    {
        $this->notificationService->showNotification($id);
    }

}

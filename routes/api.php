<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Notification\NotificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix("auth")->group(function () {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('forget-password', [AuthController::class, 'forgetPassword']);
    Route::post('check-phone', [AuthController::class, 'checkIfPhoneIsExist']);
    Route::post('register',[AuthController::class, 'register']);
        Route::middleware('auth:sanctum')->group(function () {
            Route::post('logout',[AuthController::class, 'logout']);
            Route::post('auto-login', [AuthController::class, 'autoLogin']);
            Route::get('profile', [AuthController::class, 'profile']);
            Route::delete('delete-account', [AuthController::class, 'deleteAccount']);
            Route::post('update-profile', [AuthController::class, 'updateProfile']);



            #Notifications
                Route::get('unread-notifications', [NotificationController::class, 'index']);
            Route::get('mark-as-read', [NotificationController::class, 'markAsRead']);
            Route::get('mark-as-read/{id}', [NotificationController::class, 'markAsReadById']);
            Route::get('count-unread-notifications', [NotificationController::class, 'unreadNotificationsCount']);
            Route::get('show-notification/{id}', [NotificationController::class, 'showNotification']);

        });

});

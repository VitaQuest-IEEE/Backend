<?php

use App\Http\Controllers\Dashboard\AdminsController;
use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\Candidate\CandidateController;
use App\Http\Controllers\Dashboard\Home\DashboardController;
use App\Http\Controllers\Dashboard\Notifications\NotificationController;
use App\Http\Controllers\Dashboard\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function () {
//    Route::get('/', function () {
//        return view('index');
//    });

    Route::get('/{page}', [AdminsController::class,'test']);


});





Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function (){
    Route::name('admin.')->prefix('admin')->group(function () {
        Route::get('/login', [AuthController::class, 'loginASview'])->name('login')->middleware('guest');
        Route::post('/Dash-Login', [AuthController::class, 'login'])->name('startSession');

        Route::middleware(['auth:web'])->group(function () {
            Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

            Route::get('/home', [AuthController::class, 'home'])->name('home');
            Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
            Route::get('/markered', [AuthController::class, 'markered'])->name('markered');
            Route::get('/edit', [AuthController::class, 'edit'])->name('edit');


            # Profile
            Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('profile/edit-personal', [ProfileController::class, 'updatePersonal'])->name('profile.personal.update');
            Route::patch('profile/edit-password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

            Route::resource('admins',AdminsController::class);
            Route::patch('admins/{user}/update-personal', [AdminsController::class, 'updatePersonal'])->name('admins.update.personal');
            Route::patch('admins/{user}/update-password', [AdminsController::class, 'updatePassword'])->name('admins.update.password');



            #Notifications
            Route::resource('notification',NotificationController::class);
            Route::post('getUsersByRole', [NotificationController::class, 'getUsersByRole'])->name('notification.getUsersByRole');
            Route::post('notification/markAsRead', [NotificationController::class, 'markAsRead'])->name('notification.markAsRead');
            Route::get('notification/markAllAsRead', [NotificationController::class, 'markAllAsRead'])->name('markAllAsRead');

            Route::resource('candidates', CandidateController::class);
        });

    });
});

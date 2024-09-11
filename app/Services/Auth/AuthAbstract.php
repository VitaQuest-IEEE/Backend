<?php

namespace App\Services\Auth;

use App\Enum\GeneralStatusEnum;
use App\Enum\UserTypeEnum;
use App\Exceptions\Api\Auth\AuthException;
use App\Http\Requests\Api\Auth\ChangeMobileRequest;
use App\Http\Requests\Api\Auth\ChangePasswordRequest;
use App\Http\Requests\Api\Auth\ForgetPasswordRequest;
use App\Http\Requests\Api\Auth\ResetPasswordRequest;
use App\Http\Requests\Api\Auth\SendOTPRequest;
use App\Http\Requests\Api\Auth\VerifyOTPRequest;
use App\Models\AuthenticatableOtp;
use App\Traits\ApiResponseTrait;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\PersonalAccessToken;


abstract class AuthAbstract
{
    use ApiResponseTrait;

//    protected bool $loginRequireSendOTP;
    public $model;

    public function __construct(User $model)
    {
        $this->loginRequireSendOTP = config('global.login_require_otp');
        $this->model = $model;
    }

    /**
     * Login
     */
    public function login(FormRequest $request, $abilities = null)
    {
        $request->authenticate();
        $user = $request->user();
        $user->access_token = $user->createToken('snctumToken', $abilities ?? [])->plainTextToken;
        $this->addTokenExpiration($user->access_token);
        return $user;
    }





    public function logout(Request $request)
    {
        $request->user()?->currentAccessToken()->delete();
    }

    /**
     * change user mobile.
     *
     * @return User
     */

    public function profile( )
    {
        $user = auth()->user();
        if (is_null($user))
            throw AuthException::userNotFound(['not_found' => [__("Data Not Found")]]);
        return $user;
    }






    protected function addTokenExpiration($accessToken): void
    {
        $expirationTime = Carbon::now()->addDays(90);
        $personalAccessToken = PersonalAccessToken::findToken($accessToken);
        $personalAccessToken->expires_at = $expirationTime;
        $personalAccessToken->save();
    }


    protected function isTokenExpired($personalAccessToken)
    {
        $isExpired = false;
        $expirationTime = $personalAccessToken->expires_at;
        if ($expirationTime == null)
            $isExpired = true;
        if ($expirationTime instanceof Carbon && $expirationTime->isPast())
            $isExpired = true;
        return $isExpired;
    }

    public function deleteAccount(Request $request)
    {
        $user = $request->user();
        if (is_null($user))
            throw AuthException::userNotFound(['unauthorized' => [__('Unauthorized')]], 401);
        $user->tokens()->delete();
        $user->delete();
        $this->respondWithSuccess(__('Deleted Successfully'));
    }


}

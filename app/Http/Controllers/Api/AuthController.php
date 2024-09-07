<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Api\Auth\AuthException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginClientRequest;
use App\Http\Resources\Api\Auth\ClientResource;
use App\Http\Resources\Api\Auth\UserResource;
use App\Models\User;
use App\Services\Auth\AuthClientService;
use App\Traits\ApiResponseTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    use ApiResponseTrait;

    use ApiResponseTrait;

    public function login(LoginClientRequest $request)
    {
        $request->authenticate();
        $user = $request->user();
        if($request->has('device_token'))
        {
            $user->deviceTokens()->updateOrCreate(['device_token' => $request->device_token]);
        }
        $user->access_token = $user->createToken('snctumToken', $abilities ?? [])->plainTextToken;
        $this->addTokenExpiration($user->access_token);

        return $this->respondWithJson(
            UserResource::make($user)
        );

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

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return $this->respondWithSuccess(__('Logged out successfully'));
    }
    public function profile()
    {
        $user=auth()->user();
        if(is_null($user))
            return $this->respondWithError(__('Failed Operation'));

        return $this->respondWithJson(UserResource::make($user));
    }

    public function deleteAccount(Request $request)
    {
        $user = $request->user();
        if(is_null($user))
            throw AuthException::userNotFound(['unauthorized' => [__('Unauthorized')]],401);

        DB::beginTransaction();
        $user->tokens()->delete();
        if($user->delete())
        {
            DB::commit();
            return $this->respondWithSuccess(__('Deleted Successfully'));
        }
        DB::rollBack();

        return $this->setStatusCode(400)->respondWithError(__('Failed Operation'));
    }


    public function autoLogin(Request $request)
    {
        // Ensure the user is authenticated
        $user = $request->user();
        if (!$user) {
            return $this->respondWithSuccess( __('Unauthenticated.'));
        }
        // Ensure the user is verified
        if(!$user->email_verified_at)
        {
            $user->currentAccessToken()->delete();
            return $this->respondWithError( 'User is not verified');
        }

        // Delete the current access token
        $user->currentAccessToken()->delete();

        // Create a new token
        $abilities = $abilities ?? []; // Ensure $abilities is defined or default to an empty array
        $user->access_token = $user->createToken('sanctumToken', $abilities)->plainTextToken;
        $this->addTokenExpiration($user->access_token);

        //  return $permissions;
        return response()->json(UserResource::make($user));

    }



    public function checkIfPhoneIsExist(Request $request)
    {
        $request->validate([
            'phone'=>'required|exists:users,phone',
        ],[
            'phone.exists'=>__('Phone Not Found')
        ]);
        $user = User::wherePhone($request->phone)->first();
        if(!$user)
        {
            return $this->respondMessageWithError(__('Phone Not Found'),"phone");
        }
        $user->access_token = $user->createToken('snctumToken', $abilities ?? [])->plainTextToken;
        $this->addTokenExpiration($user->access_token);
        if($user->email_verified_at)
        {
            return response()->json(['message' => __('Phone Found'),'verified'=>true,'access_token'=>$user->access_token],200);
        }
        return response()->json(['message' => __('Phone Found'),'verified'=>false,'access_token'=>$user->access_token],200);

    }



    public function updateProfile(Request $request)
    {
        $user = $request->user();
        $data = $request->validate([
            'name' => 'string',
            'email' => 'email',
            'phone' => 'string',
            'password' => 'string',
        ]);
        if($request->has('password'))
            $data['password'] = bcrypt($data['password']);
        $user->update($data);
        return UserResource::make($user);
    }





}

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

    private $authClientService;

    private string $modelResource = ClientResource::class;
    private array $relations = [];

    public function __construct(AuthClientService $authClientService)
    {
        $this->authClientService = $authClientService;
    }

    /**
     * Client Login.
     *
     * an API which Offers a mean to login a client
     * @unauthenticated
     * @header Api-Key xx
     * @header Api-Version v1
     * @header Accept-Language ar
     */
    public function login(LoginClientRequest $request)
    {
        return $this->respondWithModelData(
            new ClientResource(
                $this->authClientService->login($request)
            )
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
        $this->authClientService->logout($request);
        return $this->respondWithSuccess(__('Logged out successfully'));
    }
    public function profile()
    {
        $user= $this->authClientService->profile();

        return $this->respondWithJson(UserResource::make($user));
    }

    public function deleteAccount(Request $request)
    {
       $this->authClientService->deleteAccount($request);
       return $this->respondWithSuccess(__('Deleted Successfully'));
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

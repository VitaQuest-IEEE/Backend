<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

/**
 * @bodyParam name string required The user personal name.Example: 0564776688
 * @bodyParam mobile string required The Mobile Number of the user.Example: 0564776688
 * @bodyParam email string (optional) The E-Mail Address of the user.Example: fahmi@moltaqa.net
 * @bodyParam password string required The User bew password.Example: 12345678
 * @bodyParam password_confirmation string required The user new password confirmation.Example: 12345678
 */
class RegisterClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => ["required","string","max:190"],
            "phone" => ["required","unique:users,phone"],
            "email" => ["sometimes","unique:users,email"],
            "password" => ["required","confirmed",Password::default()],
            "type"=>["required"],
            "image"=>["sometimes","image","mimes:jpeg,png,jpg,gif,svg","max:2048"],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('Name'),
            'phone' => __('Mobile'),
            'email' => __('E-Mail'),
            'password' => __('Password'),
            'password_confirmation' => __('Password Confirmation'),
            'type'=>__('User Type'),
            'image'=>__('Image'),
        ];
    }
}

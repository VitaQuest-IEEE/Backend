<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @bodyParam mobile string required The Mobile Number of the user.Example: 0564777888
 */
class ForgetPasswordRequest extends FormRequest
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
            'phone' => ['required', "exists:users,phone"],
        ];
    }

    public function attributes(): array
    {
        return [
            'phone' => __('Mobile'),
        ];
    }
}

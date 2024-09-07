<?php

namespace App\Http\Requests\Dashboard;

use App\Enum\UserTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required','email',Rule::exists('users','email')
                ->where('type',UserTypeEnum::ADMIN)],
            'password' => ['required', 'min:6' ,'max:100']
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'هذا الحقل لا يجب ان يكون فارغ',
            'email.email' => 'يجب ان يكون الحقل من نوع بريد الكتروني',
            'email.exists' => 'هذا البريد غير موجود',
            'password.min' => 'لا يجب ان يقل  كلمة المرور عن 6 احرف',
            'password.max' => 'لا يجب ان يزيد  كلمة المرور عن 100 حرف'
        ];
    }
}

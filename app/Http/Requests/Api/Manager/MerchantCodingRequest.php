<?php

namespace App\Http\Requests\Api\Manager;

use Illuminate\Foundation\Http\FormRequest;


/**
 * @bodyParam mobile string required The new Mobile Number of the user.Example: 0564776688
 */
class MerchantCodingRequest extends FormRequest
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
            'status' => ['required','in:accepted,rejected'],
            'comment' => ['nullable','max:255','min:4'],
        ];
    }

}

<?php

namespace App\Http\Requests\Api\Manager;

use Illuminate\Foundation\Http\FormRequest;


/**
 * @bodyParam mobile string required The new Mobile Number of the user.Example: 0564776688
 */
class RegisterMerchantRequest extends FormRequest
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
            'name' => ['required','string'],
            'phone' => ['required', "unique:users,phone"],
            'trader_category' => ['required', "exists:trader_categories,id"],
            'merchant_category' => ['required', "exists:merchant_categories,id"],
            'feed_category' => ['required', "exists:feed_categories,id"],
            'governorate' => ['required', "exists:governorates,id"],
            'city' => ['required', "exists:cities,id"],
            'center' => ['required', "string"],
            'lat' => ['required', "string"],
            'long' => ['required', "string"],
            'type' => ['required', "in:trader,farm"],
            'farm_capacity' => ['required_if:type,farm'],
            'chick_type' => ['required_if:type,farm'],
            'financier_merchant' => ['required_if:type,farm'],
        ];
    }

}

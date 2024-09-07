<?php

namespace App\Http\Requests\Api\Manager;

use Illuminate\Foundation\Http\FormRequest;


/**
 * @bodyParam mobile string required The new Mobile Number of the user.Example: 0564776688
 */
class MerchantVisitRequest extends FormRequest
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
            'merchant_id' => ['required', "exists:merchant_infos,merchant_id"],
            'visit_purpose' => ['nullable', "string"],
            'notes' => ['nullable', "string"],
            'lat' => ['required', "string"],
            'long' => ['required', "string"],
            "place_image" => ['nullable' , "image" , 'max:10240'],
        ];
    }

}

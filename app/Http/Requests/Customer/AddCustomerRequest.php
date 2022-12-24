<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class AddCustomerRequest extends FormRequest
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
            "name" => ['required'],
            "mobile" => ['required', 'numeric'],
            "email" => ['required', 'email', 'unique:users,email,except,id,deleted_at,NULL'],
            "company_name" => ['string', 'nullable'],
            "company_phone" => ['numeric', 'nullable'],
            "vat_id" => ['nullable' ,'regex:/^[ 0-9-]*$/'],
            "company_address" => ['string', 'nullable'],
            "newsletter" => ['nullable'],
            "marketing_permission" => ['nullable']
        ];
    }
}

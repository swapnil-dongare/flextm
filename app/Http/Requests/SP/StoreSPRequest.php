<?php

namespace App\Http\Requests\SP;

use Illuminate\Foundation\Http\FormRequest;

class StoreSPRequest extends FormRequest
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
            "mobile" => ['required'],
            "email" => ['required', 'email','unique:users,email,except,id,deleted_at,NULL'],
            "vat_id" => ['nullable' ,'regex:/^[ 0-9-]*$/'],
            "address" => ['nullable'],
            "invoice_address" => ['nullable'],
            "country" => ['nullable'],
            "language_id" => ['nullable','exists:languages,id'],
            "free_trial" => ['nullable'],
            "subscription" => ['nullable'],
        ];
    }
}

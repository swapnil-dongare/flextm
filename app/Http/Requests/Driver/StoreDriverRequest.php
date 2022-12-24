<?php

namespace App\Http\Requests\Driver;

use Illuminate\Foundation\Http\FormRequest;

class StoreDriverRequest extends FormRequest
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
            "email" => ['required','email','unique:users,email,except,id,deleted_at,NULL'],
            "mobile" => ['required'],
            "address" => ['nullable'],
            "liscense_no" => ['nullable'],
            //"directive" => ['nullable'],
            "valid_until" => ['nullable'],
            "social_security_no" => ['nullable'],
            "language" => ['nullable'],
            "location" => ['nullable'],
            "profile_url" => ['nullable'],
            "expired" => ['nullable'],
        ];
    }
}

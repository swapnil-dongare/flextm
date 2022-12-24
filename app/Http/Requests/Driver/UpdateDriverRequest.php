<?php

namespace App\Http\Requests\Driver;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDriverRequest extends FormRequest
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
        $id = $this->route('driver');
        return [
            "name" => ['nullable',],
            "email" => ['nullable', 'email', 'unique:users,email,' . $id . ',id,deleted_at,NULL'],
            "mobile" => ['nullable'],
            "address" => ['nullable'],
            "liscense_no" => ['nullable'],
            //"directive" => ['nullable'],
            "valid_until" => ['nullable'],
            "social_security_no" => ['nullable'],
            "language" => ['nullable'],
            "location"=>['nullable'],
            "profile_url" => ['nullable'],
            "expired" => ['nullable'],
        ];
    }
}

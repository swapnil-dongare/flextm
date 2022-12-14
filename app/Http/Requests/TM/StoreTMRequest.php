<?php

namespace App\Http\Requests\TM;

use Illuminate\Foundation\Http\FormRequest;

class StoreTMRequest extends FormRequest
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
            "email" => ['email', 'required', 'unique:users,email,except,id,deleted_at,NULL']
        ];
    }
}

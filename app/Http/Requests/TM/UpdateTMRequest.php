<?php

namespace App\Http\Requests\TM;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTMRequest extends FormRequest
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
        $id = $this->route('transport_manager');
        return [
            "name" => ['required'],
            "email" => ['email', 'required', 'unique:t_m_s,email,' . $id . ',id,deleted_at,NULL']

        ];
    }
}

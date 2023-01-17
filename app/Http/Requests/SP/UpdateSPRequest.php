<?php

namespace App\Http\Requests\SP;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSPRequest extends FormRequest
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
        $id = $this->route('organization');
        return [
            "name" => ['required'],
            "mobile" => ['required',],
            "email" => ['required', 'unique:s_p_s,email,' . $id . ',id,deleted_at,NULL'],
            "vat_id" => ['nullable','regex:/^[ 0-9-]*$/'],
            "address" => ['nullable'],
            "post_address" => ['nullable'],
            "zipcode" => ['nullable'],
            "city" => ['nullable'],
            "country" => ['nullable'],
            "invoice_address" => ['nullable'],
            "post_invoice_address" => ['nullable'],
            "zipcode_invoice_address" => ['nullable'],
            "city_invoice_address" => ['nullable'],
            "country_invoice_address" => ['nullable'],
            "language_id" => ['nullable','exists:languages,id'],
            "free_trial" => ['nullable'],
            "subscription" => ['nullable'],
            "free_trial_end_date" => ['nullable'],
        ];
    }
}

<?php

namespace App\Http\Requests\Equipment;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquipmentRequest extends FormRequest
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
            "reg_no" => ['required'],
            "amount_of_seats" => ['required'],
            "next_inspection" => ['required'],
            "disablity" => ['nullable'],
            "reg_year" => ['nullable'],
            "emmission_classification" => ['nullable'],
            "place_of_business" => ['nullable'],
            "maintenance" => ['nullable'],
            "equipments_in_vehicle"=>['nullable']
        ];
    }
}

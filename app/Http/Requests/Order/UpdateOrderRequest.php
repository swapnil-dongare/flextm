<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'request_type' => ['required'],
            'customer_id'=>['required'],
            // 'user_id' => ['required', 'exists:users,id'],
            'start_location' => ['required', 'string'],
            'start_date' => ['required', 'date'],
            'start_time' => ['required', 'string', 'date_format:H:i:s'],
            'present_in_location' => [
                'required',
                'string',
                'date_format:H:i:s',
            ],
            'end_location' => ['required', 'string'],
            'end_date' => ['required', 'date'],
            'end_time' => ['required', 'string', 'date_format:H:i:s'],
            'present_in_service_hall' => [
                'nullable',
                'string',
                'date_format:H:i:s',
            ],
            'head_count' => ['required', 'integer'],
            'mobility_restrictions' => ['nullable'],
            'price' => ['required', 'numeric'],
            'tax_rate' => ['required', 'integer'],
            'price_incl_tax' => ['required', 'numeric'],
            'invoiced' => ['nullable'],
            'driver_id' => ['required', 'exists:drivers,id'],
            'equipment_id' => ['required', 'exists:equipment,id'],
            'route' => ['required', 'string'],
            'language_id' => ['required', 'exists:languages,id'],
            'other_wishes' => ['required', 'string'],
        ];
    }
}

<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class VendorAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'address_type_id' => 'required|exists:address_types,id',
            'full_address' => 'required|max:555',
            'zip_code' => 'required|max:55',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'gis_latitude' => 'required|numeric',
            'gis_longitude' => 'required|numeric',
            'email' => 'required|email|max:555',
            'mobile' => 'required|max:255',
        ];
    }
}

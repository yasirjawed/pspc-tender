<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationBodiesRequest extends FormRequest
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
            'external_body' => 'required|exists:external_bodies,id',
            'registration_number' => 'required|string|max:255',
            'registration_date' => 'required|date',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'external_body.required' => 'The External Body field is required.',
            'registration_number.required' => 'The Registration Number field is required.',
            'registration_date.required' => 'The Registration Date field is required.',
        ];
    }
}

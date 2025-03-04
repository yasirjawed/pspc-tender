<?php

namespace App\Http\Requests\frontend;

use Illuminate\Foundation\Http\FormRequest;

class BusinessProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Set to false if you want authorization logic
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $isUpdate = $this->isMethod('put') || $this->isMethod('patch');

        return [
            'categories' => 'required|exists:business_categories,id',
            'industries' => 'required|exists:business_industries,id',
            'description' => 'required|string|max:1000',
            'name' => 'required|string|max:255',
            'short_name' => 'required|string|max:50',
            'origin_country' => 'required|exists:countries,id',
            'city' => 'required|exists:cities,id',
            'date_of_incorporation' => 'required|date|before_or_equal:today',
            'website_url' => 'nullable|url|max:255',
            'logo' => $isUpdate ? 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048' : 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }
}

<?php

namespace App\Filament\Resources\HealthFacilityResource\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHealthFacilityRequest extends FormRequest
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
			'name' => 'required|string',
			'address' => 'required|string',
			'phone' => 'required|string',
			'email' => 'required|string',
			'website' => 'required|string',
			'image' => 'required|string',
			'google_map' => 'required|string',
			'description' => 'required|string',
			'type_id' => 'required|integer',
			'latitude' => 'required|string',
			'longitude' => 'required|string'
		];
    }
}

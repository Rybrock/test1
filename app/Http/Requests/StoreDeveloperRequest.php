<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreDeveloperRequest extends FormRequest
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
        'developer_name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'developer_address' => 'required|string|max:255',
        'developer_location' => 'required|string|max:255',
        'lead_developer' => 'required|string|max:255',
        'genre' => 'required|string|max:255',
        'is_active' => 'required|boolean',
        'first_published_game' => 'required|date',
        'last_published_game' => 'required|date',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors()
        ], 422));
    }
}

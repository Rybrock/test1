<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        'developer_meta_score' => 'required|integer|min:1|max:30',
        'is_active' => 'required|boolean',
        'first_published_game' => 'required|date',
        'rating' => 'required|numeric|min:0|max:5',
        ];
    }
}

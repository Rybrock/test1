<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGameRequest extends FormRequest
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
        'game_name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'game_address' => 'required|string|max:255',
        'game_location' => 'required|string|max:255',
        'game_meta_score' => 'required|integer|min:1|max:30',
        'is_active' => 'required|boolean',
        'first_published' => 'required|date',
        'rating' => 'required|numeric|min:0|max:5',
        'developer_id' => 'required|exists:developers,id'
        ];
    }
}

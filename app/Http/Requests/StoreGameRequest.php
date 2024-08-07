<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

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
        'genre' => 'required|string|max:255',
        'platforms' => 'required|string|max:255',
        'game_origin' => 'required|string|max:255',
        'meta_critic_score' => 'required|integer|min:1|max:30',
        'out_now' => 'required|boolean',
        'release_date' => 'required|date',
        'collectors_edition' => 'required|boolean',
        'online_stores' => 'required|string|max:255',
        'audience' => 'required|string|max:255',
        'developer_id' => 'required|exists:developers,id',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors()
        ], 422));
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class validationPedidos extends FormRequest
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
            'user_id' => 'required|exists:users,id'
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'O id do usuário precisa ser fornecido',
            'user_id.exists' => 'Usuario não encontrado'
        ];
    }

    public function failedValidation(Validator $validator) {

        throw new HttpResponseException(
            response()->json([
                'success' => 'false',
                'message' => 'Erro de validação',
                'errors' => $validator->errors(),
            ], 422)
        );
    }
}

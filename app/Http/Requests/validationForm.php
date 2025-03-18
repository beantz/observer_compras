<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class validationForm extends FormRequest
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
            'name' => 'required|min:3|max:150',
            'cpf' => 'required',
            'data_nascimento' => 'date|after:1900-01-01',
            'email' => 'email|unique:users',
            'password' => 'required|min:8'
        ];
    }

    public function messages() {

        return [
            'required' => 'O campo :attribute deve ser preenchido',
            'name.min' => 'O nome deve ter no mínimo 3 caracteres',
            'name.max' => 'O nome deve ter no máximo 150 caracteres',
            'data_nascimento.date' => 'O data precisa ser no formato certo',
            'data_nascimento.after' => 'A data precisa ser posterior ao ano 1900',
            'password.min' => 'A senha deve ter no mínimo 8 caracteres',
            'email.unique' => 'Já existe um usuário cadastrado com esse email'
        ];

    }

    //personalizando o faledValidation que é gerado automaticamento quando se usa o form request, pra ele da um retorno diferente caso haja algum erro
    protected function failedValidation(Validator $validator) {

        throw new HttpResponseException(
            response()->json([
                'success' => 'false',
                'message' => 'Erro de validação',
                'errors' => $validator->errors(),
            ], 422)
        );
    }
}

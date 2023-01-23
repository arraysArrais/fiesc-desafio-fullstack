<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'numero' => 'required|numeric|unique:contas'
        ];
    }

    public function messages(){
        return [
            'numero.required' => 'O campo "Número da conta" é obrigatório',
            'numero.numeric' => 'O campo "Número da conta" precisa ser um número',
            'numero.unique' => 'Esse número de conta já existe'
        ];
    }
}

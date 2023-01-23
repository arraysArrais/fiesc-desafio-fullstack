<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePessoaRequest extends FormRequest
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
    
    //regras de validação para aceitar a request
    public function rules()
    {
        return [
            'nome' => 'required',
            'cpf' => 'required|min:11',
            'endereco' => 'required'
        ];
    }

    //customizando mensagens de erro
    public function messages(){
        return [
            '*.required' => "O campo :attribute é obrigatório",
            'cpf' => 'Favor inserir um CPF com pelo menos 11 dígitos'
        ];
    }
}

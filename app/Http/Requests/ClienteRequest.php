<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nome'  => 'required|max:50',
            'email' => 'sometimes|nullable|email|max:200',
        ];
    }

    public function messages(){
        return [
            'required' => ':attribute é óbrigatório',
            'max'      => ':attribute deve ter no máximo :max caracteres',
            'email'    =>  'Informe um e-mail válido',
            'unique'   =>  'O e-mail informado já foi cadastrado',
            'numeric'  => ':attribute deve ser numérico',
        ];
    }
}

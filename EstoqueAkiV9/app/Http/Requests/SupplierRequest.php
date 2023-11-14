<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'nome' => 'required',
            'telefone' => 'required|numeric|gte:0', //usasse a regra gte para aceitar 0 e numeros positivos, ao contrario da gt que nao aceita 0
            'cnpj' => 'required|numeric|gte:0' 
        ];

       
    }
}

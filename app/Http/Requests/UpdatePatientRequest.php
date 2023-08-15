<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRequest extends FormRequest
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
            "nome"      => "required",
            "cpf"       => "required|unique:user,cpf,{$this->id},id",
            "email"     => "required|unique:user,email,{$this->id},id",
            "telefone"  => "required"
        ];
    }
}

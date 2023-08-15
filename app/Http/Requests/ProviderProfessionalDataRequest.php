<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProviderProfessionalDataRequest extends FormRequest
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
            "crm"                => "required|unique:provider_professional_data",
            "providers_id"       => "required",
            "specialties_id"     => "required",
            "telefone"  => "required"
        ];
    }
}

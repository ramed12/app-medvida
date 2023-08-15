<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
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
        'name' => 'required',
        'description' => 'required',
        'value' => 'required',
        'number_dependents' => 'required',
        'increase_per_dependent' => 'nullable',
        'number_medical_appointments' => 'required|integer',
        'addition_medical_consultation' => 'required',
        'image' => 'nullable|image',
        'status' => 'required'
        ];
    }
}

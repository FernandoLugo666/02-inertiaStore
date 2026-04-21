<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        switch ($this->method()) {
            case 'GET':

                return [];
                break;

            case 'POST':
                return [
                    'name' => 'required|max:255',
                    'email' => 'required|email|unique:contact_companies,email', // Aqui el "contact_companies" indica le nombre de la tabla y luego el campo
                    'identification' =>  'required',
                    'choices'  => 'required'
                ];
                break;

            case 'PUT':
                return [];
                break;
        }
    }
    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'email.required' => 'El campo email es obligatorio.',
            'identification.required' => 'El campo identificación es obligatorio.',
            'choices.required' => 'El campo opciones es obligatorio.',
            'email.unique' => 'El email ya está registrado.',
        ];
    }
}

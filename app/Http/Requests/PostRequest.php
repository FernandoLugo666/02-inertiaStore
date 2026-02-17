<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
                return [];
                break;
            case 'POST':
                return [
                    'title' => 'required',
                    'slug' => 'required',
                    'date' => 'required',
                    'description' => 'required',
                ];
                break;
        }
    }

    public function messages()
    {
        return [
            'title.required' => 'Este campo es obligatorio',
            'slug.required' => 'Este campo es obligatorio',
            'date.required' => 'Este campo es obligatorio',
            'description.required' => 'Este campo es obligatorio',

        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            case 'POST':
                return [

                    'title' => 'required|min:5|max:255',
                    'slug' => 'required|min:5|max:255',
                ];
                break;
        }
    }


    public function messages()
    {
        return [

            'title.required' => 'El título es obligatorio',
            'title.min' => 'Debe contener mín. 5 carácteres',
            'title.max' => 'Debe contener máx. 255 carácteres',
            'slug.required' => 'El slug es obligatorio',
            'slug.min' => 'Debe contener mín. 5 carácteres',
            'slug.max' => 'Debe contener máx. 255 carácteres',
        ];
    }
}

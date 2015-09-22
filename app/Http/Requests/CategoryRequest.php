<?php

namespace milimetrica\Http\Requests;

use milimetrica\Http\Requests\Request;

class CategoryRequest extends Request
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
            'name' => 'required|min:5',

        ];
    }

    public function messages(){
        return[
            'name.required' => "Nome da categoria não pode está vazio",
            'name.min' => "Nome tem que ter mais de 5 caracteres"
        ];

    }
}

<?php

namespace milimetrica\Http\Requests;

use milimetrica\Http\Requests\Request;

class ProductRequest extends Request
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
            'description' => 'required',



        ];
    }

    public function messages(){
        return[
            'name.required' => "Nome não pode  ser vazio",
            'name.min' => "O campo nome  não pode ter menos de 5 caracteres",
            'price.required' => "O preço não pode ser vazio",
            'description.required' => "A descrição do produto não pode ser vazio"
        ];
    }
}

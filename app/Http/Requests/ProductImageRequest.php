<?php

namespace milimetrica\Http\Requests;

use milimetrica\Http\Requests\Request;

class ProductImageRequest extends Request
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
            'image' => 'required|image|mimes:jpeg,jpg,bmp,png,gif|max:3000'
        ];
    }

    public function messages(){
        return [
          'image.required' => "Não houve upload de imagem",
          'image.max' => "Imagem tem que ter no máximo 3 mb de tamanho",
            'image.mimes' => "Isso não é um formato de imagem."

        ];

    }
}

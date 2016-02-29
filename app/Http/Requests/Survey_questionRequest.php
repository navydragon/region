<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Survey_questionRequest extends Request
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
            'body' => 'required|min:3'
        ];
    }

    public function messages()
    {
        return 
        [
            'body.required' => 'Введите текст вопроса',
            'body.min' => 'Текст вопроса состоять как минимум из 3-х символов',
        ];
    }
}

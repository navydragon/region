<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class QuestionRequest extends Request
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
            'title' => 'required|min:3',

        ];
    }

    public function messages()
    {
        return 
        [
            'title.required' => 'Поле Текст вопроса должно быть заполнено ',
            'title.min' => 'Поле Текст вопроса должно состоять как минимум из 3-х символов',
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SurveyRequest extends Request
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
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return 
        [
            'title.required' => 'Поле Имя анкеты должно быть заполнено ',
            'title.min' => 'Поле Имя анкеты должно состоять как минимум из 3-х символов',
            'description.required' => 'Поле Описание должно быть заполнено',
        ];
    }
}

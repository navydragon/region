<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TestRequest extends Request
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
            'description' => 'required',
            'duration' => 'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return 
        [
            'title.required' => 'Поле Имя теста должно быть заполнено ',
            'title.min' => 'Поле Имя теста должно состоять как минимум из 3-х символов',
            'description.required' => 'Поле Описание должно быть заполнено',
            'duration.required' => 'Поле Длительность теста (мин.) должно быть заполнено',
            'duration.numeric' => 'Поле Длительность теста (мин.) должно быть числом',
            'duration.min' => 'Длительность теста (мин.) должна быть больше или равна 1 минуте',
        ];
    }
}

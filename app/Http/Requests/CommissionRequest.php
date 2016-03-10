<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CommissionRequest extends Request
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
            'start_at' => 'required',
            'end_at' => 'required'
        ];
    }

    public function messages()
    {
        return 
        [
            'title.required' => 'Поле Название комиссии должно быть заполнено ',
            'title.min' => 'Поле Название комиссии должно состоять как минимум из 3-х символов',
            'description.required' => 'Поле Описание должно быть заполнено',
            'start_at.required' => 'Введите дату начала комиссии',
            'end_at.required' => 'Введите дату окончания комиссии',
        ];
    }
}

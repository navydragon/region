<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class Commission_stageRequest extends Request
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
            'end_at' => 'required',
        ];
    }

    public function messages()
    {
        return 
        [
            'title.required' => 'Введите название этапа',
            'description.required' => 'Введите описание этапа',
            'title.min' => 'Название этапа должно состоять как минимум из 3-х символов',
            'start_at.required' => 'Введите дату начала этапа',
            'start_end.required' => 'Введите дату окончания этапа',
        ];
    }
}

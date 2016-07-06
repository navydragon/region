<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;
class UserRequest extends Request
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
            'surname' => 'sometimes|required',
            'name' => 'sometimes|required',
            'email' => 'sometimes|required|email|unique:users,email,'.Auth::user()->id,
            'avatar_url' =>'sometimes|mimes:jpeg,jpg,png,gif|required|max:10000',
        ];
    }

    public function messages()
    {
        return 
        [
            'surname.required' => 'Поле Фамилия должно быть заполнено',
            'name.required' => 'Поле Имя должно быть заполнено',
            'email.required' => 'Поле E-mail должно быть заполнено',
            'email.email' => 'Введенный формат E-mail не корректен',
            'email.unique' => 'Такой E-mail уже зарегистрирован в системе ',
        ];
    }
}

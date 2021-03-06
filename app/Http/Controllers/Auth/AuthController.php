<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Filial;
use App\Job;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = array(
            'email.required' => 'Поле "Адрес электронной почты" должно быть заполнено"',
            'email.unique' => 'Данный электронный адрес уже существует',
            'email.email' => 'Электронный адрес введен некорректно',
            'surname.required' => 'Поле "Фамилия" должно быть заполнено',
            'name.required' => 'Поле "Имя" должно быть заполнено',
            'password.required' => 'Поле "Пароль" должно быть заполнено',
            'password.min' => 'Поле "Пароль" должно включать 6 или более символов',
            'password.confirmed' => 'Введенные пароли на совпадают',
            'agree.required' => 'Необходимо дать согласие на обработку персональных данных',
        );
        return Validator::make($data, [
            'surname' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'agree' =>'required'
        ],$messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        if (strlen(trim($data['new_filial'])) > 0 )
        {
          $filial = Filial::create(['name' => $data['new_filial']]);
          $filial = $filial->id;
        }else{
            $filial = $data['filial'];
        }

        if (strlen(trim($data['new_job'])) > 0 )
        {
          $job = Job::create(['name' => $data['new_job']]);
          $job = $job->id;
        }else{
            $job = $data['job'];
        }

        if(isset($data['mailing']))  {$mailing=true;}else{$mailing=false;}
        return User::create([
            'surname' => $data['surname'],
            'name' => $data['name'],
            'fathername' => $data['fathername'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
            'filial_id' => $filial,
            'job_id' => $job,
            'mailing' => $mailing,
        ]);
    }
}

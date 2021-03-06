@inject('filials','App\Filial')
@inject('jobs','App\Job')

@extends('layouts.app')

@section('title')
<h4 class="nomargin">Регистрация в системе</h4>
@stop

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                        <form class="nomargin sky-form boxed" role="form" method="POST" action="{{ url('/register') }}">
                            {!! csrf_field() !!}
                            <header>
                                <i class="fa fa-users"></i> Регистрация
                            </header>
                            <fieldset>
                                <div class="col-md-4{{ $errors->has('surname') ? ' has-error' : '' }}">
                                    <label class="input">
                                        Фамилия *<input class="{{ $errors->has('surname') ? 'error' : '' }}" value="{{ old('surname') }}" name="surname" type="text" placeholder="Фамилия">
                                    </label>
                                    @if ($errors->has('surname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('surname') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-4{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label class="input">
                                        Имя *<input class="{{ $errors->has('name') ? 'error' : '' }}" value="{{ old('name') }}" name="name" type="text" placeholder="Имя">
                                    </label>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    <label class="input">
                                        Отчество <input value="{{ old('fathername') }}" name="fathername" value="{{ old('fathername') }}" type="text" placeholder="Отчество">
                                    </label>
                                </div>
                                
                                <div class="col-md-12 margin-top-10 nopadding">
                                    <div class="col-md-6{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label>Адрес электронной почты *</label>
                                        <label class="input">
                                            <i class="ico-append fa fa-envelope"></i>
                                            <input class="{{ $errors->has('email') ? 'error' : '' }}" name="email" value="{{ old('email') }}" type="text" placeholder="Адрес электронной почты">
                                            <b class="tooltip tooltip-bottom-right">Используется для входа в систему</b>
                                        </label>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <label>Телефон</label>
                                        <label class="input">
                                            <i class="ico-append fa fa-phone"></i>
                                            <input value="{{ old('phone') }}" name="phone" type="text" placeholder="Телефон">
                                        </label>

                                    </div>
                                </div>
                                <div class="col-md-12 margin-top-10 nopadding">
                                    <div class="col-md-6{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label>Пароль *</label>
                                        <label class="input">
                                            <i class="ico-append fa fa-lock"></i>
                                            <input class="{{ $errors->has('password') ? 'error' : '' }}" name="password" value="{{ old('password') }}" type="text" placeholder="Пароль">
                                            <b class="tooltip tooltip-bottom-right">Только латинские символы и цифры. Не менее 6 символов</b>
                                        </label>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="col-md-6{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <label>Повторите пароль *</label>
                                        <label class="input">
                                            <i class="ico-append fa fa-lock"></i>
                                            <input class="{{ $errors->has('password_confirmation') ? 'error' : '' }}" name="password_confirmation" value="{{ old('password_confirmation') }}" type="text" placeholder="Повторите пароль">
                                            <b class="tooltip tooltip-bottom-right">Только латинские символы и цифры. Не менее 6 символов</b>
                                        </label>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12 margin-top-10"><label>Укажите текущий головной филиал или (если филиала нет в списке) введите его в поле справа</label></div>
                                <div class="row nomargin">
                                    <label class="select margin-bottom-10 col-md-6">
                                        <select name="filial" class="form-control select2">
                                            <option value="0" selected>Выберите филиал...</option>
                                            @foreach ($filials->get() as $filial)
                                                <option value="{{ $filial->id }}" {!! old('filial') == $filial->id ? 'selected="selected"' : '' !!}>
                                                    {{ $filial->name }}
                                                </option>
                                            @endforeach
                                            
                                        </select>
                                    </label>

                                    <label class="input col-md-6">
                                        <input name="new_filial" value="{{old('new_filial')}}" type="text" placeholder="Другой филиал">
                                    </label>
                                </div>

                                <div class="col-md-12"><label>Укажите текущую должность или (если должности нет в списке) введите ее в поле справа</label></div>
                                <div class="row nomargin">
                                    <label class="select margin-bottom-10 col-md-6">
                                        <select name="job" class="form-control select2">
                                            <option value="0" selected>Выберите должность...</option>
                                            @foreach ($jobs->get() as $job)
                                                <option value="{{ $job->id }}" {!! old('job') == $job->id ? 'selected="selected"' : '' !!}>
                                                    {{ $job->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </label>

                                    <label class="input col-md-6">
                                        <input name="new_job" type="text" value="{{old('new_job')}}" placeholder="Другая должность">
                                    </label>
                                </div>

                                <div class="margin-top-30 {{ $errors->has('agree') ? ' has-error' : '' }}">
                                    <label class="checkbox nomargin"><input class="checked-agree" type="checkbox" name="agree" {!! old('agree') == true ? 'checked' : '' !!}>
                                    <i></i>Я даю согласие на обработку моих персональных данных в рамках проведения обучения</label>
                                    @if ($errors->has('agree'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('agree') }}</strong>
                                            </span>
                                    @endif
                                    <label class="checkbox nomargin"><input type="checkbox" name="mailing" {!! old('mailing') == true ? 'checked' : '' !!}>
                                        <i></i>Я хочу получать рассылку новостей системы на мой электронный адрес</label>
                                </div>

                                 <div class="form-group margin-top-30">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-user"></i>Зарегистрироваться
                                        </button>
                                    </div>
                                </div>
                            </fieldset>
                                <footer>
                                    Уже зарегистрированы? <a href="/login"><strong>Авторизуйтесь!</strong></a>
                                </footer>
                        </form>
            </div>
        </div>

    </div>
</section>
@endsection

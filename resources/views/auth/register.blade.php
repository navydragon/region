@extends('layouts.app')

@section('title')
<h4 class="nomargin">Регистрация в системе</h4>
@stop

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Регистрация</div>
                    <div class="panel-body">
                        <form class="nomargin sky-form boxed" role="form" method="POST" action="{{ url('/register') }}">
                            {!! csrf_field() !!}
                            <header>
                                <i class="fa fa-users"></i> Регистрация
                                <span class="small">
                                    Уже зарегистрированы? <a href="/login"><strong>Авторизуйтесь!</strong></a>
                                </span>
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
                                        Отчество <input value="{{ old('fathername') }}" name="name" type="text" placeholder="Отчество">
                                    </label>
                                </div>
                                
                                <div class="row nomargin">
                                    <div class="col-md-6{{ $errors->has('name') ? ' has-error' : '' }}">
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
                                <div class="row nomargin">
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
                                 <div class="form-group margin-top-30">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-user"></i>Зарегистрироваться
                                        </button>
                                    </div>
                                </div>
                            </fieldset>
                               
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
@endsection

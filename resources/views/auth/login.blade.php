@extends('layouts.app')

@section('title')
<h4 class="nomargin">Авторизация в системе</h4>
@stop

@section('content')
<section>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Авторизация</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Адрес электронной почты</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Пароль</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                    <label class="checkbox">
                                        <input type="checkbox" name="remember"> <i></i> Запомнить
                                    </label>
                               
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Вход
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Восстановить пароль</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    Нет аккаунта? <a href="/register"><strong>Зарегистрируйтесь!</strong></a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection

@extends('layouts.app')

@section('title')
<h4 class="nomargin">Авторизация в системе</h4>
@stop

@section('content')
<section>
<div class="container">
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form role="form" method="POST" action="{{ url('/login') }}" class="sky-form boxed">
                {!! csrf_field() !!}
                <header><i class="fa fa-users"></i> Авторизация</header>
                
                <fieldset class="nomargin"> 
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="input margin-top-20">Адрес электронной почты</label>
                        <label class="input">
                            <i class="ico-append fa fa-envelope"></i>
                            <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email" value="{{ old('email') }}">
                        </label>
                    
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="input margin-top-20">Пароль</label>
                        <label class="input">
                            <i class="ico-append fa fa-lock"></i>
                            <input type="password" class="form-control {{ $errors->has('password') ? 'error' : '' }}" name="password">
                        </label>
                        
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    

                    <label class="checkbox margin-top-20">
                        <input name="remember" type="checkbox">
                        <i></i> Запомнить
                    </label>

                </fieldset>

                <footer class="celarfix">
                    <button type="submit" class="btn btn-primary noradius pull-right"><i class="fa fa-check"></i> Вход</button>
                    <div class="login-forgot-password pull-left">
                        <a href="{{ url('/password/reset') }}">Забыли пароль?</a>
                    </div>
                </footer>
            </form>
        </div>    
    </div>



</div>
</section>
@endsection

@inject('filials','App\Filial')
@inject('jobs','App\Job')
@extends('layouts.app')

@section('title')
Мой профиль
@stop

@section('content')


<!-- RIGHT -->
<div class="col-lg-9 col-md-9 col-sm-8 col-lg-push-3 col-md-push-3 col-sm-push-4 margin-bottom-80">

    <ul class="nav nav-tabs nav-top-border">
        <li class="active"><a href="#info" data-toggle="tab">Персональные данные</a></li>
        <li><a href="#avatar" data-toggle="tab">Фотография</a></li>
        <li><a href="#password" data-toggle="tab">Пароль</a></li>
        <li><a href="#privacy" data-toggle="tab">Прочие настройки</a></li>
    </ul>

    <div class="tab-content margin-top-20">

        <!-- PERSONAL INFO TAB -->
        <div class="tab-pane fade in active" id="info">
            <form role="form" action="/profile/pers_data" method="patch">
                <div class="form-group">
                    <label class="control-label">Фамилия</label>
                    <input type="text" name="surname" id="surname" placeholder="{{Auth::user()->surname}}" class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">Имя</label>
                    <input type="text" name="name" id="name" placeholder="{{Auth::user()->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">Отчество</label>
                    <input type="text" name="fathername" id="fathername" placeholder="{{Auth::user()->fathername}}" class="form-control">
                </div>

                <div class="form-group">
                    <label class="control-label">E-mail (логин)</label>
                    <input type="text" name="email" id="email" placeholder="{{Auth::user()->email}}" class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">Телефон</label>
                    <input type="text" name="phone" id="phone" placeholder="{{Auth::user()->phone}}" class="form-control">
                </div>
                <div class="form-group">
                   <label class="control-label">Филиал</label>
                        <select name="filial" id="filial" class="form-control select2">
                            <option value="0" selected>Выберите филиал...</option>
                            @foreach ($filials->get() as $filial)
                                <option value="{{ $filial->id }}" {!! (old('filial') == $filial->id)||(Auth::user()->filial_id == $filial->id) ? 'selected="selected"' : '' !!}>
                                    {{ $filial->name }}
                                </option>
                            @endforeach         
                        </select>
                </div>
                <div class="form-group">
                   <label class="control-label">Должность</label>
                    <select name="job" id="job" class="form-control select2">
                        <option value="0" selected>Выберите должность...</option>
                        @foreach ($jobs->get() as $job)
                            <option value="{{ $job->id }}" {!! (old('job') == $job->id)||(Auth::user()->job_id == $job->id) ? 'selected="selected"' : '' !!}>
                                {{ $job->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="margiv-top10">
                    <a href="#" onclick="" class="btn btn-primary"><i class="fa fa-check"></i> Сохранить изменения </a>
                    <a href="#" class="btn btn-default">Отмена </a>
                </div>
            </form>
        </div>
        <!-- /PERSONAL INFO TAB -->

        <!-- AVATAR TAB -->
        <div class="tab-pane fade" id="avatar">

            <form class="clearfix" action="#" method="post" enctype="multipart/form-data">
                <div class="form-group">

                    <div class="row">

                        <div class="col-md-3 col-sm-4">

                            <div class="thumbnail">
                                <img class="img-responsive" src="assets/images/demo/people/460x700/8-min.jpg" alt="" />
                            </div>

                        </div>

                        <div class="col-md-9 col-sm-8">

                            <div class="sky-form nomargin">
                                <label class="label">Выберите файл</label>
                                <label for="file" class="input input-file">
                                    <div class="button">
                                        <input type="file" id="file" accept="image/*" onchange="this.parentNode.nextSibling.value = this.value">Выбрать
                                    </div><input type="text" readonly>
                                </label>
                            </div>

                            <a href="#" class="btn btn-danger btn-xs noradius"><i class="fa fa-times"></i> Удалить фотографию</a>

                            <div class="clearfix margin-top-20">
                                <span class="label label-warning">NOTE! </span>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt laoreet!
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="margiv-top10">
                    <a href="#" class="btn btn-primary">Save Changes </a>
                    <a href="#" class="btn btn-default">Cancel </a>
                </div>

            </form>

        </div>
        <!-- /AVATAR TAB -->

        <!-- PASSWORD TAB -->
        <div class="tab-pane fade" id="password">

            <form action="#" method="post">

                <div class="form-group">
                    <label class="control-label">Текущий пароль</label>
                    <input type="password" class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">Новый пароль</label>
                    <input type="password" class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label">Повторите новый пароль</label>
                    <input type="password" class="form-control">
                </div>

                <div class="margiv-top10">
                    <a href="#" class="btn btn-primary"><i class="fa fa-check"></i> Изменить пароль</a>
                    <a href="#" class="btn btn-default">Отмена </a>
                </div>

            </form>

        </div>
        <!-- /PASSWORD TAB -->

        <!-- PRIVACY TAB -->
        <div class="tab-pane fade" id="privacy">

            <form action="#" method="post">
                <div class="sky-form">

                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam.</td>
                                <td>
                                    <div class="inline-group">
                                        <label class="radio nomargin-top nomargin-bottom">
                                            <input type="radio" name="radioOption" checked=""><i></i> Yes
                                        </label>

                                        <label class="radio nomargin-top nomargin-bottom">
                                            <input type="radio" name="radioOption" checked=""><i></i> No
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam.</td>
                                <td>
                                    <label class="checkbox nomargin">
                                        <input type="checkbox" name="checkbox" checked=""><i></i> Yes
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam.</td>
                                <td>
                                    <label class="checkbox nomargin">
                                        <input type="checkbox" name="checkbox" checked=""><i></i> Yes
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam.</td>
                                <td>
                                    <label class="checkbox nomargin">
                                        <input type="checkbox" name="checkbox" checked=""><i></i> Yes
                                    </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>

                <div class="margin-top-10">
                    <a href="#" class="btn btn-primary"><i class="fa fa-check"></i> Save Changes </a>
                    <a href="#" class="btn btn-default">Cancel </a>
                </div>

            </form>

        </div>
        <!-- /PRIVACY TAB -->

    </div>

</div>


<!-- LEFT -->
<div class="col-lg-3 col-md-3 col-sm-4 col-lg-pull-9 col-md-pull-9 col-sm-pull-8">

    <div class="thumbnail text-center">
        <img src="assets/images/demo/people/460x700/8-min.jpg" alt="" />
        <h2 class="size-18 margin-top-10 margin-bottom-0">Felica Doe</h2>
        <h3 class="size-11 margin-top-0 margin-bottom-10 text-muted">DEVELOPER</h3>
    </div>

    <!-- completed -->
    <div class="margin-bottom-30">
        <label>88% completed profile</label>
        <div class="progress progress-xxs">
            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100" style="width: 88%; min-width: 2em;"></div>
        </div>
    </div>
    <!-- /completed -->

    <!-- SIDE NAV -->
    <ul class="side-nav list-group margin-bottom-60" id="sidebar-nav">
        <li class="list-group-item"><a href="page-profile.html"><i class="fa fa-eye"></i> PROFILE</a></li>
        <li class="list-group-item"><a href="page-profile-projects.html"><i class="fa fa-tasks"></i> PROJECTS</a></li>
        <li class="list-group-item"><a href="page-profile-comments.html"><i class="fa fa-comments-o"></i> COMMENTS</a></li>
        <li class="list-group-item"><a href="page-profile-history.html"><i class="fa fa-history"></i> HISTORY</a></li>
        <li class="list-group-item active"><a href="page-profile-settings.html"><i class="fa fa-gears"></i> SETTINGS</a></li>

        <li class="list-group-item list-toggle">   <!-- NOTE: "active" to be open on page load -->                
            <a data-toggle="collapse" data-parent="#sidebar-nav" href="#collapse-1">DROPDOWN EXAMPLE</a>
            <ul id="collapse-1" class="collapse"><!-- NOTE: "collapse in" to be open on page load -->
                <li><a href="#"><i class="fa fa-angle-right"></i> SUMBENU 1</a></li>
                <li>
                    <span class="badge badge-red">New</span>
                    <a href="#"><i class="fa fa-angle-right"></i> SUMBENU 2</a>
                </li>
                <li class="active"><a href="#"><i class="fa fa-angle-right"></i> SUMBENU 3</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i> SUMBENU 4</a></li>
            </ul>
        </li>
    </ul>
    <!-- /SIDE NAV -->


    <!-- info -->
    <div class="box-light margin-bottom-30"><!-- .box-light OR .box-light -->
        <div class="row margin-bottom-20">
            <div class="col-md-4 col-sm-4 col-xs-4 text-center bold">
                <h2 class="size-30 margin-top-10 margin-bottom-0 font-raleway">12</h2>
                <h3 class="size-11 margin-top-0 margin-bottom-10 text-info">PROJECTS</h3>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-4 text-center bold">
                <h2 class="size-30 margin-top-10 margin-bottom-0 font-raleway">34</h2>
                <h3 class="size-11 margin-top-0 margin-bottom-10 text-info">TASKS</h3>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-4 text-center bold">
                <h2 class="size-30 margin-top-10 margin-bottom-0 font-raleway">32</h2>
                <h3 class="size-11 margin-top-0 margin-bottom-10 text-info">UPLOADS</h3>
            </div>
        </div>
        <!-- /info -->

        <div class="text-muted">
            <h2 class="size-18 text-muted margin-bottom-6"><b>About</b> Felicia Doe</h2>
            <p>Lorem ipsum dolor sit amet diam nonummy nibh dolore.</p>
            
            <ul class="list-unstyled nomargin">
                <li class="margin-bottom-10"><i class="fa fa-globe width-20 hidden-xs hidden-sm"></i> <a href="http://www.stepofweb.com">www.stepofweb.com</a></li>
                <li class="margin-bottom-10"><i class="fa fa-facebook width-20 hidden-xs hidden-sm"></i> <a href="http://www.facebook.com/stepofweb">stepofweb</a></li>
                <li class="margin-bottom-10"><i class="fa fa-twitter width-20 hidden-xs hidden-sm"></i> <a href="http://www.twitter.com/stepofweb">@stepofweb</a></li>
            </ul>
        </div>
    
    </div>

</div>
@endsection

@extends('layouts.app')

@section('title')
Главная
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Текущие комиссии по охране труда</h4></div>
                <div class="panel-body">
                    <div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th><i class="fa fa-bookmark pull-right hidden-xs"></i> Название</th>
                <th><i class="fa fa-calendar pull-right hidden-xs"></i> Даты проведения</th>
                <th><i class="fa fa-file pull-right hidden-xs"></i> Файлы</th>
                <th><i class="fa fa-map-signs pull-right hidden-xs"></i> Действие</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($commissions as $commission)
                <tr>
                    <td>{{$commission->title}}</td>
                    <td>{{$commission->start_at->format("d.m.Y")}} - {{$commission->end_at->format("d.m.Y")}}</td>
                    <td>
                        @foreach($commission->find_in_file_binds()->get() as $file)
                           <a href="{{$file->file->path}}"" target="_blank" class="col-md-12 nomargin""> {{$file->file->title}} </a>
                        @endforeach
                    </td>
                    <td><a href="commissions/{{$commission->id}}/join"  class="btn btn-primary btn-xs"><i class="fa fa-plus"></i>&nbsp;&nbsp;Присоединиться</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

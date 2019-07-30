@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}

                </div>
            @else
                <div class="col-lg-12 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <a href="{{url('/workingShift/create')}}" class="btn btn-primary">Добавити нову зміну</a>
                                </div>
                            </div>
                            <h1>Зміни</h1>
                            {{--<a href="{{ url('personnel/create') }}">Добавити працівника</a>--}}
                        </div>


                        <div class="page-item">


                            <table class="table table-light table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">дата</th>
                                    <th scope="col">початок</th>
                                    <th scope="col">кінець</th>
                                    <th scope="col">табель</th>
                                    <th scope="col">продукція</th>
                                    <th scope="col">Дата редагування</th>
                                    <th scope="col">Редагувати</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($workingShifts as $workingShift )
                                    <tr>
                                        <th scope="row">{{$workingShift->id}}</th>
                                        <td>{{$workingShift->date}}</td>
                                        <td>{{$workingShift->time_start}}</td>
                                        <td>{{$workingShift->time_end}}</td>
                                        <td>
                                            <div class="form-group">
                                                <div class="col-md-8 col-md-offset-4">
                                                    <a href="{{url('/workingShift/'.$workingShift->id.'/edit')}}" class="btn btn-primary">табель</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <div class="col-md-8 col-md-offset-4">
                                                    <a href="{{url('/workingShift/'.$workingShift->id.'/edit')}}" class="btn btn-primary">продкція</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{$workingShift->created_at}}</td>
                                        <td>{{$workingShift->updated_at}}</td>
                                        <td>
                                            <div class="form-group">
                                                <div class="col-md-8 col-md-offset-4">
                                                    <a href="{{url('/workingShift/'.$workingShift->id.'/edit')}}" class="btn btn-primary">Редагувати</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>




                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection


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
                                    <a href="{{url('/specialty/create')}}" class="btn btn-primary">Добавити нову спеціальність</a>
                                </div>
                            </div>
                            <h1>Список спеціальностей</h1>
                            {{--<a href="{{ url('personnel/create') }}">Добавити працівника</a>--}}
                        </div>


                        <div class="page-item">


                            <table class="table table-light table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">Назва спеціальності</th>
                                    <th scope="col">Опис</th>
                                    <th scope="col">Тариф</th>
                                    <th scope="col">форма нарахування</th>
                                    <th scope="col">Дата створення</th>
                                    <th scope="col">Дата редагування</th>
                                    <th scope="col">Редагувати</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($specialtys as $specialty )
                                    <tr>
                                        <th scope="row">{{$specialty->id}}</th>
                                        <td>{{$specialty->name_special}}</td>
                                        <td>{{$specialty->discr_special}}</td>
                                        <td>{{$specialty->tariff}}</td>
                                        <td>{{$specialty->hourly}}</td>
                                        <td>{{$specialty->created_at}}</td>
                                        <td>{{$specialty->updated_at}}</td>
                                        <td>
                                            <div class="form-group">
                                                <div class="col-md-8 col-md-offset-4">
                                                    <a href="{{url('/specialty/'.$specialty->id.'/edit')}}" class="btn btn-primary">Редагувати</a>
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

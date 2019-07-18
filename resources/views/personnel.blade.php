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
                                <a href="{{url('/personnel/create')}}" class="btn btn-primary">Добавити нового працівника</a>
                        </div>
                        </div>
                        <h1>Список працівників</h1>
                        {{--<a href="{{ url('personnel/create') }}">Добавити працівника</a>--}}
                    </div>


                    <div class="page-item">


                            <table class="table table-light table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">ІНН</th>
                                    <th scope="col">ПІБ</th>
                                    <th scope="col">Рік народження</th>
                                    <th scope="col">Паспорт</th>
                                    <th scope="col">Примітка</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($personnel as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->inn}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->birth_date}}</td>
                                    <td>{{$user->passport}}</td>
                                    <td>{{$user->description}}</td>
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

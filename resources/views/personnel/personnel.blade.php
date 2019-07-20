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
                                    <th scope="col" width="25px">№</th>
                                    <th scope="col" width="100px">ІНН</th>
                                    <th scope="col">Прізвище</th>
                                    <th scope="col">Імя</th>
                                    <th scope="col">По батькові</th>
                                    <th scope="col" width="100px">Рік народження</th>
                                    <th scope="col" width="120px">Паспорт</th>
                                    <th scope="col">Примітка</th>
                                    <th scope="col"width="100px">Редагувати</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($persons as $person)
                                <tr>
                                    <th scope="row">{{$person->id}}</th>
                                    <td>{{$person->inn}}</td>
                                    <td>{{$person->last_name}}</td>
                                    <td>{{$person->name}}</td>
                                    <td>{{$person->patronymic}}</td>
                                    <td>{{$person->birth_date}}</td>
                                    <td>{{$person->passport}}</td>
                                    <td>{{$person->description}}</td>
                                    <td>
                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                                <a href="{{url('/personnel/'.$person->id.'/edit')}}" class="btn btn-primary">Редагувати</a>
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

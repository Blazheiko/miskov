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
                                    <a href="{{url('/storage/create')}}" class="btn btn-primary">Добавити новий склад</a>
                                </div>
                            </div>
                            <h1>Список складів</h1>
                            {{--<a href="{{ url('personnel/create') }}">Добавити працівника</a>--}}
                        </div>


                        <div class="page-item">


                            <table class="table table-light table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">Назва складу</th>
                                    <th scope="col">Опис</th>
                                    <th scope="col">продукції</th>
                                    <th scope="col">вільно</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($storages as $storage )
                                    <tr>
                                        <th scope="row">{{$storage->id}}</th>
                                        <td>{{$storage->name}}</td>
                                        <td>{{$storage->descr}}</td>
                                        <td>10</td>
                                        <td>12</td>

                                        <td>
                                            <div class="form-group">
                                                <div class="col-md-8 col-md-offset-4">
                                                    <a href="{{url('/storage/'.$storage->id.'/show')}}" class="btn btn-primary">В склад</a>
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

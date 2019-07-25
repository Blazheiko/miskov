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
                                    <a href="{{url('/product/create')}}" class="btn btn-primary">Добавити нову продукцію</a>
                                </div>
                            </div>
                            <h1>Перелік продукції</h1>
                            {{--<a href="{{ url('personnel/create') }}">Добавити працівника</a>--}}
                        </div>


                        <div class="page-item">


                            <table class="table table-light table-striped table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">№id</th>
                                    <th scope="col">Артикул</th>
                                    <th scope="col">Назва</th>
                                    <th scope="col">Фасування</th>
                                    <th scope="col">ціна за кг</th>
                                    <th scope="col">Редагувати</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product )
                                    <tr>
                                        <th scope="row">{{$product->id}}</th>
                                        <td>{{$product->code}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->packing}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>
                                            <div class="form-group">
                                                <div class="col-md-8 col-md-offset-4">
                                                    <a href="{{url('/product/'.$product->id.'/edit')}}" class="btn btn-primary">Редагувати</a>
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

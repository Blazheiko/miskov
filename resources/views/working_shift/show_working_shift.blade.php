@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>
                        {{'Зміна № '.$workingShift->id.' Дата  '.$workingShift->date.
                        '  Початок- '.$workingShift->time_start.'  Закінчення - '.$workingShift->time_end}}
                    </strong>
                    <p>
                        {{$workingShift->discr}}
                    </p>
                    <p>
                        {{'Створив - '.$foreman->name}}
                    </p>


                </div>

                <div class="card-body">

                        <div class="form-group row">

                            <div class="col-md-8">


                            </div>

                        </div>


                        <div class="form-group row">

                            <div class="col-md-8">
                             <strong>Табель зміни</strong>
                            </div>
                        </div>

                        <table class="table table-light table-striped table-hover">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">ПІБ,дата народження</th>
                                <th scope="col">основна спеціальнімть</th>
                                <th scope="col">робочий час</th>
                                <th scope="col">за сумістництвом</th>
                                <th scope="col">робочий час </th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($listPersonnels as $listPersonnel )
                            <tr>
                                <th scope="row">{{$listPersonnel['user_id']}}</th>
                                <td>{{$listPersonnel['full_name']}}</td>
                                <td>{{$listPersonnel['specialties_id']}}</td>
                                <td>{{$listPersonnel['work_time']}}</td>
                                <td>{{$listPersonnel['combined_specialties_id']}}</td>
                                <td>{{$listPersonnel['combined_time']}}</td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>

                        <div class="form-group row">

                            <div class="col-md-8">
                             <strong>{{'Зміна виготовила продукцію:      '.$productName->name}}</strong>
                            </div>
                        </div>

                        <table class="table table-light table-striped table-hover">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">назва складу</th>
                                <th scope="col">кількість</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($listStoragesShifts as $listStorage )
                            <tr>
                                <th scope="row">{{$listStorage['storage_id']}}</th>
                                <td>{{$listStorage['name']}}</td>
                                <td>{{$listStorage['quantity']}}</td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>

                        <div class="form-group row mb-0">

                            <div class="col-md-6 offset-md-4">
                                <p>
                                    <button type="button" class="btn btn-primary">
                                        {{ __('Добавити вид продукції') }}
                                    </button>
                                    <button type="button" class="btn btn-primary">
                                        {{ __('Редагувати') }}
                                    </button>
                                </p>


                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



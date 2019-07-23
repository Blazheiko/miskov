@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Редагування спеціальності') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('specialty.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name_special" class="col-md-4 col-form-label text-md-right">{{ __('Назва') }}</label>

                                <div class="col-md-8">
                                    <input id="name_special" type="text" class="form-control @error('name_special') is-invalid @enderror" name="name_special" value="{{$specialty->name_special}}" required autocomplete="name_special" autofocus>

                                    @error('name_special')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="discr_special" class="col-md-4 col-form-label text-md-right">{{ __('Опис') }}</label>

                                <div class="col-md-8">
                                    <input id="discr_special" type="text" class="form-control @error('discr_special') is-invalid @enderror" name="discr_special" value="{{ $specialty->discr_special }}" required autocomplete="discr_special" autofocus>

                                    @error('discr_special')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tariff" class="col-md-4 col-form-label text-md-right">{{ __('Тариф (грн/год або грн/т') }}</label>

                                <div class="col-md-8">
                                    <input id="tariff" type="text" class="form-control @error('tariff') is-invalid @enderror" name="tariff" value="{{ $specialty->tariff }}" required autocomplete="tariff" autofocus>

                                    @error('tariff')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="hourly" class="col-md-4 col-form-label text-md-right">{{ __('Спосіб нарахування') }}</label>

                                <div class="col-md-8">
                                    <input name="hourly" type="radio" id="hourly" value="1" >Погодинно
                                    <input name="hourly" type="radio" id="hourly" value="0"required>Від виробітку

                                    @if ($errors->has('hourly'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>Потрібно вибрати тип оплати</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <p> Редагував: {{$creator->name}}</p>
                                    <p> Дата створення:{{$specialty->created_at}} </p>
                                    <p> Дата редагування:{{$specialty->updated_at}} </p>
                                </div>
                            </div>




                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Зберегти') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



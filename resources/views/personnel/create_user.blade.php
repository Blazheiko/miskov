@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Новий працівник') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('personnel.add') }}">
                            @csrf


                            <div class="form-group row">
                                <label for="inn" class="col-md-4 col-form-label text-md-right">{{ __('ІНН') }}</label>

                                <div class="col-md-8">
                                    <input id="inn" type="text" class="form-control @error('name') is-invalid @enderror" name="inn" value="{{ old('inn') }}" required autocomplete="inn" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Прізвище') }}</label>

                                <div class="col-md-8">
                                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Імя') }}</label>

                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="patronymic" class="col-md-4 col-form-label text-md-right">{{ __('По батькові') }}</label>

                                <div class="col-md-8">
                                    <input id="patronymic" type="text" class="form-control @error('patronymic') is-invalid @enderror" name="patronymic" value="{{ old('patronymic') }}" required autocomplete="patronymic" autofocus>

                                    @error('patronymic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Почта E-Mail ') }}</label>

                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="passport" class="col-md-4 col-form-label text-md-right">{{ __('Серія та номер паспорту ') }}</label>

                                <div class="col-md-8">
                                    <input id="passport" type="text" class="form-control @error('passport') is-invalid @enderror" name="passport" value="{{ old('passport') }}" required autocomplete="passport">

                                    @error('passport')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Адресса ') }}</label>

                                <div class="col-md-8">
                                    <textarea id="address" type="text" maxlength="255" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address"></textarea>


                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

{{--                            <div class="form-group row">--}}
{{--                                <label for="specialty" class="col-md-4 col-form-label text-md-right">{{ __( 'Спеціальність') }}</label>--}}

{{--                                <div class="col-md-8">--}}
{{--                                <p><select name="specialty">--}}
{{--                                    @foreach($specialtys as $specialty)--}}
{{--                                    <option value={{$specialty->name_special }}> {{ $specialty ->name_special}} </option>--}}
{{--                                    @endforeach--}}
{{--                                </select></p>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                                <div class="form-group row">
                                <label for="specialty" class="col-md-4 col-form-label text-md-right">{{ __( 'Спеціальність') }}</label>

                                <div class="col-md-8">
{{--                                    <input id="specialty" type="text" class="form-control @error('specialty') is-invalid @enderror" name="specialty" value="{{ old('specialty') }}" required autocomplete="specialty">--}}

                                    <p><input type="search" list="specialtys" name="specialty" >
                                        <datalist id="specialtys">
                                            @foreach($specialtys as $specialty)--}}
                                            <option value={{$specialty->id}}> {{ $specialty ->name_special}} </option>
                                           @endforeach
                                        </datalist></p>

                                    @error('specialty')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __( 'Номер телефону') }}</label>

                                <div class="col-md-8">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="birth_date" class="col-md-4 col-form-label text-md-right">{{ __( 'Рік народження') }}</label>

                                <div class="col-md-8">
                                    <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" required autocomplete="birth_date">

                                    @error('birth_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="employment_date" class="col-md-4 col-form-label text-md-right">{{ __( 'Дата прийняття на роботу') }}</label>

                                <div class="col-md-8">
                                    <input id="employment_date" type="date" class="form-control @error('employment_date') is-invalid @enderror" name="employment_date" value="{{ old('employment_date') }}" required autocomplete="employment_date">

                                    @error('employment_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dismissal_date" class="col-md-4 col-form-label text-md-right">{{ __( 'Дата звільнення') }}</label>

                                <div class="col-md-8">
                                    <input id="dismissal_date" type="date" class="form-control @error('employment_date') is-invalid @enderror" name="dismissal_date" value="{{ old('dismissal_date') }}" >


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __( 'Примітка') }}</label>

                                <div class="col-md-8">
                                    <textarea id="description" type="text" maxlength="255" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description"></textarea>


                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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


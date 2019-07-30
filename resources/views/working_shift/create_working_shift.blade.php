@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Нова зміна') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('workingShift.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Дата') }}</label>

                                <div class="col-md-8">
                                    <input id="date" type="date" class=" @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>

                                    @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="time_start" class="col-md-4 col-form-label text-md-right">{{ __('Початок/кінець') }}</label>

                                <div class="col-md-8">
                                    <p>
                                        <input id="time_start" type="time" class=" @error('time_start') is-invalid @enderror" name="time_start" value="{{ old('time_start') }}" required autocomplete="time_start" autofocus>

                                        @error('time_start')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror

                                    </p>
                                    <p>
                                        <input id="time_end" type="time" class=" @error('time_end') is-invalid @enderror" name="time_end" value="{{ old('time_end') }}" required autocomplete="time_end" autofocus>

                                        @error('time_end')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </p>

                                </div>
{{--                                <label for="time_end" class="col-md-4 col-form-label text-md-right">{{ __('Кінець') }}</label>--}}

{{--                                <div class="col-md-8">--}}
{{--                                  --}}
{{--                                </div>--}}
                            </div>


                            <div class="form-group row">
                                <label for="discr" class="col-md-4 col-form-label text-md-right">{{ __('Примітка') }}</label>

                                <div class="col-md-8">
                                    <input id="discr" type="text" class="form-control @error('discr') is-invalid @enderror" name="discr" value="{{ old('discr') }}" required autocomplete="discr" autofocus>

                                    @error('discr')
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


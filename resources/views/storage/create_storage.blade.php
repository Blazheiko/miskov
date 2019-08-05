@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Новий склад') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('storage.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Назва складу') }}</label>

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
                                <label for="descr" class="col-md-4 col-form-label text-md-right">{{ __( 'Примітка') }}</label>

                                <div class="col-md-8">
                                    <textarea id="descr" type="text" maxlength="255" class="form-control @error('descr') is-invalid @enderror" name="descr" value="{{ old('descr') }}" required autocomplete="descr">{{ old('descr') }}</textarea>


                                    @error('descr')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="places" class="col-md-4 col-form-label text-md-right">{{ __('Місця в складі кг') }}</label>

                                <div class="col-md-8">
                                    <input id="places" type="number" min="0" max="999999999"  class="form-control @error('places') is-invalid @enderror" name="places" value="{{ old('places') }}" required autocomplete="places" autofocus>

                                    @error('places')
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

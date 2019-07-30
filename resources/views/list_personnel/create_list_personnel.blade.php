
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{'Табель зміни' }}
                    <p>
                        {{'№-'.$workingShift->id .' дата - '.$workingShift->date }}
                    </p>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('product.store') }}">
                            @csrf
                            @foreach($personnels as $personnel )

                                <div class="form-group row">
                                    <label for="discr" class="col-md-4 col-form-label text-md-right">
                                        {{ __($personnel->last_name.' '.$personnel->name.' '.$personnel->patronymic.' '.$personnel->birth_date) }}
                                    </label>
                                    <p>
                                        <input type="search" list="specialtys" name="specialty" value="{{$personnel->specialty }}" >
                                        <datalist id="specialtys">
                                            @foreach($specialtys as $specialty)
                                                <option value="{{$specialty->id}}"> {{ $specialty ->name_special}} </option>
                                            @endforeach
                                        </datalist>
                                        @error('specialty')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </p>




                                    <p>
                                        <input id="discr" type="text" class="@error('discr') is-invalid @enderror" name="discr" value="{{ old('discr') }}" required autocomplete="discr" autofocus>

                                        @error('discr')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror

                                    </p>

                                </div>


                            @endforeach




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

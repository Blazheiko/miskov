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
                                        <th scope="row">{{$listPersonnel->user_id}}</th>
                                        <td>{{$listPersonnel->full_name}}</td>
                                        <td>
                                            <input type="search" list="specialtys" name="specialties_id[]" value="{{$listPersonnel->specialties_id}}" >
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
                                        </td>
                                        <td>
                                            <input id="work_time" type="number" size="4" min="0" max="20" step="0.1" class="@error('work_time') is-invalid @enderror" name="work_time[]" value="{{$listPersonnel->work_time}}" required autocomplete="{{$listPersonnel->work_time}}" autofocus>

                                            @error('work_time')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </td>

                                        <td>
                                            <input type="search" list="specialtys" name="combined_specialties_id[]" value="{{$listPersonnel->specialties_id}}" >
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
                                        </td>
                                        <td>
                                            <input id="combined_time" type="number" size="4" min="0" max="20" step="0.1" class="@error('combined_time') is-invalid @enderror" name="combined_time[]" value="{{$listPersonnel->combined_time}}" required autocomplete="{{$listPersonnel->combined_time}}" autofocus>

                                            @error('combined_time')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                            <div class="form-group row">
                                <label for="product" class="col-md-4 col-form-label text-md-right">{{ __('Продукція') }}</label>

                                <div class="col-md-8">
                                    <select id="product" name="product" >
                                        @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>

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
                                @foreach($listStorages as $listStorage )
                                    <tr>
                                        <th scope="row">{{$listStorage->storage_id}}</th>
                                        <td>{{$listStorage->name}}</td>
                                        <td>
                                            <input id="quantity" type="number" size="6" min="0" max="20" step="0.1" class="@error('quantity') is-invalid @enderror" name="quantity[]" value="{{$listStorage->quantity}}" required autocomplete="{{$listStorage->quantity}}" autofocus>

                                            @error('quantity')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </td>

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
                                            {{ __('Добавити роботу в зміні') }}
                                        </button>
                                    </p>
                                    <p>
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Зберегти') }}
                                        </button>
                                    </p>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


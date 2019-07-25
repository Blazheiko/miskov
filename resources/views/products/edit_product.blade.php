@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Редагування продукції') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ '/product/'.$product->id}}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Артикул') }}</label>

                                <div class="col-md-8">
                                    <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{$product->code}}" required autocomplete="code" autofocus>

                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Назва') }}</label>

                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$product->name}}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="discr" class="col-md-4 col-form-label text-md-right">{{ __('Опис') }}</label>

                                <div class="col-md-8">
                                    <input id="discr" type="text" class="form-control @error('discr') is-invalid @enderror" name="discr" value="{{ $product->discr }}" required autocomplete="discr" autofocus>

                                    @error('discr')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="packing" class="col-md-4 col-form-label text-md-right">{{ __('Фасування уп.кг') }}</label>

                                <div class="col-md-8">
                                    <input id="packing" type="text" class="form-control @error('packing') is-invalid @enderror" name="packing" value="{{ $product->packing }}" required autocomplete="packing" autofocus>

                                    @error('packing')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Ціна грн.кг') }}</label>

                                <div class="col-md-8">
                                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}" required autocomplete="price" autofocus>

                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <p> Редагував: {{$creator->name}}</p>
                                    <p> Дата створення:{{$product->created_at}} </p>
                                    <p> Дата редагування:{{$product->updated_at}} </p>
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




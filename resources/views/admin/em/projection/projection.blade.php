@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Proyección') }}</div>

                <div class="card-body">
                    @if($method == 'create')
                        <form method="POST" action="{{ route('proyeccion.store') }}">
                        @csrf
                    @elseif($method == 'edit')
                        <form method="POST" action="{{ route('proyeccion.update', $projection->id) }}">
                        @csrf
                            {{ method_field('PUT') }}
                    @endif

                        <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Año') }}</label>

                            <div class="col-md-6">
                                <input id="year" type="number" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year" value="{{ old('year', $projection->year) }}" placeholder="2018" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('year'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="demand" class="col-md-4 col-form-label text-md-right">{{ __('Demanda') }}</label>

                            <div class="col-md-6">
                                <input id="demand" type="number" class="form-control{{ $errors->has('demand') ? ' is-invalid' : '' }}" name="demand" value="{{ old('demand', $projection->demand) }}" step="0.01" placeholder="99.00" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('demand'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('demand') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="offer" class="col-md-4 col-form-label text-md-right">{{ __('Oferta') }}</label>

                            <div class="col-md-6">
                                <input id="offer" type="number" class="form-control{{ $errors->has('offer') ? ' is-invalid' : '' }}" name="offer" value="{{ old('offer', $projection->offer) }}" placeholder="99.00" step="0.01" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('offer'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('offer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Años a Proyectar') }}</label>

                            <div class="col-md-6">
                                <input id="number" type="number" class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}" name="number" value="{{ old('number', $projection->number) }}" step="0.01" placeholder="Desde 1 hasta 10" max="10" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('number'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if($method == 'create' || $method == 'edit')
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Guardar') }}
                                    </button>
                                </div>
                            </div>
                        @elseif($method == 'show')
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a href="{{ route('proyeccion.index') }}" type="button" class="btn btn-primary">
                                        {{ __('Volver a Listado') }}
                                    </a>
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

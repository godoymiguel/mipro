@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Investigación de Campo') }}</div>

                <div class="card-body">
                    @if($method == 'create')
                        <form method="POST" action="{{ route('population.store') }}">
                        @csrf
                    @elseif($method == 'edit')
                        <form method="POST" action="{{ route('population.update', $population->id) }}">
                        @csrf
                            {{ method_field('PUT') }}
                    @endif

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Tamaño de la Población:') }}</label>

                            <div class="col-md-6">
                                <input id="size" type="number" class="form-control{{ $errors->has('size') ? ' is-invalid' : '' }}" name="size" min=0 value="{{ old('size', $population->size) }}" placeholder="1000" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('size'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('size') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="list" class="col-md-4 col-form-label text-md-right">{{ __('Listado de la Población:') }}</label>

                            <div class="col-md-6">
                                <select name="list" class="custom-select" {{$method == 'show' || $method == 'value' ? 'disabled' : null }}>
                                    <option>¿Posee Listado?</option>
                                    <option {{ $population->list == "1" ? 'selected=selected':null}} value="1">SI</option>
                                    <option {{ $population->list == "0" ? 'selected=selected':null}} value="0">NO</option>
                                </select>

                                @if ($errors->has('list'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('list') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sample_point" class="col-md-4 col-form-label text-md-right">{{ __('Puntos Muestrales:') }}</label>

                            <div class="col-md-6">
                                <input id="sample_point" type="number" class="form-control{{ $errors->has('sample_point') ? ' is-invalid' : '' }}" name="sample_point" min=0 value="{{ old('sample_point', $population->sample_point) }}" placeholder="Puntos" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('sample_point'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('sample_point') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="units" class="col-md-4 col-form-label text-md-right">{{ __('Unidades de Análisis:') }}</label>

                            <div class="col-md-6">
                                <input id="units" type="text" class="form-control{{ $errors->has('units') ? ' is-invalid' : '' }}" name="units" min=0 value="{{ old('units', $population->units) }}" placeholder="Unidades" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('units'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('units') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type_sampling" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Muestreo:') }}</label>

                            <div class="col-md-6">
                                <select name="type_sampling" class="custom-select" {{$method == 'show' || $method == 'value' ? 'disabled' : null }}>
                                    <option>Seleccione</option>
                                    <option {{ $population->type_sampling == "PROBABILISTICO" ? 'selected=selected':null}} value="PROBABILISTICO">Probabilistico</option>
                                    <option {{ $population->type_sampling == "NO_PROBABILISTICO" ? 'selected=selected':null}} value="NO_PROBABILISTICO">No Probabilistico</option>
                                </select>

                                @if ($errors->has('type_sampling'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('type_sampling') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Conoce la Población:') }}</label>

                            <div class="col-md-6">
                                <select name="know_population" class="custom-select" {{$method == 'show' || $method == 'value' ? 'disabled' : null }}>
                                    <option>Seleccione</option>
                                    <option {{ $population->know_population == "1" ? 'selected=selected':null}} value="1">SI</option>
                                    <option {{ $population->know_population == "0" ? 'selected=selected':null}} value="0">NO</option>
                                </select>

                                @if ($errors->has('know_population'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('know_population') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="proportion" class="col-md-4 col-form-label text-md-right">{{ __('Proporción a Favor:') }}</label>

                            <div class="col-md-6">
                                <input id="proportion" type="number" class="form-control{{ $errors->has('proportion') ? ' is-invalid' : '' }}" name="proportion" min=0 value="{{ old('proportion', $population->proportion) }}" placeholder="Expresada en porcentaje %" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('proportion'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('proportion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="level" class="col-md-4 col-form-label text-md-right">{{ __('Nivel de Confianza:') }}</label>

                            <div class="col-md-6">
                                <input id="level" type="number" class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}" name="level" min=0 value="{{ old('level', $population->level) }}" placeholder="Expresada en porcentaje %" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('level'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="error" class="col-md-4 col-form-label text-md-right">{{ __('Error Máximo:') }}</label>

                            <div class="col-md-6">
                                <input id="error" type="number" class="form-control{{ $errors->has('error') ? ' is-invalid' : '' }}" name="error" min=0 value="{{ old('error', $population->error) }}" placeholder="Expresada en porcentaje %" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('error'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('error') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input type="hidden" name="investigation_id" value="{{ $investigation->id }}">

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
                                    <a href="{{ route('population.index') }}" type="button" class="btn btn-primary">
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

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('PASTEL') }}</div>

                <div class="card-body">
                    @if($method == 'create')
                        <form method="POST" action="{{ route('pastel.store') }}">
                        @csrf
                    @elseif($method == 'edit' || $method == 'value')
                        <form method="POST" action="{{ route('pastel.update', $pastel->id) }}">
                        @csrf
                            {{ method_field('PUT') }}
                    @endif

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Variable') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title', $pastel->title) }}" placeholder="Variable del Factor" required autofocus {{$method == 'show' || $method == 'value' ? 'disabled' : null }}>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="factor" class="col-md-4 col-form-label text-md-right">{{ __('Factor') }}</label>

                            <div class="col-md-6">
                                <select name="factor" class="custom-select" {{$method == 'show' || $method == 'value' ? 'disabled' : null }}>
                                    <option>Seleccione Factor</option>
                                    <option {{ $pastel->factor == "P" ? 'selected=selected':null}} value="P">Político</option>
                                    <option {{ $pastel->factor == "A" ? 'selected=selected':null}} value="A">Ambiental</option>
                                    <option {{ $pastel->factor == "S" ? 'selected=selected':null}} value="S">SocioCultural</option>
                                    <option {{ $pastel->factor == "T" ? 'selected=selected':null}} value="T">Tecnológico</option>
                                    <option {{ $pastel->factor == "E" ? 'selected=selected':null}} value="E">Económico</option>
                                    <option {{ $pastel->factor == "S" ? 'selected=selected':null}} value="S">Legal</option>
                                </select>

                                @if ($errors->has('factor'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('factor') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if($method == 'show' || $method == 'value')
                            <div class="form-group row">
                                <label for="value" class="col-md-4 col-form-label text-md-right">{{ __('Valorar') }}</label>

                                <div class="col-md-6">
                                    <select name="value" class="custom-select" {{$method == 'show' ? 'disabled' : null }}>
                                        <option>Seleccione</option>
                                        <option {{ $pastel->value == 5 ? 'selected=selected':null}} value= 5 >Muy Negativo</option>
                                        <option {{ $pastel->value == 4 ? 'selected=selected':null}} value= 4 >Negativo</option>
                                        <option {{ $pastel->value == 3 ? 'selected=selected':null}} value= 3 >Neutral</option>
                                        <option {{ $pastel->value == 2 ? 'selected=selected':null}} value= 2 >Positivo</option>
                                        <option {{ $pastel->value == 1 ? 'selected=selected':null}} value= 1 >Muy Positivo</option>
                                    </select>

                                    @if ($errors->has('value'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('value') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="justification" class="col-md-4 col-form-label text-md-right">{{ __('Justificación') }}</label>

                                <div class="col-md-6">
                                    <input id="justification" type="text" class="form-control{{ $errors->has('justification') ? ' is-invalid' : '' }}" name="justification" value="{{ old('justification', $pastel->justification) }}" placeholder="Justifique su valoración" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                    @if ($errors->has('justification'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('justification') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif

                        @if($method == 'create' || $method == 'edit' || $method == 'value')
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
                                    <a href="{{ route('pastel.index') }}" type="button" class="btn btn-primary">
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

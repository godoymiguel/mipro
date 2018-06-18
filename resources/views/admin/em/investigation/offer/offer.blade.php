@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Investigación de Campo') }}</div>

                <div class="card-body">
                    @if($method == 'create')
                        <form method="POST" action="{{ route('offer.store') }}">
                        @csrf
                    @elseif($method == 'edit')
                        <form method="POST" action="{{ route('offer.update', $investigation->offer->id) }}">
                        @csrf
                            {{ method_field('PUT') }}
                    @endif

                        <div class="form-group row">
                            <label for="competitors" class="col-md-4 col-form-label text-md-right">{{ __('Nro de competidores directos e indirectos') }}</label>

                            <div class="col-md-6">
                                <input id="competitors" type="number" class="form-control{{ $errors->has('competitors') ? ' is-invalid' : '' }}" name="competitors" min=0 value="{{ old('competitors', $investigation->offer->competitors) }}" placeholder="1000" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('competitors'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('competitors') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="capacity" class="col-md-4 col-form-label text-md-right">{{ __('Capacidad anual promedio/competidor') }}</label>

                            <div class="col-md-6">
                                <input id="capacity" type="number" class="form-control{{ $errors->has('capacity') ? ' is-invalid' : '' }}" name="capacity" min=0 value="{{ old('capacity', $investigation->offer->capacity) }}" placeholder="1000" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('capacity'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('capacity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="people_served" class="col-md-4 col-form-label text-md-right">{{ __('Personas atendidas promedio/año') }}</label>

                            <div class="col-md-6">
                                <input id="people_served" type="number" class="form-control{{ $errors->has('people_served') ? ' is-invalid' : '' }}" name="people_served" min=0 value="{{ old('people_served', $investigation->offer->people_served) }}" placeholder="1000" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('people_served'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('people_served') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rate" class="col-md-4 col-form-label text-md-right">{{ __('Tasa de crecimiento oferta (defecto pib interanual)') }}</label>

                            <div class="col-md-6">
                                <input id="rate" type="number" class="form-control{{ $errors->has('rate') ? ' is-invalid' : '' }}" name="rate" min=0 step="0.01" value="{{ old('rate', $investigation->offer->rate) }}" placeholder="1000" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('rate'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('rate') }}</strong>
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
                                    <a href="{{ route('offer.index') }}" type="button" class="btn btn-primary">
                                        {{ __('Volver') }}
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

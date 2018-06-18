@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Investigación de Campo') }}</div>

                <div class="card-body">
                    @if($method == 'create')
                        <form method="POST" action="{{ route('demand.store') }}">
                        @csrf
                    @elseif($method == 'edit')
                        <form method="POST" action="{{ route('demand.update', $investigation->demand->id) }}">
                        @csrf
                            {{ method_field('PUT') }}
                    @endif

                        <div class="form-group row">
                            <label for="total_population" class="col-md-4 col-form-label text-md-right">{{ __('Población Total (País,Estado,Municipio)') }}</label>

                            <div class="col-md-6">
                                <input id="total_population" type="number" class="form-control{{ $errors->has('total_population') ? ' is-invalid' : '' }}" name="total_population" min=0 value="{{ old('total_population', $investigation->demand->total_population) }}" placeholder="1000" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('total_population'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('total_population') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total_detail" class="col-md-4 col-form-label text-md-right">{{ __('Detalle') }}</label>

                            <div class="col-md-6">
                                <input id="total_detail" type="text" class="form-control{{ $errors->has('total_detail') ? ' is-invalid' : '' }}" name="total_detail" min=0 value="{{ old('total_detail', $investigation->demand->total_detail) }}" placeholder="Estado Mérida" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('total_detail'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('total_detail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="population" class="col-md-4 col-form-label text-md-right">{{ __('% Población vive en aŕea de interés') }}</label>

                            <div class="col-md-6">
                                <input id="population" type="number" class="form-control{{ $errors->has('population') ? ' is-invalid' : '' }}" name="population" min=0 value="{{ old('population', $investigation->demand->population) }}" placeholder="1000" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('population'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('population') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="population_detail" class="col-md-4 col-form-label text-md-right">{{ __('Detalle') }}</label>

                            <div class="col-md-6">
                                <input id="population_detail" type="text" class="form-control{{ $errors->has('population_detail') ? ' is-invalid' : '' }}" name="population_detail" min=0 value="{{ old('population_detail', $investigation->demand->population_detail) }}" placeholder="Estado Mérida" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('population_detail'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('population_detail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('% Rango de edad en el área de interés') }}</label>

                            <div class="col-md-6">
                                <input id="age" type="number" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" min=0 value="{{ old('age', $investigation->demand->age) }}" placeholder="1000" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('age'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="age_detail" class="col-md-4 col-form-label text-md-right">{{ __('Detalle') }}</label>

                            <div class="col-md-6">
                                <input id="age_detail" type="text" class="form-control{{ $errors->has('age_detail') ? ' is-invalid' : '' }}" name="age_detail" min=0 value="{{ old('age_detail', $investigation->demand->age_detail) }}" placeholder="Estado Mérida" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('age_detail'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('age_detail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="interested" class="col-md-4 col-form-label text-md-right">{{ __('% Interesado') }}</label>

                            <div class="col-md-6">
                                <input id="interested" type="number" class="form-control{{ $errors->has('interested') ? ' is-invalid' : '' }}" name="interested" min=0 value="{{ old('interested', $investigation->demand->interested) }}" placeholder="1000" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('interested'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('interested') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="interested_detail" class="col-md-4 col-form-label text-md-right">{{ __('Detalle') }}</label>

                            <div class="col-md-6">
                                <input id="interested_detail" type="text" class="form-control{{ $errors->has('interested_detail') ? ' is-invalid' : '' }}" name="interested_detail" min=0 value="{{ old('interested_detail', $investigation->demand->interested_detail) }}" placeholder="Estado Mérida" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('interested_detail'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('interested_detail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="buy" class="col-md-4 col-form-label text-md-right">{{ __('% Realmente compraría el bien o servicio') }}</label>

                            <div class="col-md-6">
                                <input id="buy" type="number" class="form-control{{ $errors->has('buy') ? ' is-invalid' : '' }}" name="buy" min=0 value="{{ old('buy', $investigation->demand->buy) }}" placeholder="1000" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('buy'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('buy') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="buy_detail" class="col-md-4 col-form-label text-md-right">{{ __('Detalle') }}</label>

                            <div class="col-md-6">
                                <input id="buy_detail" type="text" class="form-control{{ $errors->has('buy_detail') ? ' is-invalid' : '' }}" name="buy_detail" min=0 value="{{ old('buy_detail', $investigation->demand->buy_detail) }}" placeholder="Estado Mérida" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('buy_detail'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('buy_detail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="entry" class="col-md-4 col-form-label text-md-right">{{ __('% Ingreso suficiente') }}</label>

                            <div class="col-md-6">
                                <input id="entry" type="number" class="form-control{{ $errors->has('entry') ? ' is-invalid' : '' }}" name="entry" min=0 value="{{ old('entry', $investigation->demand->entry) }}" placeholder="1000" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('entry'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('entry') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="entry_detail" class="col-md-4 col-form-label text-md-right">{{ __('Detalle') }}</label>

                            <div class="col-md-6">
                                <input id="entry_detail" type="text" class="form-control{{ $errors->has('entry_detail') ? ' is-invalid' : '' }}" name="entry_detail" min=0 value="{{ old('entry_detail', $investigation->demand->entry_detail) }}" placeholder="Estado Mérida" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('entry_detail'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('entry_detail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cup" class="col-md-4 col-form-label text-md-right">{{ __('Tasa de crecimiento poblacional interanual') }}</label>

                            <div class="col-md-6">
                                <input id="cup" type="number" step="0.01"class="form-control{{ $errors->has('cup') ? ' is-invalid' : '' }}" name="cup" min=0 value="{{ old('cup', $investigation->demand->cup) }}" placeholder="1000" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('cup'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cup') }}</strong>
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
                                    <a href="{{ route('demand.index') }}" type="button" class="btn btn-primary">
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

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Serie Temporal') }}</div>

                <div class="card-body">
                    @if($method == 'create')
                        <form method="POST" action="{{ route('serietemporal.store') }}">
                        @csrf
                    @elseif($method == 'edit')
                        <form method="POST" action="{{ route('serietemporal.update', $timeSerie->id) }}">
                        @csrf
                            {{ method_field('PUT') }}
                    @endif

                        <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Año') }}</label>

                            <div class="col-md-6">
                                <input id="year" type="number" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year" value="{{ old('year', $timeSerie->year) }}" placeholder="2018" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('year'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="production" class="col-md-4 col-form-label text-md-right">{{ __('Producción') }}</label>

                            <div class="col-md-6">
                                <input id="production" type="number" class="form-control{{ $errors->has('production') ? ' is-invalid' : '' }}" name="production" value="{{ old('production', $timeSerie->production) }}" step="0.01" placeholder="99.00" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('production'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('production') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="import" class="col-md-4 col-form-label text-md-right">{{ __('Importaciones') }}</label>

                            <div class="col-md-6">
                                <input id="import" type="number" class="form-control{{ $errors->has('import') ? ' is-invalid' : '' }}" name="import" value="{{ old('import', $timeSerie->import) }}" placeholder="99.00" step="0.01" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('import'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('import') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="existence" class="col-md-4 col-form-label text-md-right">{{ __('Var. Existencia') }}</label>

                            <div class="col-md-6">
                                <input id="existence" type="number" class="form-control{{ $errors->has('existence') ? ' is-invalid' : '' }}" name="existence" value="{{ old('existence', $timeSerie->existence) }}" step="0.01" placeholder="99.00" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('existence'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('existence') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="export" class="col-md-4 col-form-label text-md-right">{{ __('Exportación') }}</label>

                            <div class="col-md-6">
                                <input id="export" type="number" class="form-control{{ $errors->has('export') ? ' is-invalid' : '' }}" name="export" value="{{ old('export', $timeSerie->export) }}" placeholder="99.00" step="0.01" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('export'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('export') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="population" class="col-md-4 col-form-label text-md-right">{{ __('Población') }}</label>

                            <div class="col-md-6">
                                <input id="population" type="number" class="form-control{{ $errors->has('population') ? ' is-invalid' : '' }}" name="population" value="{{ old('population', $timeSerie->population) }}" step="0.01" placeholder="99.00" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('population'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('population') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price', $timeSerie->price) }}" placeholder="99.00" step="0.01" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="real_income" class="col-md-4 col-form-label text-md-right">{{ __('Ingreso Real') }}</label>

                            <div class="col-md-6">
                                <input id="real_income" type="number" class="form-control{{ $errors->has('real_income') ? ' is-invalid' : '' }}" name="real_income" value="{{ old('real_income', $timeSerie->real_income) }}" step="0.01" placeholder="99.00" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('real_income'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('real_income') }}</strong>
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
                                    <a href="{{ route('serietemporal.index') }}" type="button" class="btn btn-primary">
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

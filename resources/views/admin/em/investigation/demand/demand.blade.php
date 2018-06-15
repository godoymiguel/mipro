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
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Población Total (País,Estado,Municipio)') }}</label>

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
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Población Total (País,Estado,Municipio)') }}</label>

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
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Población Total (País,Estado,Municipio)') }}</label>

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

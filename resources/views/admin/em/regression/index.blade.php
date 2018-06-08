@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Regresión') }}</div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <a href="{{ route('regresion.create') }}" type="button" class="btn btn-primary btn-lg btn-block">Calcular Regresion</a>
                            <br>
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <input id="coefficient_r1" type="text" class="form-control{{ $errors->has('coefficient_r1') ? ' is-invalid' : '' }}" name="coefficient_r1" value="{{ old('coefficient_r1', $regression->coefficient_r1) }}" placeholder="0" readonly>
                                </div>
                                <div class="col-md-9">
                                    <label for="coefficient_r1" class="col-md-2 col-form-label text-md-rigth">
                                        @if($regression->coefficient_r1)
                                            {!!number_format((1 - exp(-$regression->coefficient_r1))*100,2) .'%'!!}
                                        @else
                                            0%
                                        @endif
                                    </label>
                                     <label for="coefficient_r1" class="col-md-9 col-form-label text-md-left">{{ __('Variación porcentual del consumo año tras año') }}</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <input id="coefficient_r2" type="text" class="form-control{{ $errors->has('coefficient_r2') ? ' is-invalid' : '' }}" name="coefficient_r2" value="{{ old('coefficient_r2', $regression->coefficient_r2) }}" placeholder="0" readonly>
                                </div>
                                <div class="col-md-9">
                                    <label for="coefficient_r1" class="col-md-2 col-form-label text-md-rigth">
                                        @if($regression->coefficient_r2)
                                            {!!number_format((1 - exp(-$regression->coefficient_r2))*100,2) .'%'!!}
                                        @else
                                            0%
                                        @endif
                                    </label>
                                     <label for="coefficient_r1" class="col-md-9 col-form-label text-md-left">{{ __('Variación porcentual de la producción año tras año') }}</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <input id="coefficient_r31" type="text" class="form-control{{ $errors->has('coefficient_r31') ? ' is-invalid' : '' }}" name="coefficient_r31" value="{{ old('coefficient_r31', $regression->coefficient_r31) }}" placeholder="0" readonly>
                                </div>
                                <div class="col-md-9">
                                    <label for="coefficient_r1" class="col-md-4 col-form-label text-md-rigth">
                                        @if(abs($regression->coefficient_r31)<1)
                                            {{ __('BIEN INELÁSTICO') }}
                                        @elseif(abs($regression->coefficient_r31)==1)
                                            {{ __('BIEN UNITARIO') }}
                                        @elseif(abs($regression->coefficient_r31)>1)
                                            {{ __('BIEN ELÁSTICO') }}
                                        @endif
                                    </label>
                                     <label for="coefficient_r1" class="col-md-6 col-form-label text-md-left">{{ __('ANTE VARIACIÓN DEL PRECIO') }}</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <input id="coefficient_r32" type="text" class="form-control{{ $errors->has('coefficient_r32') ? ' is-invalid' : '' }}" name="coefficient_r32" value="{{ old('coefficient_r32', $regression->coefficient_r32) }}" placeholder="0" readonly>
                                </div>
                                <div class="col-md-9">
                                    <label for="coefficient_r1" class="col-md-4 col-form-label text-md-rigth">
                                        @if(abs($regression->coefficient_r32)<1)
                                            {{ __('BIEN INFERIOR') }}
                                        @elseif(abs($regression->coefficient_r32)==1)
                                            {{ __('BIEN NORMAL') }}
                                        @elseif(abs($regression->coefficient_r32)>1)
                                            {{ __('BIEN SUPERIOR') }}
                                        @endif
                                    </label>
                                     <label for="coefficient_r1" class="col-md-6 col-form-label text-md-left">{{ __('ANTE VARIACIÓN DE INGRESO') }}</label>
                                </div>
                            </div>

                            <a href="{{ route('proyeccion.index') }}" type="button" class="btn btn-primary btn-lg btn-block">Proyección</a>
                            <br>
                            
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
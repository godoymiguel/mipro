@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Investigación de Campo') }}</div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-md-4">
                                     <label for="coefficient_r1" class="col-md-12 col-form-label text-md-right">{{ __('Objetivos:') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" rows="5" placeholder="Escriba aqui..." required autofocus disabled>{{ old('title', $investigation->title) }}</textarea>
                                </div>                                
                            </div>
                            
                            @if($investigation == null)
                                <a href="{{ route('investigation.create') }}" type="button" class="btn btn-primary btn-md btn-block">Llenar Ficha</a>
                            @else
                                <a href="{{ route('investigation.edit',$investigation->id) }}" type="button" class="btn btn-primary btn-md btn-block">Editar Objetivos</a>
                            @endif
                            @foreach($population as $key => $value)
                            <br><hr>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="coefficient_r1" class="col-md-12 col-form-label text-md-left"><strong>
                                        @if($value->population == 'P1')
                                            {{ __('Población 1') }}
                                        @else
                                            {{ __('Población 2') }}
                                        @endif
                                    </strong></label>
                                </div>                             
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="coefficient_r1" class="col-md-12 col-form-label text-md-left">{{ __('Tamaño de la Población:') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="coefficient_r1" class="col-md-12 col-form-label">{{ $investigation->title }}</label>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="coefficient_r1" class="col-md-12 col-form-label text-md-left">{{ __('Listado de la Población:') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="coefficient_r1" class="col-md-12 col-form-label">{{ $investigation->title }}</label>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="coefficient_r1" class="col-md-12 col-form-label text-md-left">{{ __('Puntos Muestrales:') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="coefficient_r1" class="col-md-12 col-form-label">{{ $investigation->title }}</label>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="coefficient_r1" class="col-md-12 col-form-label text-md-left">{{ __('Unidades de Análisis:') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="coefficient_r1" class="col-md-12 col-form-label">{{ $investigation->title }}</label>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="coefficient_r1" class="col-md-12 col-form-label text-md-left">{{ __('Tipo de Muestreo:') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="coefficient_r1" class="col-md-12 col-form-label">{{ $investigation->title }}</label>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="coefficient_r1" class="col-md-12 col-form-label text-md-left">{{ __('Conoces la Población:') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="coefficient_r1" class="col-md-12 col-form-label">{{ $investigation->title }}</label>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="coefficient_r1" class="col-md-12 col-form-label text-md-left">{{ __('Proporción a Favor:') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="coefficient_r1" class="col-md-12 col-form-label">{{ $investigation->title }}</label>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="coefficient_r1" class="col-md-12 col-form-label text-md-left">{{ __('Nivel de Confianza:') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="coefficient_r1" class="col-md-12 col-form-label">{{ $investigation->title }}</label>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="coefficient_r1" class="col-md-12 col-form-label text-md-left">{{ __('Error Máximo:') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="coefficient_r1" class="col-md-12 col-form-label">{{ $investigation->title }}</label>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="coefficient_r1" class="col-md-12 col-form-label text-md-left">{{ __('Tamaño de la Muestra:') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="coefficient_r1" class="col-md-12 col-form-label">{{ $investigation->title }}</label>
                                </div>                                
                            </div>
                            <a href="{{ route('investigation.edit',$investigation->id) }}" type="button" class="btn btn-primary btn-md btn-block">Editar Datos de Población</a>
                            @endforeach
                            @if($population->count() < 2)
                                <a href="{{ route('population.create') }}" type="button" class="btn btn-primary btn-md btn-block">Agregar Datos de Población</a>
                                
                            @endif
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
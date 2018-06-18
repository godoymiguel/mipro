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
                            @foreach($investigation->populations as $key => $value)
                            <br><hr>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="population" class="col-md-12 col-form-label text-md-left"><strong>{{ __('Población '. ($key+1)) }}</strong></label>
                                </div>                             
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="size" class="col-md-12 col-form-label text-md-left">{{ __('Tamaño de la Población:') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="size" class="col-md-12 col-form-label">{{ $value->size }}</label>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="list" class="col-md-12 col-form-label text-md-left">{{ __('Listado de la Población:') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="list" class="col-md-12 col-form-label">
                                        @if($value->list == 1) Si Tiene
                                        @else No Tiene
                                        @endif
                                    </label>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="sample_point" class="col-md-12 col-form-label text-md-left">{{ __('Puntos Muestrales:') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="sample_point" class="col-md-12 col-form-label">{{ $value->sample_point }}</label>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="units" class="col-md-12 col-form-label text-md-left">{{ __('Unidades de Análisis:') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="units" class="col-md-12 col-form-label">{{ $value->units }}</label>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="type_sampling" class="col-md-12 col-form-label text-md-left">{{ __('Tipo de Muestreo:') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="type_sampling" class="col-md-12 col-form-label">@if($value->type_sampling == 'PROBABILISTICO') Probabilistico
                                        @else No Probabilistico
                                        @endif</label>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="know_population" class="col-md-12 col-form-label text-md-left">{{ __('Conoces la Población:') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="know_population" class="col-md-12 col-form-label">
                                        @if($value->know_population == 1) Si
                                        @else No
                                        @endif
                                    </label>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="proportion" class="col-md-12 col-form-label text-md-left">{{ __('Proporción a Favor:') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="proportion" class="col-md-12 col-form-label">{{ $value->proportion }} %</label>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="level" class="col-md-12 col-form-label text-md-left">{{ __('Nivel de Confianza:') }} %</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="level" class="col-md-12 col-form-label">{{ $value->level }} %</label>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="error" class="col-md-12 col-form-label text-md-left">{{ __('Error Máximo:') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="error" class="col-md-12 col-form-label">{{ $value->error }} %</label>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="sample_size" class="col-md-12 col-form-label text-md-left">{{ __('Tamaño de la Muestra:') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="sample_size" class="col-md-12 col-form-label">{{ $value->sample_size }}</label>
                                </div>                                
                            </div>
                            <a href="{{ route('population.edit',$value->id) }}" type="button" class="btn btn-primary btn-md btn-block">Editar Datos de Población</a>
                            @endforeach
                            <hr>
                            @if($investigation->populations->count() < 2)
                                <a href="{{ route('population.create') }}" type="button" class="btn btn-primary btn-md btn-block">Agregar Datos de Población</a>
                            @else
                                <a href="{{ route('demand.index') }}" type="button" class="btn btn-primary btn-md btn-block">Demanda</a>
                                <a href="{{ route('offer.index') }}" type="button" class="btn btn-primary btn-md btn-block">Oferta</a>
                            @endif
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
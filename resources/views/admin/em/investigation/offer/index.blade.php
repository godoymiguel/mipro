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
                            @if($investigation->offer == null)
                                <a href="{{ route('offer.create') }}" type="button" class="btn btn-primary btn-md btn-block">Llenar Oferta</a>
                            @else
                                <a href="{{ route('offer.edit',$investigation->offer->id) }}" type="button" class="btn btn-primary btn-md btn-block">Editar Oferta</a>
                            @endif

                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="competitors" class="col-md-12 col-form-label text-md-left">{{ __('Nro de competidores directos e indirectos') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="competitors" class="col-md-12 col-form-label">{{ $investigation->offer->competitors }}</label>
                                </div>                                
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="capacity" class="col-md-12 col-form-label text-md-left">{{ __('Capacidad anual promedio/competidor') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="capacity" class="col-md-12 col-form-label">{{ $investigation->offer->capacity }}</label>
                                </div>                                
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="people_served" class="col-md-12 col-form-label text-md-left">{{ __('Personas atendidas promedio/año') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="people_served" class="col-md-12 col-form-label">{{ $investigation->offer->people_served }}</label>
                                </div>                                
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="rate" class="col-md-12 col-form-label text-md-left">{{ __('Tasa de crecimiento oferta (defecto pib interanual)') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="rate" class="col-md-12 col-form-label">{{ $investigation->offer->rate }} %</label>
                                </div>                                
                            </div>

                            <hr>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="offer" class="col-md-12 col-form-label text-md-left">{{ __('OFERTA') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="offer" class="col-md-12 col-form-label">{{ $investigation->offer->offer }}</label>
                                </div>                                
                            </div>

                            <hr>
                            <a href="{{ route('investigation.index') }}" type="button" class="btn btn-primary btn-md btn-block">Investigacion</a>
                            <a href="{{ route('demand.index') }}" type="button" class="btn btn-primary btn-md btn-block">Demanda</a>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
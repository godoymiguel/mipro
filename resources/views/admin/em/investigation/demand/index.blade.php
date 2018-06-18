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
                            @if($investigation->demand == null)
                                <a href="{{ route('demand.create') }}" type="button" class="btn btn-primary btn-md btn-block">Llenar Demanda</a>
                            @else
                                <a href="{{ route('demand.edit',$investigation->demand->id) }}" type="button" class="btn btn-primary btn-md btn-block">Editar Demanda</a>
                            @endif

                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="total_population" class="col-md-12 col-form-label text-md-left">{{ __('Población Total (País,Estado,Municipio)') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="total_population" class="col-md-12 col-form-label">{{ $investigation->demand->total_population }}</label>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                     <label for="total_detail" class="col-md-12 col-form-label text-md-left">{{ __('Detalle:') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <label for="total_detail" class="col-md-12 col-form-label">{{ $investigation->demand->total_detail }}</label>
                                </div>                                
                            </div>
                            
                            <br>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="population" class="col-md-12 col-form-label text-md-left">{{ __('% Población vive en aŕea de interés') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="population" class="col-md-12 col-form-label">{{ $investigation->demand->population }} %</label>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                     <label for="population_detail" class="col-md-12 col-form-label text-md-left">{{ __('Detalle:') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <label for="population_detail" class="col-md-12 col-form-label">{{ $investigation->demand->population_detail }}</label>
                                </div>                                
                            </div>

                            <br>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="age" class="col-md-12 col-form-label text-md-left">{{ __('% Rango de edad en el área de interés') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="age" class="col-md-12 col-form-label">{{ $investigation->demand->age }} %</label>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                     <label for="age_detail" class="col-md-12 col-form-label text-md-left">{{ __('Detalle:') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <label for="age_detail" class="col-md-12 col-form-label">{{ $investigation->demand->age_detail }}</label>
                                </div>                                
                            </div>

                            <br>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="interested" class="col-md-12 col-form-label text-md-left">{{ __('% Interesado') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="interested" class="col-md-12 col-form-label">{{ $investigation->demand->interested }} %</label>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                     <label for="interested_detail" class="col-md-12 col-form-label text-md-left">{{ __('Detalle:') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <label for="interested_detail" class="col-md-12 col-form-label">{{ $investigation->demand->interested_detail }}</label>
                                </div>                                
                            </div>

                            <br>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="potential_market" class="col-md-12 col-form-label text-md-left">{{ __('MERCADO POTENCIAL') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="potential_market" class="col-md-12 col-form-label">{{ $investigation->demand->potential_market }}</label>
                                </div>                                
                            </div>

                            <hr>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="buy" class="col-md-12 col-form-label text-md-left">{{ __('% Realmente compraría el bien o servicio') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="buy" class="col-md-12 col-form-label">{{ $investigation->demand->buy }} %</label>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                     <label for="buy_detail" class="col-md-12 col-form-label text-md-left">{{ __('Detalle:') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <label for="buy_detail" class="col-md-12 col-form-label">{{ $investigation->demand->buy_detail }}</label>
                                </div>                                
                            </div>

                            <br>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="available_market" class="col-md-12 col-form-label text-md-left">{{ __('MERCADO DISPONIBLE') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="available_market" class="col-md-12 col-form-label">{{ $investigation->demand->available_market }}</label>
                                </div>                                
                            </div>

                            <hr>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="entry" class="col-md-12 col-form-label text-md-left">{{ __('% Ingreso suficiente') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="entry" class="col-md-12 col-form-label">{{ $investigation->demand->entry }} %</label>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                     <label for="entry_detail" class="col-md-12 col-form-label text-md-left">{{ __('Detalle:') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <label for="entry_detail" class="col-md-12 col-form-label">{{ $investigation->demand->entry_detail }}</label>
                                </div>                                
                            </div>

                            <br>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="qualified_market" class="col-md-12 col-form-label text-md-left">{{ __('MERCADO DISPONIBLE CALIFICADO') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="qualified_market" class="col-md-12 col-form-label">{{ $investigation->demand->qualified_market }}</label>
                                </div>                                
                            </div>

                            <hr>
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="cup" class="col-md-12 col-form-label text-md-left">{{ __('Tasa de crecimiento poblacional interanual') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="cup" class="col-md-12 col-form-label">{{ $investigation->demand->cup }} %</label>
                                </div>                                
                            </div>

                            <hr>
                            <a href="{{ route('investigation.index') }}" type="button" class="btn btn-primary btn-md btn-block">Investigacion</a>
                            <a href="{{ route('offer.index') }}" type="button" class="btn btn-primary btn-md btn-block">Oferta</a>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
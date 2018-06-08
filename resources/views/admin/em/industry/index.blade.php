@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Atractivo de la Industria') }}</div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-md-6">
                                     <label for="coefficient_r1" class="col-md-12 col-form-label text-md-left">{{ __('TIPO DE INDUSTRIA:') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="coefficient_r1" class="col-md-12 col-form-label">{{ $industry->name }}</label>
                                </div>                                
                            </div>


                            <div class="form-group row">
                                <div class="col-md-8">
                                     <label for="coefficient_r1" class="col-md-12 col-form-label text-md-left">{{ __('PODER DE NEGOCIACIÓN DE PROVEEDORES:') }}</label>
                                </div>
                                <div class="col-md-2">
                                    <label for="coefficient_r1" class="col-md-12 col-form-label text-md-left">
                                        @if($industry->suppliers<=1)
                                            {{ __('BAJO') }}
                                        @elseif($industry->suppliers<=2)
                                            {{ __('MEDIO') }}
                                        @elseif($industry->suppliers<=3)
                                            {{ __('ALTO') }}
                                        @endif
                                    </label>
                                </div>                                
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8">
                                     <label for="coefficient_r1" class="col-md-12 col-form-label text-md-left">{{ __('RIVALIDAD DE LOS COMPETIDORES:') }}</label>
                                </div>
                                <div class="col-md-2">
                                    <label for="coefficient_r1" class="col-md-12 col-form-label text-md-left">
                                        @if($industry->competitors<=1)
                                            {{ __('BAJO') }}
                                        @elseif($industry->competitors<=3)
                                            {{ __('MEDIO') }}
                                        @elseif($industry->competitors<=5)
                                            {{ __('ALTO') }}
                                        @endif
                                    </label>
                                </div>                                
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8">
                                     <label for="coefficient_r1" class="col-md-12 col-form-label text-md-left">{{ __('PODER DE NEGOCIACIÓN DE CLIENTES:') }}</label>
                                </div>
                                <div class="col-md-2">
                                    <label for="coefficient_r1" class="col-md-12 col-form-label text-md-left">
                                        @if($industry->consumers<=1)
                                            {{ __('BAJO') }}
                                        @elseif($industry->consumers<=3)
                                            {{ __('MEDIO') }}
                                        @elseif($industry->consumers<=5)
                                            {{ __('ALTO') }}
                                        @endif
                                    </label>
                                </div>                                
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8">
                                     <label for="coefficient_r1" class="col-md-12 col-form-label text-md-left">{{ __('AMENAZA DE NUEVOS COMPETIDORES:') }}</label>
                                </div>
                                <div class="col-md-2">
                                    <label for="coefficient_r1" class="col-md-12 col-form-label text-md-left">
                                        @if($industry->new<=1)
                                            {{ __('BAJO') }}
                                        @elseif($industry->new<=3)
                                            {{ __('MEDIO') }}
                                        @elseif($industry->new<=5)
                                            {{ __('ALTO') }}
                                        @endif</label>
                                </div>                                
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8">
                                     <label for="coefficient_r1" class="col-md-12 col-form-label text-md-left">{{ __('VAMENAZA DE LOS SUSTITUTOS:') }}</label>
                                </div>
                                <div class="col-md-2">
                                    <label for="coefficient_r1" class="col-md-12 col-form-label text-md-left">
                                        @if($industry->substitutes<=1)
                                            {{ __('BAJO') }}
                                        @elseif($industry->substitutes<=3)
                                            {{ __('MEDIO') }}
                                        @elseif($industry->substitutes<=5)
                                            {{ __('ALTO') }}
                                        @endif
                                    </label>
                                </div>                                
                            </div>

                            <div class="form-group row"> 
                                <div class="col-md-6">
                                     <label for="coefficient_r1" class="col-md-12 col-form-label text-md-left">{{ __('ATRACTIVO:') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <label for="coefficient_r1" class="col-md-12 col-form-label text-md-left">
                                        @if($attractive<=1)
                                            {{ __('ALTO') }}
                                        @elseif($attractive<=3)
                                            {{ __('MEDIO') }}
                                        @elseif($attractive<=5)
                                            {{ __('BAJO') }}
                                        @endif
                                    </label>
                                </div>
                            </div>
                            <br>
                            @if($industry == null)
                                <a href="{{ route('industry.create') }}" type="button" class="btn btn-primary btn-lg btn-block">Crear Industria</a>
                            @else
                                <a href="{{ route('criterionIndustry.index') }}" type="button" class="btn btn-primary btn-lg btn-block">Editar Criterios</a>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
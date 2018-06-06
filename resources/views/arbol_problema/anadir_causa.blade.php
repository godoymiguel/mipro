@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Añadir Causas y Efectos') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('causas.store') }}">
                        @csrf
                        <p><h3 style="text-align:center">Añadir causas y efectos</h3></p>
                        
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Causa Directa') }}</label>
                            <div class="col-md-6">
                                <input id="causa_directa" type="text" class="form-control{{ $errors->has('causa_directa') ? ' is-invalid' : '' }}" name="causa_directa" value="{{ old('causa_directa') }}" required autofocus>
                                @if ($errors->has('causa_directa'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('causa_directa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Causa Indirecta') }}</label>
                            <div class="col-md-6">
                                <input id="causa_indirecta" type="text" class="form-control{{ $errors->has('causa_indirecta') ? ' is-invalid' : '' }}" name="causa_indirecta" value="{{ old('causa_indirecta') }}" required autofocus>
                                @if ($errors->has('causa_indirecta'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('causa_indirecta') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="efecto_directo" class="col-md-4 col-form-label text-md-right">{{ __('Efecto Directo') }}</label>
                            <div class="col-md-6">
                                <input id="efecto_directo" type="text" class="form-control{{ $errors->has('efecto_directo') ? ' is-invalid' : '' }}" name="efecto_directo" value="{{ old('efecto_directo') }}" required autofocus>
                                @if ($errors->has('efecto_directo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('efecto_directo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                            
                            
                        
                        <div class="form-group row">
                            <label for="efecto_indirecto" class="col-md-4 col-form-label text-md-right">{{ __('Efecto Indirecto') }}</label>
                            <div class="col-md-6">
                                <input id="efecto_indirecto" type="text" class="form-control{{ $errors->has('efecto_indirecto') ? ' is-invalid' : '' }}" name="efecto_indirecto" value="{{ old('efecto_indirecto') }}" required autofocus>
                                @if ($errors->has('efecto_indirecto'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('efecto_indirecto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                        
                       <div class="form-group row">
                            <label for="causa_raiz" class="col-md-4 col-form-label text-md-right">{{ __('Causa Raiz') }}</label>
                            <div class="col-md-6">
                                <input id="causa_raiz" type="text" class="form-control{{ $errors->has('causa_raiz') ? ' is-invalid' : '' }}" name="causa_raiz" value="{{ old('causa_raiz') }}" required autofocus>
                                @if ($errors->has('causa_raiz'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('causa_raiz') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                       
                        
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                 <a href="{{ route('idea') }}" type="button" class="btn btn-primary">
                                        {{ __('Cancelar ') }}</a>
                                <button class="btn btn-primary" type="summit">
                                        {{ __('Guardar ') }}</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

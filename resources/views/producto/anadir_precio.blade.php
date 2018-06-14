@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Descripción del Producto') }}</div>
				
                <div class="card-body">
                    @if($method == 'create')
                        <form method="POST" action="{{ route('producto.store') }}">
                        @csrf
                    @elseif($method == 'edit')
                        <form method="POST" action="{{ route('producto.update', $prod->id) }}">
                        @csrf
                            {{ method_field('PUT') }}
                    @endif	
                     
						
					     <div class="form-group row">
                            <label for="basico" class="col-md-4 col-form-label text-md-right">{{ __('Producto Básico') }}</label>
                            <div class="col-md-6">
                               <p><textarea id="basico" cols="19.5" rows="5" class="form-control{{ $errors->has('basico') ? ' is-invalid' : '' }}" name="basico" required autofocus>{{ old('basico', $prod->basico) }}</textarea></p>
                                @if ($errors->has('basico'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('basico') }}</strong>
                                    </span>
                                @endif                                
                               </div>
                            </div> 
                            
                            
                          <div class="form-group row">
                            <label for="aumentado" class="col-md-4 col-form-label text-md-right">{{ __('Producto Aumentado') }}</label>
                            <div class="col-md-6">
                               <p><textarea id="aumentado" cols="19.5" rows="5" class="form-control{{ $errors->has('aumentado') ? ' is-invalid' : '' }}" name="aumentado" value="{{ old('aumentado') }}" required autofocus>{{ old('aumentado', $prod->aumentado) }}</textarea></p>
                                @if ($errors->has('aumentado'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('aumentado') }}</strong>
                                    </span>
                                @endif
                             </div>
                         </div> 
                         
                         <div class="form-group row">
                            <label for="psicologico" class="col-md-4 col-form-label text-md-right">{{ __('Producto Psicológico') }}</label>
                            <div class="col-md-6">
                               <p><textarea id="psicologico" cols="19.5" rows="5" class="form-control{{ $errors->has('psicologico') ? ' is-invalid' : '' }}" name="psicologico" value="{{ old('psicologico') }}" required autofocus>{{ old('psicologico', $prod->psicologico) }}</textarea></p>
                                @if ($errors->has('psicologico'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('psicologico') }}</strong>
                                    </span>
                                @endif
                             </div>
                         </div>   
                         
                         <div class="form-group row">
                            <label for="comparativa" class="col-md-4 col-form-label text-md-right">{{ __('Ventaja Comparativa') }}</label>
                            <div class="col-md-6">
                               <p><textarea id="comparativa" cols="19.5" rows="5" class="form-control{{ $errors->has('comparativa') ? ' is-invalid' : '' }}" name="comparativa" value="{{ old('comparativa') }}" required autofocus>{{ old('comparativa', $prod->comparativa) }}</textarea></p>
                                @if ($errors->has('comparativa'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('comparativa') }}</strong>
                                    </span>
                                @endif
                             </div>
                         </div>  
						 
						 <div class="form-group row">
                            <label for="competitiva" class="col-md-4 col-form-label text-md-right">{{ __('Ventaja Competitiva') }}</label>
                            <div class="col-md-6">
                               <p><textarea id="comparativa" cols="19.5" rows="5" class="form-control{{ $errors->has('competitiva') ? ' is-invalid' : '' }}" name="competitiva" value="{{ old('competitiva') }}" required autofocus>{{ old('competitiva', $prod->competitiva) }}</textarea></p>
                                @if ($errors->has('comparativa'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('competitiva') }}</strong>
                                    </span>
                                @endif
                             </div>
                         </div>   

						@if($method == 'create' || $method == 'edit')         
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                 <a href="{{ route('contenedorprod.index') }}" type="button" class="btn btn-primary">
                                        {{ __('Cancelar ') }}</a>
                                <button class="btn btn-primary" type="summit">
                                        {{ __('Guardar ') }}</button>
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

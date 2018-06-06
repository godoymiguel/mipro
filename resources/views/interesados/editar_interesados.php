@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Interesados') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('interesados.update', $inte) }}">
                        {{ method_field('PUT') }}
                        <p><h3 style="text-align:center">Nuevo Involucrado</h3></p>
                        
                        <div class="form-group row">
                            <label for="fuente" class="col-md-4 col-form-label text-md-right">{{ __('Grupo') }}</label>
                            <div class="col-md-6">
                                <input id="grupo" type="text" class="form-control{{ $errors->has('grupo') ? ' is-invalid' : '' }}" name="grupo" value="{{ old('grupo', $inte->grupo) }}" required autofocus>
                                
                               </div>
                            </div>
						
						<div class="form-group row">
                            <label for="interesados" class="col-md-4 col-form-label text-md-right">{{ __('Interesado') }}</label>
                            <div class="col-md-6">
                                <input id="interesados" type="text" class="form-control{{ $errors->has('interesados') ? ' is-invalid' : '' }}" name="interesados" value="{{ old('interesados') }}" required autofocus>
                          	
                       
                               </div>
                            </div>
                            
                           
                            
                         <div class="form-group row">
                            <label for="problemas" class="col-md-4 col-form-label text-md-right">{{ __('Problemas') }}</label>
                            <div class="col-md-6">
                                <input id="problemas" type="text" class="form-control{{ $errors->has('problemas') ? ' is-invalid' : '' }}" name="problemas" value="{{ old('problemas') }}" required autofocus>
    
                               </div>
                            </div>
                            
                         <div class="form-group row">
                            <label for="recursos" class="col-md-4 col-form-label text-md-right">{{ __('Recursos') }}</label>
                            <div class="col-md-6">
                                <input id="recursos" type="text" class="form-control{{ $errors->has('recursos') ? ' is-invalid' : '' }}" name="recursos" value="{{ old('recursos') }}" required autofocus>
    
                               </div>
                            </div>
                            
                            
                         <div class="form-group row">
                            <label for="conflictos" class="col-md-4 col-form-label text-md-right">{{ __('Conflictos') }}</label>
                            <div class="col-md-6">
                                <input id="conflictos" type="text" class="form-control{{ $errors->has('conflictos') ? ' is-invalid' : '' }}" name="conflictos" value="{{ old('conflictos') }}" required autofocus>
                                @if ($errors->has('conflictos'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('conflictos') }}</strong>
                                    </span>
                                @endif       
                               </div>
                            </div>                            

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                 <a href="{{ route('interesados.tabla') }}" type="button" class="btn btn-primary">
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

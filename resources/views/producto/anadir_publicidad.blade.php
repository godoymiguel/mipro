@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Publicidad y Promoción') }}</div>
				
                <div class="card-body">
                    @if($method == 'create')
                        <form method="POST" action="{{ route('publicidad.store') }}">
                        @csrf
                    @elseif($method == 'edit')
                        <form method="POST" action="{{ route('publicidad.update', $pub->id) }}">
                        @csrf
                            {{ method_field('PUT') }}
                    @endif	
                     
                      <p>Los campos con asterisco son obligatorios (*) </p>
                     
                    @if (count($errors) > 0)
							<div class="alert alert-danger">
								<strong>Error: </strong> Problemas para subir la imagen<br><br>
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
				    @endif      
				    
                            
                          <div class="form-group row">
                            <label for="marca" class="col-md-4 col-form-label text-md-right">{{ __('Marca (*)') }}</label>
                            <div class="col-md-6">
                                <input id="marca" type="text" class="form-control{{ $errors->has('marca') ? ' is-invalid' : '' }}" name="marca" value="{{ old('marca',$pub->marca) }}"  required autofocus>
                                @if ($errors->has('marca'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('marca') }}</strong>
                                    </span>
                                @endif
                               </div>
                           </div>   
                           
                           <div class="form-group row">
                            <label for="slogan" class="col-md-4 col-form-label text-md-right">{{ __('Eslogan (*)') }}</label>
                            <div class="col-md-6">
                               <p><textarea id="slogan" cols="19.5" rows="5" class="form-control{{ $errors->has('slogan') ? ' is-invalid' : '' }}" name="slogan" required autofocus>{{ old('slogan', $pub->slogan) }}</textarea></p>
                                @if ($errors->has('slogan'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('slogan') }}</strong>
                                    </span>
                                @endif                                
                               </div>
                            </div> 
                        
                           <div class="form-group row">
                            <label for="medios" class="col-md-4 col-form-label text-md-right">{{ __('Medios (*)') }}</label>
                            <div class="col-md-6">
                               <p><textarea id="medios" cols="19.5" rows="5" class="form-control{{ $errors->has('medios') ? ' is-invalid' : '' }}" name="medios" required autofocus>{{ old('medios', $pub->medios) }}</textarea></p>
                                @if ($errors->has('medios'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('medios') }}</strong>
                                    </span>
                                @endif                                
                               </div>
                            </div> 
 
                           <div class="form-group row">
                            <label for="promocion" class="col-md-4 col-form-label text-md-right">{{ __('Promociones (*)') }}</label>
                            <div class="col-md-6">
                               <p><textarea id="promocion" cols="19.5" rows="5" class="form-control{{ $errors->has('promocion') ? ' is-invalid' : '' }}" name="promocion" required autofocus>{{ old('promocion', $pub->promocion) }}</textarea></p>
                                @if ($errors->has('promocion'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('promocion') }}</strong>
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

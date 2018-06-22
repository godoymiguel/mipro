@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Antecedentes') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('a.store') }}">
                        @csrf
                        <p><h3 style="text-align:center">Nuevo Antecedente</h3></p>

                        <div class="form-group row">
                            <label for="fuente" class="col-md-4 col-form-label text-md-right">{{ __('Fuente') }}</label>
                            <div class="col-md-6">
                                <input id="fuente" type="text" class="form-control{{ $errors->has('fuente') ? ' is-invalid' : '' }}" name="fuente" value="{{ old('fuente') }}" required autofocus>
                                @if ($errors->has('fuente'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('fuente') }}</strong>
                                    </span>
                                @endif
                               </div>
                            </div>
						
						<div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>
                            <div class="col-md-6">
                               <p><textarea id="descripcion" cols="19.5" rows="7" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" value="{{ old('descripcion') }}" required autofocus></textarea></p>
                                @if ($errors->has('descripcion'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
                                
                               </div>
                            </div> 

                        
                        <div class="form-group row">
                            <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Tipo') }}</label>
                            <div class="col-md-6">
			
								<p> <select id="tipo" name="tipo" class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }}" >
								
								   <option value= "Historia del bien o servicio"> Historia del bien o servicio </option> 
								   <option value= "Uso de aplicaciones del bien o servicio"> Uso de aplicaciones del bien o servicio</option> 
								   <option value= "Consumo: tasas y frecuencia">Consumo: tasas y frecuencia</option>
								   <option value= "Principales consumidores o clientes">Principales consumidores o clientes</option> 
								   <option value= "Principales fabricantes o prestadores">Principales fabricantes o prestadores</option> 
								   <option value= "Tecnología asociada a la fabricación del bien o servicio">Tecnología asociada a la fabricación del bien o servicio</option> 
								   <option value= "Tendencias del bien o servicio">Tendencias del bien o servicio</option> 
								</select></p>
								
                                @if ($errors->has('tipo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('tipo') }}</strong>
                                    </span>
                                @endif
                                
                               </div>
                            </div> 
                        
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                 <a href="{{ route('a.tabla') }}" type="button" class="btn btn-primary">
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

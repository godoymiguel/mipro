@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Distribución del Producto') }}</div>
                <link href="{{ asset('css/switch.css') }}" rel="stylesheet">

                <div class="card-body">
                    @if($method == 'create')
                        <form method="POST" action="{{ route('dis.store') }}">
                        @csrf
                    @elseif($method == 'edit')
                        <form method="POST" action="{{ route('dis.update', $dis->id) }}">
                        @csrf
                            {{ method_field('PUT') }}
                    @endif
                    
                    
                    <p><h5 style="text-align:center">Distribución del Servicio</h5></p>
                    <br> <br> 
                            
                        <div class="form-group row">
                          <label for="esperar_cliente" class="col-md-4 col-form-label text-md-right">{{ __('Esperan al cliente') }}</label>
                            <div class="col-md-6">			
								<p><select id="esperar_cliente" name="esperar_cliente" class="form-control{{ $errors->has('esperar_cliente') ? ' is-invalid' : '' }}" >								
								   <option {{ $dis->esperar_cliente == "NO" ? 'selected=selected':null}} value= "NO"> NO </option> 
								   <option {{ $dis->esperar_cliente == "SI" ? 'selected=selected':null}} value= "SI"> SI </option> 
								</select></p>
                                @if ($errors->has('esperar_cliente'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('esperar_cliente') }}</strong>
                                    </span>
                                @endif                               
                            </div>
                         </div> 
                         
                         
                         <div class="form-group row">
                          <label for="buscar_cliente" class="col-md-4 col-form-label text-md-right">{{ __('Se movilizan hacia el cliente') }}</label>
                            <div class="col-md-6">			
								<p><select id="buscar_cliente" name="buscar_cliente" class="form-control{{ $errors->has('buscar_cliente') ? ' is-invalid' : '' }}" >								
								   <option {{ $dis->buscar_cliente == "NO" ? 'selected=selected':null}} value= "NO"> NO </option> 
								   <option {{ $dis->buscar_cliente == "SI" ? 'selected=selected':null}} value= "SI"> SI </option> 
								</select></p>
                                @if ($errors->has('buscar_cliente'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('buscar_cliente') }}</strong>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

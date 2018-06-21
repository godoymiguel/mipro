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
                    
                    
                    <p><h5 style="text-align:center">Distribución del Bien</h5></p>
                    <br> <br> 
                            
                        <div class="form-group row">
                          <label for="fabricante" class="col-md-4 col-form-label text-md-right">{{ __('Fabricante') }}</label>
                            <div class="col-md-6">			
								<p><select id="fabricante" name="fabricante" class="form-control{{ $errors->has('fabricante') ? ' is-invalid' : '' }}" >								
								   <option {{ $dis->fabricante == "NO" ? 'selected=selected':null}} value= "NO"> NO </option> 
								   <option {{ $dis->fabricante == "SI" ? 'selected=selected':null}} value= "SI"> SI </option> 
								</select></p>
                                @if ($errors->has('fabricante'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('fabricante') }}</strong>
                                    </span>
                                @endif                               
                            </div>
                         </div> 
                         
                         
                         <div class="form-group row">
                          <label for="mayorista" class="col-md-4 col-form-label text-md-right">{{ __('Mayorista') }}</label>
                            <div class="col-md-6">			
								<p><select id="mayorista" name="mayorista" class="form-control{{ $errors->has('mayorista') ? ' is-invalid' : '' }}" >								
								   <option {{ $dis->mayorista == "NO" ? 'selected=selected':null}} value= "NO"> NO </option> 
								   <option {{ $dis->mayorista == "SI" ? 'selected=selected':null}} value= "SI"> SI </option> 
								</select></p>
                                @if ($errors->has('mayorista'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mayorista') }}</strong>
                                    </span>
                                @endif                               
                            </div>
                         </div>     
                         
                         <div class="form-group row">
                          <label for="minorista" class="col-md-4 col-form-label text-md-right">{{ __('Minorista') }}</label>
                            <div class="col-md-6">			
								<p><select id="minorista" name="minorista" class="form-control{{ $errors->has('minorista') ? ' is-invalid' : '' }}" >								
								   <option {{ $dis->minorista == "NO" ? 'selected=selected':null}} value= "NO"> NO </option> 
								   <option {{ $dis->minorista == "SI" ? 'selected=selected':null}} value= "SI"> SI </option> 
								</select></p>
                                @if ($errors->has('minorista'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('minorista') }}</strong>
                                    </span>
                                @endif                               
                            </div>
                         </div>   
                         
                         <div class="form-group row">
                          <label for="consumidor" class="col-md-4 col-form-label text-md-right">{{ __('Consumidor') }}</label>
                            <div class="col-md-6">			
								<p><select id="consumidor" name="consumidor" class="form-control{{ $errors->has('consumidor') ? ' is-invalid' : '' }}" >								
								   <option {{ $dis->consumidor == "NO" ? 'selected=selected':null}} value= "NO"> NO </option> 
								   <option {{ $dis->consumidor == "SI" ? 'selected=selected':null}} value= "SI"> SI </option> 
								</select></p>
                                @if ($errors->has('consumidor'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('consumidor') }}</strong>
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

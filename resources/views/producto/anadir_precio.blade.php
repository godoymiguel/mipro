@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Descripción del Precio') }}</div>
                <link href="{{ asset('css/switch.css') }}" rel="stylesheet">

                <div class="card-body">
                    @if($method == 'create')
                        <form method="POST" action="{{ route('precio.store') }}">
                        @csrf
                    @elseif($method == 'edit')
                        <form method="POST" action="{{ route('precio.update', $prec->id) }}">
                        @csrf
                            {{ method_field('PUT') }}
                    @endif
                    
                    
                    <p><h5 style="text-align:center">Estrategia de Precio</h5></p>
                            <br> <br> 
                          
                          
                        <div class="form-group row">
                          <label for="competencia" class="col-md-4 col-form-label text-md-right">{{ __('Similar a competencia') }}</label>
                            <div class="col-md-6">			
								<p><select id="competencia" name="competencia" class="form-control{{ $errors->has('competencia') ? ' is-invalid' : '' }}" >								
								   <option {{ $prec->competencia == "NO" ? 'selected=selected':null}} value= "NO"> NO </option> 
								   <option {{ $prec->competencia == "SI" ? 'selected=selected':null}} value= "SI"> SI </option> 
								</select></p>
                                @if ($errors->has('competencia'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('competencia') }}</strong>
                                    </span>
                                @endif                               
                            </div>
                         </div> 
                         
                         <div class="form-group row">
                          <label for="costo" class="col-md-4 col-form-label text-md-right">{{ __('Costo + Margen') }}</label>
                            <div class="col-md-6">			
								<p><select id="costo" name="costo" class="form-control{{ $errors->has('costo') ? ' is-invalid' : '' }}" >								
								   <option {{ $prec->costo == "NO" ? 'selected=selected':null}} value= "NO"> NO </option> 
								   <option {{ $prec->costo == "SI" ? 'selected=selected':null}} value= "SI"> SI </option> 
								</select></p>
                                @if ($errors->has('costo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('costo') }}</strong>
                                    </span>
                                @endif                               
                            </div>
                         </div> 
                          
                         <div class="form-group row">
                          <label for="diferenciacion" class="col-md-4 col-form-label text-md-right">{{ __('Diferenciacion por estrato + edad + volumen + frecuencia') }}</label>
                            <div class="col-md-6">			
								<p><select id="diferenciacion" name="diferenciacion" class="form-control{{ $errors->has('diferenciacion') ? ' is-invalid' : '' }}" >								
								   <option {{ $prec->diferenciacion == "NO" ? 'selected=selected':null}} value= "NO"> NO </option> 
								   <option {{ $prec->diferenciacion == "SI" ? 'selected=selected':null}} value= "SI"> SI </option> 
								</select></p>
                                @if ($errors->has('diferenciacion'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('diferenciacion') }}</strong>
                                    </span>
                                @endif                               
                            </div>
                         </div> 


                         <div class="form-group row">
                          <label for="desnatar" class="col-md-4 col-form-label text-md-right">{{ __('Desnatar') }}</label>
                            <div class="col-md-6">			
								<p><select id="desnatar" name="desnatar" class="form-control{{ $errors->has('desnatar') ? ' is-invalid' : '' }}" >								
								   <option {{ $prec->desnatar == "NO" ? 'selected=selected':null}} value= "NO"> NO </option> 
								   <option {{ $prec->desnatar == "SI" ? 'selected=selected':null}} value= "SI"> SI </option> 
								</select></p>
                                @if ($errors->has('desnatar'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('desnatar') }}</strong>
                                    </span>
                                @endif                               
                            </div>
                         </div>
                         
                         <div class="form-group row">
                          <label for="fijo" class="col-md-4 col-form-label text-md-right">{{ __('Fijo + Variable') }}</label>
                            <div class="col-md-6">			
								<p><select id="fijo" name="fijo" class="form-control{{ $errors->has('fijo') ? ' is-invalid' : '' }}" >								
								   <option {{ $prec->fijo == "NO" ? 'selected=selected':null}} value= "NO"> NO </option> 
								   <option {{ $prec->fijo == "SI" ? 'selected=selected':null}} value= "SI"> SI </option> 
								</select></p>
                                @if ($errors->has('fijo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('fijo') }}</strong>
                                    </span>
                                @endif                               
                            </div>
                         </div>
     
   






						
                            <div class="form-group row">
                            <label for="precio" class="col-md-4 col-form-label text-md-right">{{ __('Lista de Precios') }}</label>
                            <div class="col-md-6">
                               <p><textarea id="precio " cols="19.5" rows="7" class="form-control{{ $errors->has('precio') ? ' is-invalid' : '' }}" name="precio" value="{{ old('precio') }}" required autofocus>{{ old('precio', $prec->precio) }}</textarea></p>
                                @if ($errors->has('precio'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('precio') }}</strong>
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

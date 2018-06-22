@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
				
				<!--Botones-->
				<link href="{{asset('css/bootstrap.css') }}" rel="stylesheet" media="screen">
				
                <div class="card-header">{{ __('Modelo de Negocios Canvas') }}</div>
               				
                <div class="card-body">
                    @if($method == 'create')
                        <form method="POST" action="{{ route('canvas.store') }}">
                        @csrf
                    @elseif($method == 'edit')
                        <form method="POST" action="{{ route('canvas.update', $canvas->id) }}">
                        @csrf
                            {{ method_field('PUT') }}
                    @endif	
                    
        			
					@if(Session::has('flash_message'))
							<div class="alert alert-success"><em> {!! session('flash_message') !!}</em></div>
					@endif

              
						<div>							
							<table class="table">
							  <tr>			  
								<th scope="tg-yw4l">Problema<br>
									<div class="form-group row">								 
										<p><textarea id="problema"  placeholder="Inserte el problema"  cols="25" rows="10" class="form-control{{ $errors->has('problema') ? ' is-invalid' : '' }}" name="problema" required autofocus >{{ old('problema',$canvas->problema) }}</textarea></p>
									      
									</div>
								</th>
								<th scope="tg-yw4l">Solución<br>
									<div class="form-group row">								 
										<p><textarea id="solucion" placeholder="Inserte la solución" cols="25" rows="10" class="form-control{{ $errors->has('solucion') ? ' is-invalid' : '' }}" name="solucion" required autofocus >{{ old('solucion',$canvas->solucion) }}</textarea></p>
											@if ($errors->has('solucion'))
												<span class="invalid-feedback">
													<strong>{{ $errors->first('solucion') }}</strong>
												</span>
											@endif
									</div>	
								</th>
								<th scope="tg-yw4l">Indicadores<br>
									<div class="form-group row">								 
										<p><textarea id="indicadores" placeholder="Inserte los indicadores" cols="28" rows="10" class="form-control{{ $errors->has('indicadores') ? ' is-invalid' : '' }}" name="indicadores"  required autofocus >{{ old('indicadores',$canvas->indicadores) }}</textarea></p>
											@if ($errors->has('indicadores'))
												<span class="invalid-feedback">
													<strong>{{ $errors->first('indicadores') }}</strong>
												</span>
											@endif
									</div>	
								</th>
							  </tr>							  
						 </table>
						</div>
	
						<div>
						  <table class="table">
						    <tr>
								<th scope="tg-yw4l">Causas<br>
									<div class="form-group row">								 
										<p><textarea id="causas" placeholder="Inserte las causas" cols="42.9" rows="10" class="form-control{{ $errors->has('causas') ? ' is-invalid' : '' }}" name="causas" required autofocus >{{ old('causas',$canvas->causas) }}</textarea></p>
											@if ($errors->has('causas'))
												<span class="invalid-feedback">
													<strong>{{ $errors->first('causas') }}</strong>
												</span>
											@endif
									</div>	
								</th>		
								<th scope="tg-yw4l">Efectos<br>
									<div class="form-group row">								 
										<p><textarea id="efectos" placeholder="Inserte los efectos" cols="42.9" rows="10" class="form-control{{ $errors->has('efectos') ? ' is-invalid' : '' }}" name="efectos" required autofocus >{{ old('efectos',$canvas->efectos) }}</textarea></p>
											@if ($errors->has('efectos'))
												<span class="invalid-feedback">
													<strong>{{ $errors->first('efectos') }}</strong>
												</span>
											@endif
									</div>	
								</th>					  
							  </tr>								  
							</table>
						</div>

						@if($method == 'create' || $method == 'edit')          
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-10">
                                <button class="btn btn-primary" type="summit"> {{ __('Guardar ') }}</button>
                            </div>
                        </div>
                        @endif
                        
                        
                          <table align="center">
								<tr>
									<td>
										<a href="{{ route('idea.tabla') }}"  type="button"  class="btn btn-primary">
										<span class="glyphicon glyphicon-triangle-left"></span></a>
									</td>
									<td>
										 <a href="{{ route('a.tabla') }}" type="button"  class="btn btn-primary">
										<span class="glyphicon glyphicon-triangle-right"></span></a>
									</td>
								</tr>
							</table>


              
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

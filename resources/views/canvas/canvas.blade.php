@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Business Model Canvas') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('canvas.store') }}">
                        @csrf
						<div>
							<table class="table">
							  <tr>
								<th scope="tg-yw4l">Problema<br>
									<div class="form-group row">								 
										<p><textarea id="problema" placeholder="Inserte el problema"  cols="19.5" rows="7" class="form-control{{ $errors->has('problema') ? ' is-invalid' : '' }}" name="problema" value="{{ old('problema') }}" required autofocus></textarea></p>
											@if ($errors->has('problema'))
												<span class="invalid-feedback">
													<strong>{{ $errors->first('problema') }}</strong>
												</span>
											@endif
									</div>
								</th>
								<th scope="tg-yw4l">Solución<br>
									<div class="form-group row">								 
										<p><textarea id="solucion" placeholder="Inserte la solución" cols="19.5" rows="7" class="form-control{{ $errors->has('solucion') ? ' is-invalid' : '' }}" name="solucion" value="{{ old('solucion') }}" required autofocus></textarea></p>
											@if ($errors->has('solucion'))
												<span class="invalid-feedback">
													<strong>{{ $errors->first('solucion') }}</strong>
												</span>
											@endif
									</div>	
								</th>
								<th scope="tg-yw4l">Indicadores<br>
									<div class="form-group row">								 
										<p><textarea id="indicadores" placeholder="Inserte los indicadores" cols="19.5" rows="7" class="form-control{{ $errors->has('indicadores') ? ' is-invalid' : '' }}" name="indicadores" value="{{ old('indicadores') }}" required autofocus></textarea></p>
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
										<p><textarea id="causas" placeholder="Inserte las causas" cols="31" rows="7" class="form-control{{ $errors->has('causas') ? ' is-invalid' : '' }}" name="causas" value="{{ old('causas') }}" required autofocus></textarea></p>
											@if ($errors->has('causas'))
												<span class="invalid-feedback">
													<strong>{{ $errors->first('causas') }}</strong>
												</span>
											@endif
									</div>	
								</th>		
								<th scope="tg-yw4l">Efectos<br>
									<div class="form-group row">								 
										<p><textarea id="efectos" placeholder="Inserte los efectos" cols="31" rows="7" class="form-control{{ $errors->has('efectos') ? ' is-invalid' : '' }}" name="efectos" value="{{ old('efectos') }}" required autofocus></textarea></p>
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
						         
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                 <a href="{{ route('home') }}" type="button" class="btn btn-primary">
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

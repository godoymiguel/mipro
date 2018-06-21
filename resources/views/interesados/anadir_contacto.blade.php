@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Datos de contacto') }}</div>
				
                <div class="card-body">
                    @if($method == 'create')
                        <form method="POST" action="{{ route('interesados.store') }}">
                        @csrf
                    @elseif($method == 'edit')
                        <form method="POST" action="{{ route('interesados.update', $inte->id) }}">
                        @csrf
                            {{ method_field('PUT') }}
                    @endif	
                     
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre', $inte->nombre) }}" required autofocus>
                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                             </div>
                        </div>

                        <div class="form-group row">
                            <label for="fuente" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>
                            <div class="col-md-6">
                                <input id="correo" type="text" class="form-control{{ $errors->has('correo') ? ' is-invalid' : '' }}" name="correo" value="{{ old('correo', $inte->correo) }}" required autofocus>
                                @if ($errors->has('correo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('correo') }}</strong>
                                    </span>
                                @endif
                             </div>
                        </div>
						
						
						 <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Telefono/Celular') }}</label>
                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" name="telefono" value="{{ old('telefono', $inte->telefono) }}" required autofocus>
                                @if ($errors->has('telefono'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                             </div>
                        </div>
						<div>
						
						<div>								
							<table class="table">
							  <tr>
								<th scope="tg-yw4l">Responsabilidad en el proyecto<br>
									<div class="form-group row">								 
										<textarea id="responsabilidad" placeholder="Inserte la responsabilidad"  cols="31" rows="7" class="form-control{{ $errors->has('responsabilidad') ? ' is-invalid' : '' }}" name="responsabilidad" required autofocus >{{ old('responsabilidad', $inte->responsabilidad) }}</textarea>
											@if ($errors->has('responsabilidad'))
												<span class="invalid-feedback">
													<strong>{{ $errors->first('responsabilidad') }}</strong>
												</span>
											@endif
									</div>
								</th>
							  </tr>										  
							</table>
						</div>
						
						@if($method == 'create' || $method == 'edit')         
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                 <a href="{{ route('contenedor.index') }}" type="button" class="btn btn-primary">
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


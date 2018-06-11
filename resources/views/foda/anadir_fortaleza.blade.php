@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('FODA = Fortalezas + Oportunidades + Debilidades + Amenaza') }}</div>
				
                <div class="card-body">
                    @if($method == 'create')
                        <form method="POST" action="{{ route('foda.store') }}">
                        @csrf
                    @elseif($method == 'edit')
                        <form method="POST" action="{{ route('foda.update', $foda->id) }}">
                        @csrf
                            {{ method_field('PUT') }}
                    @endif	
                     
						<div>								
							<table class="table">
							  <tr>
								<th scope="tg-yw4l">Fortalezas<br>
									<div class="form-group row">								 
										<textarea id="fortaleza" placeholder="Inserte la fortaleza"  cols="31" rows="7" class="form-control{{ $errors->has('fortaleza') ? ' is-invalid' : '' }}" name="fortaleza" required autofocus {{$method == 'show' ? 'disabled' : null }}>{{ old('fortaleza', $foda->fortaleza) }}</textarea>
											@if ($errors->has('fortaleza'))
												<span class="invalid-feedback">
													<strong>{{ $errors->first('fortaleza') }}</strong>
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
                                 <a href="{{ route('foda.tabla') }}" type="button" class="btn btn-primary">
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
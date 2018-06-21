@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Problema') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('arbolprob.store') }}">
                        @csrf
                        <p><h3 style="text-align:center">Nuevo Problema</h3></p>
                        
						<div class="form-group row">
                            <label for="problema" class="col-md-4 col-form-label text-md-right">{{ __('Descripción del problema') }}</label>
                            <div class="col-md-6"> 
                                <p><textarea id="problema" cols="19.5" rows="7" class="form-control{{ $errors->has('problema') ? ' is-invalid' : '' }}" name="problema" value="{{ old('problema') }}" required autofocus></textarea></p>
                                @if ($errors->has('problema'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('problema') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                 <a href="{{ route('contenedor.index') }}" type="button" class="btn btn-primary">
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

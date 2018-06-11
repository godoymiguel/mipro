@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Objetivo') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('arbolobj.store') }}">
                        @csrf
                        <p><h3 style="text-align:center">Nuevo Objetivo</h3></p>
                        
                        
                        <div class="form-group row">
                            <label for="objetivo" class="col-md-4 col-form-label text-md-right">{{ __('Descripción del Objetivo') }}</label>
                            <div class="col-md-6"> 
                                <p><textarea id="objetivo" cols="19.5" rows="7" class="form-control{{ $errors->has('objetivo') ? ' is-invalid' : '' }}" name="objetivo" value="{{ old('objetivo') }}" required autofocus></textarea></p>
                                @if ($errors->has('objetivo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('objetivo') }}</strong>
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

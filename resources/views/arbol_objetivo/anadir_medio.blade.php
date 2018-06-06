@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Medios y Fin') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('medios.store') }}">
                        @csrf
                        <p><h3 style="text-align:center">Añadir medios y fin</h3></p>
                        
                       <div class="form-group row">
                            <label for="actividad" class="col-md-4 col-form-label text-md-right">{{ __('Actividad') }}</label>
                            <div class="col-md-6">
                                <input id="actividad" type="text" class="form-control{{ $errors->has('actividad') ? ' is-invalid' : '' }}" name="actividad" value="{{ old('actividad') }}" required autofocus>
                                @if ($errors->has('actividad'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('actividad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                         
                        
                        <div class="form-group row">
                            <label for="medio_directo" class="col-md-4 col-form-label text-md-right">{{ __('Medio Directa') }}</label>
                            <div class="col-md-6">
                                <input id="medio_directo" type="text" class="form-control{{ $errors->has('medio_directo') ? ' is-invalid' : '' }}" name="medio_directo" value="{{ old('medio_directo') }}" required autofocus>
                                @if ($errors->has('medio_directo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('medio_directo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="medio_indirecto" class="col-md-4 col-form-label text-md-right">{{ __('Medio Indirecta') }}</label>
                            <div class="col-md-6">
                                <input id="medio_indirecto" type="text" class="form-control{{ $errors->has('medio_indirecto') ? ' is-invalid' : '' }}" name="medio_indirecto" value="{{ old('medio_indirecto') }}" required autofocus>
                                @if ($errors->has('medio_indirecto'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('medio_indirecto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="fin_directo" class="col-md-4 col-form-label text-md-right">{{ __('Fin Directo') }}</label>
                            <div class="col-md-6">
                                <input id="fin_directo" type="text" class="form-control{{ $errors->has('fin_directo') ? ' is-invalid' : '' }}" name="fin_directo" value="{{ old('fin_directo') }}" required autofocus>
                                @if ($errors->has('fin_directo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('fin_directo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                            
                            
                        
                        <div class="form-group row">
                            <label for="fin_indirecto" class="col-md-4 col-form-label text-md-right">{{ __('Fin Indirecto') }}</label>
                            <div class="col-md-6">
                                <input id="fin_indirecto" type="text" class="form-control{{ $errors->has('fin_indirecto') ? ' is-invalid' : '' }}" name="fin_indirecto" value="{{ old('fin_indirecto') }}" required autofocus>
                                @if ($errors->has('fin_indirecto'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('fin_indirecto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                        
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                 <a href="{{ route('arbolobj.tabla') }}" type="button" class="btn btn-primary">
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

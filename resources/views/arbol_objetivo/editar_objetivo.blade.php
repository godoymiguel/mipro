@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Objetivo') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('arbolobj.update', $ao) }}">
                        @csrf
						{{ method_field('PUT') }}
                        <p><h3 style="text-align:center">Editar Objetivo</h3></p>
                        <div class="form-group row">
                            <label for="objetivo" class="col-md-4 col-form-label text-md-right">{{ __('Descripción del objetivo') }}</label>
                            <div class="col-md-6">
                               <textarea id="objetivo" cols="19.5" rows="7" class="form-control{{ $errors->has('objetivo') ? ' is-invalid' : '' }}" name="objetivo" required autofocus >{{ old('objetivo',$ao->objetivo) }}
                                </textarea>
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

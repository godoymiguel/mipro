@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Problema') }}</div>
                <div class="card-body">
                    <form  method="POST" action="{{ route('arbolprob.update', $ap) }}">
                        @csrf
						{{ method_field('PUT') }}
                        <p><h3 style="text-align:center">Editar Problema</h3></p>
                        
                        <div class="form-group row">
                            <label for="problema" class="col-md-4 col-form-label text-md-right">{{ __('Descripción del Problema') }}</label>
                            <div class="col-md-6">
                               <textarea id="problema" cols="19.5" rows="7" class="form-control{{ $errors->has('problema') ? ' is-invalid' : '' }}" name="problema" required autofocus >{{ old('problema',$ap->problema) }}
                                </textarea>
                            </div>
                        </div>
                        

						</script>
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

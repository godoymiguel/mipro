@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Criterio') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('idea.valoracion.actualizar', $criterio) }}">
                        @csrf
						{{ method_field('PUT') }}
                        <p><h3 style="text-align:center">Valoracion de Ideas</h3></p>
                        <div class="form-group row">

                          <table class="table">
                             <thead class="thead-light">
                               <tr>
                                <td>
								<br><br>
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Valoración Idea #1') }}</label>
                                <input type="number" name="valor1" min="1" max="10" step="1" style="width:100px" value="{{ old('valor1') }}" required autofocus>
                                <br><br>
                                 <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Valoración Idea #2') }}</label>
                                <input type="number" name="valor2" min="1" max="10" step="1" style="width:100px" value="{{ old('valor2') }}" required autofocus>
                                <br><br>
                                
                                 <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Valoración Idea #3') }}</label>
                                <input type="number" name="valor3" min="1" max="10" step="1" style="width:100px" value="{{ old('valor3') }}" required autofocus>
                                </td>
                                </thead> 
                                </table>                      
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                 <a href="{{ route('idea.tabla') }}" type="button" class="btn btn-primary">
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


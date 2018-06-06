@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Antecedentes') }}</div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
							
							<p><h5 style="text-align:center">Antecedentes</h5></p>
							
							
							<p>Introduzca los antecedentes del proyecto a emprender: </p>
                            <a href="{{ route('a.create') }}" type="button" class="btn btn-primary btn-lg btn-block">Agregar Antecedente</a>
                            <br>
                            <table class="table">
                                <thead class="thead-light">
								<br><br>
								<p>Listado de Antecedentes:</p>	
                                    <tr>
										<th scope="col">Fuente Asociada</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($ante as $key => $value)
                                    <tr>    
                                        <td>{!! $value->fuente !!}</td>
                                        <td>{!! $value->descripcion !!}</td>
                                        <td>{!! $value->tipo !!}</td>
                                        <td>
                                            <a type="button" class="btn btn-info" href="{{ route('a.edit', $value->id) }}"> Editar</a>
                                        
                                            
                                            <form method="POST" action="{{ route('a.delete', $value->id) }}">
                                                @csrf
                                                    {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro desea eliminar el antecedente {!! $value->fuente !!}?')">
                                                Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach




                                </tbody>
                            </table>
                            
                            
                             
                            <div class="form-group row mb-0">
								<div class="col-md-6 offset-md-4">
                                 <a href="{{ route('idea.tabla') }}" type="button" class="btn btn-primary">
                                        {{ __('Cancelar ') }}</a>
                                 <a href="{{ route('arbolprob.tabla') }}" type="button" class="btn btn-primary">
                                        {{ __('Siguiente ') }}</a>      
                                        
                                    
								</div>
							</div>

								     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Marco Lógico') }}</div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">

													
							<p><h5 style="text-align:center">Gestión de Interesados</h5></p>
							<p>Introduzca los interesados en el proyecto: </p>
							
                            <a href="{{ route('interesados.create') }}" type="button" class="btn btn-primary btn-lg btn-block">Agregar Involucrado</a>
                            <br>
                            <table class="table">
                                <thead class="thead-light">
								<br><br>
								<p>Listado de Involucrados:</p>	
                                    <tr>
										<th scope="col">Grupo</th>
                                        <th scope="col">Interesados</th>
                                        <th scope="col">Problemas Percibidos</th>
                                        <th scope="col">Recursos y Mandatos</th>
                                        <th scope="col">Conflictos Potenciales</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($inte as $key => $value)
                                    <tr>    
                                        <td>{!! $value->grupo !!}</td>
                                        <td>{!! $value->interesados !!}</td>
                                        <td>{!! $value->problemas!!}</td>
                                        <td>{!! $value->recursos !!}</td>
                                        <td>{!! $value->conflictos!!}</td>
                                        <td>
                                            <a type="button" class="btn btn-info" href="{{ route('interesados.edit', $value->id) }}"> Editar</a>
                                        
                                            
                                            <form method="POST" action="{{ route('interesados.delete', $value->id) }}">
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
                                 <a href="{{ route('arbolobj.tabla') }}" type="button" class="btn btn-primary">
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

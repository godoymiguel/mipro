@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
				<!--Botones-->
				<link href="{{asset('css/bootstrap.css') }}" rel="stylesheet" media="screen">
	
                <div class="card-header">{{ __('Antecedentes') }}</div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
							
							<p><h5 style="text-align:center">Antecedentes</h5></p>
							
							
							<p>Introduzca los antecedentes del proyecto a emprender: </p>
                            <a href="{{ route('a.create') }}" type="button" class="btn btn-primary btn-lg btn-block">Agregar Antecedente</a>
                            <br>
                            <table class="table" cellpadding="2">
                                <thead class="thead-light">
								<br><br>
								<p>Listado de Antecedentes:</p>	
                                    <tr>
										<th scope="col">Fuente Asociada</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Editar</th>
                                        <th scope="col">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($ante as $key => $value)
                                    <tr>    
                                        <td>{!! $value->fuente !!}</td>
                                        <td>{!! $value->descripcion !!}</td>
                                        <td>{!! $value->tipo !!}</td>
                                       
                                        <td>
                                        <a href="{{ route('a.edit', $value->id) }}" type="button"  class="btn btn-info" aria-label="Editar">
                                        <span class="glyphicon glyphicon-pencil"></span></a>
										</td>
										
										<td>
                                        <form method="POST" action="{{ route('a.delete', $value->id) }}">
                                                @csrf
                                                    {{ method_field('DELETE') }}
                                                <button type="submit" aria-label="Eliminar"  class="btn btn-danger" onclick="return confirm('¿Seguro desea eliminar el antecedente {!! $value->fuente !!}?')">
                                                <span class="glyphicon glyphicon-trash"></span> </button>
                                                </button>
                                            </form>
                                        </td>
                                    
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            
                              <table align="center">
								<tr>
									<td>
										<a href="{{ route('canvas.create') }}"  type="button"  class="btn btn-primary">
										<span class="glyphicon glyphicon-triangle-left"></span></a>
									</td>
									<td>
										 <a href="{{ route('contenedor.index') }}" type="button"  class="btn btn-primary">
										<span class="glyphicon glyphicon-triangle-right"></span></a>
									</td>
								</tr>
							</table>

								     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

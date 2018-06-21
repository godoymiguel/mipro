@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

				<!--Botones-->
				<link href="{{asset('css/bootstrap.css') }}" rel="stylesheet" media="screen">
				
                <div class="card-header">{{ __('Idea') }}</div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
							
                            @if($idea->count()<3)
							<p><h5>Introduzca las ideas del proyecto a emprender (máximo 3)</h5></p>
                            <a href="{{ route('idea') }}" type="button" class="btn btn-primary btn-lg btn-block">Agregar Idea</a>
                            <br>
                            @endif
                            <table class="table">
                                <thead class="thead-light">
								<p>Listado de ideas</p>	
                                    <tr>
										<th scope="col">#</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col"></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($idea as $key => $value)
                                    <tr>    
										<th scope="row">Idea {!! $key+1 !!}</th>
                                        <td>{!! $value->name !!}</td>
                                        <td>
                                            <a href="{{ route('idea.edit', $value->id) }}" aria-label="Editar" type="button"  class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></a>
                                            <!--<form method="POST" action="{{ route('idea.delete', $value->id) }}">
                                                @csrf
                                                    {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro desea eliminar la idea {!! $value->name !!}?')">
                                                Eliminar
                                                </button>
                                            </form>-->
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            @if($idea->count()>=1)
                             <p><h4> Valoración de Ideas (1-10) </h4></p>
                             <p>Elegir la idea: 
                             
                             <input type="text" size="15" id="total" value="{!!$seleccionado!!}" readonly="readonly" disabled value="0" ><br /><br /></p>
                             
                             <a href="{{ route('idea.criterio') }}" type="button" class="btn btn-primary btn-lg btn-block">Agregar Criterio</a>
           
							<br>
                            <table class="table">
                               <thead class="thead-light">
                                    <tr>
											<th scope="col">Criterios</th>											
											<th scope="col">Idea 1</th>
											<th scope="col">Idea 2</th>
											<th scope="col">Idea 3</th>
											<th scope="col">Valorar</th>
											<th scope="col">Editar</th>
											<th scope="col">Eliminar</th>

									</tr>
                                </thead>
                                <tbody>
								                   
									
									@foreach($criterio as $clave => $valor)
                                    <tr>    
                                        <td>{!! $valor->name !!}</td>
                                        <td>{!! $valor->valor1 !!}</td>
                                        <td>{!! $valor->valor2 !!}</td>
                                        <td>{!! $valor->valor3 !!}</td>
                                        
                                        <td>
											@if($count>=3)
											<a type="button" aria-label="Valorar"  class="btn btn-warning" href="{{ route('idea.valoracion.editar', $valor->id) }}" >
											<span class="glyphicon glyphicon-list-alt"></span></a>
											@endif
										</td>
										
										<td>	
                                           <a href="{{ route('idea.criterio.edit', $valor->id) }}" aria-label="Editar" type="button"  class="btn btn-info">
                                           <span class="glyphicon glyphicon-pencil"></span></a>
                                        </td> 
                                        
                                        <td>   
                                            <form method="POST" action="{{ route('idea.criterio.delete', $valor->id) }}">
                                             @csrf {{ method_field('DELETE') }} 
                                             <button type="submit" aria-label="Eliminar" class="btn btn-danger" onclick="return confirm('¿Seguro desea eliminar el criterio {!! $valor->name !!}?')">
                                              <span class="glyphicon glyphicon-trash"></span> </button>
                                            </form>                                     
                                        
                                        </td>
									</tr> 
									  @endforeach									  
                            </table>
                            @endif
                            
                            
                            <table align="center">
								<tr>
									<td>
										<a href="{{ route('proyectos.index') }}"  type="button"  class="btn btn-primary">
										<span class="glyphicon glyphicon-triangle-left"></span></a>
									</td>
									<td>
										 <a href="{{ route('canvas.create') }}" type="button"  class="btn btn-primary">
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

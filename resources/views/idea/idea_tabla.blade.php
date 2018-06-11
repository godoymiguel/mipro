@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
<!---->
                <div class="card-header">{{ __('Idea') }}</div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
<!--web-->                  
                            @if($idea->count()<3)
							<p><h5>Introduzca las ideas del proyecto a emprender (máximo 3)</h5></p>
                            <a href="{{ route('idea') }}" type="button" class="btn btn-primary btn-lg btn-block">Agregar Idea</a>
                            <br>
                            @endif
                            <table class="table">
                                <thead class="thead-light">
								<p><h4>Listado de ideas</h4></p>	
                                    <tr>
										<th scope="col">#</th>
                                        <th scope="col">Idea</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($idea as $key => $value)
                                    <tr>    
										<th scope="row">{!! $key+1 !!}</th>
                                        <td>{!! $value->name !!}</td>
                                        <td>
                                            <a type="button" class="btn btn-info" href="{{ route('idea.edit', $value->id) }}"> Editar</a>
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
                            
                            @if($idea->count()>=3)
                             <p><h4> Valoración de Ideas (1-10) </h4></p>
                             <p>Elegir: 
                             
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
											<th scope="col"></th>

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
												<a type="button" class="btn btn-warning" href="{{ route('idea.valoracion.editar', $valor->id) }}" > Valorar</a>
											@endif
                                           <a type="button" class="btn btn-info" href="{{ route('idea.criterio.edit', $valor->id) }}"> Editar</a>
                                           
                                            <form method="POST" action="{{ route('idea.criterio.delete', $valor->id) }}">
                                                @csrf
                                                    {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro desea eliminar el criterio {!! $valor->name !!}?')">
                                                Eliminar
                                                </button>
                                            </form>                                     
                                        
                                        </td>
                                        
                                    
										

									</tr> 
									  @endforeach
									  
                            </table>
                            @endif
                            <div class="form-group row mb-0">
								<div class="col-md-6 offset-md-4">
                                 <a href="{{ route('canvas.create') }}" type="button" class="btn btn-primary">
                                        {{ __('Cancelar ') }}</a>
                                <a href="{{ route('a.tabla') }}" type="button" class="btn btn-primary">
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

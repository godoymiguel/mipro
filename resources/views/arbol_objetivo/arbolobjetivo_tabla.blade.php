@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
		<link href="css/jquery-ui.min.css" rel="stylesheet" />
		<div class="card">
                <div class="card-header">{{ __('Marco Lógico') }}</div>
                <div class="card-body">
				
                    <div class="form-group row">
                        <div class="col-md-12">
							<p><h5 style="text-align:center">Árbol Objetivos</h5></p>
							<p>Introduzca el objetivo del proyecto (Máximo 1): </p>
 
                            <a href="{{ route('arbolobj.create') }}" type="button" class="btn btn-primary btn-lg btn-block" onClick="this.disabled='disabled'">Agregar Objetivo</a>
                            <br>
                            <table class="table">
                                <thead class="thead-light">	
                                    <tr>
                                        <th scope="col">Objetivo</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ao as $key => $value)
                                    <tr>    
                                        <td>{!! $value->objetivo !!}</td>
                                        <td>
                                            <a type="button" class="btn btn-info" href="{{ route('arbolobj.edit', $value->id) }}"> Editar</a>
      
                                             <form method="POST" action="{{ route('arbolobj.delete', $value->id) }}">
                                                @csrf
                                                    {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro desea eliminar el objetivo: {!! $value->objetivo!!}?')">
                                                Eliminar
                                                </button>
                                            </form>  
                                        </td>                                         
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            
                             <br>
                             <br>
                             <p>Introduzca los medios y fin relacionados al proyecto: </p>
                             <a href="{{ route('medios.create') }}" type="button" class="btn btn-primary btn-lg btn-block">Agregar Medios y Fin</a>
           
							<br>
                            <table class="table">
                               <thead class="thead-light">
                                    <tr>
											<th scope="col">Actividad</th>											
											<th scope="col">Medio Directo</th>
											<th scope="col">Medio Directo</th>
											<th scope="col">Fin Indirecto</th>
											<th scope="col">Fin Raiz</th>
											<th scope="col"></th>

									</tr>
                                </thead>
                                <tbody>
								                   
									
									@foreach($mf as $clave => $valor)
                                    <tr>    
										<td>{!! $valor->actividad !!}</td>
                                        <td>{!! $valor->medio_directo !!}</td>
                                        <td>{!! $valor->medio_indirecto !!}</td>
                                        <td>{!! $valor->fin_directo !!}</td>
                                        <td>{!! $valor->fin_indirecto !!}</td>
                                        
                                        
                                        <td>
                                           <a type="button" class="btn btn-info" href="{{ route('medios.edit', $valor->id) }}"> Editar</a>
                                           
                                            <form method="POST" action="{{ route('medios.delete', $valor->id) }}">
                                                @csrf
                                                    {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro desea eliminar la actividad: {!! $valor->actividad !!}?')">
                                                Eliminar
                                                </button>
                                            </form>                                     
                                        
                                           
                                        </td>
									</tr> 
									  @endforeach
									  
                            </table>
                            <div class="form-group row mb-0">
								<div class="col-md-6 offset-md-4">
                                 <a href="{{ route('arbolprob.tabla') }}" type="button" class="btn btn-primary">
                                        {{ __('Cancelar ') }}</a>
                                <a href="{{ route('interesados.tabla') }}" type="button" class="btn btn-primary">
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

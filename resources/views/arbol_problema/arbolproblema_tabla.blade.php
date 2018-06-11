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
							<p><h5 style="text-align:center">Árbol Problema</h5></p>
							<p>a) Introduzca el problema del proyecto (Máximo 1): </p>
                            <a href="{{ route('arbolprob.create') }}" type="button" class="btn btn-primary btn-lg btn-block">Agregar Problema</a>
                            <br>
                            <table class="table">
                                <thead class="thead-light">	
                                    <tr>
                                        <th scope="col">Problema</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ap as $key => $value)
                                    <tr>    
                                        <td>{!! $value->problema !!}</td>
                                        <td>
                                            <a type="button" class="btn btn-info" href="{{ route('arbolprob.edit', $value->id) }}"> Editar</a>
      
                                             <form method="POST" action="{{ route('arbolprob.delete', $value->id) }}">
                                                @csrf
                                                    {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro desea eliminar el problema: {!! $value->problema!!}?')">
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
                             <p>b) Introduzca las causas y los efectos relacionados al proyecto: </p>
                             <a href="{{ route('causas.create') }}" type="button" class="btn btn-primary btn-lg btn-block">Agregar Causas y Efectos</a>
           
							<br>
                            <table class="table">
                               <thead class="thead-light">
                                    <tr>
											<th scope="col">Causa Directa</th>											
											<th scope="col">Causa Indirecta</th>
											<th scope="col">Efecto Directo</th>
											<th scope="col">Efecto Indirecto</th>
											<th scope="col">Causa Raiz</th>
											<th scope="col"></th>

									</tr>
                                </thead>
                                <tbody>
								                   
									
									@foreach($cf as $clave => $valor)
                                    <tr>    
                                        <td>{!! $valor->causa_directa !!}</td>
                                        <td>{!! $valor->causa_indirecta !!}</td>
                                        <td>{!! $valor->efecto_directo !!}</td>
                                        <td>{!! $valor->efecto_indirecto !!}</td>
                                        <td>{!! $valor->causa_raiz !!}</td>
                                        
                                        <td>
                                           <a type="button" class="btn btn-info" href="{{ route('causas.edit', $valor->id) }}"> Editar</a>
                                           
                                            <form method="POST" action="{{ route('causas.delete', $valor->id) }}">
                                                @csrf
                                                    {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro desea eliminar la causa directa: {!! $valor->causa_directa !!}?')">
                                                Eliminar
                                                </button>
                                            </form>                                     
                                        
                                           
                                        </td>
									</tr> 
									  @endforeach
									  
                            </table>
                            <div class="form-group row mb-0">
								<div class="col-md-6 offset-md-4">
                                 <a href="{{ route('a.tabla') }}" type="button" class="btn btn-primary">
                                        {{ __('Cancelar ') }}</a>
                                <a href="{{ route('arbolobj.tabla') }}" type="button" class="btn btn-primary">
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

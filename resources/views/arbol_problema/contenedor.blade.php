@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Marco Lógico') }}</div>
                <div class="card-body">
					
					<!-----TAB 1----->
					
                    <link type="text/css" rel="stylesheet" href="http://onlinehtmltools.com/tab-generator/skins/skin4/top.css"></script>
					<div class="tabs_holder">
					 <ul>
					  <li><a href="#your-tab-id-1">Árbol del Problema</a></li>
					  <li class="tab_selected"><a href="#your-tab-id-2">Árbol de Objetivos</a></li>
					  <li><a href="#your-tab-id-3">Gestón de Interesados</a></li>
					 </ul>
					 <div class="content_holder">
					  <div id="your-tab-id-1">
							                    <div class="form-group row">
                        <div class="col-md-12">
							<p><h5 style="text-align:center">Árbol Problema</h5></p>
							@if($ap->count()<1)
							<p>a) Introduzca el problema del proyecto (Máximo 1): </p>
                            <a href="{{ route('arbolprob.create') }}" type="button" class="btn btn-primary btn-lg btn-block">Agregar Problema</a>
                            @endif
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
                            
                            
                            @if($ap->count()>=1)
                            
                            
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
							@endif

						 </div>		     
                        </div>
					  </div>
					  
					  
					<!-----TAB 2----->	  
					  
					  <div id="your-tab-id-2">
					   <div class="form-group row">
                        <div class="col-md-12">
							@if($ao->count()<1)
							<p><h5 style="text-align:center">Árbol Objetivos</h5></p>
							<p>a) Introduzca el objetivo del proyecto (Máximo 1): </p>
                            <a href="{{ route('arbolobj.create') }}" type="button" class="btn btn-primary btn-lg btn-block" onClick="this.disabled='disabled'">Agregar Objetivo</a>
                            @endif
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
                             @if($ao->count()>=1)
                             <p>b) Introduzca los medios y fines relacionados al proyecto: </p>
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
							@endif
							</div>
							</div>	     
                       
					  </div>
					  
					  
					  	<!-----TAB 2----->
					  <div id="your-tab-id-3">
						 <div class="form-group row">
                        <div class="col-md-12">

													
							<p><h5 style="text-align:center">Gestión de Interesados</h5></p>
							<p>a) Introduzca los interesados en el proyecto: </p>
							
                            <a href="{{ route('interesados.create') }}" type="button" class="btn btn-primary btn-lg btn-block">Agregar Interesado</a>
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
                                        <th scope="col"></th>
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
                                           
											<a type="button" class="btn btn-success" href="{{ route('interesados.edit', $value->id) }}"> Añadir Contacto</a>
                                             <a type="button" class="btn btn-info" href="{{ route('interesados.edit', $value->id) }}"> Editar</a>
                                            <form method="POST" action="{{ route('interesados.delete', $value->id) }}">
                                                @csrf
                                                    {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro desea eliminar el interesado {!! $value->interesados !!}?')">
                                                Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
 
     
                        </div>
					  </div>
					 </div><!-- /.content_holder -->
					</div><!-- /.tabs_holder -->

					<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
					<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.min.js"></script>
					<script type="text/javascript" src="http://onlinehtmltools.com/tab-generator/skinable_tabs.min.js"></script>
					<script type="text/javascript">
					  $('.tabs_holder').skinableTabs({
						effect: 'basic_display',
						skin: 'skin4',
						position: 'top'
					  });
					</script>
                    
                    
                  	<!-- /.fin Contenedor tab -->  
                    
                    
             
								     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


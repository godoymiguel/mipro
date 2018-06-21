@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
				<link href="{{ asset('css/switch.css') }}" rel="stylesheet">
				<link href="{{asset('css/bootstrap.css') }}" rel="stylesheet" media="screen">
				
				
                <div class="card-header">{{ __('Plan de Marketing') }}</div>
                <div class="card-body">
					
					
                    <link type="text/css" rel="stylesheet" href="http://onlinehtmltools.com/tab-generator/skins/skin4/top.css">
					<div class="tabs_holder">
					 <ul>
					  <li><a href="#your-tab-id-1">Producto</a></li>
					  <li class="tab_selected"><a href="#your-tab-id-2">Precio</a></li>
					  <li><a href="#your-tab-id-3">Distribución</a></li>
					  <li><a href="#your-tab-id-4">Publicidad Y Promoción</a></li>
					 </ul>
					 
					 <!-----TAB 1 PRODUCTO----->
					 <div class="content_holder">
					  <div id="your-tab-id-1">
                        <div class="col-md-12">
						 	
						@if($prod->count()<1)
							<a href="{{ route('producto.create') }}" type="button"  class="btn btn-info">Agregar Producto</a>
						 @endif


						<table align="right">
							<tr>
								<th class="tg-yw4l">
									@foreach($prod as $key => $value)
										<a aria-label="Editar Producto" href="{{ route('producto.edit', $value->id) }}" type="button"  class="btn btn-info">
										<span class="glyphicon glyphicon-pencil"></span></a>
									@endforeach 
								</th>
							</tr>
						</table>
											  
						  
						@if($prod->count()>=1)
						 <p><h5 style="text-align:center">Descripción del Producto</h5></p>
					     <div class="form-group row">
                            <label for="basico" class="col-md-4 col-form-label text-md-right">{{ __('Producto Básico') }}</label>
                            <div class="col-md-6">
								@foreach($prod as $key => $value){!! $value->basico !!}@endforeach
   							    @if ($errors->has('basico'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('basico') }}</strong>
                                    </span>
                                @endif
                             </div>
                         </div> 
                            
                          <div class="form-group row">
                            <label for="aumentado" class="col-md-4 col-form-label text-md-right">{{ __('Producto Aumentado') }}</label>
                            <div class="col-md-6">
								@foreach($prod as $key => $value){!! $value->aumentado !!}@endforeach
								@if ($errors->has('aumentado'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('aumentado') }}</strong>
                                    </span>
                                @endif
                             </div>
                         </div> 
                         
                         <div class="form-group row">
                            <label for="psicologico" class="col-md-4 col-form-label text-md-right">{{ __('Producto Psicológico') }}</label>
                            <div class="col-md-6">
								@foreach($prod as $key => $value){!! $value->psicologico !!}@endforeach                             
                                @if ($errors->has('psicologico'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('psicologico') }}</strong>
                                    </span>
                                @endif
                             </div>
                         </div>   
                         
                         <div class="form-group row">
                            <label for="comparativa" class="col-md-4 col-form-label text-md-right">{{ __('Ventaja Comparativa') }}</label>
                            <div class="col-md-6">
							   @foreach($prod as $key => $value){!! $value->comparativa !!}@endforeach                              
                                @if ($errors->has('comparativa'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('comparativa') }}</strong>
                                    </span>
                                @endif
                             </div>
                         </div>  
						 
						 <div class="form-group row">
                            <label for="competitiva" class="col-md-4 col-form-label text-md-right">{{ __('Ventaja Competitiva') }}</label>
                            <div class="col-md-6">
								@foreach($prod as $key => $value){!! $value->competitiva !!}@endforeach
                                @if ($errors->has('comparativa'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('competitiva') }}</strong>
                                    </span>
                                @endif
                             </div>
                         </div>   
					  @endif
					  
					  <div class="form-group row">
					  	<table align="center">
								<tr>
									<td>
										<a href="{{ route('marketGap') }}"  type="button"  class="btn btn-primary">
										<span class="glyphicon glyphicon-triangle-left"></span></a>
									</td>
									<td>
										 <a href="{{ route('contenedorprod.index') }}" type="button"  class="btn btn-primary">
										<span class="glyphicon glyphicon-triangle-right"></span></a>
									</td>
								</tr>
							</table>
					 </div>

						 </div>	 <!----tab-id-1--->                          
					    </div> <!----form--->  
					  </div> <!----col---> 
					  
					  
					<!-----TAB 2 PRECIO----->	  
					  
					  <div id="your-tab-id-2">
					   <div class="form-group row">
                        <div class="col-md-12">
													

						@if($prec->count()<1)
							<a href="{{ route('precio.create') }}" type="button"  class="btn btn-info">Agregar Estrategia de Precio</a>
						@endif
						
						
						<table align="right">
							<tr>
								<th class="tg-yw4l">
									@foreach($prec as $key => $value)
									<a aria-label="Editar Estrategia de Precio" href="{{ route('precio.edit', $value->id) }}" type="button"  class="btn btn-info">
									<span class="glyphicon glyphicon-pencil"></span></a>
									@endforeach 
								</th>
							</tr>
						</table>
						         
                        @if($prec->count()>=1)
                        <p><h5 style="text-align:center">Estrategia de Precio</h5></p>
                        <br> <br> 							
							
						<div class="form-group row">
                          <label for="competencia" class="col-md-4 col-form-label text-md-right">{{ __('Competencia') }}</label>
							 <div class="col-md-6">								
								 @foreach($prec as $key => $value){!! $value->competencia !!}@endforeach 
                             </div>
                          </div> 
                          <br>
							
						<div class="form-group row">
                          <label for="costo" class="col-md-4 col-form-label text-md-right">{{ __('Costo') }}</label>
							 <div class="col-md-6">								
								 @foreach($prec as $key => $value){!! $value->costo !!}@endforeach 
                             </div>
                          </div> 
                          <br>
                          
        				 <div class="form-group row">
                          <label for="diferenciacion" class="col-md-4 col-form-label text-md-right">{{ __('Diferenciacion') }}</label>
							 <div class="col-md-6">								
								 @foreach($prec as $key => $value){!! $value->diferenciacion !!}@endforeach 
                             </div>
                          </div> 
                          <br>                  						
                         
        				 <div class="form-group row">
                          <label for="desnatar" class="col-md-4 col-form-label text-md-right">{{ __('Desnatar') }}</label>
							 <div class="col-md-6">								
								 @foreach($prec as $key => $value){!! $value->desnatar !!}@endforeach 
                             </div>
                          </div> 
                          <br>                           
 
         				 <div class="form-group row">
                          <label for="fijo" class="col-md-4 col-form-label text-md-right">{{ __('Fijo + Variable') }}</label>
							 <div class="col-md-6">								
								 @foreach($prec as $key => $value){!! $value->fijo !!}@endforeach 
                             </div>
                          </div> 
                          <br>     
                          

                          <div class="form-group row">
                            <label for="precio" class="col-md-4 col-form-label text-md-right">{{ __('Lista de Precios') }}</label>
                            <div class="col-md-6">
							@foreach($prec as $key => $value)
								{!! $value->precio !!}
							@endforeach  
                               </div>
                            </div> 
                          
						@endif

						 </div>	 <!----tab-id-2--->                          
					    </div> <!----form--->  
					  </div> <!----col---> 
					  
					  
					  	<!-----TAB 3 DISTRIBUCION----->
					  <div id="your-tab-id-3">
				       <div class="form-group row">
                        <div class="col-md-12">
							
							
													 
						 @if($dis->count()<1)
							<a href="{{ route('bien.create') }}" type="button"  class="btn btn-info">Agregar Distribución de Bien</a>
							<a href="{{ route('servicio.create') }}" type="button"  class="btn btn-info">Agregar Distribución de Servicio</a>
						 @endif
						
						 @foreach($dis as $key => $value)	
						 @if($value->fabricante==null)
						 
						 <table align="right"> 
						  <tr>
							 <th class="tg-yw4l">
								<a aria-label="Editar Servicio" href="{{ route('servicio.edit', $value->id) }}" type="button"  class="btn btn-info">
								<span class="glyphicon glyphicon-pencil"></span></a>
							 </th>
							 
							 <th class="tg-yw4l">
								<form method="POST" action="{{ route('dis.delete', $value->id) }}">
								@csrf {{ method_field('DELETE') }}
								<button aria-label="Eliminar Servicio" type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro desea eliminarlo?')"> 
								<span class="glyphicon glyphicon-trash"></span> </button>
						     </th>
						     
						 </tr> </table>    
						 @else
						 <table> <tr>
							
							<th class="tg-yw4l">
								<a href="{{ route('bien.edit', $value->id) }}" type="button"  class="btn btn-info">Editar el Bien</a>
							</th>
							
							<th class="tg-yw4l">
							
								<form method="POST" action="{{ route('dis.delete', $value->id) }}">
								@csrf {{ method_field('DELETE') }}
								<button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro desea eliminarlo?')"> Eliminar el Bien</button>
							</th>
						  
						  </tr> </table>
						 @endif		 
						 @endforeach 					
						
						
						 @foreach($dis as $key => $value)
						 @if($value->fabricante!=null)
						  <p><h5 style="text-align:center">Distribución del Bien</h5></p>  		
 						  <p><h6>Intermediarios Participantes:</h6></p>								   
						  
						  
						 <div class="form-group row">
                          <label for="fabricante" class="col-md-4 col-form-label text-md-right">{{ __('Fabricante') }}</label>
							 <div class="col-md-6">								
								 @foreach($dis as $key => $value){!! $value->fabricante !!}@endforeach 
                             </div>
                          </div> 
                          <br>
     				     
     				     <div class="form-group row">
                          <label for="fabricante" class="col-md-4 col-form-label text-md-right">{{ __('Mayorista') }}</label>
							 <div class="col-md-6">
								@foreach($dis as $key => $value){!! $value->mayorista !!}@endforeach 
                             </div>
                          </div> 
                          <br>
                          
     				     <div class="form-group row">
                          <label for="minorista" class="col-md-4 col-form-label text-md-right">{{ __('Minorista') }}</label>
							 <div class="col-md-6">
								@foreach($dis as $key => $value){!! $value->minorista !!}@endforeach 
                             </div>
                          </div> 
                          <br>


                		 <div class="form-group row">
                          <label for="consumidor" class="col-md-4 col-form-label text-md-right">{{ __('Consumidor') }}</label>
							 <div class="col-md-6">
								@foreach($dis as $key => $value){!! $value->consumidor !!}@endforeach 
                             </div>
                          </div> 
                          <br>

 
						  @else
							  
						  
						 <p><h5 style="text-align:center">Distribución del Sevicio</h5></p>
						 <br> <br> 
						 <div class="form-group row">
                          <label for="esperar_cliente" class="col-md-4 col-form-label text-md-right">{{ __('Esperan al cliente') }}</label>
							 <div class="col-md-6">
								@foreach($dis as $key => $value){!! $value->esperar_cliente !!}@endforeach 

                             </div>
                          </div> 
                          <br>
     				     
     				     <div class="form-group row">
                          <label for="buscar_cliente" class="col-md-4 col-form-label text-md-right">{{ __('Se movilizan hacia el cliente') }}</label>
							 <div class="col-md-6">
								@foreach($dis as $key => $value){!! $value->buscar_cliente !!}@endforeach 
                             </div>
                          </div> 
                                               
 
					 @endif
					 @endforeach
						
						
						
						
						 </div>	 <!----tab-id-3--->                          
					    </div> <!----form--->  
					  </div> <!----col---> 
					  

					 
					 <!-----TAB 4 PUBLICIDAD----->
					  <div id="your-tab-id-4">
				       <div class="form-group row">
                        <div class="col-md-12">
							
						@if (count($errors) > 0)
								<div class="alert alert-danger">
									<strong>Error: </strong> Problemas para subir la imagen<br><br>
									<ul>
										@foreach ($errors->all() as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
						@endif


						@if ($message = Session::get('success'))
								<div class="alert alert-success alert-block">
									<button type="button" class="close" data-dismiss="alert">×</button>	
									<strong>{{ $message }}</strong>
								</div>
						@endif	
																					
						@if($pub->count()<1)
							<a href="{{ route('publicidad.create') }}" type="button"  class="btn btn-info">Agregar Publicidad</a>
						@endif

						<table align="right">
							<tr>
								<th class="tg-yw4l">
									@foreach($pub as $key => $value)
										<a href="{{ route('imagen.create') }}" type="button"  class="btn btn-warning">Cargar Logo</a>
										<a href="{{ route('publicidad.edit', $value->id) }}" aria-label="Editar" type="button"  class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></a>
									@endforeach 
								</th>
							</tr>
						</table>
							
						@if($pub->count()>=1)
						
					      <div class="form-group row">
                            <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>
								<div class="col-md-6">
								<br/>
								
								
								@foreach($pub as $key => $value)
								<img src="{{asset($value->logo)}}"/>
								@endforeach
								
								<!--"http://127.0.0.1:8000/{!! $value->logo !!}"-->
								<!---<img src="/images/{{ Session::get('imageName') }}" />-->
								<!--<img src="http://127.0.0.1:8000/images/1529436798.png"/>-->
								
								
								</div>
                           </div> 
    
                            
                          <div class="form-group row">  
                            <label for="marca" class="col-md-4 col-form-label text-md-right">{{ __('Marca') }}</label>
                            <div class="col-md-6">
								@foreach($pub as $key => $value){!! $value->marca !!}@endforeach
                               </div>
                           </div>   
                           
                           <div class="form-group row">
                            <label for="slogan" class="col-md-4 col-form-label text-md-right">{{ __('Eslogan') }}</label>
                            <div class="col-md-6">
								@foreach($pub as $key => $value){!! $value->slogan !!}@endforeach                               
                               </div>
                            </div> 
                        
                           <div class="form-group row">
                            <label for="medios" class="col-md-4 col-form-label text-md-right">{{ __('Medios') }}</label>
                            <div class="col-md-6">
								@foreach($pub as $key => $value){!! $value->medios !!}@endforeach                               
                               </div>
                            </div> 
 
                           <div class="form-group row">
                            <label for="promocion" class="col-md-4 col-form-label text-md-right">{{ __('Promociones') }}</label>
                            <div class="col-md-6">
								@foreach($pub as $key => $value){!! $value->promocion !!}@endforeach                              
                               </div>
                            </div>                             
						@endif



						 </div>	 <!----tab-id-4--->                          
					    </div> <!----form--->  
					  </div> <!----col---> 






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



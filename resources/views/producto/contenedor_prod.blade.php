@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
				<link href="{{ asset('css/switch.css') }}" rel="stylesheet">
				
				<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
				<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
				
                <div class="card-header">{{ __('Descripción del Producto') }}</div>
                <div class="card-body">
					
					<!-----TAB 1----->
					
                    <link type="text/css" rel="stylesheet" href="http://onlinehtmltools.com/tab-generator/skins/skin4/top.css"></script>
					<div class="tabs_holder">
					 <ul>
					  <li><a href="#your-tab-id-1">Producto</a></li>
					  <li class="tab_selected"><a href="#your-tab-id-2">Precio</a></li>
					  <li><a href="#your-tab-id-3">Distribución</a></li>
					  <li><a href="#your-tab-id-3">Publicidad</a></li>
					 </ul>
					 
					 
					 <div class="content_holder">
					  <div id="your-tab-id-1">

						 @if($prod->count()<1)
							<a href="{{ route('producto.create') }}" type="button"  class="btn btn-info">Agregar Producto</a>
						 @endif

						@foreach($prod as $key => $value)
							<a href="{{ route('producto.edit', $value->id) }}" type="button"  class="btn btn-info">Editar Producto</a>
						@endforeach 
						
						<br> <br> 
						  <p><h5 style="text-align:center">Descripción del Producto</h5></p>
					     <div class="form-group row">
                            <label for="basico" class="col-md-4 col-form-label text-md-right">{{ __('Producto Básico') }}</label>
                            <div class="col-md-6">
                               <p><textarea readonly id="basico" cols="19.5" rows="5" class="form-control{{ $errors->has('basico') ? ' is-invalid' : '' }}" name="basico"required autofocus>@foreach($prod as $key => $value){!! $value->basico !!}@endforeach </textarea></p>  
                                 
                               </div>
                            </div> 
                            <br>
                            
                          <div class="form-group row">
                            <label for="aumentado" class="col-md-4 col-form-label text-md-right">{{ __('Producto Aumentado') }}</label>
                            <div class="col-md-6">
                               <p><textarea readonly id="aumentado" cols="19.5" rows="5" class="form-control{{ $errors->has('aumentado') ? ' is-invalid' : '' }}" name="aumentado" required autofocus>@foreach($prod as $key => $value){!! $value->basico !!}@endforeach</textarea></p>
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
                               <p><textarea readonly id="psicologico" cols="19.5" rows="5" class="form-control{{ $errors->has('psicologico') ? ' is-invalid' : '' }}" name="psicologico" required autofocus>@foreach($prod as $key => $value){!! $value->psicologico !!}@endforeach</textarea></p>
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
                               <p><textarea readonly id="comparativa" cols="19.5" rows="5" class="form-control{{ $errors->has('comparativa') ? ' is-invalid' : '' }}" name="comparativa" required autofocus>@foreach($prod as $key => $value){!! $value->comparativa !!}@endforeach</textarea></p>
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
                               <p><textarea readonly id="comparativa" cols="19.5" rows="5" class="form-control{{ $errors->has('competitiva') ? ' is-invalid' : '' }}" name="competitiva"  required autofocus>@foreach($prod as $key => $value){!! $value->competitiva !!}@endforeach</textarea></p>
                                @if ($errors->has('comparativa'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('competitiva') }}</strong>
                                    </span>
                                @endif
                             </div>
                         </div>   

						  

					  </div>
					  </form>
					  
					<!-----TAB 2----->	  
					  
					  <div id="your-tab-id-2">
					   <div class="form-group row">
                        <div class="col-md-12">
						

						@if($prec->count()<1)
							<a href="{{ route('precio.create') }}" type="button"  class="btn btn-info">Agregar Estrategia de Precio</a>
						 @endif

						@foreach($prec as $key => $value)
							<a href="{{ route('precio.edit', $value->id) }}" type="button"  class="btn btn-info">Editar Estrategia de Precio</a>
						@endforeach 
							<p><h5 style="text-align:center">Estrategia de Precio</h5></p>
                            <br> <br> 
                            
                            <div class="form-group row">
                            <label for="basico" class="col-md-4 col-form-label text-md-right">{{ __('Similar a competencia') }}</label>
                       
										<script>
										function myFunc(e) {
											if(e.className == 'active') {
												e.className = 'Si';
											} else {
												e.className = 'No';
											}
										}
										</script>

										<!-- Rounded switch -->
										<label class="switch">
										  <input type="checkbox">
										  <div class="slider round" name ="precio"  onclick="myFunction(this)"></div>
										</label>

							</div>
							
							 
							 <div class="form-group row">
                             <label for="costo" class="col-md-4 col-form-label text-md-right">{{ __('Costo + Margen') }}</label>    

										<!-- Rounded switch -->
										<label class="switch">
										  <input type="checkbox">
										  <div class="slider round" name ="costo" onclick="myFunction(this)"></div>
										</label>

                            </div>
                            
                            <div class="form-group row">
                             <label for="costo" class="col-md-4 col-form-label text-md-right">{{ __('Diferenciacion por estrato + edad + volumen + frecuencia') }}</label>    

										<!-- Rounded switch -->
										<label class="switch">
										  <input type="checkbox">
										  <div class="slider round" name ="costo" onclick="myFunction(this)"></div>
										</label>

                            </div> 
                          
                            <div class="form-group row">
                             <label for="costo" class="col-md-4 col-form-label text-md-right">{{ __('Desnatar') }}</label>    

										<!-- Rounded switch -->
										<label class="switch">
										  <input type="checkbox">
										  <div class="slider round" name ="costo" onclick="myFunction(this)"></div>
										</label>

                            </div> 
                          
                             <div class="form-group row">
                             <label for="costo" class="col-md-4 col-form-label text-md-right">{{ __('Fijo + Variable') }}</label>    

										<!-- Rounded switch -->
										<label class="switch">
										  <input readonly type="checkbox">
										  <div class ="slider round" name ="costo" onclick="myFunction(this)"></div>
										</label>

                            </div> 
						
						<div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Lista de Precios') }}</label>
                            <div class="col-md-6">
                               <p><textarea readonly id="descripcion" cols="19.5" rows="7" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" value="{{ old('descripcion') }}" required autofocus></textarea></p>
                                @if ($errors->has('descripcion'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
                                
                               </div>
                            </div>  
                          

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

                                    @foreach($prod as $key => $value)
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



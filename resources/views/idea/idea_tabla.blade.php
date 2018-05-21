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
							<p><h5>Introduzca las ideas del proyecto a emprender (máximo 3)</h5></p>
                            <a href="{{ route('idea') }}" type="button" class="btn btn-primary btn-lg btn-block">Agregar Idea</a>
                            <br>
                            <table class="table">
                                <thead class="thead-light">
								<p><h4>Listado de ideas</h4></p>	
                                    <tr>
										 <th scope="col">#</th>
                                        <th scope="col">Idea</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($idea as $key => $value)
                                    <tr>    
										<th scope="row">{!! $key+1 !!}</th>
                                        <td>{!! $value->name !!}</td>
                                        <td>
<!--web-->
                                            <a type="button" class="btn btn-info" href="{{ route('idea.edit', $value->id) }}"> Editar</a>
                                        
                                            
                                            <form method="POST" action="{{ route('idea.delete', $value->id) }}">
                                                @csrf
                                                    {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro desea eliminar la idea {!! $value->name !!}?')">
                                                Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            <script type="text/javascript">
							    function sumar()
								{
									var valor1=verificar("A1");
									var valor2=verificar("A2");
									document.getElementById("total").value=parseFloat(valor1)+parseFloat(valor2);
								}
								
								    function verificar(id)

									{

										var obj=document.getElementById(id);

										if(obj.value=="")

											value="0";

										else

											value=obj.value;

									

									}
							</script>
                            
                            
                            
                            
                            
                             <p><h4> Valoración de Ideas (1-10) </h4></p>
                             <p>Elegir: 
                             
                             <input type="text" size="15" id="total" value="0" readonly="readonly" disabled value="0" ><br /><br /></p>
                             
                             
                             <a type="button" class="btn btn-primary btn-lg btn-block" href="{{ route('idea.edit', $value->id) }}"> Añadir Criterio</a>

                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
											<th scope="col">Criterios</th>
											<th scope="col">Idea 1</th>
											<th scope="col">Idea 2</th>
											<th scope="col">Idea 3</th>
									</tr>
									<tr> 
										<td> Inversión Inicial</td>
										<td><input type="number" name="A1" min="1" max="10" step="1" style="width:100px" onkeyup="sumar();" /></td>
										<td><input type="number" name="A2" min="1" max="10" step="1" style="width:100px" onkeyup="sumar();" /></td>
								        <td><input type="number" name="A3" min="1" max="10" step="1" style="width:100px"/></td>
									</tr> 
									
									
									<tr> 
										<td> Tasa de Crecimiento de Mercado </td>
										<td><input type="number" name="B1" min="1" max="10" step="1" style="width:100px"/></td>
										<td><input type="number" name="B2" min="1" max="10" step="1" style="width:100px"/></td>
								        <td><input type="number" name="B3" min="1" max="10" step="1" style="width:100px"/></td>				
							        </tr>
									 
									<tr>
										<td> Tamaño del Mercado Potencial </td>
									    <td><input type="number" name="C1" min="1" max="10" step="1" style="width:100px"/></td>
										<td><input type="number" name="C2" min="1" max="10" step="1" style="width:100px"/></td>
								        <td><input type="number" name="C3" min="1" max="10" step="1" style="width:100px"/></td>				
								     </tr>	                         
									
									 <tr>	
										<td> Cantidad y Rivalidad de la Competencia </td>
									    <td><input type="number" name="D1" min="1" max="10" step="1" style="width:100px"/></td>
										<td><input type="number" name="D2" min="1" max="10" step="1" style="width:100px"/></td>
								        <td><input type="number" name="D3" min="1" max="10" step="1" style="width:100px"/></td>				
								     </tr>										 	 
									
									
									<tr> <td> Poder de Proveedores</td>
									    <td><input type="number" name="E1" min="1" max="10" step="1" style="width:100px"/></td>
										<td><input type="number" name="E2" min="1" max="10" step="1" style="width:100px"/></td>
								        <td><input type="number" name="E3" min="1" max="10" step="1" style="width:100px"/></td>				
								     </tr>
								     	 
									<tr> <td> Amenaza de sustitutos </td>
									    <td><input type="number" name="F1" min="1" max="10" step="1" style="width:100px"/></td>
										<td><input type="number" name="F2" min="1" max="10" step="1" style="width:100px"/></td>
								        <td><input type="number" name="F3" min="1" max="10" step="1" style="width:100px"/></td>				
								     </tr>
								      
									<tr> <td> Conocimiento del sector</td>
										<td><input type="number" name="G1" min="1" max="10" step="1" style="width:100px"/></td>
										<td><input type="number" name="G2" min="1" max="10" step="1" style="width:100px"/></td>
								        <td><input type="number" name="G3" min="1" max="10" step="1" style="width:100px"/></td>				
								     </tr>
								     
									<tr> <td> Requerimiento de tiempo</td>
									    <td><input type="number" name="H1" min="1" max="10" step="1" style="width:100px"/></td>
										<td><input type="number" name="H2" min="1" max="10" step="1" style="width:100px"/></td>
								        <td><input type="number" name="H3" min="1" max="10" step="1" style="width:100px"/></td>				
								     </tr>
								      
									<tr> <td> Apoyo familiar </td>
										<td><input type="number" name="I1" min="1" max="10" step="1" style="width:100px"/></td>
										<td><input type="number" name="I2" min="1" max="10" step="1" style="width:100px"/></td>
								        <td><input type="number" name="I3" min="1" max="10" step="1" style="width:100px"/></td>				
								     </tr>
								     
									<tr> <td> Necesidad de tecnología</td>
										<td><input type="number" name="J1" min="1" max="10" step="1" style="width:100px"/></td>
										<td><input type="number" name="J2" min="1" max="10" step="1" style="width:100px"/></td>
								        <td><input type="number" name="J3" min="1" max="10" step="1" style="width:100px"/></td>				
								     </tr>
								     
									<tr> <td> Restricciones Legales </td>
										<td><input type="number" name="K1" min="1" max="10" step="1" style="width:100px"/></td>
										<td><input type="number" name="K2" min="1" max="10" step="1" style="width:100px"/></td>
								        <td><input type="number" name="K3" min="1" max="10" step="1" style="width:100px"/></td>				
								     </tr>
								     
									<tr> <td> Disponibilidad de financiamiento</td>
										<td><input type="number" name="L1" min="1" max="10" step="1" style="width:100px"/></td>
										<td><input type="number" name="L2" min="1" max="10" step="1" style="width:100px"/></td>
								        <td><input type="number" name="L3" min="1" max="10" step="1" style="width:100px"/></td>				
								     </tr>
									<tr> <td> Rentabilidad </td>
										<td><input type="number" name="M1" min="1" max="10" step="1" style="width:100px"/></td>
										<td><input type="number" name="M2" min="1" max="10" step="1" style="width:100px"/></td>
								        <td><input type="number" name="M3" min="1" max="10" step="1" style="width:100px"/></td>				
								     </tr>
								</thead>    
                            </table>
                            <div class="form-group row mb-0">
								<div class="col-md-6 offset-md-4">
                                 <a href="{{ route('proyectos.index') }}" type="button" class="btn btn-primary">
                                        {{ __('Cancelar ') }}</a>
                                <button class="btn btn-primary" type="summit">
                                        {{ __('Guardar ') }}</button>
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

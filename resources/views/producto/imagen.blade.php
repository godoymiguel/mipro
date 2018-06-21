@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
				<div class="card-header">{{ __('Publicidad y Promoción') }}</div>
					<div class="card-body">	

				<div class="container">
				<p><h5 style="text-align:center">Cargar Logo</h5></p>

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

					<div class="row">
						<div class="col-md-4">
							<strong>Logo cargado:</strong>
							<br/>
							
							<img src="/images/{{ Session::get('imageName') }}" />
						</div>
							<div class="col-md-4">

					</div>
			@endif


						{!! Form::open(array('route' => 'cargar_imagen','enctype' => 'multipart/form-data')) !!}
							<div class="row">
								<div class="col-md-12">
									<br/>
									{!! Form::file('image', array('class' => 'image')) !!}
								</div>
								<div class="col-md-12">
									<br/>
									<button type="submit" class="btn btn-success">Subir Imagen</button>
								</div>
							</div>
						{!! Form::close() !!}
						</div>

					</div>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection

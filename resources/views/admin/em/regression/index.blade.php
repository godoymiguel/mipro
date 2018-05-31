@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Regresión') }}</div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <a href="{{ route('regresion.create') }}" type="button" class="btn btn-primary btn-lg btn-block">Calcular Regresion</a>
                            <br>

                            
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
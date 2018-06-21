@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{$errors->first()}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Investigación de Campo - Proyección') }}</div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <a href="{{ route('projectionInvestigation.create') }}" type="button" class="btn btn-primary btn-lg btn-block">Calcular Proyección</a>
                            <br>
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Año</th>
                                        <th scope="col">DEMANDA</th>
                                        <th scope="col">OFERTA</b></th>
                                        <th scope="col">Brecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($investigation->projection as $key => $value)
                                    <tr>
                                        <th scope="row">{!! $key +1 !!}</th>
                                        <td>{!! $value->year !!}</td>
                                        <td>{!! $value->demand !!}</td>
                                        <td>{!! $value->offer !!}</td>
                                        <td>{!! $value->gap !!}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <a href="{{ route('marketGap.investigation',$investigation->id) }}" type="button" class="btn btn-primary btn-md btn-block">Becha de Mercado</a>
                            <a href="{{ route('investigation.index') }}" type="button" class="btn btn-primary btn-md btn-block">Investigacion</a>
                            <a href="{{ route('demand.index') }}" type="button" class="btn btn-primary btn-md btn-block">Demanda</a>
                            <a href="{{ route('offer.index') }}" type="button" class="btn btn-primary btn-md btn-block">Oferta</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
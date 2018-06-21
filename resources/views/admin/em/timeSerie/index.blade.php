@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{$errors->first()}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Serie Temporal') }}</div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <a href="{{ route('serietemporal.create') }}" type="button" class="btn btn-primary btn-lg btn-inline">Agregar Dato a la Serie</a>
                            <a href="{{ route('import.csv') }}" type="button" class="btn btn-primary btn-lg btn-inline">Agregar Datos con .CSV</a>
                            <br>
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Año</th>
                                        <th scope="col">Producción</th>
                                        <th scope="col">Importaciones</th>
                                        <th scope="col">Var. Existencia</th>
                                        <th scope="col">Exportación</th>
                                        <th scope="col">Consumo Aparente</th>
                                        <th scope="col">Población</th>
                                        <th scope="col">Consumo Precápita</th>
                                        <th scope="col">Precio del Bien</th>
                                        <th scope="col">Ingreso Real</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($timeSerie as $key => $value)
                                    <tr>
                                        <th scope="row">{!! $key+1 !!}</th>
                                        <td>{!! $value->year !!}</td>
                                        <td>{!! $value->production !!}</td>
                                        <td>{!! $value->import !!}</td>
                                        <td>{!! $value->existence !!}</td>
                                        <td>{!! $value->export !!}</td>
                                        <td>{!! $value->apparent_consumption !!}</td>
                                        <td>{!! $value->population !!}</td>
                                        <td>{!! $value->precapita_consumption !!}</td>
                                        <td>{!! $value->price !!}</td>
                                        <td>{!! $value->real_income !!}</td>
                                        <td>
                                            <a type="button" class="btn btn-info" href="{{ route('serietemporal.edit', $value->id) }}">
                                                Editar
                                            </a>
                                            <form method="POST" action="{{ route('serietemporal.destroy', $value->id) }}">
                                                @csrf
                                                    {{ method_field('Delete') }}
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro Desea Eliminar el registro {!! $value->year !!}?')">
                                                    Borrar
                                                    </button>
                                                </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <a href="{{ route('regresion.index') }}" type="button" class="btn btn-primary btn-lg btn-block">Regresión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

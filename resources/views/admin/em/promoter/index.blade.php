@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Promotores') }}</div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <a href="{{ route('promotor.create') }}" type="button" class="btn btn-primary btn-lg btn-block">Agregar Promotor</a>
                            <br>
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Cedula</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($promoter as $key => $value)
                                    <tr>
                                        <th scope="row">{!! $key+1 !!}</th>
                                        <td>{!! $value->name !!}</td>
                                        <td>{!! $value->type .'-'. $value->cedula !!}</td>
                                        <td>{!! $value->email !!}</td>
                                        <td>
                                            <a type="button" class="btn btn-info" href="{{ route('promotor.edit', $value->id) }}">Editar</a>
                                            <form method="POST" action="{{ route('promotor.destroy', $value->id) }}">
                                                @csrf
                                                    {{ method_field('Delete') }}
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro Desea Eliminar el registro {!! $value->name !!}?')">Borrar</button>
                                                </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
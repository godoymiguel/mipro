@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Proyectos') }}</div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <a href="{{ route('proyectos.create') }}" type="button" class="btn btn-primary btn-lg btn-block">Agregar Proyecto</a>
                            <br>
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Activo</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($project as $key => $value)
                                    <tr>
                                        <th scope="row">{!! $key+1 !!}</th>
                                        <td>{!! $value->name !!}</td>
                                        <td>{!! $value->user->name .' '. $value->user->lastname!!}</td>
                                        <td>
                                            @if( $value->active == 1)
                                                Activo
                                            @else
                                                Inactivo
                                            @endif
                                        </td>
                                        <td>
                                            <a type="button" class="btn btn-info" href="{{ route('proyectos.edit', $value->id) }}">
                                                Editar
                                            </a>
                                            @if($value->active)
                                                <form method="POST" action="{{ route('proyectos.active', $value->id) }}">
                                                @csrf
                                                    {{ method_field('PUT') }}
                                                    <input type="hidden" name="active" value="false">
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro Desea Inactivar el registro {!! $value->name !!}?')">
                                                    Inactivar
                                                    </button>
                                                </form>
                                            @else
                                                <form method="POST" action="{{ route('proyectos.active', $value->id) }}">
                                                @csrf
                                                    {{ method_field('PUT') }}
                                                <input type="hidden" name="active" value="true">
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro Desea Activar el registro {!! $value->name !!}?')">
                                                Activar
                                                </button>
                                            </form>
                                            @endif
                                            <form method="POST" action="{{ route('proyectos.destroy', $value->id) }}">
                                                @csrf
                                                    {{ method_field('Destroy') }}
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro Desea Eliminar el registro {!! $value->name !!}?')">
                                                    Borrar
                                                    </button>
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

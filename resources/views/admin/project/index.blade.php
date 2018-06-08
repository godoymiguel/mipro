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
                            @if($project->count() > 0)
                                <a href="{{ route('promotor.create') }}" type="button" class="btn btn-primary btn-lg btn-block">Agregar Promotores</a>
                                <br>
                            @endif
                            <a href="{{ route('proyectos.create') }}" type="button" class="btn btn-primary btn-lg btn-block">Agregar Proyecto</a>
                            <br>
                            
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Usuario</th>
                                        <th scope="col">Seleccionado</th>
                                        <th scope="col"></th>
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
                                               Si
                                            @else
                                                No
                                            @endif
                                        </td>
                                        <td>
                                            <a type="button" class="btn btn-info" href="{{ route('proyectos.edit', $value->id) }}">
                                                Editar
                                            </a>
                                            
                                            <form method="POST" action="{{ route('proyectos.active', $value->id) }}">
                                            @csrf
                                                {{ method_field('PUT') }}
                                                <input type="hidden" name="active" value="true">
                                                <button type="submit" class="btn btn-success" >
                                                Seleccionar
                                                </button>
                                            </form>

                                            <form method="POST" action="{{ route('proyectos.destroy', $value->id) }}">
                                                @csrf
                                                    {{ method_field('Delete') }}
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
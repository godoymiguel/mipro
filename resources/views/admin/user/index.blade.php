@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Usuarios') }}</div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <a href="{{ route('usuario.create') }}" type="button" class="btn btn-primary btn-lg btn-block">Agregar Usuario</a>
                            <br>
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Rol</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user as $key => $value)
                                    <tr>
                                        <th scope="row">{!! $key+1 !!}</th>
                                        <td>{!! $value->name .' '. $value->lastname !!}</td>
                                        <td>{!! $value->username !!}</td>
                                        <td>{!! $value->email !!}</td>
                                        <td>{!! $value->rol->title !!}</td>
                                        <td>
                                            @if( $value->active == 1)
                                                Activo
                                            @else
                                                Inactivo
                                            @endif            
                                        </td>
                                        <td>
                                            <a type="button" class="btn btn-success" href="{{ route('usuario.show', $value->id) }}">
                                                V
                                            </a>
                                            <a type="button" class="btn btn-info" href="{{ route('usuario.edit', $value->id) }}">
                                                E
                                            </a>
                                            @if($value->active)
                                                <form method="POST" action="{{ route('user.active', $value->id) }}">
                                                @csrf
                                                    {{ method_field('PUT') }}
                                                <input type="hidden" name="active" value="false">
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro Desea Inactivar el registro {!! $value->email !!}?')">
                                                I
                                                </button>
                                            </form>
                                            @else
                                                <form method="POST" action="{{ route('user.active', $value->id) }}">
                                                @csrf
                                                    {{ method_field('PUT') }}
                                                <input type="hidden" name="active" value="true">
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro Desea Activar el registro {!! $value->email !!}?')">
                                                A
                                                </button>
                                            </form>
                                            @endif
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
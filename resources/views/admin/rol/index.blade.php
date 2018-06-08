@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Roles') }}</div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <a href="{{ route('rol.create') }}" type="button" class="btn btn-primary btn-lg btn-block">Agregar Rol</a>
                            <br>
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Rol</th>
                                        <th scope="col">Titulo</th>
                                        <th scope="col">Activo</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rol as $key => $value)
                                    <tr>
                                        <th scope="row">{!! $key+1 !!}</th>
                                        <td>{!! $value->value !!}</td>
                                        <td>{!! $value->title !!}</td>
                                        <td>
                                            @if( $value->active == 1)
                                                Activo
                                            @else
                                                Inactivo
                                            @endif
                                        </td>
                                        <td>
                                            <a type="button" class="btn btn-info" href="{{ route('rol.edit', $value->id) }}">
                                                E
                                            </a>
                                            @if($value->active)
                                                <form method="POST" action="{{ route('rol.active', $value->id) }}">
                                                @csrf
                                                    {{ method_field('PUT') }}
                                                <input type="hidden" name="active" value="false">
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro Desea Inactivar el registro {!! $value->title !!}?')">
                                                I
                                                </button>
                                            </form>
                                            @else
                                                <form method="POST" action="{{ route('rol.active', $value->id) }}">
                                                @csrf
                                                    {{ method_field('PUT') }}
                                                <input type="hidden" name="active" value="true">
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro Desea Activar el registro {!! $value->title !!}?')">
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
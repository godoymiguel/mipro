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
                                        <th scope="col">Acciones</th>
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
                                                Rol Activo
                                            @else
                                                Rol Inactivo
                                            @endif
                                        </td>
                                        <td>
                                            <a type="button" class="btn btn-info" href="{{ route('rol.edit', $value->id) }}">
                                                E
                                            </a>
                                            <a type="button" class="btn btn-danger" href="">
                                                D
                                            </a>
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
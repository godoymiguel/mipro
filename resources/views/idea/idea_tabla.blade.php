@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
<!---->
                <div class="card-header">{{ __('Idea') }}</div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
<!--web-->
                            <a href="{{ route('idea') }}" type="button" class="btn btn-primary btn-lg btn-block">Agregar Idea</a>
                            <br>
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Idea</th>
                               
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($idea as $key => $value)
                                    <tr>
                                        <th scope="row">{!! $key+1 !!}</th>
                                        <td>{!! $value->name !!}</td>
                                        <td>
<!--web-->
                                            <a type="button" class="btn btn-info" href="{{ route('idea.edit', $value->id) }}">
                                                E
                                            </a>
                                           
                                                <form method="POST" action="{{ route('idea.delete', $value->id) }}">
                                                @csrf
                                                    {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro Desea eliminar el registro {!! $value->name !!}?')">
                                                I
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

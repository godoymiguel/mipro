@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('PASTEL') }}</div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-md-12">
                                     <label for="coefficient_r1" class="col-form-label text-md-left">{{ __('Resultado de Factores')}}</label>
                                </div>
                                <div class="col-md-12">
                                     <label for="coefficient_r1" class="col-form-label text-md-left">{{ __('Político: ') .' '. $total_p}}</label>
                                </div>
                                <div class="col-md-12">
                                     <label for="coefficient_r1" class="col-form-label text-md-left">{{ __('Ambiental: ') .' '. $total_a}}</label>
                                </div>
                                <div class="col-md-12">
                                     <label for="coefficient_r1" class="col-form-label text-md-left">{{ __('SocioCultural: ') .' '. $total_s}}</label>
                                </div>
                                <div class="col-md-12">
                                     <label for="coefficient_r1" class="col-form-label text-md-left">{{ __('Tecnológico: ') .' '. $total_t}}</label>
                                </div>
                                <div class="col-md-12">
                                     <label for="coefficient_r1" class="col-form-label text-md-left">{{ __('Económico: ') .' '. $total_e}}</label>
                                </div>
                                <div class="col-md-12">
                                     <label for="coefficient_r1" class="col-form-label text-md-left">{{ __('Legal: ') .' '. $total_l}}</label>
                                </div>
                                <div class="col-md-12">
                                     <label for="coefficient_r1" class="col-form-label text-md-left">{{ $risk .' '. __('Índice de Riesgo (cerca de 1 poco riesgo y cerca de 5 muy riesgoso)') }}</label>
                                </div>
                            </div>
                            <br>
                            <a href="{{ route('pastel.create') }}" type="button" class="btn btn-primary btn-lg btn-block">Agregar Variable a Factor</a>
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Factor</th>
                                        <th scope="col">Variable</th>
                                        <th scope="col">Valor</th>
                                        <th scope="col">Justificacion</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pastel->where('factor','P') as $key => $value)
                                    <tr>
                                        <th scope="row">Político</th>
                                        <td>{!! $value->title !!}</td>
                                        <td>
                                            @if($value->value== 0)
                                                -
                                            @elseif($value->value== 5)
                                                Muy Negativo
                                            @elseif($value->value== 4)
                                                Negativo
                                            @elseif($value->value== 3)
                                                Neutral
                                            @elseif($value->value== 2)
                                                Positivo
                                            @elseif($value->value== 1)
                                                Muy Positivo
                                            @endif
                                        </td>
                                        <td>{!! $value->justification !!}</td>
                                        <td>
                                            <a type="button" class="btn btn-info btn-inline" href="{{ route('pastel.value', $value->id) }}">
                                                Valorar
                                            </a>
                                            <a type="button" class="btn btn-info btn-inline" href="{{ route('pastel.edit', $value->id) }}">
                                                Editar
                                            </a>
                                            <form method="POST" action="{{ route('pastel.destroy', $value->id) }}">
                                                @csrf
                                                    {{ method_field('Delete') }}
                                                    <button type="submit" class="btn btn-danger btn-inline" onclick="return confirm('¿Seguro Desea Eliminar el registro {!! $value->year !!}?')">
                                                    Borrar
                                                    </button>
                                                </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @foreach($pastel->where('factor','A') as $key => $value)
                                    <tr>
                                        <th scope="row">Ambiental</th>
                                        <td>{!! $value->title !!}</td>
                                        <td>
                                            @if($value->value== 0)
                                                -
                                            @elseif($value->value== 5)
                                                Muy Negativo
                                            @elseif($value->value== 4)
                                                Negativo
                                            @elseif($value->value== 3)
                                                Neutral
                                            @elseif($value->value== 2)
                                                Positivo
                                            @elseif($value->value== 1)
                                                Muy Positivo
                                            @endif
                                        </td>
                                        <td>{!! $value->justification !!}</td>
                                        <td>
                                            <a type="button" class="btn btn-info" href="{{ route('pastel.value', $value->id) }}">
                                                Valorar
                                            </a>
                                            <a type="button" class="btn btn-info" href="{{ route('pastel.edit', $value->id) }}">
                                                Editar
                                            </a>
                                            <form method="POST" action="{{ route('pastel.destroy', $value->id) }}">
                                                @csrf
                                                    {{ method_field('Delete') }}
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro Desea Eliminar el registro {!! $value->year !!}?')">
                                                    Borrar
                                                    </button>
                                                </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @foreach($pastel->where('factor','S') as $key => $value)
                                    <tr>
                                        <th scope="row">SocioCultural</th>
                                        <td>{!! $value->title !!}</td>
                                        <td>
                                            @if($value->value== 0)
                                                -
                                            @elseif($value->value== 5)
                                                Muy Negativo
                                            @elseif($value->value== 4)
                                                Negativo
                                            @elseif($value->value== 3)
                                                Neutral
                                            @elseif($value->value== 2)
                                                Positivo
                                            @elseif($value->value== 1)
                                                Muy Positivo
                                            @endif
                                        </td>
                                        <td>{!! $value->justification !!}</td>
                                        <td>
                                            <a type="button" class="btn btn-info btn-inline" href="{{ route('pastel.value', $value->id) }}">
                                                Valorar
                                            </a>
                                            <a type="button" class="btn btn-info btn-inline" href="{{ route('pastel.edit', $value->id) }}">
                                                Editar
                                            </a>
                                            <form method="POST" action="{{ route('pastel.destroy', $value->id) }}">
                                                @csrf
                                                    {{ method_field('Delete') }}
                                                    <button type="submit" class="btn btn-danger btn-inline" onclick="return confirm('¿Seguro Desea Eliminar el registro {!! $value->year !!}?')">
                                                    Borrar
                                                    </button>
                                                </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @foreach($pastel->where('factor','T') as $key => $value)
                                    <tr>
                                        <th scope="row">Tecnológico</th>
                                        <td>{!! $value->title !!}</td>
                                        <td>
                                            @if($value->value== 0)
                                                -
                                            @elseif($value->value== 5)
                                                Muy Negativo
                                            @elseif($value->value== 4)
                                                Negativo
                                            @elseif($value->value== 3)
                                                Neutral
                                            @elseif($value->value== 2)
                                                Positivo
                                            @elseif($value->value== 1)
                                                Muy Positivo
                                            @endif
                                        </td>
                                        <td>{!! $value->justification !!}</td>
                                        <td>
                                            <a type="button" class="btn btn-info btn-inline" href="{{ route('pastel.value', $value->id) }}">
                                                Valorar
                                            </a>
                                            <a type="button" class="btn btn-info btn-inline" href="{{ route('pastel.edit', $value->id) }}">
                                                Editar
                                            </a>
                                            <form method="POST" action="{{ route('pastel.destroy', $value->id) }}">
                                                @csrf
                                                    {{ method_field('Delete') }}
                                                    <button type="submit" class="btn btn-danger btn-inline" onclick="return confirm('¿Seguro Desea Eliminar el registro {!! $value->year !!}?')">
                                                    Borrar
                                                    </button>
                                                </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @foreach($pastel->where('factor','E') as $key => $value)
                                    <tr>
                                        <th scope="row">Económico</th>
                                        <td>{!! $value->title !!}</td>
                                        <td>
                                            @if($value->value== 0)
                                                -
                                            @elseif($value->value== 5)
                                                Muy Negativo
                                            @elseif($value->value== 4)
                                                Negativo
                                            @elseif($value->value== 3)
                                                Neutral
                                            @elseif($value->value== 2)
                                                Positivo
                                            @elseif($value->value== 1)
                                                Muy Positivo
                                            @endif
                                        </td>
                                        <td>{!! $value->justification !!}</td>
                                        <td>
                                            <a type="button" class="btn btn-info btn-inline" href="{{ route('pastel.value', $value->id) }}">
                                                Valorar
                                            </a>
                                            <a type="button" class="btn btn-info btn-inline" href="{{ route('pastel.edit', $value->id) }}">
                                                Editar
                                            </a>
                                            <form method="POST" action="{{ route('pastel.destroy', $value->id) }}">
                                                @csrf
                                                    {{ method_field('Delete') }}
                                                    <button type="submit" class="btn btn-danger btn-inline" onclick="return confirm('¿Seguro Desea Eliminar el registro {!! $value->year !!}?')">
                                                    Borrar
                                                    </button>
                                                </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @foreach($pastel->where('factor','L') as $key => $value)
                                    <tr>
                                        <th scope="row">Legal</th>
                                        <td>{!! $value->title !!}</td>
                                        <td>
                                            @if($value->value== 0)
                                                -
                                            @elseif($value->value== 5)
                                                Muy Negativo
                                            @elseif($value->value== 4)
                                                Negativo
                                            @elseif($value->value== 3)
                                                Neutral
                                            @elseif($value->value== 2)
                                                Positivo
                                            @elseif($value->value== 1)
                                                Muy Positivo
                                            @endif
                                        </td>
                                        <td>{!! $value->justification !!}</td>
                                        <td>
                                            <a type="button" class="btn btn-info btn-inline" href="{{ route('pastel.value', $value->id) }}">
                                                Valorar
                                            </a>
                                            <a type="button" class="btn btn-info btn-inline" href="{{ route('pastel.edit', $value->id) }}">
                                                Editar
                                            </a>
                                            <form method="POST" action="{{ route('pastel.destroy', $value->id) }}">
                                                @csrf
                                                    {{ method_field('Delete') }}
                                                    <button type="submit" class="btn btn-danger btn-inline" onclick="return confirm('¿Seguro Desea Eliminar el registro {!! $value->year !!}?')">
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
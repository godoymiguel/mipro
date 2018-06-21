@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Criterios de la Industria Tipo ') . $industry->name }}</div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <a href="{{ route('industry.index') }}" type="button" class="btn btn-primary btn-lg btn-block">Volver a Industria</a>
                            <br>
                            <table class="table">
                                <caption><h5><strong>PROVEEDORES</strong></h5></caption>
                                <thead class="thead-light">
                                    <tr>                                        
                                        <th scope="col">Criterio</th>
                                        <th scope="col">Valor</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($criterion->where('criterion','SUPPLIERS') as $key => $value)
                                    <tr>                                        
                                        <td>{!! $value->title !!}</td>
                                        <td>
                                            @if($value->value == 0)
                                                NO
                                            @else
                                                SI
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->value == 0)
                                                <form method="POST" action="{{ route('criterionIndustry.update', $value->id) }}">
                                                @csrf
                                                    {{ method_field('PUT') }}
                                                <input type="hidden" name="value" value="1">
                                                <button type="submit" class="btn btn-outline-secondary">
                                                Cambiar Valor
                                                </button>
                                            </form>
                                            @else
                                                <form method="POST" action="{{ route('criterionIndustry.update', $value->id) }}">
                                                @csrf
                                                    {{ method_field('PUT') }}
                                                <input type="hidden" name="value" value="0">
                                                <button type="submit" class="btn btn-outline-secondary">
                                                Cambiar Valor
                                                </button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br><hr>
                            <table class="table">
                                <caption><h5><strong>COMPETIDORES</strong></h5></caption>
                                <thead class="thead-light">
                                    <tr>                                        
                                        <th scope="col">Criterio</th>
                                        <th scope="col">Valor</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($criterion->where('criterion','COMPETITORS') as $key => $value)
                                    <tr>                                        
                                        <td>{!! $value->title !!}</td>
                                        <td>
                                            @if($value->value == 0)
                                                NO
                                            @else
                                                SI
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->value == 0)
                                                <form method="POST" action="{{ route('criterionIndustry.update', $value->id) }}">
                                                @csrf
                                                    {{ method_field('PUT') }}
                                                <input type="hidden" name="value" value="1">
                                                <button type="submit" class="btn btn-outline-secondary">
                                                Cambiar Valor
                                                </button>
                                            </form>
                                            @else
                                                <form method="POST" action="{{ route('criterionIndustry.update', $value->id) }}">
                                                @csrf
                                                    {{ method_field('PUT') }}
                                                <input type="hidden" name="value" value="0">
                                                <button type="submit" class="btn btn-outline-secondary">
                                                Cambiar Valor
                                                </button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br><hr>
                            <table class="table">
                                <caption><h5><strong>CONSUMIDORES O CLIENTES</strong></h5></caption>
                                <thead class="thead-light">
                                    <tr>                                        
                                        <th scope="col">Criterio</th>
                                        <th scope="col">Valor</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($criterion->where('criterion','CONSUMERS') as $key => $value)
                                    <tr>                                        
                                        <td>{!! $value->title !!}</td>
                                        <td>
                                            @if($value->value == 0)
                                                NO
                                            @else
                                                SI
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->value == 0)
                                                <form method="POST" action="{{ route('criterionIndustry.update', $value->id) }}">
                                                @csrf
                                                    {{ method_field('PUT') }}
                                                <input type="hidden" name="value" value="1">
                                                <button type="submit" class="btn btn-outline-secondary">
                                                Cambiar Valor
                                                </button>
                                            </form>
                                            @else
                                                <form method="POST" action="{{ route('criterionIndustry.update', $value->id) }}">
                                                @csrf
                                                    {{ method_field('PUT') }}
                                                <input type="hidden" name="value" value="0">
                                                <button type="submit" class="btn btn-outline-secondary">
                                                Cambiar Valor
                                                </button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br><hr>
                            <table class="table">
                                <caption><h5><strong>NUEVOS COMPETIDORES</strong></h5></caption>
                                <thead class="thead-light">
                                    <tr>                                        
                                        <th scope="col">Criterio</th>
                                        <th scope="col">Valor</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($criterion->where('criterion','NEW') as $key => $value)
                                    <tr>                                        
                                        <td>{!! $value->title !!}</td>
                                        <td>
                                            @if($value->value == 0)
                                                NO
                                            @else
                                                SI
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->value == 0)
                                                <form method="POST" action="{{ route('criterionIndustry.update', $value->id) }}">
                                                @csrf
                                                    {{ method_field('PUT') }}
                                                <input type="hidden" name="value" value="1">
                                                <button type="submit" class="btn btn-outline-secondary">
                                                Cambiar Valor
                                                </button>
                                            </form>
                                            @else
                                                <form method="POST" action="{{ route('criterionIndustry.update', $value->id) }}">
                                                @csrf
                                                    {{ method_field('PUT') }}
                                                <input type="hidden" name="value" value="0">
                                                <button type="submit" class="btn btn-outline-secondary">
                                                Cambiar Valor
                                                </button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br><hr>
                            <table class="table">
                                <caption><h5><strong>SUSTITUTOS</strong></h5></caption>
                                <thead class="thead-light">
                                    <tr>                                        
                                        <th scope="col">Criterio</th>
                                        <th scope="col">Valor</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($criterion->where('criterion','SUBSTITUTES') as $key => $value)
                                    <tr>                                        
                                        <td>{!! $value->title !!}</td>
                                        <td>
                                            @if($value->value == 0)
                                                NO
                                            @else
                                                SI
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->value == 0)
                                                <form method="POST" action="{{ route('criterionIndustry.update', $value->id) }}">
                                                @csrf
                                                    {{ method_field('PUT') }}
                                                <input type="hidden" name="value" value="1">
                                                <button type="submit" class="btn btn-outline-secondary">
                                                Cambiar Valor
                                                </button>
                                            </form>
                                            @else
                                                <form method="POST" action="{{ route('criterionIndustry.update', $value->id) }}">
                                                @csrf
                                                    {{ method_field('PUT') }}
                                                <input type="hidden" name="value" value="0">
                                                <button type="submit" class="btn btn-outline-secondary">
                                                Cambiar Valor
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
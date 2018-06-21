@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Promotor') }}</div>

                <div class="card-body">
                    @if($method == 'create')
                        <form method="POST" action="{{ route('promotor.store') }}">
                        @csrf
                    @elseif($method == 'edit')
                        <form method="POST" action="{{ route('promotor.update', $promoter->id) }}">
                        @csrf
                            {{ method_field('PUT') }}
                    @endif
                        <div class="form-group row">
                            <label for="cedula" class="col-md-4 col-form-label text-md-right">{{ __('Nombre y Apellidos') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $promoter->name) }}" placeholder="Daniel Ramirez" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cedula" class="col-md-4 col-form-label text-md-right">{{ __('Cedula') }}</label>

                            <div class="col-md-2">
                                <select name="type" class="custom-select" {{$method == 'show' ? 'disabled' : null }}>
                                    <option {{ $promoter->type == "V" ? 'selected=selected':null}} value="V">V -</option>
                                    <option {{ $promoter->type == "E" ? 'selected=selected':null}} value="E">E -</option>
                                    <option {{ $promoter->type == "J" ? 'selected=selected':null}} value="J">J -</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input id="cedula" type="number" class="form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}" name="cedula" value="{{ old('cedula', $promoter->cedula) }}" placeholder="1234567" required autofocus {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('cedula'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cedula') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email', $promoter->email) }}" placeholder="mipro@mail.com" required {{$method == 'show' ? 'disabled' : null }}>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if($method == 'create' || $method == 'edit')
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Guardar') }}
                                    </button>
                                </div>
                            </div>
                        @elseif($method == 'show')
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a href="{{ route('promotor.index') }}" type="button" class="btn btn-primary">
                                        {{ __('Volver a Listado') }}
                                    </a>
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

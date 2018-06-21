@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Investigación de Campo') }}</div>

                <div class="card-body">
                    @if($method == 'create')
                        <form method="POST" action="{{ route('investigation.store') }}">
                        @csrf
                    @elseif($method == 'edit')
                        <form method="POST" action="{{ route('investigation.update', $investigation->id) }}">
                        @csrf
                            {{ method_field('PUT') }}
                    @endif

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Objetivos de la Investigación') }}</label>

                            <div class="col-md-6">
                                <textarea id="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" rows="10" placeholder="Escriba aqui..." required autofocus {{$method == 'show' ? 'disabled' : null }}>{{ old('title', $investigation->title) }}</textarea>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
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
                                    <a href="{{ route('investigation.index') }}" type="button" class="btn btn-primary">
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

@extends('layouts.app', ['activePage' => 'Alta de Terminales', 'titlePage' => __('Alta de Terminales')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('terminales.update', $terminal) }}" autocomplete="off" class="form-horizontal" method="post">
                    @csrf
            		@method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">
                                {{ __('Editar Usuario') }}
                            </h4>
                            <p class="card-category">
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a class="btn btn-sm btn-primary" href="{{ route('terminales.index') }}">
                                        {{ __('Volver a la lista') }}
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-1 col-form-label text-center">
                                    {{ __('Nombre') }}
                                </label>
                                <div class="col-sm-4">
                                    <div class="form-group{{ $errors->has('razon_social') ? ' has-danger' : '' }}">
                                        <input aria-required="true" class="form-control{{ $errors->has('razon_social') ? ' is-invalid' : '' }}" id="input-name" name="razon_social" placeholder="{{ __('Nombre') }}" required="true" type="text" value="{{ old('razon_social', $terminal->razon_social) }}"/>
                                        @if ($errors->has('razon_social'))
                                        <span class="error text-danger" for="input-name" id="name-error">
                                            {{ $errors->first('razon_social') }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }} col-md-5">
                                    <label for="input-rol">
                                        status
                                    </label>
                                    <select class="custom-select custom-select-sm{{ $errors->has('status') ? ' is-invalid' : '' }}" id="input-rol" name="status">
                                        @if($terminal->status == 1)
                                        <option selected="" value="{{ $terminal->status }}">
                                            Activo
                                        </option>
                                        <option value="0">
                                            Inactivo
                                        </option>
                                        @else
                                        <option value="1">
                                            Activo
                                        </option>
                                        <option selected="" value="{{ $terminal->status }}">
                                            Inactivo
                                        </option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button class="btn btn-primary" type="submit">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

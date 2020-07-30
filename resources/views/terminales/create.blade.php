@extends('layouts.app', ['activePage' => 'Alta de Terminales', 'titlePage' => __('Alta de Terminales')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">
                            {{ __('Terminales') }}
                        </h4>
                        <p class="card-category">
                            {{ __('Aquí puedes administrar todas las terminales.') }}
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a class="btn btn-sm btn-primary" href="{{ route('terminales.index') }}">
                                    {{ __('Regresar a Lista') }}
                                </a>
                            </div>
                        </div>
                        <form action="{{ route('terminales.store') }}" autocomplete="off" class="form-horizontal" method="post">
                            @csrf
                    		@method('post')
                            <div class="row">
                                <label class="col-sm-2 col-form-label">
                                    {{ __('Nombre de la terminal') }}
                                </label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('razon_social') ? ' has-danger' : '' }}">
                                        <input aria-required="true" class="form-control{{ $errors->has('razon_social') ? ' is-invalid' : '' }}" id="input-name" name="razon_social" placeholder="{{ __('Nombre de la terminal') }}" required="true" type="text" value="{{ old('razon_social') }}"/>
                                        @if ($errors->has('razon_social'))
                                        <span class="error text-danger" for="input-name" id="name-error">
                                            {{ $errors->first('razon_social') }}
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="status" value="1">
                            <div class="card-footer ml-auto mr-auto">
                            	<button type="submit" class="btn btn-primary">{{ __('Añadir Terminal') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

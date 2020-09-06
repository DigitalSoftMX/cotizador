@extends('layouts.app', ['activePage' => 'Bienvenido', 'titlePage' => __('Ventas')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">
                            {{ __('') }}
                        </h4>
                        <p class="card-category">
                            {{ __('Asigna el vendedor') }}
                        </p>
                    </div>
                    <div class="card-body">

                        <div class="row justify-content-center">

                            <div class="col-8">
                                <div class="form-group">
                                    <label for="vendedor">Selecciona al vendedor:</label>
                                    <select class="form-control" id="vendedor" name="vendedor">
                                        @foreach ($data[1] as $vendedor )
                                            <option value="{{ $vendedor->id }}">{{ $vendedor->name }} {{ $vendedor->app_name }} {{ $vendedor->apm_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

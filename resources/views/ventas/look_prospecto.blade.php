@extends('layouts.app', ['activePage' => 'Ventas', 'titlePage' => __('Ventas')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12">
                                <div class="container-title-first">
                                    <i class="material-icons icon-edificio-azul"></i>
                                    <h1>Prospectos</h1>
                                </div>
                            </div>

                            <div class="col-lg-6 col-12">

                                <div class="content-look-information">
                                    <i class="material-icons icon-edificio-azul"></i>
                                    <p>{{ $prospecto->nombre }}</p>
                                </div>

                                <div class="content-look-information">
                                    <i class="material-icons icon-vendedores-azul"></i>
                                    <p>{{ $prospecto->encargado }}</p>
                                </div>

                                <a href="tel:{{ $prospecto->telefono }}">
                                    <div class="content-look-information">
                                        <i class="material-icons icon-telefono-azul"></i>
                                        <p>{{ $prospecto->telefono }}</p>
                                    </div>
                                </a>

                            </div>

                            <div class="col-lg-6 col-12">

                                @if ($vendedor['vendedor'] != null)

                                    <div class="content-look-information">
                                        <i class="material-icons icon-vendedores-azul"></i>
                                        <p>{{ $vendedor['vendedor']['name'] }} {{ $vendedor['vendedor']['app_name'] }} {{ $vendedor['vendedor']['apm_name'] }}</p>
                                    </div>

                                @endif

                                <a href="mailto:{{ $prospecto->email }}">
                                    <div class="content-look-information">
                                        <i class="material-icons icon-mail-azul"></i>
                                        <p>{{ $prospecto->email }}</p>
                                    </div>
                                </a>

                            </div>

                            <div class="container">
                                <div class="options--footer">
                                    <a href="{{ URL::previous() }}" class="btn-option">Atras</a>
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

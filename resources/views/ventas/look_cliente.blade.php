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
                                    <h1>Información cliente</h1>
                                </div>
                            </div>

                            <div class="col-lg-6 col-12">

                                <div class="content-look-information">
                                    <i class="material-icons icon-edificio-azul"></i>
                                    <p>{{ $cliente->nombre }}</p>
                                </div>

                                <div class="content-look-information">
                                    <i class="material-icons icon-vendedores-azul"></i>
                                    <p>{{ $cliente->encargado }}</p>
                                </div>

                                <div class="content-look-information">
                                    <i class="material-icons icon-udn-azul"></i>
                                    @if ( $cliente->estado === null )
                                        <p class="value-null"> Vacio </p>
                                    @else
                                        <p>{{ $cliente->estado }}</p>
                                    @endif
                                </div>

                                <a href="tel:{{ $cliente->telefono }}">
                                    <div class="content-look-information">
                                        <i class="material-icons icon-telefono-azul"></i>
                                        <p>{{ $cliente->telefono }}</p>
                                    </div>
                                </a>

                                <a target="_blank" href="{{ $cliente->pagina_web }}">
                                    <div class="content-look-information">
                                        <i class="material-icons icon-computadora-azul"></i>
                                        @if ( $cliente->pagina_web === null )
                                            <p class="value-null"> Vacio </p>
                                        @else
                                            <p>{{ $cliente->pagina_web }}</p>
                                        @endif
                                    </div>
                                </a>

                            </div>

                            <div class="col-lg-6 col-12">

                                <div class="content-look-information">
                                    <i class="material-icons icon-firma-azul"></i>
                                    @if ($cliente->rfc === null)
                                        <p class="value-null"> Vacio </p>
                                    @else
                                        <p>{{ $cliente->rfc }}</p>
                                    @endif
                                </div>

                                <div class="content-look-information">
                                    <i class="material-icons icon-ubicacion-azul"></i>
                                    @if ($cliente->direccion === null)
                                        <p class="value-null"> Vacio </p>
                                    @else
                                        <p>{{ $cliente->direccion }}</p>
                                    @endif
                                </div>

                                <div class="content-look-information">
                                    <i class="material-icons icon-lista-azul"></i>
                                    @if ($cliente->tipo === null)
                                        <p class="value-null"> Vacio </p>
                                    @else
                                        <p>{{ $cliente->tipo }}</p>
                                    @endif
                                </div>

                                @if($cliente->tipo === 'Estación')

                                    <div class="content-look-information">
                                        <i class="material-icons"></i>
                                        <p>Bandera blanca: {{ $cliente->bandera_blanca }}</p>
                                    </div>

                                    <div class="content-look-information">
                                        <i class="material-icons"></i>
                                        <p>Número de estación: {{ $cliente->numero_estacion }}</p>
                                    </div>

                                @endif

                                <a href="mailto:{{ $cliente->email }}">
                                    <div class="content-look-information">
                                        <i class="material-icons icon-mail-azul"></i>
                                        <p>{{ $cliente->email }}</p>
                                    </div>
                                </a>

                                @if ($vendedor['vendedor'] != null)

                                    <div class="content-look-information">
                                        <i class="material-icons icon-persona-add-azul"></i>
                                        <p>{{ $vendedor['vendedor']['name'] }} {{ $vendedor['vendedor']['app_name'] }} {{ $vendedor['vendedor']['apm_name'] }}</p>
                                    </div>

                                @endif

                            </div>

                            <div class="container">
                                <div class="options--footer">
                                    <a href="{{ URL::previous() }}" class="btn-option">Atrás</a>
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

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
                                    <h1>Modificar cliente</h1>
                                </div>
                            </div>

                            <div class="col-12 text-left">
                                @if (session('status'))
                                    <div class="alert {{ session('status_alert') }}" role="alert" id="status-alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>

                            <form style="display: contents;" method="POST" action="{{ route('ventas.guardar_cambios_cliente') }}">

                                @csrf
                                <input type="text" name="id" value="{{ $cliente->id }}" style="display: none;">

                                <div class="col-lg-6 col-12">

                                    <div class="content-information">
                                        <i class="material-icons icon-edificio-azul"></i>
                                        <input type="text" placeholder="Nombre empresa" name="nombre" value="{{ $cliente->nombre }}" required>
                                    </div>

                                    <div class="content-information">
                                        <i class="material-icons icon-vendedores-azul"></i>
                                        <input type="text" placeholder="Contacto" name="encargado" value="{{ $cliente->encargado }}" required>
                                    </div>

                                    <div class="content--center mb-2em">
                                        <div class="select">
                                            <i class="material-icons icon-udn-azul"></i>
                                            <select style="text-align-last: auto;" name="estado">
                                                <option selected disabled>Estado</option>

                                                @foreach ($estados as $estado)
                                                    <option value="{{ $estado }}" @if($estado === $cliente->estado ) selected @endif>
                                                        {{ $estado }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="content-information">
                                        <i class="material-icons icon-telefono-azul"></i>
                                        <input type="text" placeholder="Telefono" name="telefono" value="{{ $cliente->telefono }}" required>
                                    </div>


                                    <div class="content-information">
                                        <i class="material-icons icon-computadora-azul"></i>
                                        <input type="text" placeholder="Página web" name="pagina_web" value="{{ $cliente->pagina_web }}">
                                    </div>

                                </div>

                                <div class="col-lg-6 col-12">

                                    <div class="content-information">
                                        <i class="material-icons icon-firma-azul"></i>
                                        <input type="text" placeholder="RFC" name="rfc" value="{{ $cliente->rfc }}">
                                    </div>

                                    <div class="content-information">
                                        <i class="material-icons icon-ubicacion-azul"></i>
                                        <input type="text" placeholder="Dirección" name="direccion" value="{{ $cliente->direccion }}">
                                    </div>

                                    <div class="content--center mb-2em">
                                        <div class="select">
                                            <i class="material-icons icon-lista-azul"></i>
                                            <select style="text-align-last: auto;" name="tipo" id="tipo">
                                                <option selected disabled>Tipo</option>

                                                <option @if ($cliente->tipo === 'Estación') selected @endif value="Estación">Estación</option>
                                                <option @if ($cliente->tipo === 'Comercializador') selected @endif value="Comercializador">Comercializador</option>
                                                <option @if ($cliente->tipo === 'Auto abasto') selected @endif value="Auto abasto">Auto abasto</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-4" id="estacion_si"
                                        @if ($cliente->tipo === null)
                                            style="display: none;"
                                        @else
                                            @if ($cliente->tipo === 'Estación')
                                                style="display: block;"
                                            @else
                                                style="display: none;"
                                            @endif

                                        @endif

                                    >

                                        <p>¿Es bandera blanca? </p>

                                        <div class="mb-2em">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input bandera_blanca" value="si" name="bandera_blanca"
                                                    @if ($cliente->bandera_blanca == 'si') checked @endif >Si
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input bandera_blanca" value="no" name="bandera_blanca"
                                                    @if ($cliente->bandera_blanca == 'no') checked @endif >No
                                                </label>
                                            </div>
                                        </div>

                                        <div class="content-information">
                                            <i class="material-icons"></i>
                                            <input type="text" placeholder="Número de estacion" id="numero_estacion" name="numero_estacion" value="{{ $cliente->numero_estacion }}">
                                        </div>
                                    </div>

                                    <div class="content-information">
                                        <i class="material-icons icon-mail-azul"></i>
                                        <input type="text" placeholder="Correo" name="email" value="{{ $cliente->email }}">
                                    </div>

                                    <div class="content--center mb-2em" style="display: {{ $cambiar_vendedor }};">
                                        <div class="select">
                                            <i class="material-icons icon-persona-add-azul"></i>
                                            <select style="text-align-last: auto;" name="vendedor_id" required>
                                                <option selected disabled>Vendedor</option>

                                                @if ($vendedor['vendedor'] != null)

                                                    <option value="{{ $vendedor['vendedor']['id'] }}" selected>
                                                        {{ $vendedor['vendedor']['name'] }} {{ $vendedor['vendedor']['app_name'] }} {{ $vendedor['vendedor']['apm_name'] }}
                                                    </option>

                                                @endif

                                                @foreach ($vendedores_potenciales as $vendedor_potencial)
                                                    <option value="{{ $vendedor_potencial->id }}">
                                                        {{ $vendedor_potencial->name }} {{ $vendedor_potencial->app_name }} {{ $vendedor_potencial->apm_name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="container">
                                    <div class="options--footer">
                                        <button type="submit" class="btn-option">Editar</button>
                                        <a href="{{ URL::previous() }}" class="btn-option">Cancelar</a>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script src="{{ asset('js/ventas.js') }}"></script>
@endpush

@endsection

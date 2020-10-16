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
                                    <h1>Agregar clientes</h1>
                                </div>
                            </div>

                            <form style="display: contents;" method="POST" action="{{ route('ventas.guardar_cliente') }}">

                                @csrf
                                <input type="text" name="id" value="{{ $prospecto->id }}" style="display: none;">

                                <div class="col-lg-6 col-12">

                                    <div class="content-information">
                                        <i class="material-icons icon-firma-azul"></i>
                                        <input type="text" name="estacion_numero" placeholder="Número de estación" value="{{ $prospecto->estacion_numero }}" >
                                    </div>

                                    <div class="content-information">
                                        <i class="material-icons icon-edificio-azul"></i>
                                        <input type="text" placeholder="Nombre empresa" name="nombre" value="{{ $prospecto->nombre }}" required>
                                    </div>

                                    <div class="content-information">
                                        <i class="material-icons icon-vendedores-azul"></i>
                                        <input type="text" placeholder="Contacto" name="encargado" value="{{ $prospecto->encargado }}" required>
                                    </div>

                                    <div class="content--center mb-2em">
                                        <div class="select">
                                            <i class="material-icons icon-udn-azul"></i>
                                            <select style="text-align-last: auto;" name="estado">
                                                <option selected disabled>Estado</option>

                                                @foreach ($estados as $estado)
                                                    <option value="{{ $estado }}" @if($estado === $prospecto->estado ) selected @endif>
                                                        {{ $estado }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="content-information">
                                        <i class="material-icons icon-telefono-azul"></i>
                                        <input type="text" placeholder="Telefono" name="telefono" value="{{ $prospecto->telefono }}" required>
                                    </div>

                                </div>

                                <div class="col-lg-6 col-12">

                                    <div class="content-information">
                                        <i class="material-icons icon-computadora-azul"></i>
                                        <input type="text" placeholder="Página web" name="pagina_web" value="{{ $prospecto->pagina_web }}">
                                    </div>

                                    <div class="content-information">
                                        <i class="material-icons icon-firma-azul"></i>
                                        <input type="text" placeholder="RFC" name="rfc" value="{{ $prospecto->rfc }}">
                                    </div>

                                    <div class="content-information">
                                        <i class="material-icons icon-ubicacion-azul"></i>
                                        <input type="text" placeholder="Dirección" name="direccion" value="{{ $prospecto->direccion }}">
                                    </div>

                                    <div class="content--center mb-2em">
                                        <div class="select">
                                            <i class="material-icons icon-lista-azul"></i>
                                            <select style="text-align-last: auto;" name="tipo" id="tipo">
                                                <option selected disabled>Tipo</option>

                                                <option @if ($prospecto->tipo === 'Estación') selected @endif value="Estación">Estación</option>
                                                <option @if ($prospecto->tipo === 'Comercializador') selected @endif value="Comercializador">Comercializador</option>
                                                <option @if ($prospecto->tipo === 'Auto abasto') selected @endif value="Auto abasto">Auto abasto</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-4" id="estacion_si"
                                        @if ($prospecto->tipo === null)
                                            style="display: none;"
                                        @else
                                            @if ($prospecto->tipo === 'Estación')
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
                                                    @if ($prospecto->bandera_blanca == 'si') checked @endif
                                                    >Si
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input bandera_blanca" value="no" name="bandera_blanca"
                                                    @if ($prospecto->bandera_blanca == 'si') checked @endif
                                                    >No
                                                </label>
                                            </div>
                                        </div>

                                        <div class="content-information">
                                            <i class="material-icons"></i>
                                            <input type="text" placeholder="Número de estacion" id="numero_estacion" name="numero_estacion" value="{{ $prospecto->numero_estacion }}">
                                        </div>
                                    </div>

                                    <div class="content-information">
                                        <i class="material-icons icon-mail-azul"></i>
                                        <input type="text" placeholder="Correo" name="email" value="{{ $prospecto->email }}">
                                    </div>

                                    @if ($vendedor['vendedor'] != null)

                                        <div class="content-information">
                                            <i class="material-icons icon-persona-add-azul"></i>
                                            <input type="text" placeholder="Vendedor" value="{{ $vendedor['vendedor']['name'] }} {{ $vendedor['vendedor']['app_name'] }} {{ $vendedor['vendedor']['apm_name'] }}">
                                        </div>

                                    @endif

                                </div>

                                <div class="container">
                                    <div class="options--footer">
                                        <button type="submit" class="btn-option">Guardar</button>
                                        <a href="{{ route($url) }}" class="btn-option">Cancelar</a>
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

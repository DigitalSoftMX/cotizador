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
                                    <i class="material-icons">perm_identity</i>
                                    <h1>Agregar clientes</h1>
                                </div>
                            </div>

                            <form style="display: contents;" method="POST" action="{{ route('ventas.guardar_cliente') }}">

                                @csrf
                                <input type="text" name="id" value="{{ $prospecto->id }}" style="display: none;">

                                <div class="col-lg-6 col-12">

                                    <div class="content-information">
                                        <i class="material-icons">home_work</i>
                                        <input type="text" placeholder="Nombre empresa" name="nombre" value="{{ $prospecto->nombre }}" required>
                                    </div>

                                    <div class="content-information">
                                        <i class="material-icons">perm_identity</i>
                                        <input type="text" placeholder="Contacto" name="encargado" value="{{ $prospecto->encargado }}" required>
                                    </div>

                                    <div class="content--center mb-2em">
                                        <div class="select">
                                            <i class="material-icons">home_work</i>
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
                                        <i class="material-icons">perm_identity</i>
                                        <input type="text" placeholder="Telefono" name="telefono" value="{{ $prospecto->telefono }}" required>
                                    </div>


                                    <div class="content-information">
                                        <i class="material-icons">email</i>
                                        <input type="text" placeholder="Página web" name="pagina_web" value="{{ $prospecto->pagina_web }}">
                                    </div>

                                </div>

                                <div class="col-lg-6 col-12">

                                    <div class="content-information">
                                        <i class="material-icons">perm_identity</i>
                                        <input type="text" placeholder="RFC" name="rfc" value="{{ $prospecto->rfc }}">
                                    </div>

                                    <div class="content-information">
                                        <i class="material-icons">perm_identity</i>
                                        <input type="text" placeholder="Dirección" name="direccion" value="{{ $prospecto->direccion }}">
                                    </div>

                                    <div class="content--center mb-2em">
                                        <div class="select">
                                            <i class="material-icons">home_work</i>
                                            <select style="text-align-last: auto;" name="tipo" id="tipo">
                                                <option selected disabled>Tipo</option>

                                                <option value="Estación">Estación</option>
                                                <option value="Comercializador">Comercializador</option>
                                                <option value="Auto abasto">Auto abasto</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-4" id="estacion_si" style="display: none;">

                                        <p>¿Es bandera blanca? </p>

                                        <div class="mb-2em">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="si" name="bandera_blanca" checked>Si
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" value="no" name="bandera_blanca">No
                                                </label>
                                            </div>
                                        </div>

                                        <div class="content-information">
                                            <i class="material-icons"></i>
                                            <input type="text" placeholder="Número de estacion" name="email" id="n_estacion" name="numero_estacion">
                                        </div>
                                    </div>

                                    <div class="content-information">
                                        <i class="material-icons">email</i>
                                        <input type="text" placeholder="Correo" name="email" value="{{ $prospecto->email }}">
                                    </div>

                                    @if ($vendedor['vendedor'] != null)

                                        <div class="content-information">
                                            <i class="material-icons">perm_identity</i>
                                            <input type="text" placeholder="Vendedor" value="{{ $vendedor['vendedor']['name'] }} {{ $vendedor['vendedor']['app_name'] }} {{ $vendedor['vendedor']['apm_name'] }}">
                                        </div>

                                    @endif

                                </div>

                                <div class="container">
                                    <div class="options--footer">
                                        <button type="submit" class="btn-option">Editar</button>
                                        <a href="{{ route('ventas.index') }}" class="btn-option">Cancelar</a>
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

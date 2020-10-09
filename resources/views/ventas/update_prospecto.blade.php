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
                                    <h1>Prospectos</h1>
                                </div>
                            </div>

                            <form style="display: contents;" method="POST" action="{{ route('ventas.actualizar_prospecto') }}">

                                @csrf
                                <input type="text" name="id" value="{{ $prospecto->id }}" style="display: none;">

                                <div class="col-lg-6 col-12">

                                    <div class="content-information">
                                        <i class="material-icons">home_work</i>
                                        <input type="text" name="nombre" placeholder="Nombre empresa" value="{{ $prospecto->nombre }}" required>
                                    </div>

                                    <div class="content-information">
                                        <i class="material-icons">perm_identity</i>
                                        <input type="text" name="encargado" placeholder="Contacto" value="{{ $prospecto->encargado }}" required>
                                    </div>

                                    <div class="content-information">
                                        <i class="material-icons">perm_identity</i>
                                        <input type="text" name="telefono" placeholder="Telefono" value="{{ $prospecto->telefono }}" required>
                                    </div>

                                </div>

                                <div class="col-lg-6 col-12">

                                    @if ($vendedor['vendedor'] != null)

                                        <div class="content-information">
                                            <i class="material-icons">perm_identity</i>
                                            <input type="text" placeholder="Vendedor" value="{{ $vendedor['vendedor']['name'] }} {{ $vendedor['vendedor']['app_name'] }} {{ $vendedor['vendedor']['apm_name'] }}">
                                        </div>

                                    @endif

                                    <div class="content-information">
                                        <i class="material-icons">email</i>
                                        <input type="text" name="email" placeholder="Correo" value="{{ $prospecto->email }}" required>
                                    </div>

                                </div>

                                <div class="container">
                                    <div class="options--footer">
                                        <div>
                                            <button type="submit" class="btn-option">Editar</button>
                                            <button type="button" onclick="window.location='{{ route('ventas.agregar_cliente', $prospecto->id) }}'" class="btn-option">Cliente</button>
                                        </div>
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
@endsection

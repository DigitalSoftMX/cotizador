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
                                    <h1>Prospecto</h1>
                                </div>
                            </div>

                            <form style="display: contents;" method="POST" action="{{ route('ventas.actualizar_prospecto') }}">

                                @csrf
                                <input type="text" name="id" value="{{ $prospecto->id }}" style="display: none;">

                                <div class="col-lg-6 col-12">

                                    <div class="content-information">
                                        <i class="material-icons icon-firma-azul"></i>
                                        <input type="text" name="estacion_numero" placeholder="Número de estación" value="{{ $prospecto->estacion_numero }}" >
                                    </div>

                                    <div class="content-information">
                                        <i class="material-icons icon-edificio-azul"></i>
                                        <input type="text" name="nombre" placeholder="Nombre empresa" value="{{ $prospecto->nombre }}" required>
                                    </div>

                                    <div class="content-information">
                                        <i class="material-icons icon-vendedores-azul"></i>
                                        <input type="text" name="encargado" placeholder="Contacto" value="{{ $prospecto->encargado }}" required>
                                    </div>

                                </div>

                                <div class="col-lg-6 col-12">

                                    <div class="content-information">
                                        <i class="material-icons icon-telefono-azul"></i>
                                        <input type="text" name="telefono" placeholder="Telefono" value="{{ $prospecto->telefono }}" required>
                                    </div>

                                    <div class="content--center mb-2em" style="display: {{ $cambiar_vendedor }};">
                                        <div class="select">
                                            <i class="material-icons icon-persona-add-azul"></i>
                                            <select style="text-align-last: auto;" name="vendedor_id">
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

                                    <div class="content-information">
                                        <i class="material-icons icon-mail-azul"></i>
                                        <input type="text" name="email" placeholder="Correo" value="{{ $prospecto->email }}" required>
                                    </div>

                                </div>

                                <div class="container">
                                    <div class="options--footer">
                                        <div>
                                            <button type="submit" class="btn-option">Guardar</button>
                                            <button type="button" onclick="window.location='{{ route('ventas.agregar_cliente', $prospecto->id) }}'" class="btn-option">Cliente</button>
                                        </div>
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
@endsection

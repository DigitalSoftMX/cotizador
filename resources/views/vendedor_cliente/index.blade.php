@extends('layouts.app', ['activePage' => 'Ventas', 'titlePage' => __('Ventas')])
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
                            {{ __('Aquí puedes dar de alta, dar seguimiento a los clientes y asignar clientes.') }}
                        </p>
                    </div>
                    <div class="card-body">

                        <div class="row pl-5 pr-5">

                            <div class="col-12 text-left">
                                @if (session('status'))
                                    <div class="alert {{ session('status_alert') }}" role="alert" id="status-alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-12">
                                <div class="menu-options">

                                    <div class="option">
                                        <label>
                                            <input type="radio" name="menu-option" value="prospectos" onclick="change(this)" checked>
                                            <p>
                                                <span class="icon-persona-add-azul"></span>
                                                Prospectos
                                            </p>
                                        </label>
                                    </div>

                                    <div class="option">
                                        <label>
                                            <input type="radio" name="menu-option" value="clientes" onclick="change(this)">
                                            <p>
                                                <span class="icon-personas-azul"></span>
                                                Clientes
                                            </p>
                                        </label>
                                    </div>

                                    <div class="option" style="display: none;">
                                        <label>
                                            <input type="radio" name="menu-option" value="vendedores" onclick="change(this)">
                                            <p>
                                                <span class="icon-vendedores-azul"></span>
                                                Vendedores
                                            </p>
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="container">

                                    <div id="prospectos">

                                        <div class="options--content">
                                            <button type="button" class="btn-option" data-toggle="modal" data-target="#add-prospecto">Agregar</button>
                                        </div>
                                        <div class="tableInformation">
                                            <table id="prospectosTable" class="display" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Días</th>
                                                        <th>Empresa</th>
                                                        <th>Contacto</th>
                                                        <th>Unidad de negocio</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ( $data['prospectos'] as $prospecto)
                                                        <tr>
                                                            <td>
                                                                <div class="information--text">
                                                                    <p>{{ $prospecto['dias'] }}</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="information--text">
                                                                    <p>{{ $prospecto['empresa'] }}</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="information--text">
                                                                    <p>{{ $prospecto['encargado'] }}</p>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="information--text">
                                                                    <p>{{ $prospecto['unidad_negocio'] }}</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="option-actions">
                                                                    <a href="{{ route('ventas.visualizar_prospecto', $prospecto['id'] ) }}">
                                                                        <span class="icon-ojo-azul"></span>
                                                                    </a>

                                                                    <a href="{{ route('ventas.editar_prospecto', $prospecto['id'] ) }}">
                                                                        <span class="icon-editar-azul"></span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                    <div id="clientes">

                                        <div class="tableInformation">
                                            <table id="clientesTable" class="display" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Avance</th>
                                                        <th>Empresa</th>
                                                        <th>RFC</th>
                                                        <th>Documentación</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ( $data['clientes'] as $cliente)
                                                        <tr>
                                                            <td>
                                                                <div class="content--progress">
                                                                    <div class="progress">
                                                                        <div class="progress-bar {{ $cliente['color'] }}" style="width:{{ $cliente['avance'] }}%"></div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="information--text">
                                                                    <p>{{ $cliente['empresa'] }}</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="information--text">
                                                                    <p>{{ $cliente['rfc'] }}</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="option-actions">
                                                                    <a href="{{ route('ventas.agregar_documentacion', $cliente['id'] ) }}">
                                                                        <span class="icon-agregar-azul"></span>
                                                                    </a>

                                                                    <a href="{{ route('ventas.agregar_documentacion', $cliente['id'] ) }}">
                                                                        <span class="icon-ojo-azul"></span>
                                                                    </a>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="option-actions">

                                                                    <a href="{{ route('ventas.visualizar_cliente', $cliente['id']) }}">
                                                                        <span class="icon-ojo-azul"></span>
                                                                    </a>

                                                                    <a href="{{ route('ventas.editar_cliente', $cliente['id']) }}">
                                                                        <span class="icon-editar-azul"></span>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>


                                    <div id="vendedores">

                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="add-prospecto">
  <div class="modal-dialog">
    <div class="modal-content">

        <div class="title--content">
            <h1>Prospectos</h1>
        </div>

        <form method="POST" action="{{ route('ventas.guardarProspecto') }}">

            @csrf

            <div class="container information">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <div class="content-information">
                            <i class="material-icons icon-edificio-gris"></i>
                            <input type="text" placeholder="Nombre de la empresa" name="nombre_empresa" required>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="content--center">
                            <div class="select">
                                <i class="material-icons icon-udn-gris"></i>
                                <select style="text-align-last: auto;" name="estado" required>
                                    <option selected disabled>Unidad de negocio</option>
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado }}" >{{ $estado }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">

                        <div class="content-information">
                            <i class="material-icons icon-persona-add-gris"></i>
                            <input type="text" placeholder="Responsable" name="nombre_responsable" required>
                        </div>

                    </div>

                    <div class="col-lg-6 col-12">

                        <div class="content-information">
                            <i class="material-icons icon-telefono-gris"></i>
                            <input type="text" placeholder="Telefono" name="telefono_empresa" required>
                        </div>

                    </div>

                    <div class="col-lg-6 col-12">

                        <input type="text" value="{{ $user_id }}" name="id_user" style="display: none;">

                        <div class="content-information">
                            <i class="material-icons icon-mail-gris"></i>
                            <input type="mail" placeholder="Correo electrónico" name="correo_empresa" required>
                        </div>

                    </div>
                </div>
            </div>

            <div class="footer--options">
                <button type="submit" class="btn-option">Guadar</button>
                <button class="btn-option" data-dismiss="modal">Cancelar</button>
            </div>
        </form>

    </div>
  </div>
</div>

@push('js')
    <script src="{{ asset('js/ventas.js') }}"></script>
    <script>
        $(document).ready(function() {
            loadTable('prospectosTable');
            loadTable('clientesTable');
        });
    </script>
@endpush
@endsection

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

                                    <div class="option">
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

                                        <form id="form-prospecto-asignar" method="POST"  action="{{ route('ventas.asignar_prospecto_vendedor') }}">
                                            @csrf
                                            <input type="text" value="" name="vendedor_id" id="vendedor_id" style="display: none;">
                                            <input type="text" value="" name="cliente_id" id="cliente_id" style="display: none;">
                                        </form>

                                        <div class="options--content">
                                            <button type="button" class="btn-option" data-toggle="modal" data-target="#add-prospecto">Agregar</button>
                                        </div>
                                        <div class="tableInformation">
                                            <table id="prospectosTable" class="display" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Días</th>
                                                        <th>Empresa</th>
                                                        <th>Vendedor</th>
                                                        <th>Contacto</th>
                                                        <th>Unidad de negocio</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ( $data['prospectos'] as $prospecto)
                                                        <tr>
                                                            <td>
                                                                @if ( $prospecto['id_seguimiento'] === null)
                                                                    <div class="form-days-add">
                                                                        <input type="number" value="{{ $prospecto['dias'] }}" name="dias">
                                                                        <button type="button">+</button>
                                                                    </div>
                                                                @else

                                                                    <form method="POST" action="{{ route('ventas.agregar_dias_prospecto') }}">
                                                                        @csrf
                                                                        <div class="form-days-add">
                                                                            <input type="text" value="{{ $prospecto['id_seguimiento'] }}" name="id_seguimiento" style="display: none;">
                                                                            <input type="number" min="0" value="{{ $prospecto['dias'] }}" name="dias">
                                                                            <button type="submit">+</button>
                                                                        </div>
                                                                    </form>

                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="information--text">
                                                                    <p>{{ $prospecto['empresa'] }}</p>
                                                                </div>
                                                            </td>

                                                            <td>

                                                                @if( $prospecto['vendedor'] != null )
                                                                    <div class="information--text">
                                                                        <p>{{ $prospecto['vendedor'] }}</p>
                                                                    </div>
                                                                @else
                                                                    <div class="content--center">
                                                                        <div class="select">
                                                                            <select onchange="asignar_vendedor_prospecto( {{ $prospecto['id'] }} , this)">
                                                                                <option selected disabled>Asignar</option>
                                                                                @foreach ( $prospecto['posibles_vendedores'] as $posible_vendedor)
                                                                                    <option value="{{ $posible_vendedor['id'] }}">{{ $posible_vendedor['name'] }} {{ $posible_vendedor['app_name'] }} {{ $posible_vendedor['apm_name'] }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                @endif

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
                                                        <th>Vendedor</th>
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
                                                                <div class="information--text">
                                                                    <p>{{ $cliente['vendedor'] }}</p>
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

                                        <div class="options--content">
                                            <a href="{{ route('ventas.agregar_vendedor') }}" type="button" class="btn-option">Agregar</a>
                                        </div>
                                        <div class="tableInformation">
                                            <table id="vendedoresTable" class="display" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>Correo</th>
                                                        <th>Unidad de negocio</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ( $data['vendedores'] as $vendedor)
                                                        <tr>
                                                            <td>
                                                                <div class="information--text">
                                                                    <p>{{ $vendedor['name'] }} {{ $vendedor['app_name'] }} {{ $vendedor['apm_name'] }}</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="information--text">
                                                                    <p>{{ $vendedor['email'] }}</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="information--text">
                                                                    <p>{{ $vendedor['unidad_negocio'] }}</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="option-actions">
                                                                    <a href="{{ route('ventas.editar_vendedor', $vendedor['id'] ) }}">
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

                    <div class="col-12">

                        <div class="row">
                            <div class="col-lg-6 col-12">
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
                        </div>


                    </div>

                    <div class="col-lg-6 col-12">

                        <div class="content-information">
                            <i class="material-icons icon-persona-add-gris"></i>
                            <input type="text" placeholder="Responsable" name="nombre_responsable" required>
                        </div>

                        <div class="content-information">
                            <i class="material-icons icon-telefono-gris"></i>
                            <input type="text" placeholder="Telefono" name="telefono_empresa" required>
                        </div>

                    </div>

                    <div class="col-lg-6 col-12">

                        <div class="content--center">
                            <div class="select">
                                <i class="material-icons icon-personas-gris"></i>
                                <select style="text-align-last: auto;" name="id_user" required>
                                    <option selected disabled>Vendedor</option>
                                    @foreach ($data['vendedores'] as $vendedor)
                                    <option value="{{ $vendedor['id'] }}" >{{ $vendedor['name'] }} {{ $vendedor['app_name'] }} {{ $vendedor['apm_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

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
            loadTable('vendedoresTable');
        });
    </script>
@endpush
@endsection

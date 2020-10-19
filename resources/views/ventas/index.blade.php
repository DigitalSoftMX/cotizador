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

                                    <form id="form-eliminar-cliente" method="POST"  action="{{ route('ventas.eliminar') }}">
                                        @csrf
                                        <input type="text" value="" name="cliente_id" id="cliente_id_eliminar" style="display: none;">
                                    </form>

                                    <form id="form-eliminar-vendedor" method="POST"  action="{{ route('ventas.eliminar_vendedor') }}">
                                        @csrf
                                        <input type="text" value="" name="user_id" id="vendedor_id_eliminar" style="display: none;">
                                    </form>

                                    <div id="prospectos">

                                        <form id="form-prospecto-asignar" method="POST"  action="{{ route('ventas.asignar_prospecto_vendedor') }}">
                                            @csrf
                                            <input type="text" value="" name="vendedor_id" id="vendedor_id" style="display: none;">
                                            <input type="text" value="" name="cliente_id" id="cliente_id" style="display: none;">
                                        </form>

                                        <div class="options--content">
                                            <button type="button" class="btn-option" onclick="excel_download('prospectosTable')" >Excel</button>
                                            <button type="button" class="btn-option" data-toggle="modal" data-target="#add-prospecto">Agregar</button>
                                        </div>
                                        <div class="tableInformation">
                                            <table id="prospectosTable" class="display" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Días</th>
                                                        <th># de Estación</th>
                                                        <th>Empresa</th>
                                                        <th>Vendedor</th>
                                                        <th>Contacto</th>
                                                        <th>Unidad de negocio</th>
                                                        <th>Bitacora</th>
                                                        <th>Documentación</th>
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
                                                                    <a href="javascript:void(0)" onclick="add_informacion('{{ $prospecto['id'] }}', '{{ json_encode($prospecto['datos_importantes'][0]) }}')">
                                                                        @if ($prospecto['estacion_numero'] === null)
                                                                            <p>S/N</p>
                                                                        @else
                                                                            <p>{{ $prospecto['estacion_numero'] }}</p>
                                                                        @endif
                                                                    </a>

                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="information--text">
                                                                    <a href="javascript:void(0)" onclick="show_ficha_tecnica('{{ json_encode( $prospecto['ficha_tecnica'][0] ) }}', false)">
                                                                        <p>{{ $prospecto['empresa'] }}</p>
                                                                    </a>
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
                                                                    <a href="{{ route('ventas.bitacora', $prospecto['id']) }}">
                                                                        <span class="icon-ojo-azul"></span>
                                                                    </a>

                                                                    <a onclick="add_bitacora('{{ $prospecto['id'] }}')" href="javascript:void(0)">
                                                                        <span class="icon-agregar-azul"></span>
                                                                    </a>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="option-actions">
                                                                    <a href="{{ route('ventas.agregar_documentacion', $prospecto['id'] ) }}">
                                                                        <span class="icon-agregar-azul"></span>
                                                                    </a>

                                                                    <a href="{{ route('ventas.agregar_documentacion', $prospecto['id'] ) }}">
                                                                        <span class="icon-ojo-azul"></span>
                                                                    </a>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="option-actions action--options">
                                                                    <a href="{{ route('ventas.visualizar_prospecto', $prospecto['id'] ) }}">
                                                                        <span class="icon-ojo-azul"></span>
                                                                    </a>

                                                                    <a href="{{ route('ventas.editar_prospecto', $prospecto['id'] ) }}">
                                                                        <span class="icon-editar-azul"></span>
                                                                    </a>

                                                                    <a href="javascript:void(0)" onclick="eliminar('{{ $prospecto['id'] }}')" style="color: red;">
                                                                        <span class="icon-trash"></span>
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
                                        <div class="options--content">
                                            <button type="button" class="btn-option" onclick="excel_download('clientesTable')" >Excel</button>
                                        </div>
                                        <div class="tableInformation">

                                            <table id="clientesTable" class="display" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        {{-- <th>Avance</th> --}}
                                                        <th># de estación</th>
                                                        <th>Empresa</th>
                                                        <th>RFC</th>
                                                        <th>Vendedor</th>
                                                        <th>Documentación</th>
                                                        <th>Bitacora</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ( $data['clientes'] as $cliente)
                                                        <tr>
                                                            {{-- <td>
                                                                <div class="content--progress">
                                                                    <div class="progress">
                                                                        <div class="progress-bar {{ $cliente['color'] }}" style="width:{{ $cliente['avance'] }}%"></div>
                                                                    </div>
                                                                </div>
                                                            </td> --}}

                                                            <td>
                                                                <div class="information--text">
                                                                    <a href="javascript:void(0)" onclick="add_informacion('{{ $cliente['id'] }}', '{{ json_encode($cliente['datos_importantes'][0]) }}')">
                                                                        @if ($cliente['estacion_numero'] === null)
                                                                            <p>S/N</p>
                                                                        @else
                                                                            <p>{{ $cliente['estacion_numero'] }}</p>
                                                                        @endif
                                                                    </a>

                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="information--text">
                                                                    <a href="javascript:void(0)" onclick="show_ficha_tecnica('{{ json_encode( $cliente['ficha_tecnica'][0] ) }}', true)">
                                                                        <p>{{ $cliente['empresa'] }}</p>
                                                                    </a>
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
                                                                    <a onclick="add_bitacora_cliente('{{ $cliente['id'] }}')" href="javascript:void(0)">
                                                                        <span class="icon-agregar-azul"></span>
                                                                    </a>

                                                                    <a href="{{ route('ventas.bitacora_cliente', $cliente['id'] ) }}">
                                                                        <span class="icon-ojo-azul"></span>
                                                                    </a>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                <div class="option-actions action--options">

                                                                    <a href="{{ route('ventas.visualizar_cliente', $cliente['id']) }}">
                                                                        <span class="icon-ojo-azul"></span>
                                                                    </a>

                                                                    <a href="{{ route('ventas.editar_cliente', $cliente['id']) }}">
                                                                        <span class="icon-editar-azul"></span>
                                                                    </a>

                                                                    <a href="javascript:void(0)" onclick="eliminar('{{ $cliente['id'] }}')" style="color: red;">
                                                                        <span class="icon-trash"></span>
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
                                            <button type="button" class="btn-option" onclick="excel_download('vendedoresTable')" >Excel</button>
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

                                                                    <a href="javascript:void(0)" onclick="eliminar_vendedor('{{ $vendedor['id'] }}')" style="color: red;">
                                                                        <span class="icon-trash"></span>
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

                    <div class="col-lg-6 col-12">
                        <div class="content-information">
                            <i class="material-icons icon-firma-gris"></i>
                            <input type="text" placeholder="Número de estacion" name="estacion_numero">
                        </div>
                    </div>

                </div>
            </div>

            <div class="footer--options">
                <button type="submit" class="btn-option">Guardar</button>
                <button class="btn-option" data-dismiss="modal">Cancelar</button>
            </div>
        </form>

    </div>
  </div>
</div>

<div class="modal" id="add-bitacora">
  <div class="modal-dialog">
    <div class="modal-content">

        <div class="title--content">
            <h1 id="type-file">Bitácora</h1>
        </div>
        <form action="{{ route('ventas.agregar_comentario_bitacora') }}" method="POST">
            @csrf
            <div class="container information">
                <div class="row">

                    <input type="text" id="cliente_id_bitacora" name="cliente_id" style="display: none;">

                    <div class="col-12">

                        <div class="form--content">

                            <div class="form--content--items">

                                <div class="form--notes--date">
                                    <i class="icon-calendario-gris"></i>
                                    <input type="date" value="<?php echo date("Y-m-d"); ?>" name="fecha_comentario" required>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-12">
                        <div class="form--content--items">
                            <textarea class="form--textarea" placeholder="Comentario" name="comentario"></textarea>
                        </div>
                    </div>

                </div>
            </div>

            <div class="footer--options">
                <button type="submit" class="btn-option">Guardar</button>
                <button type="button" class="btn-option" data-dismiss="modal">Cancelar</button>
            </div>
        </form>

    </div>
  </div>
</div>

<div class="modal" id="add-datos">
  <div class="modal-dialog">
    <div class="modal-content">

        <div class="title--content">
            <h1 id="type-file">Datos importantes</h1>
        </div>
        <form action="{{ route('ventas.agregar_datos') }}" method="POST">
            @csrf
            <div class="container information">
                <div class="row">
                    <input type="text" id="cliente_id_datos" name="cliente_id" style="display: none;">

                    <div class="col-lg-8">

                        <div class="content-information">
                            <i class="material-icons icon-dispensario-icono"></i>
                            <input type="text" placeholder="Número de dispensarios" name="numero_dispensarios" id="numero_dispensarios">
                        </div>

                        <div class="content-information">
                            <i class="material-icons icon-marca-icono"></i>
                            <input type="text" placeholder="Marca" name="marca" id="marca">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="checkbox--content">

                            <label>
                                <input type="checkbox" name="gasolina_verde" id="gasolina_verde" value="TRUE">
                                <span>Magna</span>
                            </label>

                            <label>
                                <input type="checkbox" name="gasolina_roja" id="gasolina_roja" value="TRUE">
                                <span>Premium</span>
                            </label>

                            <label>
                                <input type="checkbox" name="diesel" id="diesel" value="TRUE">
                                <span>Diesel</span>
                            </label>

                        </div>
                    </div>

                </div>
            </div>

            <div class="footer--options">
                <button type="submit" class="btn-option">Guardar</button>
                <button type="button" class="btn-option" data-dismiss="modal">Cancelar</button>
            </div>
        </form>

    </div>
  </div>
</div>

<div class="modal" id="show-ficha">
  <div class="modal-dialog">
    <div class="modal-content">

        <div class="title--content">
            <h1 id="type-file">Ficha tecnica</h1>
        </div>

        <div class="container information">
            <div class="row">
                <div class="col-12">
                    <div class="ficha--tecnica--titulos">
                        <p id="empresa_ficha">Empresa</p>
                        <p>Fecha alta: <span id="fecha_created">22/01/2020</span></p>
                    </div>
                    <div>
                        <p>Fecha actual: <span><?php echo date("d/m/Y"); ?></span></p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="text-justify">
                        <h4>Ultimo comentario: <span id="fecha_comentario"></span></h4>
                        <p id="comentario_ficha"></p>

                        <div id="prices-ficha">
                            <p id="regular_price_f"></p>
                            <p id="supreme_price_f"></p>
                            <p id="diesel_price_f"></p>
                        </div>
                    </div>

                    <div class="checkbox--content" style="display: flex;justify-content: space-around;">

                        <div class="text-center">
                            <label>
                                <input type="checkbox" id="CI" checked disabled>
                                <span></span>
                            </label>
                            <p>C.I.</p>
                        </div>

                        <div class="text-center">
                            <label>
                                <input type="checkbox" id="NDA" checked disabled>
                                <span></span>
                            </label>
                            <p>NDA</p>
                        </div>

                        <div class="text-center">
                            <label>
                                <input type="checkbox" id="DOC" checked disabled>
                                <span></span>
                            </label>
                            <p>DOC</p>
                        </div>

                        <div class="text-center">
                            <label>
                                <input type="checkbox" id="PROP" checked disabled>
                                <span></span>
                            </label>
                            <p>PROP</p>
                        </div>

                        <div class="text-center">
                            <label>
                                <input type="checkbox" id="CONTRATOS" checked disabled>
                                <span></span>
                            </label>
                            <p>CONTRATOS</p>
                        </div>

                        <div class="text-center">
                            <label>
                                <input type="checkbox" id="CartaB" disabled>
                                <span></span>
                            </label>
                            <p>C.B.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="footer--options">
            <button type="button" class="btn-option" data-dismiss="modal">Cerrar</button>
        </div>

    </div>
  </div>
</div>

<div class="modal" id="add-bitacora-cliente">
  <div class="modal-dialog">
    <div class="modal-content">

        <div class="title--content">
            <h1 id="type-file">Bitácora</h1>
        </div>
        <form action="{{ route('ventas.agregar_comentario_bitacora_cliente') }}" method="POST">
            @csrf
            <div class="container information">
                <div class="row">

                    <input type="text" id="cliente_id_bitacora-cliente" name="cliente_id" style="display: none;">

                    <div class="col-12">

                        <div class="form--content">

                            <div class="form--content--items">

                                <div class="form--notes--date">
                                    <i class="icon-calendario-gris"></i>
                                    <input type="date" value="<?php echo date("Y-m-d"); ?>" name="fecha_comentario" required>
                                </div>

                            </div>

                        </div>

                        <div class="form--content">

                            <div class="form-notes">
                                <label>Regular</label>
                                <input type="text" name="regular_price" value="0">
                            </div>

                            <div class="form-notes">
                                <label>Supreme</label>
                                <input type="text" name="supreme_price" value="0">
                            </div>

                            <div class="form-notes">
                                <label>Diésel</label>
                                <input type="text" name="diesel_price" value="0">
                            </div>
                        </div>

                    </div>

                    <div class="col-12">
                        <div class="form--content--items">
                            <textarea class="form--textarea" placeholder="Comentario" name="comentario"></textarea>
                        </div>
                    </div>

                </div>
            </div>

            <div class="footer--options">
                <button type="submit" class="btn-option">Guardar</button>
                <button type="button" class="btn-option" data-dismiss="modal">Cancelar</button>
            </div>
        </form>

    </div>
  </div>
</div>

@push('js')
    <script src="{{ asset('js/table2csv.js') }}"></script>
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

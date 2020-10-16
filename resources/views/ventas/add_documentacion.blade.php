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
                                    <i class="material-icons">home_work</i>
                                    <h1>{{ $cliente->nombre }}</h1>
                                </div>
                            </div>

                            <div class="col-12 text-left">
                                @if (session('status'))
                                    <div class="alert {{ session('status_alert') }}" role="alert" id="status-alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <textarea id="propuestas_json" style="display: none;">{{ $documentos['propuestas'] }}</textarea>

                            </div>

                            <div class="col-12">
                                <div class="options--content">
                                    <a href="{{ route($url) }}" type="button" class="btn-option" >Atras</a>
                                </div>
                            </div>

                            <div class="col-12">

                                <div class="tableInformationDocuments">
                                    <table class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Documento</th>
                                                <th>Archivo</th>
                                                <th>Ultima actualización</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>
                                                    <div class="information--text text-left">
                                                        <p>Carta de intención</p>
                                                    </div>
                                                </td>

                                                @if ($cliente->carta_de_intencion != null)
                                                    <td>
                                                        <div class="information--text">
                                                            <a href="javascript:void(0)">{{ $documentos['carta_de_intencion']->nombre }}</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p>{{ $documentos['carta_de_intencion']->created_at }}</p>
                                                        </div>
                                                    </td>
                                                @else
                                                    <td>
                                                        <div class="information--text">
                                                            <p>No hay archivo</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p></p>
                                                        </div>
                                                    </td>
                                                @endif
                                                <td>
                                                    <div class="option-actions">
                                                        @if ($cliente->carta_de_intencion != null)
                                                            <a target="_blank" href="{{ route('clientes.downloadclient', $documentos['carta_de_intencion']->nombre ) }}">
                                                                <i class="material-icons icon-ojo-azul"></i>
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0)">
                                                                <i class="material-icons icon-ojo-azul"></i>
                                                            </a>
                                                        @endif
                                                        <a href="javascript:void(0)" onclick="load_file( {{ $cliente->id }} ,'carta de intencion')">
                                                            <i class="material-icons icon-editar-azul"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="information--text text-left">
                                                        <p>Convenio de confidencialidad</p>
                                                    </div>
                                                </td>
                                                @if ($cliente->convenio_de_confidencialidad != null)
                                                    <td>
                                                        <div class="information--text">
                                                            <a href="javascript:void(0)">{{ $documentos['convenio_de_confidencialidad']->nombre }}</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p>{{ $documentos['convenio_de_confidencialidad']->created_at }}</p>
                                                        </div>
                                                    </td>
                                                @else
                                                    <td>
                                                        <div class="information--text">
                                                            <p>No hay archivo</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p></p>
                                                        </div>
                                                    </td>
                                                @endif
                                                <td>
                                                    <div class="option-actions">
                                                        @if ($cliente->convenio_de_confidencialidad != null)
                                                            <a target="_blank" href="{{ route('clientes.downloadclient', $documentos['convenio_de_confidencialidad']->nombre) }}">
                                                                <i class="material-icons icon-ojo-azul"></i>
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0)">
                                                                <i class="material-icons icon-ojo-azul"></i>
                                                            </a>
                                                        @endif
                                                        <a href="javascript:void(0)" onclick="load_file( {{ $cliente->id }} ,'convenio de confidencialidad')">
                                                            <i class="material-icons icon-editar-azul"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr style="display: none;">
                                                <td>
                                                    <div class="information--text text-left">
                                                        <p>Margen garantizado</p>
                                                    </div>
                                                </td>
                                                @if ($cliente->margen_garantizado != null)
                                                    <td>
                                                        <div class="information--text">
                                                            <a href="javascript:void(0)">{{ $documentos['margen_garantizado']->nombre }}</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p>{{ $documentos['margen_garantizado']->created_at }}</p>
                                                        </div>
                                                    </td>
                                                @else
                                                    <td>
                                                        <div class="information--text">
                                                            <p>No hay archivo</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p></p>
                                                        </div>
                                                    </td>
                                                @endif
                                                <td>
                                                    <div class="option-actions">
                                                        @if ($cliente->margen_garantizado != null)
                                                            <a target="_blank" href="{{ route('clientes.downloadclient', $documentos['margen_garantizado']->nombre ) }}">
                                                                <i class="material-icons icon-ojo-azul"></i>
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0)">
                                                                <i class="material-icons icon-ojo-azul"></i>
                                                            </button>
                                                        @endif

                                                        <a href="javascript:void(0)" onclick="load_file( {{ $cliente->id }} ,'margen garantizado')">
                                                            <i class="material-icons icon-editar-azul"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="information--text text-left">
                                                        <p>Solicitud de documentos</p>
                                                    </div>
                                                </td>
                                                @if ($cliente->solicitud_de_documentos != null)
                                                    <td>
                                                        <div class="information--text">
                                                            <a href="javascript:void(0)">{{ $documentos['solicitud_de_documentos']->nombre }}</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p>{{ $documentos['solicitud_de_documentos']->created_at }}</p>
                                                        </div>
                                                    </td>
                                                @else
                                                    <td>
                                                        <div class="information--text">
                                                            <p>No hay archivo</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p></p>
                                                        </div>
                                                    </td>
                                                @endif
                                                <td>
                                                    <div class="option-actions">
                                                        @if ($cliente->solicitud_de_documentos != null)
                                                            <a target="_blank" href="{{ route('clientes.downloadclient', $documentos['solicitud_de_documentos']->nombre) }}">
                                                                <i class="material-icons icon-ojo-azul"></i>
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0)">
                                                                <i class="material-icons icon-ojo-azul"></i>
                                                            </a>
                                                        @endif
                                                        <a href="javascript:void(0)" onclick="load_file( {{ $cliente->id }} ,'solicitud de documentos')">
                                                            <i class="material-icons icon-editar-azul"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="information--text text-left">
                                                        <p>INE</p>
                                                    </div>
                                                </td>
                                                @if ($cliente->ine != null)
                                                    <td>
                                                        <div class="information--text">
                                                            <a href="javascript:void(0)">{{ $documentos['ine']->nombre }}</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p>{{ $documentos['ine']->created_at }}</p>
                                                        </div>
                                                    </td>
                                                @else
                                                    <td>
                                                        <div class="information--text">
                                                            <p>No hay archivo</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p></p>
                                                        </div>
                                                    </td>
                                                @endif
                                                <td>
                                                    <div class="option-actions">
                                                        @if ($cliente->ine != null)
                                                            <a target="_blank" href="{{ route('clientes.downloadclient', $documentos['ine']->nombre ) }}">
                                                                <i class="material-icons icon-ojo-azul"></i>
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0)">
                                                                <i class="material-icons icon-ojo-azul"></i>
                                                            </a>
                                                        @endif
                                                        <a href="javascript:void(0)" onclick="load_file( {{ $cliente->id }} ,'ine')">
                                                            <i class="material-icons icon-editar-azul"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="information--text text-left">
                                                        <p>Acta constitutiva</p>
                                                    </div>
                                                </td>
                                                @if ($cliente->acta_constitutiva != null)
                                                    <td>
                                                        <div class="information--text">
                                                            <a href="javascript:void(0)">{{ $documentos['acta_constitutiva']->nombre }}</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p>{{ $documentos['acta_constitutiva']->created_at }}</p>
                                                        </div>
                                                    </td>
                                                @else
                                                    <td>
                                                        <div class="information--text">
                                                            <p>No hay archivo</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p></p>
                                                        </div>
                                                    </td>
                                                @endif
                                                <td>
                                                    <div class="option-actions">
                                                        @if ($cliente->acta_constitutiva != null)
                                                            <a target="_blank" href="{{ route('clientes.downloadclient', $documentos['acta_constitutiva']->nombre ) }}">
                                                                <i class="material-icons icon-ojo-azul"></i>
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0)">
                                                                <i class="material-icons icon-ojo-azul"></i>
                                                            </a>
                                                        @endif
                                                        <a href="javascript:void(0)" onclick="load_file( {{ $cliente->id }} ,'acta constitutiva')">
                                                            <i class="material-icons icon-editar-azul"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="information--text text-left">
                                                        <p>Poder notarial</p>
                                                    </div>
                                                </td>
                                                @if ($cliente->poder_notarial != null)
                                                    <td>
                                                        <div class="information--text">
                                                            <a href="javascript:void(0)">{{ $documentos['poder_notarial']->nombre }}</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p>{{ $documentos['poder_notarial']->created_at }}</p>
                                                        </div>
                                                    </td>
                                                @else
                                                    <td>
                                                        <div class="information--text">
                                                            <p>No hay archivo</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p></p>
                                                        </div>
                                                    </td>
                                                @endif
                                                <td>
                                                    <div class="option-actions">
                                                        @if ($cliente->poder_notarial != null)
                                                            <a target="_blank" href="{{ route('clientes.downloadclient', $documentos['poder_notarial']->nombre) }}">
                                                                <i class="material-icons icon-ojo-azul"></i>
                                                            </a>
                                                        @else

                                                            <a href="javascript:void(0)">
                                                                <i class="material-icons icon-ojo-azul"></i>
                                                            </a>
                                                        @endif
                                                        <a href="javascript:void(0)" onclick="load_file( {{ $cliente->id }} ,'poder notarial')">
                                                            <i class="material-icons icon-editar-azul"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="information--text text-left">
                                                        <p>Constancia de situacion fiscal. (No mayor a 3 meses)</p>
                                                    </div>
                                                </td>
                                                @if ($cliente->constancia_de_situacion_fiscal != null)
                                                    <td>
                                                        <div class="information--text">
                                                            <a href="javascript:void(0)">{{ $documentos['constancia_de_situacion_fiscal']->nombre }}</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p>{{ $documentos['constancia_de_situacion_fiscal']->created_at }}</p>
                                                        </div>
                                                    </td>
                                                @else
                                                    <td>
                                                        <div class="information--text">
                                                            <p>No hay archivo</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p></p>
                                                        </div>
                                                    </td>
                                                @endif
                                                <td>
                                                    <div class="option-actions">
                                                        @if ($cliente->constancia_de_situacion_fiscal != null)
                                                            <a target="_blank" href="{{ route('clientes.downloadclient', $documentos['constancia_de_situacion_fiscal']->nombre) }}">
                                                                <i class="material-icons icon-ojo-azul"></i>
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0)">
                                                                <i class="material-icons icon-ojo-azul"></i>
                                                            </a>
                                                        @endif
                                                        <a href="javascript:void(0)" onclick="load_file( {{ $cliente->id }} ,'constancia de situacion fiscal')">
                                                            <i class="material-icons icon-editar-azul"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="information--text text-left">
                                                        <p>Comprobante de domicilio. (Vigente)</p>
                                                    </div>
                                                </td>
                                                @if ($cliente->comprobante_de_domicilio != null)
                                                    <td>
                                                        <div class="information--text">
                                                            <a href="javascript:void(0)">{{ $documentos['comprobante_de_domicilio']->nombre }}</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p>{{ $documentos['comprobante_de_domicilio']->created_at }}</p>
                                                        </div>
                                                    </td>
                                                @else
                                                    <td>
                                                        <div class="information--text">
                                                            <p>No hay archivo</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p></p>
                                                        </div>
                                                    </td>
                                                @endif
                                                <td>
                                                    <div class="option-actions">
                                                        @if ($cliente->comprobante_de_domicilio != null)
                                                            <a target="_blank" href="{{ route('clientes.downloadclient', $documentos['comprobante_de_domicilio']->nombre) }}">
                                                                <i class="material-icons icon-ojo-azul"></i>
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0)">
                                                                <i class="material-icons icon-ojo-azul"></i>
                                                            </a>
                                                        @endif

                                                        <a href="javascript:void(0)" onclick="load_file( {{ $cliente->id }} ,'comprobante de domicilio')">
                                                            <i class="material-icons icon-editar-azul"></i>
                                                        </a>

                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="information--text text-left">
                                                        <p>Propuesta</p>
                                                    </div>
                                                </td>
                                                @if ( count($documentos['propuestas_array']) > 0 )
                                                    <td>
                                                        <div class="information--text">

                                                            @if ( $documentos['propuestas_array'][ count($documentos['propuestas_array'])-1 ]['archivo'] !== null )
                                                                <a href="javascript:void(0)">
                                                                    {{ $documentos['propuestas_array'][ count($documentos['propuestas_array'])-1 ]['archivo'] }}
                                                                </a>
                                                            @else
                                                                <p>No hay archivo</p>
                                                            @endif

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p>{{ $documentos['propuestas_array'][ count($documentos['propuestas_array'])-1 ]['fecha'] }}</p>
                                                        </div>
                                                    </td>
                                                @else
                                                    <td>
                                                        <div class="information--text">
                                                            <p>No hay archivo</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">

                                                        </div>
                                                    </td>
                                                @endif

                                                <td>
                                                    <div class="option-actions">

                                                        @if ( count($documentos['propuestas_array']) > 0 )

                                                            @if ( $documentos['propuestas_array'][ count($documentos['propuestas_array'])-1 ]['archivo'] !== null )
                                                                <a target="_blank" href="{{ route('clientes.downloadclient', $documentos['propuestas_array'][ count($documentos['propuestas_array'])-1 ]['archivo'] ) }}">
                                                                    <i class="material-icons icon-ojo-azul"></i>
                                                                </a>
                                                            @endif

                                                        @endif
                                                        <a href="javascript:void(0)" onclick="load_propuesta( {{ $cliente->id }} )">
                                                            <i class="material-icons icon-editar-azul"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="information--text text-left">
                                                        <p>Contrato comodato</p>
                                                    </div>
                                                </td>
                                                @if ($cliente->contrato_comodato != null)
                                                    <td>
                                                        <div class="information--text">
                                                            <a href="javascript:void(0)">{{ $documentos['contrato_comodato']->nombre }}</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p>{{ $documentos['contrato_comodato']->created_at }}</p>
                                                        </div>
                                                    </td>
                                                @else
                                                    <td>
                                                        <div class="information--text">
                                                            <p>No hay archivo</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p></p>
                                                        </div>
                                                    </td>
                                                @endif
                                                <td>
                                                    <div class="option-actions">
                                                        @if ($cliente->contrato_comodato != null)
                                                            <a target="_blank" href="{{ route('clientes.downloadclient', $documentos['contrato_comodato']->nombre) }}">
                                                                <i class="material-icons icon-ojo-azul"></i>
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0)">
                                                                <i class="material-icons icon-ojo-azul"></i>
                                                            </a>
                                                        @endif

                                                        <a href="javascript:void(0)" onclick="load_file( {{ $cliente->id }} ,'contrato comodato')">
                                                            <i class="material-icons icon-editar-azul"></i>
                                                        </a>

                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="information--text text-left">
                                                        <p>Contrato de suministro</p>
                                                    </div>
                                                </td>
                                                @if ($cliente->contrato_de_suministro != null)
                                                    <td>
                                                        <div class="information--text">
                                                            <a href="javascript:void(0)">{{ $documentos['contrato_de_suministro']->nombre }}</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p>{{ $documentos['contrato_de_suministro']->created_at }}</p>
                                                        </div>
                                                    </td>
                                                @else
                                                    <td>
                                                        <div class="information--text">
                                                            <p>No hay archivo</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p></p>
                                                        </div>
                                                    </td>
                                                @endif
                                                <td>
                                                    <div class="option-actions">

                                                        @if ($cliente->contrato_de_suministro != null)
                                                            <a target="_blank" href="{{ route('clientes.downloadclient', $documentos['contrato_de_suministro']->nombre) }}">
                                                                <i class="material-icons icon-ojo-azul"></i>
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0)">
                                                                <i class="material-icons icon-ojo-azul"></i>
                                                            </a>
                                                        @endif

                                                        <a href="javascript:void(0)" onclick="load_file( {{ $cliente->id }} ,'contrato de suministro')">
                                                            <i class="material-icons icon-editar-azul"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr style="{{ $show_documentos_cliente }}">
                                                <td>
                                                    <div class="information--text text-left">
                                                        <p>Carta de bienvenida</p>
                                                    </div>
                                                </td>
                                                @if ($cliente->carta_bienvenida != null)
                                                    <td>
                                                        <div class="information--text">
                                                            <a href="javascript:void(0)">{{ $documentos['carta_bienvenida']->nombre }}</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p>{{ $documentos['carta_bienvenida']->created_at }}</p>
                                                        </div>
                                                    </td>
                                                @else
                                                    <td>
                                                        <div class="information--text">
                                                            <p>No hay archivo</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p></p>
                                                        </div>
                                                    </td>
                                                @endif
                                                <td>
                                                    <div class="option-actions">

                                                        @if ($cliente->carta_bienvenida != null)
                                                            <a target="_blank" href="{{ route('clientes.downloadclient', $documentos['carta_bienvenida']->nombre) }}">
                                                                <i class="material-icons icon-ojo-azul"></i>
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0)">
                                                                <i class="material-icons icon-ojo-azul"></i>
                                                            </a>
                                                        @endif

                                                        <a href="javascript:void(0)" onclick="load_file( {{ $cliente->id }} ,'carta bienvenida')">
                                                            <i class="material-icons icon-editar-azul"></i>
                                                        </a>

                                                    </div>
                                                </td>
                                            </tr>

                                            <tr style="{{ $show_documentos_cliente }}">
                                                <td>
                                                    <div class="information--text text-left">
                                                        <p>Permiso CREE</p>
                                                    </div>
                                                </td>
                                                @if ($cliente->permiso_cree != null)
                                                    <td>
                                                        <div class="information--text">
                                                            <a href="javascript:void(0)">{{ $documentos['permiso_cree']->nombre }}</a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p>{{ $documentos['permiso_cree']->created_at }}</p>
                                                        </div>
                                                    </td>
                                                @else
                                                    <td>
                                                        <div class="information--text">
                                                            <p>No hay archivo</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="information--text">
                                                            <p></p>
                                                        </div>
                                                    </td>
                                                @endif
                                                <td>
                                                    <div class="option-actions">

                                                        @if ($cliente->permiso_cree != null)
                                                            <a target="_blank" href="{{ route('clientes.downloadclient', $documentos['permiso_cree']->nombre) }}" >
                                                                <i class="material-icons icon-ojo-azul"></i>
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0)">
                                                                <i class="material-icons icon-ojo-azul"></i>
                                                            </a>
                                                        @endif

                                                        <a href="javascript:void(0)" onclick="load_file( {{ $cliente->id }} ,'permiso_cree')">
                                                            <i class="material-icons icon-editar-azul"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

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

<div class="modal" id="add-documento">
  <div class="modal-dialog">
    <div class="modal-content">

        <div class="title--content">
            <h1 id="type-file">Prospectos</h1>
        </div>

        <form action="{{ route('ventas.guardar_documento') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf
            <div class="container information">
                <div class="row">
                    <div class="col-12 mb-2">
                        <input type="text" name="cliente_id" id="cliente_id_documento" value="" style="display: none;">
                        <input type="text" name="fileType" value="" id="value-file" style="display: none;">
                        <input type="file" name="file" class="dropify" data-min-width="400" data-allowed-file-extensions="pdf" required/>
                    </div>
                </div>
            </div>

            <div class="footer--options">
                <button class="btn-option">Guardar</button>
                <button class="btn-option" data-dismiss="modal">Cancelar</button>
            </div>
        </form>

    </div>
  </div>
</div>

<div class="modal" id="add-propuesta">
  <div class="modal-dialog">
    <div class="modal-content">

        <div class="title--content">
            <h1 id="type-file">Propuesta</h1>
        </div>
        <form action="{{ route('ventas.guardar_propuesta') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf
            <div class="container information">
                <div class="row">

                    <input type="text" id="cliente_id_propuesta" name="cliente_id" style="display: none;">

                    <div class="col-12">

                        <div class="form--content">

                            <div class="form--content--items">

                                <div class="form--notes--date">
                                    <i class="icon-calendario-gris"></i>
                                    <input type="date" name="fecha_propuesta" id="fecha_propuesta" required>
                                </div>

                                <div class="form-notes">
                                    <label>Regular</label>
                                    <input type="text" name="regular_price" id="regular_price" value="0">
                                </div>
                            </div>

                            <div class="form--content--items">

                                <div class="form-notes">
                                    <label>Nota</label>
                                    <input type="text" name="nota_value" id="nota_value">
                                </div>

                                <div class="form--content">
                                    <div class="form-notes">
                                        <label>Supreme</label>
                                        <input type="text" name="supreme_price" id="supreme_price" value="0">
                                    </div>

                                    <div class="form-notes">
                                        <label>Diésel</label>
                                        <input type="text" name="diesel_price" id="diesel_price" value="0">
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-12 mb-2">
                        <input type="file" id="file_propuesta" name="file" class="dropify" data-min-width="400" data-allowed-file-extensions="pdf"/>
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
    <script src="{{ asset('js/ventas.js') }}"></script>
    <script>

        let propuestas = $('#propuestas_json').val();
        propuesta = JSON.parse(propuestas);

        $(document).ready(function() {
        });

        function load_file( cliente_id ,type_file )
        {
            $('#type-file').text(type_file.toUpperCase());
            $('#value-file').val(type_file);
            $('#cliente_id_documento').val(cliente_id);
            $('#add-documento').modal();
        }

        function load_propuesta( $cliente_id ){
            $('#cliente_id_propuesta').val($cliente_id);
            $('#add-propuesta').modal();
        }

        document.getElementById('fecha_propuesta').addEventListener('change', (event) => {
            $fecha_propuesta = $('#fecha_propuesta').val();

            propuesta.map( (p) => {
                if(p['fecha'] === $fecha_propuesta)
                {
                    $('#regular_price').val(p['regular']);
                    $('#supreme_price').val(p['supreme']);
                    $('#diesel_price').val(p['diesel']);
                    $('#nota_value').val(p['nota']);
                }
            });

        });

    </script>
@endpush

@endsection

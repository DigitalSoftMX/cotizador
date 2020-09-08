@extends('layouts.app', ['activePage' => 'Bienvenido', 'titlePage' => __('Ventas')])
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
                            {{ __('Agrega nuevos clientes, lleva el seguimiento y sube la documentación requerida.') }}
                        </p>
                    </div>
                    <div class="card-body">

                        <div class="row ">

                            <div class="col-lg-12 col-12">
                                @php

                                    $tipo_documentos = array('carta_intencion', 'convenio_confidencialidad', 'margen_garantizado', 'contrato_comodato',
                                        'solicitud_documentacion', 'propuestas', 'contrato_suministro', 'carta_bienvenida'
                                    );

                                @endphp
                                <table id="mis-clientes" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nombre empresa</th>
                                            <th>Correo</th>
                                            <th>Unidad de negocio</th>
                                            <th>Información</th>
                                            <th>Asignar vendedor</th>
                                            <th>Avance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $data[0] as $cliente )
                                            <tr>
                                                <td>{{ $cliente->nombre }}</td>
                                                <td>{{ $cliente->email }}</td>
                                                <td>{{ $cliente->estado }}</td>

                                                @php
                                                    $informacion = "Nombre o Razón Social: ".$cliente->nombre."<br>Correo electronico: ".$cliente->email."<br>";
                                                    $informacion .= "Dirección: ".$cliente->direccion."<br>Tipo: ".$cliente->tipo."<br>Tel: ".$cliente->telefono."<br>";
                                                    if($cliente->tipo === "Estacion"){
                                                        $informacion .= "Bandera blanca: ".$cliente->direccion."<br>No. estación: ".$cliente->numero_estacion."<br>";
                                                    }

                                                    $informacion .= "<span>Dias: ".$cliente->dias." dias.</span>";

                                                    $avances = "";
                                                    foreach($tipo_documentos as $tipo_documento)
                                                    {
                                                        if($cliente[$tipo_documento] != null){
                                                            $avances .= '<span class="badge badge-success mr-1">'.strtoupper(str_replace('_',' ', $tipo_documento)).'</span>';
                                                        }else{
                                                            $avances .= '<span class="badge badge-danger mr-1">'.strtoupper(str_replace('_',' ', $tipo_documento)).'</span>';
                                                        }
                                                    }

                                                @endphp

                                                <td><button onclick="informacion_cliente('{{ $informacion }}', '{{ $avances }}')" class="btn btn-info text-white">Visualizar</button></td>
                                                <td><a class="btn btn-success text-white" href="{{ route('ventas.asignarvendedor', $cliente->id) }}">Asignar</a></td>

                                                <td><a class="btn btn-primary text-white" href="{{ route('clientes.avance', $cliente->id) }}">Visualizar</a></td>
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

<!-- The Modal -->
<div class="modal" id="informacion_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Informacion principal</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <p id="info_p" ></p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <p id="avance_p" class="card-text"></p>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

@push('js')

    <script>
        $(document).ready(function() {

            $('#mis-clientes').DataTable( {
                "language": {
                    "lengthMenu": "Mostrar _MENU_ elementos por página",
                    "zeroRecords": "No hay ninguna coincidencia",
                    "info": "Página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay datos que mostrar",
                    "infoFiltered": "",
                    "search": "Buscar:",
                    "paginate": {
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    },
                }
            } );

        } );

        function informacion_cliente(string, avance){
            document.getElementById('info_p').innerHTML = string;
            document.getElementById('avance_p').innerHTML = avance;
            $("#informacion_modal").modal()
        }

    </script>

@endpush

@endsection

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
                            {{ __('Visualiza el avance de los vendedores con sus clientes') }}
                        </p>
                    </div>
                    <div class="card-body">

                        <div class="row">

                            <div class="col-lg-4 mb-4">
                                @if (session('status'))
                                    <div class="alert {{ session('status_alert') }}" role="alert" id="alert-view">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-12">

                                @php

                                    $tipo_documentos = array('carta_intencion', 'convenio_confidencialidad', 'margen_garantizado', 'contrato_comodato',
                                        'solicitud_documentacion', 'propuestas', 'contrato_suministro', 'carta_bienvenida'
                                    );

                                @endphp

                                <table id="seguimientos" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Vendedor</th>
                                            <th>Cliente</th>
                                            <th>Unidad de negocio</th>
                                            <th>Información cliente</th>
                                            <th>Avance</th>
                                            <th>Aumentar tiempo de seguimiento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $data[0] as $index => $cliente_vendedor)
                                            <tr>
                                                <td>{{ $cliente_vendedor->name }} {{ $cliente_vendedor->app_name }} {{ $cliente_vendedor->apm_name }}</td>
                                                <td>{{ $cliente_vendedor->nombre }}</td>
                                                <td>{{ $cliente_vendedor->estado }}</td>

                                                @php
                                                    $informacion = "Nombre o Razón Social: ".$cliente_vendedor->nombre."<br>Correo electronico: ".$cliente_vendedor->email."<br>";
                                                    $informacion .= "Dirección: ".$cliente_vendedor->direccion."<br>Tipo: ".$cliente_vendedor->tipo."<br>Tel: ".$cliente_vendedor->telefono."<br>";
                                                    if($cliente_vendedor->tipo === "Estación"){
                                                        $informacion .= "Bandera blanca: ".$cliente_vendedor->bandera_blanca."<br>No. estación: ".$cliente_vendedor->numero_estacion."<br>";
                                                    }

                                                    if($cliente_vendedor->status != "Finalizado"){
                                                        $informacion .= "<span>Te restan: ".$cliente_vendedor->dias." dias.</span>";
                                                    }else{
                                                        $informacion .= "El seguimiento ha finalizado";
                                                    }

                                                    $avances = "";
                                                    foreach($tipo_documentos as $tipo_documento)
                                                    {
                                                        if($cliente_vendedor[$tipo_documento] != null){
                                                            $avances .= '<span class="badge badge-success mr-1">'.strtoupper(str_replace('_',' ', $tipo_documento)).'</span>';
                                                        }else{
                                                            $avances .= '<span class="badge badge-danger mr-1">'.strtoupper(str_replace('_',' ', $tipo_documento)).'</span>';
                                                        }
                                                    }

                                                @endphp

                                                <td><button type="button" class="btn btn-primary" onclick="informacion_cliente('{{ $informacion }}', '{{ $avances }}')">Información</button></td>
                                                <td><a class="btn btn-success text-white" href="{{ route('clientes.avance', $cliente_vendedor->cliente_id) }}">Visualizar</a></td>
                                                <td>

                                                    <form method="POST" action="{{ route('ventas.agregardias') }}" id="form{{ $index }}">
                                                        @csrf
                                                        <input type="text" value="{{ $cliente_vendedor->cliente_id }}" name="cliente_id" style="display: none;">
                                                        <input type="text" value="{{ $cliente_vendedor->user_id }}" name="user_id" style="display: none;">
                                                        <div class="form-group">
                                                            <label for="dias">Dias:</label>
                                                            <input type="number" class="form-control" id="dias" name="dias" min="0" value="0">
                                                        </div>
                                                        <button type="button" class="btn btn-info btn-block" onclick="pregunta({{ $index }})">Aceptar</button>
                                                    </form>

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

            $('#seguimientos').DataTable( {
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

            setTimeout(function(){
                $('#alert-view').hide();
            }, 3000);

        } );

        function informacion_cliente(string, avance){
            document.getElementById('info_p').innerHTML = string;
            document.getElementById('avance_p').innerHTML = avance;
            $("#informacion_modal").modal()
        }

        function pregunta(index){
            if (confirm('¿Estas seguro de dar le mas tiempo?')){
                document.getElementById('form'+index).submit()
            }
        }

    </script>

@endpush

@endsection

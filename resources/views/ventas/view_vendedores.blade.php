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
                            {{ __('Aquí puedes ver y modificar las unidades de negocio de un vendedor.') }}
                        </p>
                    </div>
                    <div class="card-body">

                        <div class="row">

                            <div class="col-auto ml-auto mb-3">
                                <a class="btn btn-primary" href="{{ url('ventas/create') }}"> Agregar vendedor</a>
                            </div>

                            <div class="col-lg-12 col-12">
                                <table id="lista-vendedores" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Unidad(es) de negocio</th>
                                            <th>Editar</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($vendedores as $vendedor)
                                            <tr>
                                                <td>{{ $vendedor->name." ".$vendedor->app_name." ".$vendedor->apm_name}}</td>
                                                <td>{{ $vendedor->email }}</td>
                                                <td>
                                                    @php
                                                        $unidades = json_decode($vendedor->unidades_negocio);
                                                    @endphp
                                                    @if($unidades == NULL)
                                                        <p>No tiene unidades agregadas</p>
                                                    @else
                                                        <div class="form-group">
                                                            <select class="form-control">
                                                        @foreach ($unidades as $unidad )
                                                            <option>{{$unidad}}</option>
                                                        @endforeach
                                                            </select>
                                                        </div>
                                                    @endif

                                                </td>
                                                <td>
                                                    <a href="{{ route('ventas.addunidadnegocio', $vendedor->id) }}">
                                                        <i class="material-icons">edit</i>
                                                    </a>
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

@push('js')

    <script>
        $(document).ready(function() {

            $('#lista-vendedores').DataTable( {
                "language": {
                    "lengthMenu": "Mostrar _MENU_ elementos por página",
                    "zeroRecords": "No hay ninguna coincidencia",
                    "info": "Página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay datos que mostrar",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Buscar:",
                    "paginate": {
                        "next":       "Siguiente",
                        "previous":   "Anterior"
                    },
                }
            } );

        } );
    </script>

@endpush

@endsection

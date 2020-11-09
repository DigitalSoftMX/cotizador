@extends('layouts.app', ['activePage' => 'Historial de Actividades', 'titlePage' => __('Historial de Actividades')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">
                            {{ __('Historial de Actividades') }}
                        </h4>
                        <p class="card-category">
                            {{ __('Aqui puedes observar el historial de inicio de sesion.') }}
                        </p>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-success">
                                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                        <i class="material-icons">
                                            close
                                        </i>
                                    </button>
                                    <span>
                                        {{ session('status') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-12 justify-content-start">
                                <button type="button" class="btn btn-primary" onclick="excel_download('datatables')" >Excel</button>
                            </div>
                        </div>

                        <div class="material-datatables">
                            <table cellspacing="0" class="table table-striped table-no-bordered table-hover"
                                id="datatables" style="width:100%" width="100%">
                                <thead class="text-primary">
                                    <th>
                                        {{ __('Nombre')}}
                                    </th>
                                    <th>
                                        {{ __('e-mail')}}
                                    </th>
                                    <th>
                                        {{ __('Fecha')}}
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($actividades as $actividad)
                                    <tr>
                                        <td>
                                            {{ $actividad->nombre }}
                                        </td>
                                        <td>
                                            {{ $actividad->email }}
                                        </td>
                                        <td>
                                            {{ $actividad->inicio }}
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
@endsection

@push('js')
    <script src="{{ asset('js/table2csv.js') }}"></script>
    <script src="{{ asset('js/ventas.js') }}"></script>
    <script>
        $(document).ready(function() {
            loadTable('datatables');
        });
    </script>
@endpush

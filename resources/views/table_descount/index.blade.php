@extends('layouts.app', ['activePage' => 'Tabla de Descuentos Valero', 'titlePage' => __('Tabla de Descuentos Valero')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card card-nav-tabs">
                <div class="card-header card-header-primary">
                    Tabla de Descuentos
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
                        <div class="col">
                        </div>
                        <div class="col">
                            <h4 class="text-center">
                                <a class="font-weight-bold">Vigencia de  </a>{{ $fecha_inicio }} <a class="font-weight-bold">  a  </a>{{ $fecha_final}}
                            </h4>
                        </div>
                        <!--div class="col">
                            <div class="togglebutton text-center">
                                <label>
                                    <input  type="checkbox" id="vigencia">
                                        Realizar Pruebas
                                        <span class="toggle">
                                        </span>
                                        Activar Vigencia
                                    </input>
                                </label>
                            </div>
                        </div-->
                        <div class="col">
                            <a class="btn btn-info float-right" href="{{ route('table_descount.create', ['discounts_m'=>$discounts_m, 'discounts_p'=>$discounts_p,'discounts_d'=>$discounts_d, 'fecha_inicio'=>$fecha_inicio, 'fecha_final'=>$fecha_final]) }}">
                                Editar tablas de descuentos
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <!--label class="label-control">
                                        Perido Inicial
                                    </label>
                                    <input class="form-control datetimepicker" id="calendar_first" type="text" value="{{ $fecha_inicio }}"/-->
                                </div>
                                <div class="col">
                                    <!--label class="label-control">
                                        Periodo Final
                                    </label>
                                    <input class="form-control datetimepicker" id="calendar_second" type="text" value="{{ $fecha_final }}"/-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mt-5">
                            <div class="card">
                                <div class="card-header card-header-success">
                                    <h4 class="card-title">
                                        Regular
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="font-weight-bold" scope="col">
                                                    Nivel
                                                </th>
                                                <th class="font-weight-bold" scope="col">
                                                    Lim. Inferior
                                                </th>
                                                <th class="font-weight-bold" scope="col">
                                                    Lim. Superior
                                                </th>
                                                <th class="font-weight-bold" scope="col">
                                                    Descuento
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($discounts_m as $discount_m => $discount_m_item)
                                            <tr>
                                                <th scope="row">
                                                    {{ $discount_m+1 }}
                                                </th>
                                                <td>
                                                    {{ $discount_m_item[0] }}
                                                </td>
                                                <td>
                                                    {{ $discount_m_item[1] }}
                                                </td>
                                                <td>
                                                    {{ $discount_m_item[2] }}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-5">
                            <div class="card">
                                <div class="card-header card-header-danger">
                                    <h4 class="card-title">
                                        Supreme
                                    </h4>
                                </div>
                                <div class="card-body table-responsive-sm">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="font-weight-bold" scope="col">
                                                    Nivel
                                                </th>
                                                <th class="font-weight-bold" scope="col">
                                                    Lim. Inferior
                                                </th>
                                                <th class="font-weight-bold" scope="col">
                                                    Lim. Superior
                                                </th>
                                                <th class="font-weight-bold" scope="col">
                                                    Descuento
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($discounts_p as $discount => $discount_item)
                                            <tr>
                                                <th scope="row">
                                                    {{ $discount+1 }}
                                                </th>
                                                <td>
                                                    {{ $discount_item[0] }}
                                                </td>
                                                <td>
                                                    {{ $discount_item[1] }}
                                                </td>
                                                <td>
                                                    {{ $discount_item[2] }}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-5">
                            <div class="card">
                                <div class="card-header card-header-warning">
                                    <h4 class="card-title">
                                        Diésel
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="font-weight-bold" scope="col">
                                                    Nivel
                                                </th>
                                                <th class="font-weight-bold" scope="col">
                                                    Lim. Inferior
                                                </th>
                                                <th class="font-weight-bold" scope="col">
                                                    Lim. Superior
                                                </th>
                                                <th class="font-weight-bold" scope="col">
                                                    Descuento
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($discounts_d as $discount_d => $discount_d_item)
                                            <tr>
                                                <th scope="row">
                                                    {{ $discount_d+1 }}
                                                </th>
                                                <td>
                                                    {{ $discount_d_item[0] }}
                                                </td>
                                                <td>
                                                    {{ $discount_d_item[1] }}
                                                </td>
                                                <td>
                                                    {{ $discount_d_item[2] }}
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
@endsection



@extends('layouts.app', ['activePage' => 'Tabla de Descuentos Pemex', 'titlePage' => __('Tabla de Descuentos Pemex')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">
                            {{ __('Pemex') }}
                        </h4>
                        <p class="card-category">
                            {{ __('Aquí puedes administrar todo lo relacionado con Pemex.') }}
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
                        <div class="col">
                            <a class="btn btn-info float-right" href="{{ route('pemex.create', ['discounts_m'=>$magna, 'discounts_p'=>$premium,'discounts_d'=>$disel]) }}">
                                Editar tablas de descuentos
                            </a>

                            <!--a class="btn btn-info float-left" href="">
                                Agregar precios PEMEX
                            </a-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mt-5">
                            <div class="card">
                                <div class="card-header card-header-success">
                                    <h4 class="card-title">
                                        Magna
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
                                            @foreach($magna as $discount_m => $discount_m_item)
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
                                        Premium
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
                                            @foreach($premium as $discount => $discount_item)
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
                                            @foreach($disel as $discount_d => $discount_d_item)
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

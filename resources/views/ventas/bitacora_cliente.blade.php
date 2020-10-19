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
                            {{ __('Bitácora') }}
                        </p>
                    </div>
                    <div class="card-body">

                        <div class="row">

                            <div class="col-12">
                                <div class="container-title-first">
                                    <i class="material-icons">home_work</i>
                                    <h1>{{ $nombre_empresa }}</h1>
                                </div>
                                <div>
                                     <p>Fecha alta: <span>{{ $created_at }}</span></p>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="options--content">
                                    <a href="{{ route($url) }}" type="button" class="btn-option" >Atras</a>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="content--bitacora">

                                    <table>
                                        <thead>
                                            <tr>
                                                <th>
                                                    <p>Fecha</p>
                                                </th>
                                                <th>
                                                    <p>Comentario</p>
                                                </th>
                                                <th>
                                                    <p>Precios</p>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ( $bitacora as $b)
                                                <tr>
                                                    <td><p>{{ $b['fecha'] }}</p></td>
                                                    <td>
                                                        <p>{{ $b['comentario'] }}</p>
                                                    </td>
                                                    <td>
                                                        <p>Regular: <span>${{ $b['regular_price'] }}</span></p>
                                                        <p>Supreme: <span>${{ $b['supreme_price'] }}</span></p>
                                                        <p>Diesel: <span>${{ $b['diesel_price'] }}</span></p>
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


@push('js')

@endpush
@endsection

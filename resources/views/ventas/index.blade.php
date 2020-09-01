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

                        <div class="row justify-content-center">

                            <div class="col-lg-8 col-12">

                                <a  href="{{ route('ventas.lista_vendedores') }}">
                                    <div class="card" style="background-color: #CACACA;color: #000;">
                                        <div class="card-body">
                                            Vendedores
                                        </div>
                                    </div>
                                </a>

                                <div class="card bg-success text-white">
                                    <div class="card-body">
                                        Clientes disponibles
                                    </div>
                                </div>

                                <div class="card bg-warning text-white">
                                    <div class="card-body">
                                        Seguimientos
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
@endsection

@extends('layouts.app', ['activePage' => 'Captura de precios potesta', 'titlePage' => __('Captura de Precios Potesta')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">
                            {{ __('Precios de Potesta') }}
                        </h4>
                        <p class="card-category">
                            {{ __('Aquí puedes gestionar los precios de potesta.') }}
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
                            <div class="col-12 text-right">
                                <a class="btn btn-sm btn-primary" href="{{ route('potesta.create') }}">
                                    {{ __('Agregar Precio') }}
                                </a>
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
                                        {{ __('Precio Regular')}}
                                    </th>
                                    <th>
                                        {{ __('Precio Premium')}}
                                    </th>
                                    <th>
                                        {{ __('Precio Diésel')}}
                                    </th>
                                    <th>
                                        {{ __('Fecha de Alta')}}
                                    </th>
                                    <!--th class="disabled-sorting text-right">
                                        Acciones
                                    </th-->
                                </thead>
                                <tbody>
                                    @foreach($competicions as $competicion)
                                    @if($competicion->id != '2')
                                    <tr>
                                        <td>
                                            {{ $competicion->nombre }} {{ $competicion->terminals->razon_social }}
                                        </td>
                                        <td>
                                            {{$competicion->price_potesta[(count($competicion->price_potesta)) - 1]->precio_regular}}
                                        </td>
                                        <td>
                                            {{$competicion->price_potesta[(count($competicion->price_potesta)) - 1]->precio_premium}}
                                        </td>
                                        <td>
                                            {{$competicion->price_potesta[(count($competicion->price_potesta)) - 1]->precio_disel}}
                                        </td>
                                        <td>
                                            {{ $competicion->price_potesta[(count($competicion->price_potesta)) - 1]->created_at->format('d/m/Y') }}
                                        </td>
                                        <!--td class="td-actions text-right">
                                            <form action="" method="post">
                                                @csrf
                                                @method('delete')
                                                <a class="btn btn-success btn-link" data-original-title=""
                                                    href="{{ route('potesta.edit', $competicion) }}" rel="tooltip"
                                                    title="">
                                                    <i class="material-icons">
                                                        edit
                                                    </i>
                                                    <div class="ripple-container">
                                                    </div>
                                                </a>
                                            </form>
                                        </td-->
                                    </tr>
                                    @endif
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

@extends('layouts.app', ['activePage' => 'Alta de Terminales', 'titlePage' => __('Alta de Terminales')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">
                            {{ __('Terminales') }}
                        </h4>
                        <p class="card-category">
                            {{ __('Aquí puedes administrar todas las terminales.') }}
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
                                <a class="btn btn-sm btn-primary" href="{{ route('terminales.create') }}">
                                    {{ __('Agregar Terminal') }}
                                </a>
                            </div>
                        </div>
                        <div class="material-datatables">
                            <table cellspacing="0" class="table table-striped table-no-bordered table-hover"
                                id="datatables" style="width:100%" width="100%">
                                <thead class="text-primary">
                                    <th>
                                        {{ __('ID')}}
                                    </th>
                                    <th>
                                        {{ __('Nombre')}}
                                    </th>
                                    <th>
                                        {{ __('Status')}}
                                    </th>
                                    <th>
                                        {{ __('Fecha de Alta')}}
                                    </th>
                                    <th class="disabled-sorting text-right">
                                        Acciones
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($terminals as $terminal)
                                    <tr>
                                        <td>
                                            {{ $terminal->id }}
                                        </td>
                                        <td>
                                            {{ $terminal->razon_social }}
                                        </td>
                                        <td>
                                            @if($terminal->status == 1)
                                            Activa
                                            @else
                                            Inactiva
                                            @endif
                                        </td>
                                        <td>
                                            {{ $terminal->created_at }}
                                        </td>
                                        <td class="td-actions text-right">
                                            <form action="{{ route('terminales.destroy', $terminal->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <a class="btn btn-success btn-link" data-original-title=""
                                                    href="{{ route('terminales.edit', $terminal) }}" rel="tooltip"
                                                    title="">
                                                    <i class="material-icons">
                                                        edit
                                                    </i>
                                                    <div class="ripple-container">
                                                    </div>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-link"
                                                    data-original-title="" title=""
                                                    onclick="confirm('{{ __("¿Estás seguro de que deseas eliminar a esta Terminal?") }}') ? this.parentElement.submit() : ''">
                                                    <i class="material-icons">close</i>
                                                    <div class="ripple-container"></div>
                                                </button>
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
@endsection

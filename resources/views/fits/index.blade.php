@extends('layouts.app', ['activePage' => 'Fee', 'titlePage' => __('Fee')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">
                            {{ __('Fee') }}
                        </h4>
                        <p class="card-category">
                            {{ __('Aquí puedes administrar todos los Fee de todas las terminales.') }}
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
                                <a class="btn btn-sm btn-primary" href="{{ route('fits.create') }}">
                                    {{ __('Agregar Fee') }}
                                </a>
                            </div>
                        </div>
                        <div class="material-datatables">
                            <table cellspacing="0" class="table table-striped table-no-bordered table-hover" id="datatables" style="width:100%" width="100%">
                                <thead class="text-primary">
                                	<th>
                                        {{ __('Terminal')}}
                                    </th>
                                    <th>
                                        {{ __('Policon')}}
                                    </th>
                                    <th>
                                        {{ __('Impulsa')}}
                                    </th>
                                    <th>
                                        {{ __('Comision')}}
                                    </th>
                                    <th>
                                        {{ __('Regular Fee')}}
                                    </th>
                                    <th>
                                        {{ __('Premium Fee')}}
                                    </th>
                                    <th>
                                        {{ __('Diesel Fee')}}
                                    </th>
                                    <th>
                                        {{ __('Fecha de Alta')}}
                                    </th>
                                    <!--th class="disabled-sorting text-right">
                                        Acciones
                                    </th-->
                                </thead>
                                <tbody>
                                    @foreach($terminals as $terminal)
                                    <tr>
                                        <td>
                                            {{ $terminal->razon_social }}
                                        </td>                                      
                                        <td>
                                            {{ $terminal->fits[(count($terminal->fits)) - 1]->policom }}
                                        </td>
                                        <td>
                                            {{ $terminal->fits[(count($terminal->fits)) - 1]->impulsa }}
                                        </td>
                                        <td>
                                            {{ $terminal->fits[(count($terminal->fits)) - 1]->comision }}
                                        </td>
                                        <td>
                                            {{ $terminal->fits[(count($terminal->fits)) - 1]->regular_fit }}
                                        </td>
                                        <td>
                                            {{ $terminal->fits[(count($terminal->fits)) - 1]->premium_fit }}
                                        </td>
                                        <td>
                                            {{ $terminal->fits[(count($terminal->fits)) - 1]->disel_fit }}
                                        </td>
                                        <td>
                                            {{ $terminal->fits[(count($terminal->fits)) - 1]->created_at }}
                                        </td>
                                        <!--td class="td-actions text-right">
                                            <!--form action="{{ route('fits.destroy', $terminal->fits[0]->id) }}" method="post"-->
                                                <!--@csrf
                                                @method('delete')>
                                                <a class="btn btn-success btn-link" data-original-title="" href="{{ route('fits.edit', $terminal) }}" rel="tooltip" title="">
                                                    <i class="material-icons">
                                                        edit
                                                    </i>
                                                    <div class="ripple-container">
                                                    </div>
                                                </a>
                                                <!--button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("¿Estás seguro de que deseas eliminar a esta Terminal?") }}') ? this.parentElement.submit() : ''">
                                                    <i class="material-icons">close</i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                            </form>
                                        </td-->
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

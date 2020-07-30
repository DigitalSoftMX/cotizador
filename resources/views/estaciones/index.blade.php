@extends('layouts.app', ['activePage' => 'Estaciones', 'titlePage' => __('Gestión de Estaciones')])

@section('content')
  
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 ">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Estaciones') }}</h4>
                <p class="card-category"> {{ __('Aquí puedes administrar todas las estaciones.') }}</p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Agregar Estación') }}</a>
                  </div>
                </div>
                <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                    <thead class="text-primary">
                      <th>{{ __('Nombre')}}</th>
                      <th>{{ __('CRE') }}</th>
                      <th>{{ __('RFC') }}</th>
                      <th>{{ __('Terminal')}}</th>
                      <th>{{ __('Saldo')}}</th>
                      <th>{{ __('Nombre de la sucursal')}}</th>
                      <th>{{ __('Linea de credito')}}</th>
                      <th>{{ __('Credito')}}</th>
                      <th>{{ __('Credito utilizado')}}</th>
                      <th>{{ __('Dias de credito')}}</th>
                      <th>{{ __('Retencion')}}</th>
                      <th>{{ __('Fecha de Alta')}}</th>
                      <th class="disabled-sorting text-right">Actions</th>
                    </thead>
                    <tbody>
                      @foreach($estaciones as $estacion)
                        <tr>
                          <td>{{ $estacion->razon_social }}</td>
                          <td>{{ $estacion->cre }}</td>
                          <td>{{ $estacion->rfc }}</td>
                          <td>{{ $estacion->terminal }}</td>
                          <td>{{ $estacion->saldo }}</td>
                          <td>{{ $estacion->nombre_sucursal }}</td>
                          <td>{{ $estacion->linea_credito }}</td>
                          <td>{{ $estacion->credito }}</td>
                          <td>{{ $estacion->credito_usado }}</td>
                          <td>{{ $estacion->dias_credito }}</td>
                          <td>{{ $estacion->retencion }}</td>
                          <td>{{ $estacion->created_at }}</td>
                          <td class="td-actions text-right">
                            <form action="" method="post">
                              @csrf
                              @method('delete')
                              <a rel="tooltip" class="btn btn-success btn-link" href="" data-original-title="" title="">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                              </a>
                              <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
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

@push('js')
  <script>

   $(document).ready(function() {
      
      $('#datatables').DataTable({
        
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Buscar...",
        }
      });

      var table = $('#datatable').DataTable();

      // Edit record
      table.on('click', '.edit', function() {
        $tr = $(this).closest('tr');
        var data = table.row($tr).data();
        alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
      });

      // Delete a record
      table.on('click', '.remove', function(e) {
        $tr = $(this).closest('tr');
        table.row($tr).remove().draw();
        e.preventDefault();
      });

      //Like record
      table.on('click', '.like', function() {
        alert('You clicked on Like button');
      });
      $( "#datatables_filter").addClass( "text-right" );
      $( "#datatables_paginate").addClass( "text-right" );
    });


    /*$(document).ready(function() {
       $('#table_1').DataTable({
        columnDefs: [
            {
                targets: [ 0, 1, 2 ],
                className: 'mdl-data-table__cell--non-numeric'
            }
        ]
       });
      
    });*/
  </script>
@endpush
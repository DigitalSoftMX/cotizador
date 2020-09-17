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
                            {{ __('Selecciona las unidades de negocio del vendedor.') }}
                        </p>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success" style="display: none;" id="id_actualizado_unidades">

                                </div>
                            </div>

                            <div class="col-lg-4 ml-auto mb-4">
                                @csrf
                                <button type="button" class="btn btn-success btn-block" id="guardar">Guardar cambios</button>
                            </div>
                        </div>

                        <div class="row">

                                @php
                                    $estados = array("Aguascalientes","Baja California Norte", "Baja California Sur", "Campeche", "Coahuila", "Colima",
                                                    "Chiapas", "Chihuahua", "Ciudad de México", "Durango", "Guanajuato", "Guerrero", "Hidalgo", "Jalisco",
                                                    "México", "Michoacán", "Morelos", "Nayarit", "Nuevo León", "Oaxaca", "Puebla", "Querétaro", "Quintana Roo",
                                                    "San Luis Potosí", "Sinaloa", "Sonora", "Tabasco", "Tamaulipas", "Tlaxcala", "Veracruz", "Yucatán", "Zacatecas");
                                @endphp

                                @foreach ( $estados as $estado)
                                    @php $agregada = array_search($estado, $unidades); @endphp

                                    <div class="col-3">
                                        <div class="card mb-1 mt-1 @if($agregada === FALSE)@else bg-warning @endif" id="{{ $estado }}">
                                            <div class="card-body">
                                                <div class="form-check-inline">
                                                    <label class="form-check-label" style="color: #000;">
                                                        <input type="checkbox" class="form-check-input" value="{{ $estado }}"
                                                        @if($agregada === FALSE)
                                                        @else
                                                            checked
                                                        @endif
                                                        >
                                                        {{ $estado }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')

    <script>

        let seleccionados = [];
        @foreach ( $unidades as $unidad )
            seleccionados.push( "{{ $unidad }}" );
        @endforeach

        $("input[type=checkbox]").change(function() {
            let valor = $(this).val();

            //Si el checkbox está seleccionado
            if($(this).is(":checked")) {
                seleccionados.push(valor);
                document.getElementById(valor).classList.add("bg-warning");
            }
            else {
                seleccionados.splice( seleccionados.indexOf(valor), 1 );
                document.getElementById(valor).classList.remove("bg-warning");
            }
        });

        document.getElementById('guardar').addEventListener('click', function(){
            let seleccionados_json = JSON.stringify(seleccionados);
            let id = {{ $id }};

            $.ajax({
                method: "POST",
                url: "{{ route('ventas.saveunidadnegocio') }}",
                data: {
                    _token : $('input[name=_token]').val(),
                    unidades_negocio: seleccionados_json,
                    id_vendedor: id
                }
            })
            .done(function( status ) {
                document.getElementById('id_actualizado_unidades').style.display = "block";
                document.getElementById('id_actualizado_unidades').innerHTML = status;
                setTimeout(function(){
                    document.getElementById('id_actualizado_unidades').style.display = "none";
                }, 3000);

            });

        });

    </script>

@endpush

@endsection

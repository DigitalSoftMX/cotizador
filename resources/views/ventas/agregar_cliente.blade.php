
@php
    $estados = array("Aguascalientes","Baja California Norte", "Baja California Sur", "Campeche", "Coahuila", "Colima",
            "Chiapas", "Chihuahua", "Ciudad de México", "Durango", "Guanajuato", "Guerrero", "Hidalgo", "Jalisco",
            "México", "Michoacán", "Morelos", "Nayarit", "Nuevo León", "Oaxaca", "Puebla", "Querétaro", "Quintana Roo",
            "San Luis Potosí", "Sinaloa", "Sonora", "Tabasco", "Tamaulipas", "Tlaxcala", "Veracruz", "Yucatán", "Zacatecas");
@endphp

@extends('layouts.app', ['activePage' => 'Añadir cliente', 'titlePage' => __('Añadir cliente')])
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
                            {{ __('Ingresa la información del cliente.') }}
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 mb-4">

                                @if (session('status'))
                                    <div class="alert {{ session('status_alert') }}" role="alert" id="status-alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row justify-content-center p-4">

                            <div class="col-lg-6 col-12">

                            <form action="{{ route('ventas.guardarcliente') }}" method="POST" id="form_cliente">

                                @csrf

                                <div class="form-group">
                                    <label for="nombre">Nombre de la empresa o razón social:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                </div>

                                <div class="form-group">
                                    <label for="rfc">RFC:</label>
                                    <input type="text" class="form-control" id="rfc" name="rfc">
                                </div>

                                <div class="form-group">
                                    <label for="direccion">Dirección:</label>
                                    <input type="text" class="form-control" id="direccion" name="direccion" required>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="estado">Estado:</label>
                                    <select class="form-control" id="estado" name="estado" style="top: 15px;" required>
                                        <option disabled="disabled" selected>Selecciona el estado</option>
                                        @foreach ($estados as $estado )
                                            <option value="{{ $estado }}">{{ $estado }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <p class="bg-warning text-center" style="display: none;" id="hayvendedores">
                                    No hay vendedores en esa zona de negocio
                                </p>

                                <div class="form-group mt-5">
                                    <label for="telefono">Telefono:</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Correo electronico:</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="tipo">Tipo:</label>
                                    <select class="form-control" id="tipo" name="tipo" style="top: 15px;">
                                        <option value="Estación">Estación</option>
                                        <option value="Comercializador">Comercializador</option>
                                        <option value="Auto abasto">Auto abasto</option>
                                    </select>
                                </div>

                                <div class="mb-4" id="estacion_si">
                                    <p>¿Es bandera blanca? </p>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="si" name="bandera_blanca" checked>Si
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="no" name="bandera_blanca">No
                                        </label>
                                    </div>

                                    <div class="form-group mt-4" id="div_estacion">
                                        <label for="n_estacion">Número de estación:</label>
                                        <input type="text" class="form-control" id="n_estacion" name="numero_estacion">
                                    </div>
                                </div>

                                <div class="form-group mb-5">
                                    <label for="vendedor">Vendedor:</label>
                                    <select class="form-control" id="vendedor" name="vendedor" style="top: 15px;" required>

                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">Agregar cliente</button>


                            </form>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('js')

    <script>

        setTimeout(function(){
            $('#status-alert').css('display','none');
        }, 3000);

        $('#tipo').change(function(){
            let valor = $(this).val();
            if(valor === "Estación"){
                document.getElementById('estacion_si').style.display = "block";
            }else{
                document.getElementById('estacion_si').style.display = "none";
            }
        })

        document.getElementById('form_cliente').addEventListener('submit', (e)=>{
            e.preventDefault();

            let generar_submit = false;

            if( $('#tipo').val() === "Estación" ){
                document.getElementById('div_estacion').classList.add('is-focused');
                generar_submit = true;
            }

            if(!generar_submit){
                $("#form_cliente").submit();
            }else{
                if(generar_submit && $('#n_estacion').val() != "" ){
                    $("#form_cliente").submit();
                }
            }

        });


        $('#estado').change(function(){

            let estado = $(this).val();

            $.ajax({
                method: "GET",
                url: "{{ route('ventas.obtenervendedores') }}",
                data: {
                    estado: estado
                }
            })
            .done(function( data ) {

                document.getElementById('vendedor').innerHTML = "";

                if(data != ""){
                    document.getElementById('vendedor').innerHTML += '<option disabled="disabled" selected>Selecciona al vendedor</option>';
                    document.getElementById('vendedor').innerHTML += data;
                }else{

                    $('#hayvendedores').css('display','block');

                    setTimeout(function(){
                        $('#hayvendedores').css('display','none');
                    }, 3000);
                }

            });
        })

    </script>

@endpush

@endsection

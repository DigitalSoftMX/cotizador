@extends('layouts.app', ['activePage' => 'Cotizador', 'titlePage' => __('Cotizador de Gasolina')])


@section('content')
<div class="content">
    <div class="container-fluid mt-5">
        <form action="{{ route('cotizador.store') }}" autocomplete="off" class="form-horizontal" method="post">
            <div class="row">
                <div class="card card-nav-tabs">
                    <div class="card-header card-header-primary">
                        Cotizador
                        <input id="_token" name="_token" type="hidden" value="{{ csrf_token() }}">
                        </input>
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
                            <div class="form-group col-md-3">
                                <label for="input-razon_social">
                                    Terminal
                                </label>
                                <select class="custom-select custom-select-sm" id="cotizador" name="terminal_id">
                                    @foreach($terminals as $terminal)
                                        @if($terminal->id == 3)
                                            <option value=" {{$terminal->id}}" selected>
                                                {{$terminal->razon_social}}
                                            </option>
                                        @else
                                            <option value=" {{$terminal->id}}">
                                                {{$terminal->razon_social}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col col-md-3 mt-2">
                                <label class="label-control">
                                    Fecha
                                </label>
                                <input class="form-control datetimepicker" id="calendar_first" name="created_at" type="text" value="{{ $precios_puebla->created_at }}"/>
                            </div>
                        </div>
                        @if($rol_user != "Invitado")
                            <h4 class="info-title mt-5">
                                Unbranded
                            </h4>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="regular_sin">
                                        Premium
                                    </label>
                                    <input class="form-control" name="precio_regular" id="regular_sin" placeholder="0"  type="number" min="0.00" step="0.01" value="">
                                    </input>
                                    <input class="form-control" id="regular" placeholder="0" type="hidden" value="{{$precios_puebla->precio_regular}}">
                                    </input>
                                    <!--input class="form-control" id="precio_regular_descuento" placeholder="0" type="hidden" name="precio_regular_descuento" value="0"-->
                                    </input>
                                </div>
                                <div class="form-group col">
                                    <label for="premium_sin">
                                        Supreme 93
                                    </label>
                                    <input class="form-control" name="precio_premium" id="premium_sin" placeholder="0"  type="number" min="0.00" step="0.01" value="">
                                    </input>
                                    <input class="form-control" id="premium" placeholder="0" type="hidden" value="{{$precios_puebla->precio_premium}}">
                                    </input>
                                    <!--input class="form-control" id="precio_premium_descuento" placeholder="0" type="hidden" name="precio_premium_descuento" value="0">
                                    </input-->
                                </div>
                                <div class="form-group col">
                                    <label for="disel_sin">
                                        Diesel
                                    </label>
                                    <input class="form-control" name="precio_disel" id="disel_sin" placeholder="0" type="number" min="0.00" step="0.01" value="">
                                    </input>
                                    <input class="form-control" id="diesel" placeholder="0" type="hidden" value="{{$precios_puebla->precio_disel}}">
                                    </input>
                                    <!--input class="form-control" id="precio_disel_descuento" placeholder="0" type="hidden" name="precio_disel_descuento" value="0">
                                    </input-->
                                </div>
                            </div>
                            <h4 class="info-title mt-5">
                                Branded
                            </h4>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="regular_con">
                                        Premium
                                    </label>
                                    <input class="form-control" disabled="" id="regular_con" placeholder="0" type="text">
                                    </input>
                                </div>
                                <div class="form-group col">
                                    <label for="premium_con">
                                        Supreme 93
                                    </label>
                                    <input class="form-control" disabled="" id="premium_con" min="0" pattern="^[0-9]+" placeholder="0" type="text">
                                    </input>
                                </div>
                                <div class="form-group col">
                                    <label for="disel_con">
                                        Diesel
                                    </label>
                                    <input class="form-control" disabled="" id="disel_con" placeholder="0" type="text">
                                    </input>
                                </div>
                            </div>
                        @endif
                         <!-- Mapa -->
                        <div class="row mt-4 mb-4">
                            <div class="col-lg-8">
                                @if($rol_user == "Invitado")
                                <p>{{ __('Mueve el Pin A para obtener mejor la posición de tu terminal') }}</p>
                                @endif
                                <div id="map" style="margin-top: 0px; max-height: 310px;"></div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group col-sm-8 pl-0" style="display: {{ $display }}">
                                    <label for="desgaste-unidad">{{ __('Desgaste por km de unidad') }}</label>
                                    <input class="form-control" type="number" id="desgaste-unidad" value="{{ $costos_envio[0]->desgaste_unidad }}" min="0" step="any" readonly>
                                </div>
                                <div class="form-group col-sm-8 pl-0" style="display: {{ $display }}">
                                    <label for="costo-operador">{{ __('Costo del operador por km') }}</label>
                                    <input class="form-control" type="number" id="costo-operador" value="{{ $costos_envio[0]->costo_operador }}" min="0" step="any" readonly>
                                </div>
                                <div class="form-group col-sm-8 pl-0" style="display: {{ $display }}">
                                    <label for="consumo-diesel">{{ __('Consumo del diésel por km') }}</label>
                                    <input class="form-control" type="number" id="consumo-diesel" value="{{ $costos_envio[0]->consumo_diesel }}" min="0" step="any" readonly>
                                </div>
                                <div class="form-group col-sm-8 pl-0" style="display: {{ $display }}">
                                    <label for="seguro-unidad">{{ __('Seguro de la unidad por km') }}</label>
                                    <input class="form-control" type="number" id="seguro-unidad" value="{{ $costos_envio[0]->seguro_unidad }}" min="0" step="any" readonly>
                                </div>
                                <div class="form-group col-sm-8 pl-0">
                                    <label for="costo-envio">{{ __('Costo de envio ($) aproximado*') }}</label>
                                    <input class="form-control" type="text" id="costo-envio" name="costo_envio" readonly required step="any">
                                </div>
                                <div class="form-group col-sm-8 pl-0">
                                    <label for="distancia-recorrer">{{ __('Distancia total (km)') }}</label>
                                    <input class="form-control" type="number" id="distancia-recorrer" readonly step="any">
                                </div>
                            </div>
                        </div>


                        <a class="btn btn-primary" href="#0" id="Calcular">
                            Calcular
                        </a>
                        @if($rol_user != "Invitado")
                            <input class="btn btn-primary" name="save" type="submit" value="Guardar">

                            <a class="btn btn-default" href="#0" id="editar">
                                Editar
                            </a>
                        @endif

                        <!--a class="btn btn-danger" href="#0" id="eliminar">
                            Eliminar
                        </a-->
                        @if($rol_user != "Invitado")
                            <ul class="nav nav-pills nav-pills-primary mt-5 ocultar" role="tablist" id="nav_adictivo">
                                <li class="nav-item">
                                    <a aria-expanded="true" class="nav-link active" data-toggle="tab" href="#link1" role="tablist">
                                        Unbranded
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a aria-expanded="false" class="nav-link" data-toggle="tab" href="#link2" role="tablist">
                                        Branded
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content tab-space ocultar" id="tabla_des">
                                <div aria-expanded="true" class="tab-pane active mt-5" id="link1">
                                    <table class="table table-responsive table-sm" id="tabla_sin_add">
                                        <thead class=" text-center">

                                            <tr>
                                                <th scope="col">
                                                    Nivel
                                                </th>
                                                <th scope="col" colspan="2" style="background: linear-gradient(60deg, #43a047, #43a047); color: white;">
                                                    <i class="material-icons">get_app publish</i>
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #43a047, #43a047); color: white;">
                                                    Resultado
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #43a047, #43a047); color: white;">
                                                    <img src="{{ asset('material') }}/img/ValeroIcon.png">
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #43a047, #43a047); color: white;">
                                                    <img src="{{ asset('material') }}/img/pemexIcon.png">
                                                </th>
                                                <th scope="col" colspan="2" style="background: linear-gradient(60deg, #e53935, #e53935); color: white;">
                                                    <i class="material-icons">get_app publish</i>
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #e53935, #e53935); color: white;">
                                                    Resultado
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #e53935, #e53935); color: white;">
                                                    <img src="{{ asset('material') }}/img/ValeroIcon.png">
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #e53935, #e53935); color: white;">
                                                    <img src="{{ asset('material') }}/img/pemexIcon.png">
                                                </th>
                                                <th scope="col" colspan="2" style="background: linear-gradient(60deg, #212121, #212121); color: white;">
                                                    <i class="material-icons">get_app publish</i>
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #212121, #212121); color: white;">
                                                    Resultado
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #212121, #212121); color: white;">
                                                    <img src="{{ asset('material') }}/img/ValeroIcon.png">
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #212121, #212121); color: white;">
                                                    <img src="{{ asset('material') }}/img/pemexIcon.png">
                                                </th>
                                            </tr>

                                        </thead>
                                        <tbody id="tabla_sin_add_tbody" class="table-bordered">
                                        </tbody>
                                    </table>
                                </div>
                                <div aria-expanded="false" class="tab-pane mt-5" id="link2">
                                    <div aria-expanded="true" class="tab-pane active mt-5" id="link1">
                                        <table class="table table-responsive table-sm" id="tabla_con_add">
                                            <thead class="text-center">
                                                <tr>
                                                <th scope="col">
                                                    Nivel
                                                </th>
                                                <th scope="col" colspan="2" style="background: linear-gradient(60deg, #43a047, #43a047); color: white;">
                                                    <i class="material-icons">get_app publish</i>
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #43a047, #43a047); color: white;">
                                                    Resultado
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #43a047, #43a047); color: white;">
                                                    <img src="{{ asset('material') }}/img/ValeroIcon.png">
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #43a047, #43a047); color: white;">
                                                    <img src="{{ asset('material') }}/img/pemexIcon.png">
                                                </th>
                                                <th scope="col" colspan="2" style="background: linear-gradient(60deg, #e53935, #e53935); color: white;">
                                                    <i class="material-icons">get_app publish</i>
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #e53935, #e53935); color: white;">
                                                    Resultado
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #e53935, #e53935); color: white;">
                                                    <img src="{{ asset('material') }}/img/ValeroIcon.png">
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #e53935, #e53935); color: white;">
                                                    <img src="{{ asset('material') }}/img/pemexIcon.png">
                                                </th>
                                                <th scope="col" colspan="2" style="background: linear-gradient(60deg, #212121, #212121); color: white;">
                                                    <i class="material-icons">get_app publish</i>
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #212121, #212121); color: white;">
                                                    Resultado
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #212121, #212121); color: white;">
                                                    <img src="{{ asset('material') }}/img/ValeroIcon.png">
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #212121, #212121); color: white;">
                                                    <img src="{{ asset('material') }}/img/pemexIcon.png">
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody id="tabla_con_add_tbody">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">No Hay precio registrado.</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                              </div>
                            </div>
                          </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('js')

{{-- <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script> --}}
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB7G11SOcGJONIPS4WS5HogsqgkSbV66vM&callback=initMap&libraries=&v=weekly"
    defer
></script>
<script>
    "use strict";
    /* Aqui va lo mio*/
    // initMap(19.42847,-99.12766);

    function initMap() {

        let terminal = document.getElementById("cotizador").options[document.getElementById("cotizador").selectedIndex].text;

        let latitud_estacion = 19.42847;
        let longitud_estacion = -99.12766;
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 10,
            center: {
            lat: 19.03793,
            lng: -98.20346
            } // Mexico.
        });

        const directionsService = new google.maps.DirectionsService();
        const directionsRenderer = new google.maps.DirectionsRenderer({
            draggable: true,
            map
        });

        directionsRenderer.addListener("directions_changed", () => {
            computeTotalDistance(directionsRenderer.getDirections());
        });

        displayRoute(
            //"Puebla,MX",
            new google.maps.LatLng(19.207747, -98.360400),
            //new google.maps.LatLng(latitud_estacion, longitud_estacion),
            terminal+", MX",
            directionsService,
            directionsRenderer
        );
    }

    function displayRoute(origin, destination, service, display) {
        service.route(
            {
                origin: origin,
                destination: destination,
                travelMode: google.maps.TravelMode.DRIVING,
                avoidTolls: true
            },
            (result, status) => {
                if (status === "OK") {
                    display.setDirections(result);
                } else {
                    alert("No se pudieron mostrar las indicaciones debido a: " + status);
                }
            }
        );
    }

    function computeTotalDistance(result) {
        let total = 0;
        const myroute = result.routes[0];

        for (let i = 0; i < myroute.legs.length; i++) {
            total += myroute.legs[i].distance.value;
        }

        total = total / 1000;
        document.getElementById("distancia-recorrer").value = total;
        // $("#valor").attr("readonly","readonly");
        // $("#desgaste-unidad").removeAttr("readonly");
        // $("#costo-operador").removeAttr("readonly");
        // $("#consumo-diesel").removeAttr("readonly");
        // $("#seguro-unidad").removeAttr("readonly");
    }

    function cotizar_viaje()
    {
        let total_envio = 0;
        let distancia_recorrer = parseFloat(document.getElementById("distancia-recorrer").value);
        let desgaste_unidad = parseFloat(document.getElementById("desgaste-unidad").value);
        let costo_operador = parseFloat(document.getElementById("costo-operador").value);
        let consumo_diesel = parseFloat(document.getElementById("consumo-diesel").value);
        let seguro_unidad = parseFloat(document.getElementById("seguro-unidad").value);

        total_envio = distancia_recorrer * ( desgaste_unidad + costo_operador + consumo_diesel + seguro_unidad );

        document.getElementById("costo-envio").value = total_envio;
    }

</script>


<script>


    function showNotification(from, align, icono, tipo, mensaje){
        $.notify({
            icon: icono,
            message: mensaje

        },{
            type: tipo,
            timer: 3000,
            placement: {
                from: from,
                align: align
            }
        });
    }

    $("#Calcular").click(function(){
        $("#nav_adictivo").removeClass("ocultar");
        $("#tabla_des").removeClass("ocultar");
    });

    var policon = {{ $fits->policom }};
    var impulsa = {{ $fits->impulsa }};
    var comision = {{ $fits->comision }};
    var regular_fit = {{ $fits->regular_fit }};
    var premium_fit = {{ $fits->premium_fit }};
    var disel_fit = {{ $fits->disel_fit }};

    $( document ).ready(function() {

        try{
            init_calendar('calendar_first', '01-01-2020', '12-12-2020');
        }catch(e){

        }

        $( "#calendar_first" ).blur(function() {
            idTerminal = $('#cotizador').val();
            fecha = $('#calendar_first').val();
            $.ajax({
                url: 'calendario_selec',
                type: 'POST',
                dataType: 'json',
                data: {
                    terminal : idTerminal,
                    fecha : fecha
                },
                headers: { 'X-CSRF-TOKEN': $("#_token").val() },
                success: function(response){
                    var datos =  response;
                    if(datos.precios[0] != undefined){
                        //console.log(datos.precios[0]);
                        $("#regular_sin").val(datos.precios[0].precio_regular);
                        $("#premium_sin").val(datos.precios[0].precio_premium);
                        $("#disel_sin").val(datos.precios[0].precio_disel);

                        $("#regular_con").val(dividir(multiplicar($("#regular_sin").val())+multiplicar(0.14)));
                        $("#premium_con").val(dividir(multiplicar($("#premium_sin").val())+multiplicar(0.14)));
                        $("#disel_con").val(dividir(multiplicar($("#disel_sin").val())+multiplicar(0.14)));
                    }else{

                        //$('#exampleModal').modal('toggle');
                        showNotification('top','right', 'warning', 'danger', 'No hay precio registrado para ese día.');

                        $("#regular_sin").val(0);
                        $("#premium_sin").val(0);
                        $("#disel_sin").val(0);

                        $("#regular_con").val(0);
                        $("#premium_con").val(0);
                        $("#disel_con").val(0);

                    }
                },
                error: function(xhr){
                    alert("An error occured: " + xhr.status + " " + xhr.statusText);
                }
            });
        });

        $('#cotizador').change(function(){

            /* Para cargar el mapa */

            initMap();

            idTerminal = $('#cotizador').val();
            $.ajax({
                url: 'cotizador_sele',
                type: 'POST',
                dataType: 'json',
                data: {
                    terminal : idTerminal
                },
                headers: { 'X-CSRF-TOKEN': $("#_token").val() },
                success: function(response){
                    var datos =  response;
                    //console.log(datos.precios.precio_regular);
                    $("#regular").val(datos.precios.precio_regular);
                    $("#premium").val(datos.precios.precio_premium);
                    $("#diesel").val(datos.precios.precio_disel);
                    policon = datos.fits.policom;
                    impulsa = datos.fits.impulsa;
                    comision = datos.fits.cosion;
                    regular_fit = datos.fits.regular_fit;
                    premium_fit = datos.fits.premium_fit;
                    disel_fit = datos.fits.disel_fit;
                }
            });
        });

        $("#editar").click(function(){
            $.ajax({
                url: 'calendario_edit',
                type: 'POST',
                dataType: 'json',
                data: {
                    idTerminal : $('#cotizador').val(),
                    fecha : $('#calendar_first').val(),
                    precio_r:$('#regular_sin').val(),
                    precio_p:$('#premium_sin').val(),
                    precio_d:$('#disel_sin').val()
                },
                headers: { 'X-CSRF-TOKEN': $("#_token").val() },
                success: function(res){
                    $("#regular_sin").val(0);
                    $("#premium_sin").val(0);
                    $("#disel_sin").val(0);

                    $("#regular_con").val(0);
                    $("#premium_con").val(0);
                    $("#disel_con").val(0);
                    showNotification('top','right', 'warning', ''+res.color+'', ''+res.mensaje+'');
                },
                error: function(xhr){
                    alert("An error occured: " + xhr.status + " " + xhr.statusText);
                }
            });
        });

        var suma_fit = dividir(multiplicar(policon)+multiplicar(impulsa)+multiplicar(comision));
        var suma_fit_con_adi = dividir(multiplicar(policon)+multiplicar(impulsa)+multiplicar(comision)+ multiplicar(0.14));


        //suma_fits('premium_sin','premium_con',policon,impulsa,comision);
        //suma_fits('regular_sin','regular_con',policon,impulsa,comision);
        //suma_fits('disel_sin','disel_con',policon,impulsa,comision);

        suma_adictivo('premium_sin','premium_con', 0.14);
        suma_adictivo('regular_sin','regular_con', 0.14);
        suma_adictivo('disel_sin','disel_con', 0.14);


        $( "#Calcular" ).click(function() {
            /*$('#precio_regular_descuento').val(dividir(multiplicar($("#regular_sin").val()) + multiplicar(suma_fit) - multiplicar(regular_fit)));
            $('#precio_premium_descuento').val(dividir(multiplicar($("#premium_sin").val()) + multiplicar(suma_fit) - multiplicar(premium_fit)));
            $('#precio_disel_descuento').val(dividir(multiplicar($("#disel_sin").val()) + multiplicar(suma_fit) - multiplicar(disel_fit)));*/

            $("#tabla_sin_add_tbody tr").remove();
            $("#tabla_con_add_tbody tr").remove();

            /* Cotizar Viaje */
            cotizar_viaje();

            @for($i=0; $i<9; $i++) {
                suma_descuento(
                    'tabla_sin_add',
                    'regular_sin',
                    'premium_sin',
                    'disel_sin',
                    {{ $regular[$i][0] }},
                    {{ $regular[$i][1] }},
                    {{ $regular[$i][2] }},
                    {{ $premium[$i][0] }},
                    {{ $premium[$i][1] }},
                    {{ $premium[$i][2] }},
                    {{ $disel[$i][0] }},
                    {{ $disel[$i][1] }},
                    {{ $disel[$i][2] }},
                    suma_fit,
                    {{ $i+1 }},
                    regular_fit,
                    premium_fit,
                    disel_fit,
                    {{ $regular[8][2] }},
                    {{ $premium[8][2] }},
                    {{ $disel[8][2] }},
                    $("#regular").val(),
                    $("#premium").val(),
                    $("#diesel").val(),
                    {{ $regular_pemex[$i][2] }},
                    {{ $premium_pemex[$i][2] }},
                    {{ $diesel_pemex[$i][2] }},
                );

                suma_descuento(
                    'tabla_con_add',
                    'regular_con',
                    'premium_con',
                    'disel_con',
                    {{ $regular[$i][0] }},
                    {{ $regular[$i][1] }},
                    {{ $regular[$i][2] }},
                    {{ $premium[$i][0] }},
                    {{ $premium[$i][1] }},
                    {{ $premium[$i][2] }},
                    {{ $disel[$i][0] }},
                    {{ $disel[$i][1] }},
                    {{ $disel[$i][2] }},
                    suma_fit,
                    {{ $i+1 }},
                    regular_fit,
                    premium_fit,
                    disel_fit,
                    {{ $regular[8][2] }},
                    {{ $premium[8][2] }},
                    {{ $disel[8][2] }},
                    $("#regular").val(),
                    $("#premium").val(),
                    $("#diesel").val(),
                    {{ $regular_pemex[$i][2] }},
                    {{ $premium_pemex[$i][2] }},
                    {{ $diesel_pemex[$i][2] }},
                );
            }
            @endfor
        });
      });
</script>
@endpush

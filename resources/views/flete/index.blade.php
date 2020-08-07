@extends('layouts.app', ['activePage' => 'flete', 'titlePage' => __('Generar costo aproximado de flete')])
@section('content')
<div class="content">
    <div class="container-fluid mt-5">

        <div class="row">
            <div class="card card-nav-tabs">
                <div class="card-header card-header-primary">
                    Flete
                </div>
                <div class="card-body">
                        <!-- Mapa -->
                    <div class="row">

                        <div class="col-12 mb-4 mt-4">

                                <div class="form-group col-md-8">
                                    <label class="pl-2" for="direccion">{{ __('Ingresa la dirección donde deberá entregarse') }}</label>
                                    <input class="form-control" type="text" id="direccion" onFocus="geolocate()" placeholder="" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="input-razon_social">
                                        Cantidad
                                    </label>
                                    <select class="custom-select custom-select-sm" id="litros">
                                        <option value="5000" selected>
                                            {{ __('5,000 Lts') }}
                                        </option>
                                        <option value="21000">
                                            {{ __('21,000 Lts') }}
                                        </option>
                                        <option value="31000">
                                            {{ __('31,000 Lts') }}
                                        </option>
                                        <option value="42000">
                                            {{ __('42,000 Lts') }}
                                        </option>
                                        <option value="62000">
                                            {{ __('62,000 Lts') }}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="buttom" class="btn btn-block btn-primary pl-2" id="calcular">Calcular</button>
                                </div>

                        </div>

                        <div class="col-lg-7">
                            <div class="text-center" id="prev-map" style="display: none;">
                                <h4>Calculando distancia...</h4>
                            </div>
                            <div id="map" style="margin-top: 0px; max-height: 310px;"></div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group col-sm-8 pl-0">
                                <label for="costo-envio">{{ __('Costo por envio por litro ($) aproximado*') }}</label>
                                <input class="form-control" type="text" id="costo-envio" readonly required>
                            </div>
                            <div class="form-group col-sm-8 pl-0">
                                <label for="distancia-recorrer">{{ __('Distancia total (km)') }}</label>
                                <input class="form-control" type="text" id="distancia-recorrer" readonly>
                            </div>
                            <div class="form-group col-sm-8 pl-0">
                                <label for="monto-total">{{ __('Monto total de traslado ($)') }}</label>
                                <input class="form-control" type="text" id="monto-total" readonly>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@push('js')

<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAcnudyvCDSdVD9dAMBTUpZWIE-2t7h0A&libraries=places&callback=initAutocomplete&v=weekly"
    defer
></script>
<script>
    "use strict";
    /* Aqui va lo mio*/
    // initMap(19.42847,-99.12766);

    var placeSearch, autocomplete, total_km;


    function initAutocomplete() {
        // Create the autocomplete object, restricting the search predictions to
        // geographical location types.
        autocomplete = new google.maps.places.Autocomplete(
            document.getElementById('direccion'), {types: ['geocode']});

        // Avoid paying for data that you don't need by restricting the set of
        // place fields that are returned to just the address components.
        autocomplete.setFields(['address_component','geometry']);

        // When the user selects an address from the drop-down, populate the
        // address fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        // Get the place details from the autocomplete object.
        // var place = autocomplete.getPlace();
    }

    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle(
                    {center: geolocation, radius: position.coords.accuracy});
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }

    document.getElementById('calcular').addEventListener("click", (e)=>{
        //e.preventDefault();
        document.getElementById('prev-map').style.display = "block";
        document.getElementById('map').style.display = "none";
        initMap();
    });

    function initMap() {

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
            //new google.maps.LatLng(19.42847,-99.12766),
            autocomplete.getPlace().geometry.location,
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

        total = myroute.legs[0].distance.text;
        total_km = myroute.legs[0].distance.value / 1000;

        document.getElementById("distancia-recorrer").value = total;
        // $("#valor").attr("readonly","readonly");
        // $("#desgaste-unidad").removeAttr("readonly");
        // $("#costo-operador").removeAttr("readonly");
        // $("#consumo-diesel").removeAttr("readonly");
        // $("#seguro-unidad").removeAttr("readonly");
        document.getElementById('prev-map').style.display = "none";
        document.getElementById('map').style.display = "block";
        cotizar_viaje();
    }

    function cotizar_viaje()
    {
        let total_envio = 0;
        let distancia_recorrer = parseFloat(total_km);
        let litros = document.getElementById("litros").value;
        // let precio_km = 17.09;

        // [ km-max, precio ] *El precio lo calculo con la formula, sin embargo deje los costos de la tabla que se me envio
        //                      por si se necesitan despues
        let niveles = [
            [25.99, 0.17],
            [50.99, 0.19],
            [75.99, 0.21],
            [100.99, 0.23],
            [125.99, 0.25],
            [150.99, 0.26],
            [175.99, 0.31],
            [200.99, 0.33],
            [225.99, 0.36],
            [250.99, 0.38],
            [275.99, 0.39],
            [300.99, 0.42],
            [325.99, 0.45],
            [350.99, 0.47],
            [375.99, 0.50],
            [400.99, 0.52],
            [425.99, 0.55],
            [450.99, 0.57],
            [475.99, 0.60],
            [500.99, 0.62],
            [525.99, 0.64],
            [550.99, 0.66],
            [575.99, 0.69],
            [600.99, 0.71],
            [625.99, 0.74],
            [650.99, 0.76],
            [675.99, 0.78],
            [700.99, 0.81],
            [725.99, 0.84],
            [750.99, 0.86],
            [775.99, 0.88],
            [800.99, 0.89],
            [825.99, 0.92],
            [850.99, 0.94],
            [875.99, 1.00],
            [900.99, 0.99],
            [925.99, 1.02],
            [950.99, 1.04],
            [975.99, 1.07],
            [1000.99, 1.08],
            [1200.99, 1.11],
            [1400.99, 1.13],
            [1600.99, 1.16],
            [1800.99, 1.18],
            [2000, 1.21]
        ];

        for(let i=0; i < niveles.length; i++){

            if( distancia_recorrer < niveles[i][0])
            {
                // total_envio = precio_km * niveles[i][0] / 6200;
                total_envio = niveles[i][1];
                break;
            }

        }

        document.getElementById("costo-envio").value = total_envio.toFixed(3);
        document.getElementById("monto-total").value = total_envio.toFixed(3) * litros;
    }



</script>
@endpush

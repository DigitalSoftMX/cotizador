@extends('layouts.app', ['activePage' => 'Captura de precios potesta', 'titlePage' => __('Captura de Precios Potesta')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">
                            {{ __('Competencia') }}
                        </h4>
                        <p class="card-category">
                            {{ __('Aquí puedes administrar a la competencia.') }}
                        </p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('potesta.store') }}" autocomplete="off" class="form-horizontal" method="post">
                            @csrf
                    		@method('post')
                            <div class="form-row mt-3">
                                <div class="form-group col-md-3">
                                    <label for="input-razon_social">
                                        Terminal
                                    </label>
                                    <select class="custom-select custom-select-sm" id="cotizador" name="potesta_id">
                                        @foreach($competicions as $competicion)
                                        <option value="{{$competicion->id}}">
                                            {{$competicion->nombre}} {{$competicion->terminals->razon_social}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mt-2 ml-2">
                                    <label class="label-control">
                                        Fecha
                                    </label>
                                    <input class="form-control datetimepicker" id="calendar_first" name="created_at" type="text" value=""/></input>
                                </div>
                            </div>
                            <div class="form-row mt-3">
                                <div class="form-group col">
                                    <label for="regular_sin">
                                        Regular
                                    </label>
                                    <input class="form-control" id="regular_sin" name="precio_regular" placeholder="0" type="text" value="">
                                    </input>
                                </div>
                                <div class="form-group col">
                                    <label for="premium_sin">
                                        Premium
                                    </label>
                                    <input class="form-control" id="premium_sin" min="0" name="precio_premium" placeholder="0" type="text" value="">
                                    </input>
                                </div>
                                <div class="form-group col">
                                    <label for="disel_sin">
                                        Diesel
                                    </label>
                                    <input class="form-control" id="disel_sin" name="precio_disel" placeholder="0" type="text" value="">
                                    </input>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button class="btn btn-primary" type="submit">
                                    {{ __('Guardar') }}
                                </button>
                                <a class="btn btn-default" href="#0" id="editar">
                                    Editar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
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

    $( document ).ready(function() {
        init_calendar('calendar_first', '01-01-2020', '12-12-2020');


        $( "#calendar_first" ).blur(function() {
            
            id = $('#cotizador').val();
            fecha = $('#calendar_first').val();

            $.ajax({
                url: 'potesta_selec',
                type: 'POST',
                dataType: 'json',
                data: {
                  '_token': $('input[name=_token]').val(),
                  'id' : $('#cotizador').val(),
                  'fecha': $('#calendar_first').val(),
                },
                headers:{ 
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                },
                success: function(response){
                    var datos =  response;
                    if(datos.precios[0] != undefined){

                        $("#regular_sin").val(datos.precios[0].precio_regular);
                        $("#premium_sin").val(datos.precios[0].precio_premium);
                        $("#disel_sin").val(datos.precios[0].precio_disel);  

                    }else{

                        showNotification('top','right', 'warning', 'danger', 'No hay precio registrado para ese día.');

                        $("#regular_sin").val(0);
                        $("#premium_sin").val(0);
                        $("#disel_sin").val(0);    

                    }
                    
                },
                error: function(xhr){
                     alert("An error occured: " + xhr.status + " " + xhr.statusText);
                }
            });
        });

        $("#editar").click(function(){ 
            $.ajax({
                url: 'calendario_edit_potesta',
                type: 'POST',
                dataType: 'json',
                data: {
                    idTerminal : $('#cotizador').val(),
                    fecha : $('#calendar_first').val(),
                    precio_r:$('#regular_sin').val(),
                    precio_p:$('#premium_sin').val(),
                    precio_d:$('#disel_sin').val()
                },
                headers:{ 
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                },
                success: function(res){
                    $("#regular_sin").val(0);
                    $("#premium_sin").val(0);
                    $("#disel_sin").val(0);

                    showNotification('top','right', 'warning', ''+res.color+'', ''+res.mensaje+'');
                },
                error: function(xhr){
                     alert("An error occured: " + xhr.status + " " + xhr.statusText);
                }
            });
        });
    });

</script>
@endpush

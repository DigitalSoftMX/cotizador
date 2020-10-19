    const prospectos = document.getElementById('prospectos');
    const clientes = document.getElementById('clientes');
    const vendedores = document.getElementById('vendedores');

    function change(element){

        switch(element.value)
        {
            case 'prospectos':
                prospectos.style.display = "block";
                clientes.style.display = "none";
                vendedores.style.display = "none";
                break;
            case 'clientes':
                prospectos.style.display = "none";
                clientes.style.display = "block";
                vendedores.style.display = "none";
                break;
            case 'vendedores':
                prospectos.style.display = "none";
                clientes.style.display = "none";
                vendedores.style.display = "block";
                break;
        }
    }

    function loadTable(name)
    {
        $('#'+name).DataTable( {

            "language": {
                "lengthMenu": "Mostrar _MENU_ elementos por página",
                "zeroRecords": "No hay ninguna coincidencia",
                "info": "Página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay datos que mostrar",
                "infoFiltered": "",
                "search": '<i class="material-icons">search</i>',
                "paginate": {
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
            }
        } );
    }

    $(document).ready(function() {

        $('.dropify').dropify({
            messages: {
                'default': 'Arrastra tu archivo aquí <br> o <br> <button class="btn btn-primary text-with">Da click aquí</button>',
                'replace': 'Arrastra tu archivo aquí <br> o <br> <button class="btn btn-primary text-with">Da click aquí</button>',
                'remove':  'Remover',
                'error':   'Ooops, ocurrio un error.'
            },
            error: {
            }
        });

        setTimeout(function(){
            $('#status-alert').hide();
        }, 3000);

    });

    function asignar_vendedor_prospecto(prospecto_id, select)
    {
        let vendedor_id = select.value;
        $('#vendedor_id').val(vendedor_id);
        $('#cliente_id').val(prospecto_id);

        if (confirm('¿Está seguro que quiere asignarle este vendedor?')){
            document.getElementById('form-prospecto-asignar').submit()
        }else{
            select.selectedIndex = 0;
        }
    }

    $('#tipo').change(function(){
        let valor = $(this).val();
        if(valor === "Estación"){
            document.getElementById('estacion_si').style.display = "block";
        }else{
            document.getElementById('estacion_si').style.display = "none";
            document.getElementById('numero_estacion').value = "";
            // $("input:checkbox[value='no']").removeAttr("checked");
            // $("input:checkbox[value='si']").removeAttr("checked");
            $('.bandera_blanca').prop("checked", false);
        }
    })

    let unidades_negocio = [];

    $('#unidad-negocio').change(function(){
        let unidad_negocio = $(this).val();
        unidades_negocio.push(unidad_negocio);

        document.getElementById('unidad-negocio').selectedIndex = 0

        add_unidades_input();
        mostrar_unidades();
    })

    function remove_unidad(unidad_negocio)
    {
        let posicion = unidades_negocio.indexOf(unidad_negocio);
        // console.log(posicion);
        unidades_negocio.splice(posicion, 1);
        add_unidades_input();
        mostrar_unidades();
    }

    function add_unidades_input()
    {
        $('#unidades_negocio').val(JSON.stringify(unidades_negocio));
    }

    function mostrar_unidades()
    {
        let badge = "";
        let count = 0;

        unidades_negocio.map( (unidad) => {

            switch(count)
            {
                case 0:
                    badge += `
                    <p class="card-text">
                        <span class="badge badge-ventas">${unidad}</span>
                        <button type="button" onclick="remove_unidad('${unidad}')">X</button>
                    `;
                    count++;
                    break;
                case 1:
                    badge += `
                        <span class="badge badge-ventas">${unidad}</span>
                        <button type="button" onclick="remove_unidad('${unidad}')">X</button>
                    `;
                    count++;
                    break;
                case 2:
                    badge += `
                        <span class="badge badge-ventas">${unidad}</span>
                        <button type="button" onclick="remove_unidad('${unidad}')">X</button>
                    </p>
                    `;
                    count = 0;
                    break;
            }

        });

        document.getElementById('estados_seleccionados').innerHTML = badge;
    }

    function excel_download(nameTable)
    {
        $('#'+nameTable).table2csv({
            file_name: nameTable+'.csv'
        });
    }

    function add_bitacora(cliente_id)
    {
        $('#cliente_id_bitacora').val(cliente_id);
        $('#add-bitacora').modal();
    }

    function add_informacion(cliente_id, informacion_json)
    {
        let informacion = JSON.parse(informacion_json);

        $('#marca').val(informacion['marca']);
        $('#numero_dispensarios').val(informacion['numero_dispensarios']);

        informacion['gasolina_verde'] === 'TRUE' ? $( "#gasolina_verde" ).prop( "checked", true ) : $( "#gasolina_verde" ).prop( "checked", false );
        informacion['gasolina_roja'] === 'TRUE' ? $( "#gasolina_roja" ).prop( "checked", true ) : $( "#gasolina_roja" ).prop( "checked", false );
        informacion['diesel'] === 'TRUE' ? $( "#diesel" ).prop( "checked", true ) : $( "#diesel" ).prop( "checked", false );

        $('#cliente_id_datos').val(cliente_id);
        $('#add-datos').modal();
    }

    function show_ficha_tecnica(ficha_tecnica_json, isCliente)
    {
        let ficha_tecnica = JSON.parse(ficha_tecnica_json);

        $('#fecha_created').text(ficha_tecnica['fecha_created']);
        ficha_tecnica['fecha'] === undefined ? $('#fecha_comentario').text( 'dd-mm-yy' ) : $('#fecha_comentario').text( ficha_tecnica['fecha'] );
        ficha_tecnica['ultimo_comentario'] === undefined ? $('#comentario_ficha').text( 'Sin comentarios' ) : $('#comentario_ficha').text( ficha_tecnica['ultimo_comentario'] );
        $('#empresa_ficha').text(ficha_tecnica['empresa']);

        ficha_tecnica['status_carta_i'] === true ?  $( "#CI" ).prop( "checked", true ) : $( "#CI" ).prop( "checked", false );
        ficha_tecnica['status_convenio'] === true ?  $( "#NDA" ).prop( "checked", true ) : $( "#NDA" ).prop( "checked", false );
        ficha_tecnica['status_solicitud_doc'] === true ?  $( "#DOC" ).prop( "checked", true ) : $( "#DOC" ).prop( "checked", false );
        ficha_tecnica['status_propuesta'] === true ?  $( "#PROP" ).prop( "checked", true ) : $( "#PROP" ).prop( "checked", false );
        ficha_tecnica['status_contratos'] === true ?  $( "#CONTRATOS" ).prop( "checked", true ) : $( "#CONTRATOS" ).prop( "checked", false );
        ficha_tecnica['status_carta_b'] === true ?  $( "#CartaB" ).prop( "checked", true ) : $( "#CartaB" ).prop( "checked", false );

        if(isCliente === true)
        {
            ficha_tecnica['status_cree'] === true ?  $( "#CREE" ).prop( "checked", true ) : $( "#CREE" ).prop( "checked", false );
            $('#CREE_id').show();
        }else{
            $('#CREE_id').hide();
        }

        $('#show-ficha').modal();
    }

    function eliminar(cliente_id){
        $('#cliente_id_eliminar').val(cliente_id);

        if(confirm('¿Está seguro que quiere eliminarlo?')){
            document.getElementById('form-eliminar-cliente').submit();
        }
    }

    function eliminar_vendedor(vendedor_id)
    {
        $('#vendedor_id_eliminar').val(vendedor_id);

        if(confirm('¿Está seguro que quiere eliminarlo?')){
            document.getElementById('form-eliminar-vendedor').submit();
        }
    }

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

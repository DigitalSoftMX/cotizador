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
        }
    })

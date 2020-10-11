<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\VendedorUnidadNegocio;
use App\Cliente;
use App\ClienteVendedor;
use Illuminate\Support\Facades\DB;

class VentasController extends Controller
{

    /* Aqui viene lo chido  */
    private $estados;

    public function __construct()
    {
        $this->estados = array("Aguascalientes","Baja California Norte", "Baja California Sur", "Campeche", "Coahuila", "Colima",
        "Chiapas", "Chihuahua", "Ciudad de México", "Durango", "Guanajuato", "Guerrero", "Hidalgo", "Jalisco",
        "México", "Michoacán", "Morelos", "Nayarit", "Nuevo León", "Oaxaca", "Puebla", "Querétaro", "Quintana Roo",
        "San Luis Potosí", "Sinaloa", "Sonora", "Tabasco", "Tamaulipas", "Tlaxcala", "Veracruz", "Yucatán", "Zacatecas");
    }

    public function index(Request $request)
    {

        $request->user()->authorizeRoles(['Administrador','Ventas']);

        $data = [
            'prospectos' => array(),
            'clientes' => array(),
            'vendedores' => array()
        ];

        /* Obtenemos la informacion de los vendedores */

        $rol = Role::where('name', 'Vendedor')->first();

        $vendedores = User::select('users.id', 'users.name', 'users.app_name', 'users.apm_name', 'users.email')
                            ->where('role_user.role_id', $rol->id)
                            ->join('role_user', 'role_user.user_id', '=', 'users.id')
                            ->get();

        foreach($vendedores as $vendedor)
        {
            $json_vendedor = array('id' => null, 'name' => null, 'app_name' => null, 'apm_name' => null, 'email' => null, 'unidad_negocio' => 'Sin unidad de negocio');

            $json_vendedor['id'] = $vendedor->id;
            $json_vendedor['name'] = $vendedor->name;
            $json_vendedor['app_name'] = $vendedor->app_name;
            $json_vendedor['apm_name'] = $vendedor->apm_name;
            $json_vendedor['email'] = $vendedor->email;

            $unidades_negocio = VendedorUnidadNegocio::select('unidades_negocio')
                                ->where('user_id', $vendedor->id)->get();

            if(count($unidades_negocio) > 0)
            {
                $array_unidades = json_decode($unidades_negocio[0]['unidades_negocio'], true);
                if(count($array_unidades) > 0)
                {
                    $json_vendedor['unidad_negocio'] = $array_unidades[0];
                }
            }

            array_push($data['vendedores'], $json_vendedor);

        }

        /* Obtendremos los prospectos */

        $prospectos = Cliente::select('id', 'nombre', 'encargado', 'estado')
                        ->where('estatus', 'prospecto')
                        ->get();

        foreach($prospectos as $prospecto)
        {
            $json_prospecto =  array('id' => null,
                                    'id_seguimiento' => null,
                                    'empresa' => null,
                                    'encargado' => null,
                                    'unidad_negocio' => null,
                                    'vendedor' => null,
                                    'posibles_vendedores' => array(),
                                    'dias' => 0
                                );

            $json_prospecto['id'] = $prospecto->id;
            $json_prospecto['empresa'] = $prospecto->nombre;
            $json_prospecto['encargado'] = $prospecto->encargado;
            $json_prospecto['unidad_negocio'] = $prospecto->estado;

            /* Obtenermos el vendedor actual en seguimiento */
            $vendedor_en_seguimiento = ClienteVendedor::select('cliente_vendedor.id', 'users.name', 'users.app_name', 'users.apm_name',
                                        DB::raw('DATEDIFF(cliente_vendedor.dia_termino, CURDATE()) as dias'))
                                        ->where('cliente_vendedor.status', 'Seguimiento')
                                        ->where('cliente_vendedor.cliente_id', $prospecto->id)
                                        ->join('users', 'users.id', '=', 'cliente_vendedor.user_id')
                                        ->get();


            $tiene_vendedor = false;

            /* Tiene vendedor */
            if( count($vendedor_en_seguimiento) > 0 )
            {
                 /* Aun tiene tiempo */
                if( $vendedor_en_seguimiento[0]->dias >= 0)
                {
                    $json_prospecto['dias'] = $vendedor_en_seguimiento[0]->dias;
                    $json_prospecto['vendedor'] = $vendedor_en_seguimiento[0]->name." ".$vendedor_en_seguimiento[0]->app_name." ".$vendedor_en_seguimiento[0]->apm_name;
                    $json_prospecto['id_seguimiento'] = $vendedor_en_seguimiento[0]->id;
                    $tiene_vendedor = true;

                }else{
                     /* Se le acabo el tiempo */
                    ClienteVendedor::where('id', $vendedor_en_seguimiento[0]->id)
                                    ->update(['status' => 'Olvidado', 'show_disponible' => 'si', 'asignado' => 'no']);
                }
            }

            if($tiene_vendedor == false)
            {
                $vendedores_no_disponibles = ClienteVendedor::select('users.id')
                                            ->where('cliente_vendedor.status', 'Olvidado')
                                            ->where('cliente_vendedor.cliente_id', $prospecto->id)
                                            ->join('users', 'users.id', '=', 'cliente_vendedor.user_id')
                                            ->get();

                foreach($data['vendedores'] as $vendedor)
                {

                    $agregar_vendedor = true;
                    foreach($vendedores_no_disponibles as $no_agregar)
                    {
                        if( $vendedor['id'] === $no_agregar['id'])
                        {
                            $agregar_vendedor = false;
                            break;
                        }
                    }

                    if($agregar_vendedor === true)
                    {
                        array_push( $json_prospecto['posibles_vendedores'], $vendedor);
                    }
                }

            }

            array_push($data['prospectos'], $json_prospecto);

        }

        /* Obtendremos los clientes */

        $clientes = Cliente::select('*')
                            ->where('estatus', 'cliente')
                            ->get();

        foreach ($clientes as $cliente) {

            $json_cliente =  array('id' => null,
                                    'empresa' => null,
                                    'rfc' => null,
                                    'vendedor' => null,
                                    'avance' => 0,
                                    'color' => 'bg-transparent'
                                );

            $json_cliente['id'] = $cliente->id;
            $json_cliente['empresa'] = $cliente->nombre;
            $json_cliente['rfc'] = $cliente->rfc;

            $vendedor_en_seguimiento = ClienteVendedor::select('users.name', 'users.app_name', 'users.apm_name')
                                        ->where('cliente_vendedor.status', 'Finalizado')
                                        ->where('cliente_vendedor.cliente_id', $cliente->id)
                                        ->join('users', 'users.id', '=', 'cliente_vendedor.user_id')
                                        ->first();

            $json_cliente['vendedor'] = $vendedor_en_seguimiento->name." ".$vendedor_en_seguimiento->app_name." ".$vendedor_en_seguimiento->apm_name;

            if($cliente->carta_de_intencion != null)
            {   $json_cliente['avance']++; }

            if($cliente->convenio_de_confidencialidad != null)
            {   $json_cliente['avance']++;  }

            if($cliente->margen_garantizado != null)
            {   $json_cliente['avance']++;  }

            if($cliente->solicitud_de_documentos != null)
            {   $json_cliente['avance']++;  }

            if($cliente->ine != null)
            {   $json_cliente['avance']++;  }

            if($cliente->acta_constitutiva != null)
            {   $json_cliente['avance']++;  }

            if($cliente->poder_notarial != null)
            {   $json_cliente['avance']++;  }

            if($cliente->constancia_de_situacion_fiscal != null)
            {   $json_cliente['avance']++;  }

            if($cliente->comprobante_de_domicilio != null)
            {   $json_cliente['avance']++;  }

            if($cliente->propuestas != null)
            {   $json_cliente['avance']++;  }

            if($cliente->contrato_comodato != null)
            {   $json_cliente['avance']++;  }

            if($cliente->contrato_de_suministro != null)
            {   $json_cliente['avance']++;  }

            if($cliente->carta_bienvenida != null)
            {   $json_cliente['avance']++;  }

            if($cliente->permiso_cree != null)
            {   $json_cliente['avance']++;  }

            $total = 14;

            $json_cliente['avance'] = ($json_cliente['avance'] * 100)/$total;

            if( $json_cliente['avance'] != 0 )
            {
                if($json_cliente['avance'] < 50)
                {
                    $json_cliente['color'] = 'bg-danger';
                }else{
                    if($json_cliente['avance'] >= 50  && $json_cliente['avance'] < 100 )
                    {
                        $json_cliente['color'] = 'bg-info';
                    }else{
                        $json_cliente['color'] = 'bg-success';
                    }
                }
            }

            array_push( $data['clientes'], $json_cliente );

        }

        $estados = $this->estados;

        return view('ventas.index', compact('data','estados'));
    }

    public function guardar_prospecto(Request $request)
    {
        $nombre_empresa = $request->post('nombre_empresa');
        $nombre_responsable = $request->post('nombre_responsable');
        $correo_empresa = $request->post('correo_empresa');
        $telefono_empresa = $request->post('telefono_empresa');
        $estado = $request->post('estado');
        $id_user = $request->post('id_user');

        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $str = str_shuffle( str_shuffle($str) );
        $value_key = $id_user.substr( $str , 0, 7).$id_user;

        $fecha_actual = date("Y-m-d");

        $cliente = new Cliente();

        $cliente->nombre = $nombre_empresa;
        $cliente->encargado = $nombre_responsable;
        $cliente->telefono = $telefono_empresa;
        $cliente->email = $correo_empresa;
        $cliente->estatus = 'prospecto';
        $cliente->estado = $estado;
        $cliente->value_key =  $value_key;

        $cliente->save();

        // $cliente_id = Cliente::where('value_key', $value_key)->first()->id;

        $cliente_vendedor = new ClienteVendedor();

        $cliente_vendedor->user_id = $id_user;
        $cliente_vendedor->cliente_id = $cliente->id;
        $cliente_vendedor->status = 'Seguimiento';  // valores que puede tomar ['Seguimiento', 'Olvidado', 'Finalizado']
        $cliente_vendedor->dia_termino = date("Y-m-d",strtotime($fecha_actual."+ 40 days"));
        $cliente_vendedor->show_disponible = "no";
        $cliente_vendedor->asignado = 'no';
        $cliente_vendedor->save();

        return back()
                ->with('status', 'Se ha agregado el prospecto exitosamente')
                ->with('status_alert', 'alert-success');

    }

    public function asignar_prospecto_vendedor(Request $request)
    {
        $fecha_actual = date("Y-m-d");

        $vendedor_id = $request->post('vendedor_id');
        $cliente_id = $request->post('cliente_id');

        $cliente_vendedor = new ClienteVendedor();

        $cliente_vendedor->user_id = $vendedor_id;
        $cliente_vendedor->cliente_id = $cliente_id;
        $cliente_vendedor->status = 'Seguimiento';  // valores que puede tomar ['Seguimiento', 'Olvidado', 'Finalizado']
        $cliente_vendedor->dia_termino = date("Y-m-d",strtotime($fecha_actual."+ 40 days"));
        $cliente_vendedor->show_disponible = "no";
        $cliente_vendedor->asignado = 'no';
        $cliente_vendedor->save();

        return back()
                ->with('status', 'Se ha asignado el vendedor exitosamente')
                ->with('status_alert', 'alert-success');
    }

    public function agregar_dias_prospecto(Request $request){

        // $request->user()->authorizeRoles(['Administrador','Ventas']);

        $dias = floatval( $request->post('dias') );

        $id_seguimiento = $request->post('id_seguimiento');

        $cliente_vendedor = ClienteVendedor::select('dia_termino','created_at')
                            ->where('id', $id_seguimiento)
                            ->get();

        $nueva_fecha =  date("Y-m-d",strtotime($cliente_vendedor[0]->created_at."+ ".$dias." days"));


        ClienteVendedor::find($id_seguimiento)
                        ->update(['dia_termino' => $nueva_fecha]);

        return back()
                ->with('status', 'Se ha actualizado con éxito la fecha.')
                ->with('status_alert', 'alert-success');

    }

    public function editar_prospecto(Request $request, $id)
    {
        $prospecto = Cliente::where('id', $id)->get()[0];

        $vendedor = array( 'vendedor' => null );

        $vendedor_en_seguimiento = ClienteVendedor::select('users.id', 'users.name', 'users.app_name', 'users.apm_name',
                                        DB::raw('DATEDIFF(cliente_vendedor.dia_termino, CURDATE()) as dias'))
                                        ->where('cliente_vendedor.status', 'Seguimiento')
                                        ->where('cliente_vendedor.cliente_id', $prospecto->id)
                                        ->join('users', 'users.id', '=', 'cliente_vendedor.user_id')
                                        ->get();

        $vendedor_actual = -1;

        if(count($vendedor_en_seguimiento) > 0)
        {
            $json_vendedor = array('name' => null, 'app_name' => null, 'apm_name' => null, 'id' => null);

            $json_vendedor['name'] = $vendedor_en_seguimiento[0]->name;
            $json_vendedor['app_name'] = $vendedor_en_seguimiento[0]->app_name;
            $json_vendedor['apm_name'] = $vendedor_en_seguimiento[0]->apm_name;
            $json_vendedor['id'] = $vendedor_en_seguimiento[0]->id;

            $vendedor['vendedor'] = $json_vendedor;

            $vendedor_actual = $vendedor_en_seguimiento[0]->id;
        }

        $rol = Role::where('name', 'Vendedor')->first();

        $vendedores = User::select('users.id', 'users.name', 'users.app_name', 'users.apm_name', 'users.email')
                            ->where('users.id', '!=' , $vendedor_actual)
                            ->where('role_user.role_id', $rol->id)
                            ->join('role_user', 'role_user.user_id', '=', 'users.id')
                            ->get();

        $vendedores_olvidados = ClienteVendedor::select('users.id')
                            ->where('cliente_vendedor.status', 'Olvidado')
                            ->where('cliente_vendedor.cliente_id', $id)
                            ->join('users', 'users.id', '=', 'cliente_vendedor.user_id')
                            ->get();
                            $vendedores_potenciales = array();

        foreach($vendedores as $vendedor_)
        {
            $agregar = true;

            foreach($vendedores_olvidados as $vendedor_olvidado)
            {
                if($vendedor_->id === $vendedor_olvidado->id)
                {
                    $agregar = false;
                    break;
                }
            }

            if($agregar === true)
            {
                array_push($vendedores_potenciales, $vendedor_);
            }
        }

        $cambiar_vendedor = $request->user()->roles[0]['name'] === 'Vendedor' ?  'none': 'block';

        return view('ventas.update_prospecto', compact('prospecto', 'vendedor','cambiar_vendedor', 'vendedores_potenciales'));
    }

    public function actualizar_prospecto(Request $request)
    {
        Cliente::find( $request->post('id') )
                ->update([
                    'nombre' => $request->post('nombre'),
                    'encargado' => $request->post('encargado'),
                    'telefono' => $request->post('telefono'),
                    'email' => $request->post('email')
                ]);

        if( $request->post('vendedor_id') != null )
        {
            $badera =  ClienteVendedor::where('cliente_id', $request->post('id'))
                                        ->where('user_id', $request->post('vendedor_id'))
                                        ->get();
            if( count($badera) == 0 )
            {
                ClienteVendedor::where('cliente_id', $request->post('id'))
                                    ->update([
                                        'status' => 'Olvidado',
                                        'show_disponible' => 'si'
                                    ]);

                $fecha_actual = date("Y-m-d");

                $cliente_vendedor = new ClienteVendedor();

                $cliente_vendedor->user_id = $request->post('vendedor_id');
                $cliente_vendedor->cliente_id = $request->post('id');
                $cliente_vendedor->status = 'Seguimiento';  // valores que puede tomar ['Seguimiento', 'Olvidado', 'Finalizado']
                $cliente_vendedor->dia_termino = date("Y-m-d",strtotime($fecha_actual."+ 40 days"));
                $cliente_vendedor->show_disponible = "no";
                $cliente_vendedor->asignado = 'no';
                $cliente_vendedor->save();
            }


        }

        $url = $request->user()->roles[0]['name'] === 'Vendedor' ?  'clientes.index': 'ventas.index';

        return redirect(route($url))
                ->with('status', 'Se ha actualizado con éxito el prospecto.')
                ->with('status_alert', 'alert-success');
    }

    public function visualizar_prospecto(Request $request, $id)
    {
        $prospecto = Cliente::where('id', $id)->get()[0];

        $vendedor = array( 'vendedor' => null );

        $vendedor_en_seguimiento = ClienteVendedor::select('users.id', 'users.name', 'users.app_name', 'users.apm_name',
                                        DB::raw('DATEDIFF(cliente_vendedor.dia_termino, CURDATE()) as dias'))
                                        ->where('cliente_vendedor.status', 'Seguimiento')
                                        ->where('cliente_vendedor.cliente_id', $id)
                                        ->join('users', 'users.id', '=', 'cliente_vendedor.user_id')
                                        ->get();

        if(count($vendedor_en_seguimiento) > 0)
        {
            $json_vendedor = array('name' => null, 'app_name' => null, 'apm_name' => null, 'id' => null);

            $json_vendedor['name'] = $vendedor_en_seguimiento[0]->name;
            $json_vendedor['app_name'] = $vendedor_en_seguimiento[0]->app_name;
            $json_vendedor['apm_name'] = $vendedor_en_seguimiento[0]->apm_name;
            $json_vendedor['id'] = $vendedor_en_seguimiento[0]->id;

            $vendedor['vendedor'] = $json_vendedor;
        }

        // dd($vendedor_en_seguimiento);

        return view('ventas.look_prospecto', compact('prospecto', 'vendedor'));
    }

    public function agregar_cliente(Request $request, $id)
    {
        $prospecto = Cliente::where('id', $id)->get()[0];

        $vendedor = array( 'vendedor' => null );

        $vendedor_en_seguimiento = ClienteVendedor::select('users.id', 'users.name', 'users.app_name', 'users.apm_name',
                                        DB::raw('DATEDIFF(cliente_vendedor.dia_termino, CURDATE()) as dias'))
                                        ->where('cliente_vendedor.status', 'Seguimiento')
                                        ->where('cliente_vendedor.cliente_id', $id)
                                        ->join('users', 'users.id', '=', 'cliente_vendedor.user_id')
                                        ->get();

        if(count($vendedor_en_seguimiento) > 0)
        {
            $json_vendedor = array('name' => null, 'app_name' => null, 'apm_name' => null, 'id' => null);

            $json_vendedor['name'] = $vendedor_en_seguimiento[0]->name;
            $json_vendedor['app_name'] = $vendedor_en_seguimiento[0]->app_name;
            $json_vendedor['apm_name'] = $vendedor_en_seguimiento[0]->apm_name;
            $json_vendedor['id'] = $vendedor_en_seguimiento[0]->id;

            $vendedor['vendedor'] = $json_vendedor;
        }

        $estados = $this->estados;

        Cliente::find( $id )
                ->update([
                    'estatus' => 'cliente'
                ]);

        ClienteVendedor::where('cliente_id', $id )
                        ->where('status', 'Seguimiento')
                        ->update([
                            'status' => 'Finalizado'
                        ]);

        $url = $request->user()->roles[0]['name'] === 'Vendedor' ?  'clientes.index': 'ventas.index';

        return view('ventas.add_cliente', compact('prospecto', 'vendedor', 'estados', 'url'));
    }

    public function guardar_cliente(Request $request)
    {
        Cliente::find( $request->post('id') )
                ->update([
                    'nombre' => $request->post('nombre'),
                    'encargado' => $request->post('encargado'),
                    'telefono' => $request->post('telefono'),
                    'email' => $request->post('email'),
                    'estado' => $request->post('estado'),
                    'pagina_web' => $request->post('pagina_web'),
                    'rfc' => $request->post('rfc'),
                    'direccion' => $request->post('direccion'),
                    'tipo' => $request->post('tipo'),
                    'bandera_blanca' => $request->post('bandera_blanca'),
                    'numero_estacion' => $request->post('numero_estacion')
                ]);


        $url = $request->user()->roles[0]['name'] === 'Vendedor' ?  'clientes.index': 'ventas.index';

        return redirect(route($url))
                ->with('status', 'Se ha guardado con éxito el cliente.')
                ->with('status_alert', 'alert-success');
    }

    public function agregar_documentacion(Request $request, $id)
    {
        $cliente = Cliente::find($id)->first();

        $documentos = array(
            'carta_de_intencion' => json_decode($cliente->carta_de_intencion),
            'convenio_de_confidencialidad' => json_decode($cliente->convenio_de_confidencialidad),
            'margen_garantizado' => json_decode($cliente->margen_garantizado),
            'solicitud_de_documentos' => json_decode($cliente->solicitud_de_documentos),
            'ine' => json_decode($cliente->ine),
            'acta_constitutiva' => json_decode($cliente->acta_constitutiva),
            'poder_notarial' => json_decode($cliente->poder_notarial),
            'constancia_de_situacion_fiscal' => json_decode($cliente->constancia_de_situacion_fiscal),
            'comprobante_de_domicilio' => json_decode($cliente->comprobante_de_domicilio),
            'propuestas' => $cliente->propuestas,
            'contrato_comodato' => json_decode($cliente->contrato_comodato),
            'contrato_de_suministro' => json_decode($cliente->contrato_de_suministro),
            'carta_bienvenida' => json_decode($cliente->carta_bienvenida),
            'permiso_cree' => json_decode($cliente->permiso_cree),
            'propuestas_array' =>  $cliente->propuestas === null ?  array() :  json_decode($cliente->propuestas, true)
        );

        return view('ventas.add_documentacion', compact('cliente', 'documentos'));
    }

    public function guardar_documento(Request $request)
    {
        $fileType = $request->post('fileType');
        $file = $request->file('file');
        $cliente_id = $request->post('cliente_id');

        $fileType = str_replace(" ","_", $fileType);

        $name_file = $fileType."_".$cliente_id.".pdf";

        $fecha_actual = date("Y-m-d");

        $json_document = array(
            'nombre' => $name_file,
            'created_at' => $fecha_actual
        );

        // Almacenamos en BD
        Cliente::find($cliente_id)->update([$fileType => json_encode($json_document) ]);
        // Almacenamos en local
        \Storage::disk('public')->put($name_file,  \File::get($file));

        return back()
            ->with('status', 'Archivo '.str_replace('_',' ', $fileType).' subido correctamente')
            ->with('status_alert', 'alert-success');
    }

    public function guardar_propuesta(Request $request)
    {
        $cliente_id = $request->post('cliente_id');

        $fecha_propuesta = $request->post('fecha_propuesta');
        $nota_value = $request->post('nota_value');
        $regular_price = $request->post('regular_price');
        $supreme_price = $request->post('supreme_price');
        $diesel_price = $request->post('diesel_price');

        /* Obtenemos las propuestas almacenadas */
        $cliente = Cliente::find($cliente_id)->first();

        if($cliente->propuestas === null)
        {
            $propuestas_array = array();
        }else{
            $propuestas_array = json_decode($cliente->propuestas);
        }

        $json_propuesta = array(
                'fecha' => $fecha_propuesta,
                'regular' => $regular_price,
                'supreme' => $supreme_price,
                'diesel' => $diesel_price,
                'nota' => $nota_value,
                'archivo' => null
        );

        $propuesta_name = null;

        $subio_archivo = false;

        if( $request->file('file') !== null )
        {
            $file = $request->file('file');
            $propuesta_name = "propuesta".$fecha_propuesta.".pdf";
            $subio_archivo = true;

            // Almacenamos en local
            \Storage::disk('public')->put($propuesta_name,  \File::get($file));
        }

        $propuestas_new_array = array();
        $pre_existente = false;

        /* Eliminamos si la fecha se encuentra */
        foreach($propuestas_array as $index => $propuesta)
        {
            if($propuesta->fecha === $json_propuesta['fecha'])
            {
                if($subio_archivo === false){
                    $propuesta_name = $propuesta->archivo;
                }

                $json_propuesta['archivo'] = $propuesta_name;
                array_push($propuestas_new_array, $json_propuesta );
                $pre_existente = true;

            }else{
                array_push($propuestas_new_array, $propuesta);
            }
        }

        if($pre_existente === false)
        {
            array_push($propuestas_new_array, $json_propuesta );
        }

        // Almacenamos en BD
        Cliente::find($cliente_id)->update(['propuestas' => json_encode($propuestas_new_array) ]);

        return back()
            ->with('status', 'Propuesta almacenada correctamente')
            ->with('status_alert', 'alert-success');

    }

    public function download(Request $request, $file){
        return \Storage::response("public/$file");
    }

    public function editar_cliente(Request $request, $id)
    {
        $estados = $this->estados;

        $cliente = Cliente::where('id', $id)->get()[0];

        $vendedor = array( 'vendedor' => null );

        $vendedor_en_seguimiento = ClienteVendedor::select('users.id', 'users.name', 'users.app_name', 'users.apm_name',
                                        DB::raw('DATEDIFF(cliente_vendedor.dia_termino, CURDATE()) as dias'))
                                        ->where('cliente_vendedor.status', 'Finalizado')
                                        ->where('cliente_vendedor.cliente_id', $id)
                                        ->join('users', 'users.id', '=', 'cliente_vendedor.user_id')
                                        ->get();

        $vendedor_actual = -1;

        if(count($vendedor_en_seguimiento) > 0)
        {
            $json_vendedor = array('name' => null, 'app_name' => null, 'apm_name' => null, 'id' => null);

            $json_vendedor['name'] = $vendedor_en_seguimiento[0]->name;
            $json_vendedor['app_name'] = $vendedor_en_seguimiento[0]->app_name;
            $json_vendedor['apm_name'] = $vendedor_en_seguimiento[0]->apm_name;
            $json_vendedor['id'] = $vendedor_en_seguimiento[0]->id;

            $vendedor['vendedor'] = $json_vendedor;

            $vendedor_actual = $vendedor_en_seguimiento[0]->id;
        }

        $rol = Role::where('name', 'Vendedor')->first();

        $vendedores = User::select('users.id', 'users.name', 'users.app_name', 'users.apm_name', 'users.email')
                            ->where('users.id', '!=' , $vendedor_actual)
                            ->where('role_user.role_id', $rol->id)
                            ->join('role_user', 'role_user.user_id', '=', 'users.id')
                            ->get();

        $vendedores_olvidados = ClienteVendedor::select('users.id')
                                ->where('cliente_vendedor.status', 'Olvidado')
                                ->where('cliente_vendedor.cliente_id', $id)
                                ->join('users', 'users.id', '=', 'cliente_vendedor.user_id')
                                ->get();

        $vendedores_potenciales = array();

        foreach($vendedores as $vendedor_)
        {
            $agregar = true;

            foreach($vendedores_olvidados as $vendedor_olvidado)
            {
                if($vendedor_->id === $vendedor_olvidado->id)
                {
                    $agregar = false;
                    break;
                }
            }

            if($agregar === true)
            {
                array_push($vendedores_potenciales, $vendedor_);
            }
        }

        $cambiar_vendedor = $request->user()->roles[0]['name'] === 'Vendedor' ?  'none': 'block';

        return view('ventas.edit_cliente', compact('cliente', 'vendedor', 'estados', 'vendedores_potenciales', 'cambiar_vendedor'));
    }

    public function guardar_cambios_cliente(Request $request)
    {
        Cliente::find( $request->post('id') )
            ->update([
                'nombre' => $request->post('nombre'),
                'encargado' => $request->post('encargado'),
                'telefono' => $request->post('telefono'),
                'email' => $request->post('email'),
                'estado' => $request->post('estado'),
                'pagina_web' => $request->post('pagina_web'),
                'rfc' => $request->post('rfc'),
                'direccion' => $request->post('direccion'),
                'tipo' => $request->post('tipo'),
                'bandera_blanca' => $request->post('bandera_blanca'),
                'numero_estacion' => $request->post('numero_estacion')
            ]);

        ClienteVendedor::where('cliente_id', $request->post('id'))
                        ->where('status', 'Finalizado')
                        ->update([
                            'user_id' => $request->post('vendedor_id')
                        ]);

        $url = $request->user()->roles[0]['name'] === 'Vendedor' ?  'clientes.index': 'ventas.index';

        return redirect(route($url))
            ->with('status', 'Se ha actualizado con éxito el cliente.')
            ->with('status_alert', 'alert-success');
    }

    public function visualizar_cliente(Request $request, $id)
    {
        $cliente = Cliente::where('id', $id)->get()[0];

        $vendedor = array( 'vendedor' => null );

        $vendedor_en_seguimiento = ClienteVendedor::select('users.id', 'users.name', 'users.app_name', 'users.apm_name',
                                        DB::raw('DATEDIFF(cliente_vendedor.dia_termino, CURDATE()) as dias'))
                                        ->where('cliente_vendedor.status', 'Finalizado')
                                        ->where('cliente_vendedor.cliente_id', $id)
                                        ->join('users', 'users.id', '=', 'cliente_vendedor.user_id')
                                        ->get();

        if(count($vendedor_en_seguimiento) > 0)
        {
            $json_vendedor = array('name' => null, 'app_name' => null, 'apm_name' => null, 'id' => null);

            $json_vendedor['name'] = $vendedor_en_seguimiento[0]->name;
            $json_vendedor['app_name'] = $vendedor_en_seguimiento[0]->app_name;
            $json_vendedor['apm_name'] = $vendedor_en_seguimiento[0]->apm_name;
            $json_vendedor['id'] = $vendedor_en_seguimiento[0]->id;

            $vendedor['vendedor'] = $json_vendedor;
        }


        return view('ventas.look_cliente', compact('cliente', 'vendedor'));
    }

    public function agregar_vendedor(Request $request)
    {
        $estados = $this->estados;
        return view('ventas.add_vendedor', compact('estados'));
    }

    public function guardar_vendedor_nuevo(Request $request){

        $rol = Role::where('name', 'Vendedor')->first();

        $existe = User::where('email', $request->post('email'))->get();

        if( count($existe) === 0 ){

            $user = new User();
            $user->name = $request->post('name');
            $user->app_name = $request->post('app_name');
            $user->apm_name = $request->post('apm_name');
            $user->username = $request->post('name');
            $user->password = bcrypt( $request->post('password') );
            $user->sex = '0';
            $user->phone = $request->post('phone');
            $user->email = $request->post('email');
            $user->direccion = ' ';
            $user->active = '1';
            $user->remember_token = '';
            $user->email_verified_at = now();
            $user->created_at = now();
            $user->updated_at = now();
            $user->save();
            $user->roles()->attach($rol);

            // $id = User::where('email', $request->post('mail'))->first()->id;

            $vendedor_u_negocio = new VendedorUnidadNegocio();
            $vendedor_u_negocio->user_id = $user->id;
            $vendedor_u_negocio->unidades_negocio = $request->post('unidades_negocio');
            $vendedor_u_negocio->save();

            return redirect(route('ventas.index'))
                ->with('status', 'Se ha agregado con éxito')
                ->with('status_alert', 'alert-success');
        }else{
            return back()
                ->with('status', 'No se puede agregar al usuario, dado que el correo ya esta registrado')
                ->with('status_alert', 'alert-danger');
        }
    }

    public function editar_vendedor(Request $request, $id)
    {
        $estados = $this->estados;

        $vendedor = User::where('id', $id)->get()[0];

        $unidades_negocio = VendedorUnidadNegocio::where('user_id', $id)->get();

        if( count($unidades_negocio) > 0 )
        {
            $unidades_negocio = $unidades_negocio[0]->unidades_negocio;
        }else{
            $unidades_negocio = json_encode(array());
        }

        return view('ventas.update_vendedor', compact('estados', 'vendedor', 'unidades_negocio'));
    }

    public function actualizar_vendedor(Request $request)
    {

        $vendedor = User::where('id', $request->post('id') )->get()[0];

        if( $vendedor->email !== $request->post('email') )
        {
            $existe = User::where('email', $request->post('email'))->get();
            if( count($existe) > 0 )
            {
                return back()
                    ->with('status', 'Este correo no puede ser agregado dado que ya esta registrado')
                    ->with('status_alert', 'alert-danger');
            }

        }

        if( $request->post('password') !== null )
        {
            $password = bcrypt( $request->post('password') );
        }else{
            $password = $vendedor->password;
        }

        User::where('id', $request->post('id'))
                ->update([
                    'name' => $request->post('name'),
                    'app_name' => $request->post('app_name'),
                    'apm_name' => $request->post('apm_name'),
                    'phone' => $request->post('phone'),
                    'email' => $request->post('email'),
                    'password' => $password
                ]);

        VendedorUnidadNegocio::where('user_id', $request->post('id') )
                                ->update([
                                    'unidades_negocio' => $request->post('unidades_negocio')
                                ]);

        return redirect(route('ventas.index'))
            ->with('status', 'Vendedor '.$vendedor->name.' '.$vendedor->apm_name.' '.$vendedor->apm_name.' actualizado correctamente.')
            ->with('status_alert', 'alert-success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}

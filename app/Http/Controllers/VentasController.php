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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        $request->user()->authorizeRoles(['Administrador','Ventas']);
        return view('ventas.alta_vendedor');
    }

    public function guardar_vendedor(Request $request){
        $request->user()->authorizeRoles(['Administrador','Ventas']);
        $rol = Role::where('name', 'Vendedor')->first();

        $existe = User::where('email', $request->post('mail'))->first();

        if($existe == NULL){

            $user = new User();
            $user->name = $request->post('usuario');
            $user->app_name = $request->post('app-pat');
            $user->apm_name = $request->post('app-mat');
            $user->username = $request->post('usuario');
            $user->password = bcrypt( $request->post('contrasenia') );
            $user->sex = '0';
            $user->phone = '0';
            $user->email = $request->post('mail');
            $user->direccion = ' ';
            $user->active = '1';
            $user->remember_token = '';
            $user->email_verified_at = now();
            $user->created_at = now();
            $user->updated_at = now();
            $user->save();
            $user->roles()->attach($rol);

            $id = User::where('email', $request->post('mail'))->first()->id;

            $vendedor_u_negocio = new VendedorUnidadNegocio();
            $vendedor_u_negocio->user_id = $id;
            $vendedor_u_negocio->unidades_negocio = json_encode(array());
            $vendedor_u_negocio->save();

            return back()
                ->with('status', 'Se ha agregado con éxito')
                ->with('status_alert', 'alert-success');
        }else{
            return back()
                ->with('status', 'No se puede agregar al usuario, dado que el correo ya esta registrado')
                ->with('status_alert', 'alert-danger');
        }
    }

    public function listar_vendedores(Request $request){
        $request->user()->authorizeRoles(['Administrador','Ventas']);

        $rol = Role::where('name', 'Vendedor')->first();

        $vendedores = User::select('users.*', 'vendedor_unidad_negocio.unidades_negocio')
                            ->where('role_user.role_id', $rol->id)
                            ->join('role_user', 'role_user.user_id', '=', 'users.id')
                            ->join('vendedor_unidad_negocio', 'vendedor_unidad_negocio.user_id', '=', 'users.id')
                            ->get();

        return view('ventas.view_vendedores', compact('vendedores') );
    }

    public function add_unidad_negocio($id, Request $request){
        $request->user()->authorizeRoles(['Administrador','Ventas']);

        $unidades = User::select('users.id', 'vendedor_unidad_negocio.unidades_negocio')
                            ->where('users.id', $id)
                            ->join('vendedor_unidad_negocio', 'vendedor_unidad_negocio.user_id', '=', 'users.id')
                            ->get();
        $unidades = json_decode($unidades[0]->unidades_negocio);

        return view('ventas.add_unidad_negocio', compact('unidades'))->with('id',$id);
    }

    public function save_unidad_negocio(Request $request){
        $id = $request->post('id_vendedor');
        $json_unidades = $request->post('unidades_negocio');
        $actualiza = VendedorUnidadNegocio::where('user_id', $id)->first();
        $actualiza->update($request->all());
        echo "Los datos se han actualizado";
    }

    public function lista_clientes(Request $request){
        $request->user()->authorizeRoles(['Administrador','Ventas']);

        $clientes_disponibles_q = Cliente::select('clientes.nombre','clientes.email', 'clientes.direccion', 'clientes.tipo', 'clientes.bandera_blanca', 'clientes.numero_estacion',
                                          'clientes.telefono', 'clientes.id', 'clientes.estado',
                                          'clientes.carta_intencion', 'clientes.convenio_confidencialidad', 'clientes.margen_garantizado',
                                          'clientes.contrato_comodato', 'clientes.contrato_suministro', 'clientes.carta_bienvenida',
                                          'clientes.solicitud_documentacion', 'clientes.propuestas',
                                           DB::raw('DATEDIFF(cliente_vendedor.dia_termino, CURDATE()) as dias'))
                ->where('cliente_vendedor.status', '=' , 'Olvidado')
                ->where('cliente_vendedor.show_disponible', "si")
                ->join('cliente_vendedor', 'cliente_vendedor.cliente_id','=','clientes.id')
                ->get();

        $data = array(
            $clientes_disponibles_q
        );

        // dd($clientes_disponibles_q);
        return view('ventas.clientes_disponibles',compact('data'));
    }

    public function asignar_vendedor(Request $request, $id){
        $request->user()->authorizeRoles(['Administrador','Ventas']);

        $rol = Role::where('name', 'Vendedor')->first()->id;

        $cliente = Cliente::where('id',$id)->first();

        $vendedores = User::select('users.name', 'users.app_name', 'users.apm_name','users.id')
                    ->where('role_user.role_id', $rol)
                    ->join('role_user', 'role_user.user_id', '=', 'users.id')
                    ->get();

        $vendedores_no = User::select('users.id')
                        ->where('role_user.role_id', $rol)
                        ->where('cliente_vendedor.cliente_id', $id)
                        ->join('cliente_vendedor', 'cliente_vendedor.user_id', '=', 'users.id')
                        ->join('role_user', 'role_user.user_id', '=', 'users.id')
                        ->get();

        $vendedores_si = array();

        foreach($vendedores as $vendedor)
        {
            $band = TRUE;

            foreach($vendedores_no as $vendedor_no){
                if($vendedor->id == $vendedor_no->id)
                {
                    $band = FALSE;
                    break;
                }
            }
            if($band == TRUE)
            {
                array_push($vendedores_si, $vendedor);
            }
        }

        $data = array(
            $cliente,
            $vendedores_si
        );

        // dd($vendedores);

        return view('ventas.asignar_vendedor_cliente', compact('data'));
    }

    public function seguimientos(Request $request){
        $request->user()->authorizeRoles(['Administrador','Ventas']);

        $seguimientos_q = ClienteVendedor::select('cliente_vendedor.user_id', 'cliente_vendedor.cliente_id', 'cliente_vendedor.status',
        'clientes.nombre', 'clientes.estado','clientes.email', 'clientes.direccion', 'clientes.tipo', 'clientes.bandera_blanca', 'clientes.numero_estacion',
        'users.name', 'users.app_name', 'users.apm_name',
        'clientes.carta_intencion', 'clientes.convenio_confidencialidad', 'clientes.margen_garantizado',
        'clientes.contrato_comodato', 'clientes.contrato_suministro', 'clientes.carta_bienvenida',
        'clientes.solicitud_documentacion', 'clientes.propuestas',
        'clientes.telefono', DB::raw('DATEDIFF(cliente_vendedor.dia_termino, CURDATE()) as dias')
        )
                        ->where('cliente_vendedor.status','!=','Olvidado')
                        ->join('users', 'cliente_vendedor.user_id','=','users.id')
                        ->join('clientes', 'cliente_vendedor.cliente_id', '=', 'clientes.id')
                        ->get();

        $seguimientos = array();

        /* Verificamos que si le haya dado seguimiento */
        foreach($seguimientos_q as $seguimiento){
            /* Si el status del cliente esta en Seguimiento
               pero el tiempo ha finalizado entonces se marca como Olvidado
            */
            if( $seguimiento->dias <= 0 && $seguimiento->status != 'Finalizado' ){

                ClienteVendedor::where('cliente_id', $seguimiento->cliente_id)
                ->where('user_id', $seguimiento->user_id)
                ->update(['status' => 'Olvidado', 'show_disponible' => 'si']);

            }else{
                array_push($seguimientos, $seguimiento);
            }
        }

        $data = array(
            $seguimientos
        );

        return view('ventas.seguimientos', compact('data'));
    }

    public function asignar_vendedor_guardar(Request $request){

        $request->user()->authorizeRoles(['Administrador','Ventas']);

        $fecha_actual = date("Y-m-d");

        $user_id = $request->post('user_id');
        $cliente_id = $request->post('cliente_id');

        ClienteVendedor::where('cliente_id', $cliente_id)
                ->update(['show_disponible' => 'no']);

        $cliente_vendedor = new ClienteVendedor();

        $cliente_vendedor->user_id = $user_id;
        $cliente_vendedor->cliente_id = $cliente_id;
        $cliente_vendedor->status = 'Seguimiento';  // valores que puede tomar ['Seguimiento', 'Olvidado', 'Finalizado']
        $cliente_vendedor->dia_termino = date("Y-m-d",strtotime($fecha_actual."+ 40 days"));
        $cliente_vendedor->show_disponible = "no";
        $cliente_vendedor->asignado = 'si';
        $cliente_vendedor->save();

        return redirect(route('ventas.seguimientos'));
    }

    public function clientes_olvidados(){

        $seguimientos_q = ClienteVendedor::select('cliente_vendedor.user_id', 'cliente_vendedor.cliente_id', 'cliente_vendedor.status',
                        DB::raw('DATEDIFF(cliente_vendedor.dia_termino, CURDATE()) as dias') )
                        ->where('cliente_vendedor.status','=','Seguimiento')
                        ->join('users', 'cliente_vendedor.user_id','=','users.id')
                        ->join('clientes', 'cliente_vendedor.cliente_id', '=', 'clientes.id')
                        ->get();



        /* Verificamos que si le haya dado seguimiento */
        foreach($seguimientos_q as $seguimiento){
            /* Si el status del cliente esta en Seguimiento
               pero el tiempo ha finalizado entonces se marca como Olvidado
            */
            if( $seguimiento->dias <= 0 ){

                ClienteVendedor::where('cliente_id', $seguimiento->cliente_id)
                ->where('user_id', $seguimiento->user_id)
                ->update(['status' => 'Olvidado', 'show_disponible' => 'si']);

            }
        }
    }

    // public function agregar_cliente(Request $request){
    //     $request->user()->authorizeRoles(['Administrador','Ventas']);
    //     return view('ventas.agregar_cliente', compact('vendedores'));
    // }

    public function cliente_guardar(Request $request){

        $request->user()->authorizeRoles(['Administrador','Ventas']);

        $rfc =  strtoupper( $request->post('rfc') );
        $existe = Cliente::where('rfc',$rfc)->get();

        // if(count($existe) > 0){
        if(false){
            return back()
                ->with('status', 'No se puede agregar este cliente dado que ya existe.')
                ->with('status_alert', 'alert-danger');
        }else{

            $user_id = $request->post('vendedor');

            $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
            $str = str_shuffle( str_shuffle($str) );
            $value_key = $user_id.substr( $str , 0, 7);


            $fecha_actual = date("Y-m-d");

            $cliente = new Cliente();
            $cliente->rfc = $rfc;
            $cliente->nombre = $request->post('nombre');
            $cliente->direccion = $request->post('direccion');
            $cliente->telefono = $request->post('telefono');
            $cliente->email = $request->post('email');
            $tipo = $request->post('tipo');
            $cliente->tipo = $tipo;
            $cliente->estado = $request->post('estado');


            if( strcmp ( $cliente->tipo, "Estación" )  == 0){
                $cliente->bandera_blanca = $request->post('bandera_blanca');
                $cliente->numero_estacion = $request->post('numero_estacion');
            }

            $cliente->value_key = $value_key;

            $cliente->save();

            $cliente_id = Cliente::where('value_key', $value_key)->first()->id;

            $cliente_vendedor = new ClienteVendedor();

            $cliente_vendedor->user_id = $user_id;
            $cliente_vendedor->cliente_id = $cliente_id;
            $cliente_vendedor->status = 'Seguimiento';  // valores que puede tomar ['Seguimiento', 'Olvidado', 'Finalizado']
            $cliente_vendedor->dia_termino = date("Y-m-d",strtotime($fecha_actual."+ 40 days"));
            $cliente_vendedor->show_disponible = "no";
            $cliente_vendedor->asignado = 'si';
            $cliente_vendedor->save();

            return back()
                ->with('status', 'Cliente agregado exitosamente')
                ->with('status_alert', 'alert-success');
        }

    }

    public function obtener_vendedores(Request $request){

        $estado = $request->get('estado');

        $rol = Role::where('name', 'Vendedor')->first();

        $vendedores = User::select('users.id', 'users.name', 'users.app_name', 'users.apm_name', 'vendedor_unidad_negocio.unidades_negocio')
                        ->where('role_user.role_id', $rol->id)
                        ->join('role_user', 'role_user.user_id', '=', 'users.id')
                        ->join('vendedor_unidad_negocio', 'vendedor_unidad_negocio.user_id', '=', 'users.id')
                        ->get();

        $vendedores_estado = "";
        foreach($vendedores as $vendedor){
            if($vendedor->unidades_negocio != null){

                $unidades =  json_decode($vendedor->unidades_negocio, true);
                foreach($unidades as $unidad){

                    if($unidad === $estado){
                        $vendedores_estado .= "<option value='".$vendedor->id."'>".$vendedor->name." ".$vendedor->app_name." ".$vendedor->apm_name."</option>";
                        break;
                    }

                }
            }
        }
        echo $vendedores_estado;

    }


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
        $prospecto = Cliente::find($id)->first();

        $vendedor = array( 'vendedor' => null );

        $vendedor_en_seguimiento = ClienteVendedor::select('users.id', 'users.name', 'users.app_name', 'users.apm_name',
                                        DB::raw('DATEDIFF(cliente_vendedor.dia_termino, CURDATE()) as dias'))
                                        ->where('cliente_vendedor.status', 'Seguimiento')
                                        ->where('cliente_vendedor.cliente_id', $prospecto->id)
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

        return view('ventas.update_prospecto', compact('prospecto', 'vendedor'));
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

        return redirect(route('ventas.index'))
                ->with('status', 'Se ha actualizado con éxito el prospecto.')
                ->with('status_alert', 'alert-success');
    }

    public function agregar_cliente(Request $request, $id)
    {
        $prospecto = Cliente::find($id)->first();

        $vendedor = array( 'vendedor' => null );

        $vendedor_en_seguimiento = ClienteVendedor::select('users.id', 'users.name', 'users.app_name', 'users.apm_name',
                                        DB::raw('DATEDIFF(cliente_vendedor.dia_termino, CURDATE()) as dias'))
                                        ->where('cliente_vendedor.status', 'Seguimiento')
                                        ->where('cliente_vendedor.cliente_id', $prospecto->id)
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

        return view('ventas.add_cliente', compact('prospecto', 'vendedor', 'estados'));
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

        return redirect(route('ventas.index'))
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



    public function agregar_vendedor(Request $request)
    {
        return view('ventas.add_vendedor');
    }

    public function editar_vendedor(Request $request, $id)
    {
        return view('ventas.update_vendedor');
    }


    public function editar_cliente(Request $request, $id)
    {
        return view('ventas.edit_cliente');
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

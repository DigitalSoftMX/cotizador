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
    public function index(Request $request){
        $request->user()->authorizeRoles(['Administrador','Ventas']);
        $this->clientes_olvidados();
        return view('ventas.index');
    }

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

    public function download(Request $request, $file){

        $request->user()->authorizeRoles(['Administrador','Ventas']);

        return \Storage::response("public/$file");
    }

    public function agregar_dias(Request $request){

        $request->user()->authorizeRoles(['Administrador','Ventas']);

        $cliente_id = $request->post('cliente_id');
        $user_id = $request->post('user_id');
        $dias = $request->post('dias');

        $cliente_vendedor = ClienteVendedor::select('dia_termino',"id")
                            ->where('user_id', $user_id)
                            ->where('cliente_id', $cliente_id)
                            ->get();

        $nueva_fecha =  date("Y-m-d",strtotime($cliente_vendedor[0]->dia_termino."+ ".$dias." days"));

        ClienteVendedor::find($cliente_vendedor[0]->id)
                        ->update(['dia_termino' => $nueva_fecha]);

        return back()
                ->with('status', 'Se ha actualizado con éxito')
                ->with('status_alert', 'alert-success');

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

    public function agregar_cliente(Request $request){
        $request->user()->authorizeRoles(['Administrador','Ventas']);
        return view('ventas.agregar_cliente', compact('vendedores'));
    }

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

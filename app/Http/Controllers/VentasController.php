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
        $request->user()->authorizeRoles(['Administrador']);
        return view('ventas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        $request->user()->authorizeRoles(['Administrador']);
        return view('ventas.alta_vendedor');
    }

    public function guardar_vendedor(Request $request){
        $request->user()->authorizeRoles(['Administrador']);
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
        $request->user()->authorizeRoles(['Administrador']);

        $rol = Role::where('name', 'Vendedor')->first();

        $vendedores = User::select('users.*', 'vendedor_unidad_negocio.unidades_negocio')
                            ->where('role_user.role_id', $rol->id)
                            ->join('role_user', 'role_user.user_id', '=', 'users.id')
                            ->join('vendedor_unidad_negocio', 'vendedor_unidad_negocio.user_id', '=', 'users.id')
                            ->get();

        return view('ventas.view_vendedores', compact('vendedores') );
    }

    public function add_unidad_negocio($id, Request $request){
        $request->user()->authorizeRoles(['Administrador']);

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
        $request->user()->authorizeRoles(['Administrador']);

        $clientes_disponibles_q = Cliente::select('clientes.nombre','clientes.email', 'clientes.direccion', 'clientes.tipo', 'clientes.bandera_blanca', 'clientes.numero_estacion',
                                          'clientes.telefono', 'clientes.id', DB::raw('DATEDIFF(cliente_vendedor.dia_termino, CURDATE()) as dias'))
                ->where('cliente_vendedor.status', '=' , 'Olvidado')
                ->join('cliente_vendedor', 'cliente_vendedor.cliente_id','=','clientes.id')
                ->get();

        $data = array(
            $clientes_disponibles_q
        );

        return view('ventas.clientes_disponibles',compact('data'));
    }

    public function asignar_vendedor(Request $request, $id){
        $request->user()->authorizeRoles(['Administrador']);

        $rol = Role::where('name', 'Vendedor')->first()->id;

        $cliente = Cliente::where('id',$id)->first();

        $vendedores = User::select('users.name', 'users.app_name', 'users.apm_name','users.id')
        ->where('role_user.role_id', $rol)
        ->distinct('users.id')
        ->join('cliente_vendedor', 'cliente_vendedor.user_id', '!=', 'users.id')
        ->join('role_user', 'role_user.user_id', '=', 'users.id')
        ->get();

        $data = array(
            $cliente,
            $vendedores
        );

        return view('ventas.asignar_vendedor_cliente', compact('data'));
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

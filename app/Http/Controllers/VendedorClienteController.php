<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\ClienteVendedor;
use Illuminate\Support\Facades\DB;

class VendedorClienteController extends Controller
{
    //
    public function index(Request $request){
        $request->user()->authorizeRoles(['Vendedor']);

        $user_id = $request->user()->id;

        /* Obtenemos los clientes del vendedor */
        $mis_clientes_q = Cliente::select('clientes.nombre','clientes.email', 'clientes.direccion', 'clientes.tipo', 'clientes.bandera_blanca', 'clientes.numero_estacion',
                                          'clientes.telefono', 'clientes.id', DB::raw('DATEDIFF(cliente_vendedor.dia_termino, CURDATE()) as dias'))
                ->where('cliente_vendedor.status', '=' , 'Seguimiento')
                ->where('cliente_vendedor.user_id', $user_id)
                ->join('cliente_vendedor', 'cliente_vendedor.cliente_id','=','clientes.id')
                ->get();

        $mis_clientes = array();

        /* Verificamos que si le haya dado seguimiento */
        foreach($mis_clientes_q as $cliente){

            /* Si el status del cliente esta en Seguimiento
               pero el tiempo ha finalizado entonces se marca como Olvidado
            */
            if($cliente->dias <= 0){
                ClienteVendedor::find($cliente->id)->update(['status' => 'Olvidado']);
            }else{
                array_push($mis_clientes, $cliente);
            }
        }

        // dd($mis_clientes);

        $data = array($mis_clientes);

        return view('vendedor_cliente.index', compact('data'));
    }

    public function agregar_cliente(Request $request){
        $request->user()->authorizeRoles(['Vendedor']);
        return view('vendedor_cliente.agregar_cliente');
    }

    public function guardar_cliente(Request $request){

        $request->user()->authorizeRoles(['Vendedor']);

        $user_id = $request->user()->id;

        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $str = str_shuffle( str_shuffle($str) );
        $value_key = $user_id.substr( $str , 0, 7);


        $fecha_actual = date("Y-m-d");

        $cliente = new Cliente();
        $cliente->nombre = $request->post('nombre');
        $cliente->direccion = $request->post('direccion');
        $cliente->telefono = $request->post('telefono');
        $cliente->email = $request->post('email');
        $tipo = $request->post('tipo');
        $cliente->tipo = $tipo;

        if($tipo === "Estacion"){
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
        $cliente_vendedor->save();

        return back()
            ->with('status', 'Cliente agregado exitosamente')
            ->with('status_alert', 'alert-success');
    }

    public function documentacion(Request $request, $id){
        $request->user()->authorizeRoles(['Vendedor']);
        return view('vendedor_cliente.documentacion');
    }
}

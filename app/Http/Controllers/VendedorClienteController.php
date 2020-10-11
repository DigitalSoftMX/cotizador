<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\ClienteVendedor;
use Illuminate\Support\Facades\DB;
use App\VendedorUnidadNegocio;
use Mail;
use App\Mail\NotificacionDocs;

class VendedorClienteController extends Controller
{
    /* Aqui viene lo chido */

    private $estados;

    public function __construct()
    {
        $this->estados = array("Aguascalientes","Baja California Norte", "Baja California Sur", "Campeche", "Coahuila", "Colima",
        "Chiapas", "Chihuahua", "Ciudad de México", "Durango", "Guanajuato", "Guerrero", "Hidalgo", "Jalisco",
        "México", "Michoacán", "Morelos", "Nayarit", "Nuevo León", "Oaxaca", "Puebla", "Querétaro", "Quintana Roo",
        "San Luis Potosí", "Sinaloa", "Sonora", "Tabasco", "Tamaulipas", "Tlaxcala", "Veracruz", "Yucatán", "Zacatecas");
    }

    public function index(Request $request){
        $user_id = $request->user()->id;
        $estados = $this->estados;

        $data = [
            'prospectos' => array(),
            'clientes' => array()
        ];

        /* Obtendremos los prospectos */

        $prospectos = ClienteVendedor::select('clientes.id', 'clientes.nombre', 'clientes.encargado', 'clientes.estado',
                        DB::raw('cliente_vendedor.id as id_seguimiento'),
                        DB::raw('DATEDIFF(cliente_vendedor.dia_termino, CURDATE()) as dias'))
                        ->where('cliente_vendedor.status', 'Seguimiento')
                        ->where('clientes.estatus', 'prospecto')
                        ->where('cliente_vendedor.user_id', $user_id)
                        ->join('clientes', 'clientes.id', "=", 'cliente_vendedor.cliente_id')
                        ->get();

        foreach($prospectos as $prospecto)
        {
            $json_prospecto =  array(
                                    'id' => $prospecto->id,
                                    'id_seguimiento' => $prospecto->id_seguimiento,
                                    'empresa' => $prospecto->nombre,
                                    'encargado' => $prospecto->encargado,
                                    'unidad_negocio' => $prospecto->estado,
                                    'dias' => $prospecto->dias
                                );
            if($json_prospecto['dias'] > 0)
            {
                array_push($data['prospectos'], $json_prospecto);
            }else{
                /* Se le acabo el tiempo */
                ClienteVendedor::where('id', $json_prospecto['id_seguimiento'])
                                ->update(['status' => 'Olvidado', 'show_disponible' => 'si', 'asignado' => 'no']);
            }

        }

        /* Obtendremos los clientes */
        $clientes = ClienteVendedor::select('clientes.*')
                        ->where('cliente_vendedor.status', 'Finalizado')
                        ->where('estatus', 'cliente')
                        ->where('cliente_vendedor.user_id', $user_id)
                        ->join('clientes', 'clientes.id', "=", 'cliente_vendedor.cliente_id')
                        ->get();

        foreach($clientes as $cliente)
        {
            $json_cliente =  array(
                                    'id' => $cliente->id,
                                    'empresa' => $cliente->nombre,
                                    'rfc' => $cliente->rfc,
                                    'avance' => 0,
                                    'color' => 'bg-transparent'
                                );

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


        return view('vendedor_cliente.index',compact('estados', 'user_id', 'data'));
    }

    /* Para que un cliente descarge un archivo */
    public function download_client($name_file)
    {
        return \Storage::response("public/$name_file");
    }

    public function sendMail($pdfs, $id_cliente, $contrato, $request)
    {
        $email_cliente = Cliente::find($id_cliente)->first()->email;
        $tipo_documento = strtoupper( str_replace('_',' ', $contrato) );
        $vendedor = strtoupper( $request->user()->name.' '.$request->user()->app_name );

        $subject = 'El vendedor '.$vendedor.' ha subido documentación de tu seguimiento.';

        $data = array(
            'email' => $email_cliente,
            'subject' => $subject,
            'pdfs' => $pdfs,
            'tipo_documento' => $tipo_documento,
            'vendedor' => $vendedor
        );

        Mail::send('mail.notificacion_docs', $data, function ($message) use ($data) {

            $message->from('ventas@impulsaenergia.mx', 'Impulsa: notificación vendedor');
            $message->to($data['email']);
            $message->subject($data['subject']);

        });
    }

}

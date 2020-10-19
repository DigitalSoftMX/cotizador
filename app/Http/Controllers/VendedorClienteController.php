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

        $prospectos = ClienteVendedor::select('clientes.*',
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
                                    'dias' => $prospecto->dias,
                                    'estacion_numero' => null,
                                    'datos_importantes' => array(
                                        'numero_dispensarios' => 0,
                                        'gasolina_verde' => null,
                                        'gasolina_roja' => null,
                                        'diesel' => null,
                                        'marca' => null
                                    ),
                                    'ficha_tecnica' => array(
                                        'fecha_created' => null,
                                        'empresa' => null,
                                        'ultimo_comentario' => null,
                                        'fecha' => null,
                                        'status_carta_i' => null,
                                        'status_convenio' => null,
                                        'status_solicitud_doc' => null,
                                        'status_propuesta' => null,
                                        'status_contratos' => null,
                                        'status_carta_b' => null
                                    )
                                );

            $json_prospecto['estacion_numero'] = $prospecto->estacion_numero;
            $json_prospecto['datos_importantes'][0]['numero_dispensarios'] = $prospecto->numero_dispensarios;
            $json_prospecto['datos_importantes'][0]['gasolina_verde'] = $prospecto->gasolina_verde;
            $json_prospecto['datos_importantes'][0]['gasolina_roja'] = $prospecto->gasolina_roja;
            $json_prospecto['datos_importantes'][0]['diesel'] = $prospecto->diesel;
            $json_prospecto['datos_importantes'][0]['marca'] = $prospecto->marca;

            $json_prospecto['ficha_tecnica'][0]['empresa'] = $prospecto->nombre;
            $json_prospecto['ficha_tecnica'][0]['fecha_created'] = $prospecto->created_at === null ? 'sin fecha': date("d/m/Y",strtotime($prospecto->created_at));
            $json_prospecto['ficha_tecnica'][0]['status_carta_i'] = $prospecto->carta_de_intencion !== null ? true: false;
            $json_prospecto['ficha_tecnica'][0]['status_convenio'] = $prospecto->convenio_de_confidencialidad !== null ? true: false;
            $json_prospecto['ficha_tecnica'][0]['status_propuesta'] = $prospecto->propuestas !== null ? true: false;
            $json_prospecto['ficha_tecnica'][0]['status_contratos'] = ( $prospecto->contrato_comodato !== null ) && ( $prospecto->contrato_de_suministro !== null ) ? true: false;
            $json_prospecto['ficha_tecnica'][0]['status_carta_b'] = $prospecto->carta_bienvenida !== null ? true: false;

            if($prospecto->bitacora !== null)
            {
                $ultimo_comentario = json_decode($prospecto->bitacora, true);
                $json_prospecto['ficha_tecnica'][0]['ultimo_comentario'] = $ultimo_comentario[count($ultimo_comentario)-1]['comentario'];
                $json_prospecto['ficha_tecnica'][0]['fecha'] = $ultimo_comentario[count($ultimo_comentario)-1]['fecha'];
            }

            $status_documentos = ( $prospecto->solicitud_de_documentos !== null ) && ( $prospecto->ine !== null ) ? true : false;
            $status_documentos = ( $prospecto->acta_constitutiva !== null ) && $status_documentos ? true : false;
            $status_documentos = ( $prospecto->poder_notarial !== null ) && $status_documentos ? true : false;
            $status_documentos = ( $prospecto->constancia_de_situacion_fiscal !== null ) && $status_documentos ? true : false;
            $status_documentos = ( $prospecto->comprobante_de_domicilio !== null ) && $status_documentos ? true : false;
            $status_documentos = ( $prospecto->permiso_cree !== null ) && $status_documentos ? true : false;
            $status_documentos = ( $prospecto->documento_rfc !== null ) && $status_documentos ? true : false;

            $json_prospecto['ficha_tecnica'][0]['status_solicitud_doc'] = $status_documentos;


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
                                    'color' => 'bg-transparent',
                                    'estacion_numero' => null,
                                    'datos_importantes' => array(
                                        'numero_dispensarios' => 0,
                                        'gasolina_verde' => null,
                                        'gasolina_roja' => null,
                                        'diesel' => null,
                                        'marca' => null
                                    ),
                                    'ficha_tecnica' => array(
                                        'fecha_created' => null,
                                        'empresa' => null,
                                        'ultimo_comentario' => null,
                                        'fecha' => null,
                                        'status_carta_i' => null,
                                        'status_convenio' => null,
                                        'status_solicitud_doc' => null,
                                        'status_propuesta' => null,
                                        'status_contratos' => null,
                                        'status_carta_b' => null,
                                        'status_cree' => null,
                                    )
                                );

            $json_cliente['estacion_numero'] = $cliente->estacion_numero;

            $json_cliente['datos_importantes'][0]['numero_dispensarios'] = $cliente->numero_dispensarios;
            $json_cliente['datos_importantes'][0]['gasolina_verde'] = $cliente->gasolina_verde;
            $json_cliente['datos_importantes'][0]['gasolina_roja'] = $cliente->gasolina_roja;
            $json_cliente['datos_importantes'][0]['diesel'] = $cliente->diesel;
            $json_cliente['datos_importantes'][0]['marca'] = $cliente->marca;

            $json_cliente['ficha_tecnica'][0]['empresa'] = $cliente->nombre;
            $json_cliente['ficha_tecnica'][0]['fecha_created'] = $cliente->created_at === null ? 'sin fecha': date("d/m/Y",strtotime($cliente->created_at));
            $json_cliente['ficha_tecnica'][0]['status_carta_i'] = $cliente->carta_de_intencion !== null ? true: false;
            $json_cliente['ficha_tecnica'][0]['status_convenio'] = $cliente->convenio_de_confidencialidad !== null ? true: false;
            $json_cliente['ficha_tecnica'][0]['status_propuesta'] = $cliente->propuestas !== null ? true: false;
            $json_cliente['ficha_tecnica'][0]['status_contratos'] = ( $cliente->contrato_comodato !== null ) && ( $cliente->contrato_de_suministro !== null ) ? true: false;
            $json_cliente['ficha_tecnica'][0]['status_carta_b'] = $cliente->carta_bienvenida !== null ? true: false;
            $json_cliente['ficha_tecnica'][0]['status_cree'] = $cliente->permiso_cree !== null ? true: false;

            if($cliente->bitacora !== null)
            {
                $ultimo_comentario = json_decode($cliente->bitacora, true);
                $json_cliente['ficha_tecnica'][0]['ultimo_comentario'] = $ultimo_comentario[count($ultimo_comentario)-1]['comentario'];
                $json_cliente['ficha_tecnica'][0]['fecha'] = $ultimo_comentario[count($ultimo_comentario)-1]['fecha'];
            }

            $status_documentos = ( $cliente->solicitud_de_documentos !== null ) && ( $cliente->ine !== null ) ? true : false;
            $status_documentos = ( $cliente->acta_constitutiva !== null ) && $status_documentos ? true : false;
            $status_documentos = ( $cliente->poder_notarial !== null ) && $status_documentos ? true : false;
            $status_documentos = ( $cliente->constancia_de_situacion_fiscal !== null ) && $status_documentos ? true : false;
            $status_documentos = ( $cliente->comprobante_de_domicilio !== null ) && $status_documentos ? true : false;
            $status_documentos = ( $cliente->permiso_cree !== null ) && $status_documentos ? true : false;
            $status_documentos = ( $cliente->documento_rfc !== null ) && $status_documentos ? true : false;

            $json_cliente['ficha_tecnica'][0]['status_solicitud_doc'] = $status_documentos;

            // if($cliente->carta_de_intencion != null)
            // {   $json_cliente['avance']++; }

            // if($cliente->convenio_de_confidencialidad != null)
            // {   $json_cliente['avance']++;  }

            // if($cliente->margen_garantizado != null)
            // {   $json_cliente['avance']++;  }

            // if($cliente->solicitud_de_documentos != null)
            // {   $json_cliente['avance']++;  }

            // if($cliente->ine != null)
            // {   $json_cliente['avance']++;  }

            // if($cliente->acta_constitutiva != null)
            // {   $json_cliente['avance']++;  }

            // if($cliente->poder_notarial != null)
            // {   $json_cliente['avance']++;  }

            // if($cliente->constancia_de_situacion_fiscal != null)
            // {   $json_cliente['avance']++;  }

            // if($cliente->comprobante_de_domicilio != null)
            // {   $json_cliente['avance']++;  }

            // if($cliente->propuestas != null)
            // {   $json_cliente['avance']++;  }

            // if($cliente->contrato_comodato != null)
            // {   $json_cliente['avance']++;  }

            // if($cliente->contrato_de_suministro != null)
            // {   $json_cliente['avance']++;  }

            // if($cliente->carta_bienvenida != null)
            // {   $json_cliente['avance']++;  }

            // if($cliente->permiso_cree != null)
            // {   $json_cliente['avance']++;  }

            // $total = 13;

            // $json_cliente['avance'] = ($json_cliente['avance'] * 100)/$total;

            // if( $json_cliente['avance'] != 0 )
            // {
            //     if($json_cliente['avance'] < 50)
            //     {
            //         $json_cliente['color'] = 'bg-danger';
            //     }else{
            //         if($json_cliente['avance'] >= 50  && $json_cliente['avance'] < 100 )
            //         {
            //             $json_cliente['color'] = 'bg-info';
            //         }else{
            //             $json_cliente['color'] = 'bg-success';
            //         }
            //     }
            // }

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
        $email_cliente = Cliente::where('id', $id_cliente)->get()[0]->email;
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

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
    //
    public function index(Request $request){
        $request->user()->authorizeRoles(['Vendedor']);

        $user_id = $request->user()->id;

        /* Obtenemos los clientes del vendedor */
        $mis_clientes_q = Cliente::select('clientes.nombre','clientes.email', 'clientes.direccion', 'clientes.tipo', 'clientes.bandera_blanca', 'clientes.numero_estacion',
                                          'clientes.estado', 'clientes.telefono', 'clientes.id', 'cliente_vendedor.status', DB::raw('DATEDIFF(cliente_vendedor.dia_termino, CURDATE()) as dias'))
                ->where('cliente_vendedor.status', '!=' , 'Olvidado')
                ->where('cliente_vendedor.user_id', $user_id)
                ->join('cliente_vendedor', 'cliente_vendedor.cliente_id','=','clientes.id')
                ->get();

        $mis_clientes = array();

        /* Verificamos que si le haya dado seguimiento */
        foreach($mis_clientes_q as $cliente){

            /* Si el status del cliente esta en Seguimiento
               pero el tiempo ha finalizado entonces se marca como Olvidado
            */
            if($cliente->dias <= 0 && $cliente->status != 'Finalizado'){

                ClienteVendedor::where('cliente_id', $cliente->id)
                ->where('user_id', $user_id)
                ->update(['status' => 'Olvidado', 'show_disponible' => 'si']);

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

        $user_id = $request->user()->id;
        $estados_q = VendedorUnidadNegocio::select('unidades_negocio')->where('user_id', $user_id)->get()[0];

        if($estados_q->unidades_negocio == null){
            $estados = array();
        }else{
            $estados = json_decode($estados_q->unidades_negocio,true);
        }
        return view('vendedor_cliente.agregar_cliente')->with('estados', $estados);
    }

    public function guardar_cliente(Request $request){

        $request->user()->authorizeRoles(['Vendedor']);
        $rfc =  strtoupper( $request->post('rfc') );
        $existe = Cliente::where('rfc',$rfc)->get();

        if(count($existe) > 0){

            return back()
                ->with('status', 'No se puede agregar este cliente dado que ya existe.')
                ->with('status_alert', 'alert-danger');
        }else{
            $user_id = $request->user()->id;

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
            // $cliente_vendedor->asignado = 'no';
            $cliente_vendedor->save();

            return back()
                ->with('status', 'Cliente agregado exitosamente')
                ->with('status_alert', 'alert-success');
        }
    }

    public function documentacion(Request $request, $id){
        $request->user()->authorizeRoles(['Vendedor']);
        $data = array();

        $documentos = Cliente::find($id);

        $data['id'] = $id;
        $data['documentos'] =  $documentos;

        // dd($data['documentos']);

        return view('vendedor_cliente.documentacion', compact('data'));
    }

    public function subir(Request $request){
        $id_cliente = $request->post('id_cliente');
        $contrato = $request->post('contrato');

        $file = $request->file('file');

        $name = $contrato.$id_cliente.".pdf";

        // Almacenamos en BD
        Cliente::find($id_cliente)->update([$contrato => $name]);
        // Almacenamos en local
        \Storage::disk('public')->put($name,  \File::get($file));

        if( $contrato == 'carta_bienvenida'){
            $this->se_ha_finalizado( $request, $id_cliente);
        }

        $this->sendMail( array($name), $id_cliente, $contrato, $request);

        return back()
            ->with('status', 'Archivo '.str_replace('_',' ', $contrato).' subido correctamente')
            ->with('status_alert', 'alert-success');
    }

    public function solicitud_documentos(Request $request){

        $id_cliente = $request->post('id_cliente');
        $documentos_cliente = Cliente::find($id_cliente);


        if($documentos_cliente->solicitud_documentacion === NULL){

            $documentos = array(
                'solicitud_documento' => " ",
                'ine'=> " ",
                'acta_constitutiva' => " ",
                'poder_notarial' => " ",
                'rfc' => " ",
                'constancia_situacion_fiscal' => " ",
                'comprobante_domicilio'=> " "
            );

        }else{
            $documentos = json_decode($documentos_cliente->solicitud_documentacion, true);
        }

        $pdfs = array();
        $i = 0;
        while( $request->has('documento'.$i) )
        {
            $tipo_documento = $request->post('documento'.$i);
            $name = $tipo_documento.$id_cliente.".pdf";

            array_push($pdfs, $name);

            $file = $request->file('file'.$i);
            // Almacenamos en local
            \Storage::disk('public')->put($name,  \File::get($file));

            $documentos[$tipo_documento] = $name;
            $i++;
        }
        // Almacenamos en BD
        Cliente::find($id_cliente)->update(['solicitud_documentacion' => json_encode($documentos)]);

        $this->sendMail($pdfs, $id_cliente, $tipo_documento, $request);

        // $this->se_ha_finalizado( $request, $id_cliente);

        return back()
            ->with('status', 'Archivos subido correctamente')
            ->with('status_alert', 'alert-success');

    }

    public function propuestas(Request $request){

        $id_cliente = $request->post('id_cliente');
        $propuestas_cliente = Cliente::find($id_cliente);

        if($propuestas_cliente->propuestas === NULL){
            $propuesta = array();
            $num_propuesta = 0;
        }else{
            $propuesta = json_decode($propuestas_cliente->propuestas, true);
            $num_propuesta = count($propuesta);
        }

        $name = "propuesta".$id_cliente."#".$num_propuesta.".pdf";
        $file = $request->file('file');
        array_push($propuesta, $name);

        $pdfs = array();
        array_push($pdfs, $name);

        // Almacenamos en BD
        Cliente::find($id_cliente)->update(['propuestas' => json_encode($propuesta)]);

        // Almacenamos en local
        \Storage::disk('public')->put($name,  \File::get($file));

        $this->sendMail($pdfs, $id_cliente, "propuesta", $request);

        // $this->se_ha_finalizado( $request, $id_cliente);

        return back()
            ->with('status', 'Su propuesta se ha subido correctamente')
            ->with('status_alert', 'alert-success');

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

    public function se_ha_finalizado( $request, $cliente_id){

        $user_id = $request->user()->id;
        $cliente = Cliente::find($cliente_id)->first();
        $finalizado = TRUE;

        $contratos = array('carta_intencion', 'convenio_confidencialidad',
                            'margen_garantizado', 'solicitud_documentacion',
                            'propuestas', 'contrato_comodato',
                            'contrato_suministro', 'carta_bienvenida');

        $solicitud_documentacion = array('solicitud_documento', 'ine', 'acta_constitutiva',
                                        'poder_notarial', 'rfc', 'constancia_situacion_fiscal', 'comprobante_domicilio');

        foreach($contratos as $contrato)
        {

            if($contrato != 'solicitud_documentacion')
            {

                if( $cliente[$contrato] === null )
                {
                    $finalizado = FALSE;
                    break;
                }

            }else{

                if( $cliente[$contrato] != null )
                {

                    $documentos_cliente = json_decode( $cliente[$contrato] , true);
                    foreach($solicitud_documentacion as $documento)
                    {
                        if( strcmp($documentos_cliente[$documento], " ") === 0 )
                        {
                            $finalizado = FALSE;
                            break;
                        }
                    }

                    if($finalizado === FALSE){
                        break;
                    }

                }else{
                    $finalizado = FALSE;
                    break;
                }
            }
        }

        if($finalizado === TRUE){

            ClienteVendedor::where('cliente_id',$cliente_id)
            ->where('user_id',$user_id)
            ->update(['status' => 'Finalizado']);

        }
    }

    public function avance(Request $request, $id)
    {
        $request->user()->authorizeRoles(['Vendedor','Administrador']);

        $cliente = Cliente::find($id);

        $data['archivos-subidos'] = array();
        $data['archivos-restantes'] = array();
        $data['archivos_descarga'] = array();

        $contratos = array('carta_intencion', 'convenio_confidencialidad',
                            'margen_garantizado', 'solicitud_documentacion',
                            'propuestas', 'contrato_comodato',
                            'contrato_suministro', 'carta_bienvenida');

        $solicitud_documentacion = array('solicitud_documento', 'ine', 'acta_constitutiva',
                                        'poder_notarial', 'rfc', 'constancia_situacion_fiscal', 'comprobante_domicilio');


        foreach($contratos as $contrato)
        {

            if($contrato != 'solicitud_documentacion')
            {

                if( $cliente[$contrato] != null )
                {
                    array_push($data['archivos-subidos'], $contrato);
                    if($contrato == 'propuestas')
                    {
                        $num = count(json_decode($cliente[$contrato], true)) - 1;
                        array_push( $data['archivos_descarga'] , $contrato.$id."#".$num.".pdf");
                    }else{
                        array_push( $data['archivos_descarga'] , $contrato.$id.".pdf");
                    }

                }else{
                    array_push($data['archivos-restantes'], $contrato);
                }

            }else{

                if( $cliente[$contrato] != null )
                {

                    $documentos_cliente = json_decode( $cliente[$contrato] , true);
                    foreach($solicitud_documentacion as $documento)
                    {
                        if( strcmp($documentos_cliente[$documento], " ") != 0 )
                        {
                            array_push($data['archivos-subidos'], $documento);
                            array_push( $data['archivos_descarga'] , $documento.$id.".pdf");
                        }else{
                            array_push($data['archivos-restantes'], $documento);
                        }
                    }

                }else{
                    array_push($data['archivos-restantes'], $contrato);
                }
            }
        }

        return view('vendedor_cliente.avance', compact('data'));

    }

    /* Para que un cliente descarge un archivo */
    public function download_client($name_file)
    {
        return \Storage::response("public/$name_file");
    }

}

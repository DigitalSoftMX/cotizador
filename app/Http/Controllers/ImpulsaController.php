<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Terminal;
use App\Impulsa;
use App\PriceImpulsa;

class ImpulsaController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Impulsa $model)
    {
        $request->user()->authorizeRoles(['Administrador']);
        $competicions = $model::all();
        return view('impulsa.index', compact('competicions'));
    }

    public function impulsa_selec(Request $request, Impulsa $model, PriceImpulsa $price)
    {
        $request->user()->authorizeRoles(['Administrador']);

        $comeptidor_selecionado = $request['id'];
        $fecha = $request['fecha'];

        $precios = PriceImpulsa::where('impulsa_id', $comeptidor_selecionado)->where('created_at', 'like', '' . $fecha . '%')->get();
        $selecion = array('precios' => $precios);
        return json_encode($selecion);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador']);
        $competicions = Impulsa::all();
        return view('impulsa.create', compact('competicions'));
    }
    
    public function calendario_edit_impulsa(Request $request, PriceImpulsa $price)
    {
        $terminal_seleciona = $request['idTerminal'];
        $fecha = $request['fecha'];
        $precio_r = $request['precio_r'];
        $precio_p = $request['precio_p'];
        $precio_d = $request['precio_d'];

        if ($terminal_seleciona == "") {
            $terminal_seleciona = "3";
        }

        if($price::where('impulsa_id', $terminal_seleciona)->where('created_at', 'like', '' . $fecha . '%')->update(['precio_regular' => $precio_r, 'precio_premium' =>$precio_p, 'precio_disel' => $precio_d])){
            $mensaje = 'Precios actualizados correctamente.';
            $color = 'success';
        }else{
            $mensaje = 'Error al actualizar los precios.';
            $color = 'danger';
        }
        
        $selecion = array('mensaje' => $mensaje,'color' => $color);
        return json_encode($selecion);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PriceImpulsa $price)
    {
        $request->user()->authorizeRoles(['Administrador']);
        //dd($request->all());
        $price->create($request->all());
        return redirect()->route('impulsa.index')->withStatus(__('Precio agregado correctamente.'));
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['Administrador']);
        $competicions = Impulsa::findOrFail($id);
        return view('impulsa.edit', compact('competicions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->user()->authorizeRoles(['Administrador']);
        $competition = PriceImpulsa::findorfail($id);
        //dd($id);
        $competition->update($request->all());
        return redirect()->route('impulsa.index')->withStatus(__('Actualización correcta'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

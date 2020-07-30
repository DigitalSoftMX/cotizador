<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discount;
use App\Demo;
use App\Life;
use DB;

class PemexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador']);
        $discount = Discount::where('producto', 'P')->where('nombre','Pemex')->get()->last();
        $discount_m = Discount::where('producto','M')->where('nombre','Pemex')->get()->last();
        $discount_d = Discount::where('producto', 'D')->where('nombre','Pemex')->get()->last();

        $premium[][] = [];
        $magna[][] = [];
        $disel[][] = [];

        for($i=1; $i<11; $i++) {

            $indice="nivel_".$i;
            
            $discounts_arrayP = explode(",",$discount->$indice);
            $discounts_arrayM = explode(",",$discount_m->$indice);
            $discounts_arrayD = explode(",",$discount_d->$indice);

            for ($j=0; $j < 3; $j++) { 
                $premium[$i-1][$j] = $discounts_arrayP[$j];
                $magna[$i-1][$j] = $discounts_arrayM[$j];
                $disel[$i-1][$j] = $discounts_arrayD[$j];
            }         
        }
        return view('pemex.index',compact('premium','magna','disel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador']);
        return view('pemex.create', ['discountsM'=>$request->discounts_m,'discountsP'=>$request->discounts_p,'discountsD'=>$request->discounts_d]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador']);
        
        $descuentos = ($request->except('_token','_method'));
        $fechas = ($request->except('_token','_method'));

        $arrayRegular=array();
        $arrayPremium=array();
        $arrayDiesel=array();

        $i=1;
        foreach ($descuentos as $nivel => $value) {
            if($i==0 || $i<15){
                array_push($arrayRegular,$value);    
            }else if($i==15 || $i<29){
                array_push($arrayPremium,$value); 
            }else{
                array_push($arrayDiesel,$value); 
            }
            $i++;
        }

        DB::table('discounts')->insert(
            ['nivel_1' => $arrayRegular[0], 'nivel_2' => $arrayRegular[1], 'nivel_3' => $arrayRegular[2], 'nivel_4' => $arrayRegular[3],'nivel_5' => $arrayRegular[4], 'nivel_6' => $arrayRegular[5], 'nivel_7' => $arrayRegular[6],'nivel_8' => $arrayRegular[7], 'nivel_9' => $arrayRegular[8], 'nivel_10' => $arrayRegular[9], 'producto' => $arrayRegular[10], 'nombre' => $arrayRegular[11], 'vigencia_now' => $arrayRegular[12], 'vigencia_old' => $arrayRegular[13]]
        );

        DB::table('discounts')->insert(
            ['nivel_1' => $arrayPremium[0], 'nivel_2' => $arrayPremium[1], 'nivel_3' => $arrayPremium[2], 'nivel_4' => $arrayPremium[3],'nivel_5' => $arrayPremium[4], 'nivel_6' => $arrayPremium[5], 'nivel_7' => $arrayPremium[6],'nivel_8' => $arrayPremium[7], 'nivel_9' => $arrayPremium[8], 'nivel_10' => $arrayPremium[9], 'producto' => $arrayPremium[10], 'nombre' => $arrayPremium[11], 'vigencia_now' => $arrayPremium[12], 'vigencia_old' => $arrayPremium[13]]
        );

        DB::table('discounts')->insert(
            ['nivel_1' => $arrayDiesel[0], 'nivel_2' => $arrayDiesel[1], 'nivel_3' => $arrayDiesel[2], 'nivel_4' => $arrayDiesel[3],'nivel_5' => $arrayDiesel[4], 'nivel_6' => $arrayDiesel[5], 'nivel_7' => $arrayDiesel[6],'nivel_8' => $arrayDiesel[7], 'nivel_9' => $arrayDiesel[8], 'nivel_10' => $arrayDiesel[9], 'producto' => $arrayDiesel[10], 'nombre' => $arrayDiesel[11], 'vigencia_now' => $arrayDiesel[12], 'vigencia_old' => $arrayDiesel[13]]
        );

        return redirect()->route('pemex.index')->withStatus(__('Registro Actualizado correctamente'));
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
    public function edit($id)
    {
        //
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
        //
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

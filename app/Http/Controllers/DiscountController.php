<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discount;
use App\Demo;
use App\Life;
use DB;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Discount $discount_model, Demo $demo, Request $request)
    {
        $request->user()->authorizeRoles(['Administrador']);

        $discount = $discount_model::where('producto', 'P')->where('vigencia_now', true)->where('nombre','Valero')->first();
        $discount_m = $discount_model::where('producto','M')->where('vigencia_now', true)->where('nombre','Valero')->first();
        $discount_d = $discount_model::where('producto', 'D')->where('vigencia_now', true)->where('nombre','Valero')->first();

        foreach ($discount->lives as $live) {
            $fecha_inicio = $live->inicio;
            $fecha_final = $live->fin;
        }

        //$d=$demo::all();

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

        return view('table_descount.index',['discounts_p'=>$premium,'discounts_m'=>$magna,'discounts_d'=>$disel, 'fecha_inicio'=>$fecha_inicio, 'fecha_final'=>$fecha_final]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['Administrador']);
        return view('table_descount.create', ['discountsM'=>$request->discounts_m,'discountsP'=>$request->discounts_p,'discountsD'=>$request->discounts_d, 'fecha_inicio'=>$request->fecha_inicio, 'fecha_final'=>$request->fecha_final ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Discount $discount, Life $life)
    {
        $request->user()->authorizeRoles(['Administrador']);
        
        //if(!testDiscount($request)){
            //return to the view with the error
        //}

        //falta validar la fecha actual con la que esta ingresando el usuario

        $descuentos = ($request->except('_token','_method','inicio','fin'));
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

        //$life->create($request->all());
        DB::table('lives')->insert(
            ['inicio' => $fechas['inicio'], 'fin' => $fechas['fin']]
        );


        $life = $life::all()->last();

        $discount::where('vigencia_now', 1)->where('nombre', 'Valero')->update(['vigencia_now' => 0, 'vigencia_old' => 0]);

        DB::table('discounts')->insert(
            ['nivel_1' => $arrayRegular[0], 'nivel_2' => $arrayRegular[1], 'nivel_3' => $arrayRegular[2], 'nivel_4' => $arrayRegular[3],'nivel_5' => $arrayRegular[4], 'nivel_6' => $arrayRegular[5], 'nivel_7' => $arrayRegular[6],'nivel_8' => $arrayRegular[7], 'nivel_9' => $arrayRegular[8], 'nivel_10' => $arrayRegular[9], 'producto' => $arrayRegular[10], 'nombre' => $arrayRegular[11], 'vigencia_now' => $arrayRegular[12], 'vigencia_old' => $arrayRegular[13]]
        );

        DB::table('discounts')->insert(
            ['nivel_1' => $arrayPremium[0], 'nivel_2' => $arrayPremium[1], 'nivel_3' => $arrayPremium[2], 'nivel_4' => $arrayPremium[3],'nivel_5' => $arrayPremium[4], 'nivel_6' => $arrayPremium[5], 'nivel_7' => $arrayPremium[6],'nivel_8' => $arrayPremium[7], 'nivel_9' => $arrayPremium[8], 'nivel_10' => $arrayPremium[9], 'producto' => $arrayPremium[10], 'nombre' => $arrayPremium[11], 'vigencia_now' => $arrayPremium[12], 'vigencia_old' => $arrayPremium[13]]
        );

        DB::table('discounts')->insert(
            ['nivel_1' => $arrayDiesel[0], 'nivel_2' => $arrayDiesel[1], 'nivel_3' => $arrayDiesel[2], 'nivel_4' => $arrayDiesel[3],'nivel_5' => $arrayDiesel[4], 'nivel_6' => $arrayDiesel[5], 'nivel_7' => $arrayDiesel[6],'nivel_8' => $arrayDiesel[7], 'nivel_9' => $arrayDiesel[8], 'nivel_10' => $arrayDiesel[9], 'producto' => $arrayDiesel[10], 'nombre' => $arrayDiesel[11], 'vigencia_now' => $arrayDiesel[12], 'vigencia_old' => $arrayDiesel[13]]
        );


        $discount = $discount::where('producto', 'P')->where('vigencia_now', true)->where('nombre','Valero')->first();
        $discount->lives()->attach($life->id);
        $discount_m = $discount::where('producto','M')->where('vigencia_now', true)->where('nombre','Valero')->first();
        $discount_m->lives()->attach($life->id);
        $discount_d = $discount::where('producto', 'D')->where('vigencia_now', true)->where('nombre','Valero')->first();
        $discount_d->lives()->attach($life->id);
        
        /*
        $model->create($arrayRegular);*/

        return redirect()->route('table_descount.index')->withStatus(__('Registro Actualizado correctamente'));
    }

    private function testDiscount(Request $request){
        foreach ($request as $req) {
            
        }
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

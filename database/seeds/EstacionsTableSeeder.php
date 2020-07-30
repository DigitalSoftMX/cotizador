<?php

use App\Estacion;
use App\User;
use Illuminate\Database\Seeder;

class EstacionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estacion = new Estacion();
        $estacion->razon_social = "ALDIA, S.A. DE C.V.";
        $estacion->rfc = "XEXX010101000";
        $estacion->cre = "PL/11245/EXP/ES/2015";
        $estacion->terminal = "Tula";
        $estacion->saldo = "0.00";
        $estacion->nombre_sucursal = "ALDIA XALAPA";
        $estacion->linea_credito = "1";
        $estacion->credito = "2000000.00";
        $estacion->credito_usado = "1450409.40";
        $estacion->dias_credito = "10";
        $estacion->retencion = "4";
        $estacion->status = "1";
        $estacion->created_at = now();
        $estacion->updated_at = now();
        $estacion->save();

        $estacion = new Estacion();
        $estacion->razon_social = "NATYVO, S.A. DE C.V.";
        $estacion->rfc = "XEXX010101000";
        $estacion->cre = "PL/11245/EXP/ES/2019";
        $estacion->terminal = "Tula1";
        $estacion->saldo = "0.00";
        $estacion->nombre_sucursal = "NATYVO";
        $estacion->linea_credito = "1";
        $estacion->credito = "2000000.00";
        $estacion->credito_usado = "1450409.40";
        $estacion->dias_credito = "10";
        $estacion->retencion = "4";
        $estacion->status = "1";
        $estacion->created_at = now();
        $estacion->updated_at = now();
        $estacion->save();

    }
}

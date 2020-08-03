<?php

use Illuminate\Database\Seeder;
use App\PreciosEnvio;

class PreciosEnvioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $precios_envio = new PreciosEnvio();
        $precios_envio->desgaste_unidad = 1.98;
        $precios_envio->costo_operador = 2.22;
        $precios_envio->consumo_diesel = 11.69;
        $precios_envio->seguro_unidad = 0.70;
        $precios_envio->save();
    }
}

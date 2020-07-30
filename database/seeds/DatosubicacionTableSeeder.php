<?php

use App\Datosubicacion;
use Illuminate\Database\Seeder;

class DatosubicacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datosubicacion = new Datosubicacion();
        $datosubicacion->codigo_postal = "91157";
        $datosubicacion->tipo_de_vialidad = "Avenida";
        $datosubicacion->nombre_de_vialidad = "Lázaro Cárdenas";
        $datosubicacion->n_exterior = "81";
        $datosubicacion->n_interior = "";
        $datosubicacion->nombre_colonia = "Rafael Lucio";
        $datosubicacion->nombre_localidad = "Xalapa";
        $datosubicacion->nombre_municipio_o_demarcacion_territorial = "Ignacio de la Llave";
        $datosubicacion->nombre_entidad_federativa = "Veracruz";
        $datosubicacion->entre_calle = "Esq. Gildardo Aviles";
        $datosubicacion->y_calle = "";
        $datosubicacion->created_at = now();
        $datosubicacion->updated_at = now();
        $datosubicacion->save();
    }
}

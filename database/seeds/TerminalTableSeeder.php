<?php

use App\Terminal;
use App\Fit;
use Illuminate\Database\Seeder;

class TerminalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $estacion = new Terminal();

        $estacion->razon_social = "Laredo";
        $estacion->rfc = "XEXX010101000";
        $estacion->nombre_terminal = "Laredo";
        $estacion->status = true;
        $estacion->codigo_postal = "72845";
        $estacion->tipo_de_vialidad = "calle";
        $estacion->nombre_de_vialidad = "la";
        $estacion->n_exterior = "4";
        $estacion->n_interior = "1";
        $estacion->nombre_colonia = "lo que sea";
        $estacion->nombre_localidad = "me importa un";
        $estacion->nombre_municipio_o_demarcacion_territorial = "dddddd";
        $estacion->nombre_entidad_federativa = "dddddd";
        $estacion->entre_calle = "4";
        $estacion->y_calle = "4";
        $estacion->created_at = now();
        $estacion->updated_at = now();
        $estacion->save();
        

        $estacion = new Terminal();
        $estacion->razon_social = "Guadalajara";
        $estacion->rfc = "XEXX010101000";
        $estacion->nombre_terminal = "Guadalajara";
        $estacion->status = true;
        $estacion->codigo_postal = "72845";
        $estacion->tipo_de_vialidad = "calle";
        $estacion->nombre_de_vialidad = "la";
        $estacion->n_exterior = "4";
        $estacion->n_interior = "1";
        $estacion->nombre_colonia = "lo que sea";
        $estacion->nombre_localidad = "me importa un";
        $estacion->nombre_municipio_o_demarcacion_territorial = "dddddd";
        $estacion->nombre_entidad_federativa = "dddddd";
        $estacion->entre_calle = "4";
        $estacion->y_calle = "4";
        $estacion->created_at = now();
        $estacion->updated_at = now();
        $estacion->save();
        

        $estacion = new Terminal();
        $estacion->razon_social = "Puebla";
        $estacion->rfc = "XEXX010101000";
        $estacion->nombre_terminal = "Puebla";
        $estacion->status = true;
        $estacion->status = true;
        $estacion->codigo_postal = "72845";
        $estacion->tipo_de_vialidad = "calle";
        $estacion->nombre_de_vialidad = "la";
        $estacion->n_exterior = "4";
        $estacion->n_interior = "1";
        $estacion->nombre_colonia = "lo que sea";
        $estacion->nombre_localidad = "me importa un";
        $estacion->nombre_municipio_o_demarcacion_territorial = "dddddd";
        $estacion->nombre_entidad_federativa = "dddddd";
        $estacion->entre_calle = "4";
        $estacion->y_calle = "4";
        $estacion->created_at = now();
        $estacion->updated_at = now();
        $estacion->save();
        

        $estacion = new Terminal();
        $estacion->razon_social = "Monterrey";
        $estacion->rfc = "XEXX010101000";
        $estacion->nombre_terminal = "Monterrey";
        $estacion->status = true;
        $estacion->status = true;
        $estacion->codigo_postal = "72845";
        $estacion->tipo_de_vialidad = "calle";
        $estacion->nombre_de_vialidad = "la";
        $estacion->n_exterior = "4";
        $estacion->n_interior = "1";
        $estacion->nombre_colonia = "lo que sea";
        $estacion->nombre_localidad = "me importa un";
        $estacion->nombre_municipio_o_demarcacion_territorial = "dddddd";
        $estacion->nombre_entidad_federativa = "dddddd";
        $estacion->entre_calle = "4";
        $estacion->y_calle = "4";
        $estacion->created_at = now();
        $estacion->updated_at = now();
        $estacion->save();
        

        $estacion = new Terminal();
        $estacion->razon_social = "Chihuahua";
        $estacion->rfc = "XEXX010101000";
        $estacion->nombre_terminal = "Chihuahua";
        $estacion->status = true;
        $estacion->status = true;
        $estacion->codigo_postal = "72845";
        $estacion->tipo_de_vialidad = "calle";
        $estacion->nombre_de_vialidad = "la";
        $estacion->n_exterior = "4";
        $estacion->n_interior = "1";
        $estacion->nombre_colonia = "lo que sea";
        $estacion->nombre_localidad = "me importa un";
        $estacion->nombre_municipio_o_demarcacion_territorial = "dddddd";
        $estacion->nombre_entidad_federativa = "dddddd";
        $estacion->entre_calle = "4";
        $estacion->y_calle = "4";
        $estacion->created_at = now();
        $estacion->updated_at = now();
        $estacion->save();
        
    }
}

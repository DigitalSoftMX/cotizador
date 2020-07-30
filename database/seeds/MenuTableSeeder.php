<?php

use Illuminate\Database\Seeder;
use App\Menu;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = new Menu();
        $menu->name_modulo = "dashboard";
        $menu->desplegable = "0";
        $menu->ruta = "home";
        $menu->id_role = "1";
        $menu->icono = "dashboard";
        $menu->created_at = now();
        $menu->updated_at = now();
        $menu->save();
        $menu->roles()->attach('1');
        $menu->roles()->attach('2');

        /*$menu = new Menu();
        $menu->name_modulo = "Perfil";
        $menu->desplegable = "0";
        $menu->ruta = "profile";
        $menu->id_role = "1";
        $menu->icono = "account_circle";
        $menu->created_at = now();
        $menu->updated_at = now();
        $menu->save();*/

        $menu = new Menu();
        $menu->name_modulo = "Usuarios";
        $menu->desplegable = "0";
        $menu->ruta = "user";
        $menu->id_role = "1";
        $menu->icono = "perm_identity";
        $menu->created_at = now();
        $menu->updated_at = now();
        $menu->save();
        $menu->roles()->attach('1');

        /*$menu = new Menu();
        $menu->name_modulo = "Estaciones";
        $menu->desplegable = "0";
        $menu->ruta = "estaciones";
        $menu->id_role = "1";
        $menu->icono = "local_gas_station";
        $menu->created_at = now();
        $menu->updated_at = now();
        $menu->save();*/


        $menu = new Menu();
        $menu->name_modulo = "Cotizador";
        $menu->desplegable = "0";
        $menu->ruta = "cotizador";
        $menu->id_role = "1";
        $menu->icono = "local_atm";
        $menu->created_at = now();
        $menu->updated_at = now();
        $menu->save();
        $menu->roles()->attach('1');
        $menu->roles()->attach('2');

        $menu = new Menu();
        $menu->name_modulo = "Alta de Terminales";
        $menu->desplegable = "0";
        $menu->ruta = "terminales";
        $menu->id_role = "1";
        $menu->icono = "home_work";
        $menu->created_at = now();
        $menu->updated_at = now();
        $menu->save();
        $menu->roles()->attach('1');

        $menu = new Menu();
        $menu->name_modulo = "Fits";
        $menu->desplegable = "0";
        $menu->ruta = "fits";
        $menu->id_role = "1";
        $menu->icono = "import_export";
        $menu->created_at = now();
        $menu->updated_at = now();
        $menu->save();
        $menu->roles()->attach('1');

        $menu = new Menu();
        $menu->name_modulo = "Tabla de Descuentos Valero";
        $menu->desplegable = "0";
        $menu->ruta = "table_descount";
        $menu->id_role = "1";
        $menu->icono = "local_offer";
        $menu->created_at = now();
        $menu->updated_at = now();
        $menu->save();
        $menu->roles()->attach('1');

        

        $menu = new Menu();
        $menu->name_modulo = "Tabla de Descuentos Pemex";
        $menu->desplegable = "0";
        $menu->ruta = "pemex";
        $menu->id_role = "1";
        $menu->icono = "local_parking";
        $menu->created_at = now();
        $menu->updated_at = now();
        $menu->save();
        $menu->roles()->attach('1');

        $menu = new Menu();
        $menu->name_modulo = "Captura de precios pemex";
        $menu->desplegable = "0";
        $menu->ruta = "competencia";
        $menu->id_role = "1";
        $menu->icono = "thumbs_up_down";
        $menu->created_at = now();
        $menu->updated_at = now();
        $menu->save();
        $menu->roles()->attach('1');

        $menu = new Menu();
        $menu->name_modulo = "Historial de Activida";
        $menu->desplegable = "0";
        $menu->ruta = "actividades";
        $menu->id_role = "1";
        $menu->icono = "history";
        $menu->created_at = now();
        $menu->updated_at = now();
        $menu->save();
        $menu->roles()->attach('1');
    }
}

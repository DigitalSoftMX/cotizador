<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Menu;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_menu = Menu::where('id', '1')->first();

        $role = new Role();
        $role->name = "Administrador";
        $role->description = "Usuarion con nivel de administracion total.";
        $role->save();
        $role->menus()->attach($role_menu);
        

        $role = new Role();
        $role->name = "Invitado";
        $role->description = "Usuarion con nivel bajo de acceso.";
        $role->save();

    }
}

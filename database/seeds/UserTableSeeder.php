<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Estacion;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'Administrador')->first();
        $role_estacion = Role::where('name', 'Invitado')->first();
        $estacion_pri = Estacion::where('id', '1')->first();
        $estacion_seg = Estacion::where('id', '2')->first();

        $user = new User();
        $user->name = 'Alejandro';
        $user->app_name = 'qwerty';
        $user->apm_name = 'qwerty';
        $user->username = 'Alex';
        $user->password = bcrypt('alex.hdez2020*');
        $user->sex = '0';
        $user->phone = '2228130063';
        $user->email = 'alex.hdez@impulsanergia.mx';
        $user->direccion = 'soledad #8';
        $user->active = '1';
        $user->remember_token = '';
        $user->email_verified_at = now();
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();
        $user->roles()->attach($role_admin);
        $user->estacions()->attach($estacion_pri);

        $user = new User();
        $user->name = 'Invitado';
        $user->app_name = 'qwerty';
        $user->apm_name = 'qwerty';
        $user->username = 'Invitado';
        $user->password = bcrypt('1234567890Invitado*');
        $user->sex = '0';
        $user->phone = '';
        $user->email = 'admin@material.com';
        $user->direccion = 'soledad #8';
        $user->active = '1';
        $user->remember_token = '';
        $user->email_verified_at = now();
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();
        $user->roles()->attach($role_admin);
        $user->estacions()->attach($estacion_pri);

        $user = new User();
        $user->name = 'Edurado';
        $user->app_name = 'Coyotl';
        $user->apm_name = 'Vazquez';
        $user->username = 'Lalo';
        $user->password = bcrypt('annasophia');
        $user->sex = '0';
        $user->phone = '';
        $user->email = 'l4l0_love@hotmail.com';
        $user->direccion = 'soledad #8';
        $user->active = '1';
        $user->remember_token = '';
        $user->email_verified_at = now();
        $user->created_at = now();
        $user->updated_at = now();
        $user->save();
        $user->roles()->attach($role_estacion);
        $user->estacions()->attach($estacion_seg);
    }
}

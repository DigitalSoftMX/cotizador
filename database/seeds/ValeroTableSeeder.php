<?php

use Illuminate\Database\Seeder;
use App\Valero;

class ValeroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $valero = new Valero();
         $valero->terminal_id = '1';
         $valero->precio_regular = '0';
         $valero->precio_premium = '0';
         $valero->precio_disel = '0';
         $valero->created_at = '2020-06-01 13:20:35';
         $valero->updated_at = '2020-06-01 13:20:35'; 
         $valero->save();

         

         $valero = new Valero();
         $valero->terminal_id = '2';
         $valero->precio_regular = '0';
         $valero->precio_premium = '0';
         $valero->precio_disel = '0';
         $valero->created_at = '2020-06-01 13:20:35';
         $valero->updated_at = '2020-06-01 13:20:35';
         $valero->save();


         $valero = new Valero();
         $valero->terminal_id = '3';
         $valero->precio_regular = '12.300';
         $valero->precio_premium = '12.790';
         $valero->precio_disel = '16.430';
         $valero->created_at = '2020-06-01 13:20:35';
         $valero->updated_at = '2020-06-01 13:20:35';
         $valero->save();


         $valero = new Valero();
         $valero->terminal_id = '4';
         $valero->precio_regular = '0';
         $valero->precio_premium = '0';
         $valero->precio_disel = '0';
         $valero->created_at = '2020-06-01 13:20:35';
         $valero->updated_at = '2020-06-01 13:20:35';
         $valero->save();

         
         $valero = new Valero();
         $valero->terminal_id = '5';
         $valero->precio_regular = '0';
         $valero->precio_premium = '0';
         $valero->precio_disel = '0';
         $valero->created_at = '2020-06-01 13:20:35';
         $valero->updated_at = '2020-06-01 13:20:35';
         $valero->save();

         
    }
}

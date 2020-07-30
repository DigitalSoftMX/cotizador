<?php

use Illuminate\Database\Seeder;
use App\Impulsa;

class ImpulsaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $impulsa = new Impulsa();
        $impulsa->nombre = 'Impulsa';    	
        $impulsa->terminal_id=1;
        $impulsa->created_at = now();
        $impulsa->updated_at = now();  
        $impulsa->save();

        $impulsa = new Impulsa();
        $impulsa->nombre = 'Impulsa';    	
        $impulsa->terminal_id=2;
        $impulsa->created_at = now();
        $impulsa->updated_at = now();  
        $impulsa->save();

        $impulsa = new Impulsa();
        $impulsa->nombre = 'Impulsa';    	
        $impulsa->terminal_id=3;
        $impulsa->created_at = now();
        $impulsa->updated_at = now();  
        $impulsa->save();

        $impulsa = new Impulsa();
        $impulsa->nombre = 'Impulsa';    	
        $impulsa->terminal_id=4;
        $impulsa->created_at = now();
        $impulsa->updated_at = now();  
        $impulsa->save();

        $impulsa = new Impulsa();
        $impulsa->nombre = 'Impulsa';    	
        $impulsa->terminal_id=5;
        $impulsa->created_at = now();
        $impulsa->updated_at = now();  
        $impulsa->save();
    }
}

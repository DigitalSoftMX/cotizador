<?php

use Illuminate\Database\Seeder;
use App\Competition;

class CompetitionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $competition = new Competition();
        $competition->nombre = 'Pemex';    	
        $competition->terminal_id=1;
        $competition->created_at = now();
        $competition->updated_at = now();  
        $competition->save();

        $competition = new Competition();
        $competition->nombre = 'Pemex';    	
        $competition->terminal_id=2;
        $competition->created_at = now();
        $competition->updated_at = now();  
        $competition->save();

        $competition = new Competition();
        $competition->nombre = 'Pemex';    	
        $competition->terminal_id=3;
        $competition->created_at = now();
        $competition->updated_at = now();  
        $competition->save();

        $competition = new Competition();
        $competition->nombre = 'Pemex';    	
        $competition->terminal_id=4;
        $competition->created_at = now();
        $competition->updated_at = now();  
        $competition->save();

        $competition = new Competition();
        $competition->nombre = 'Pemex';    	
        $competition->terminal_id=5;
        $competition->created_at = now();
        $competition->updated_at = now();  
        $competition->save();

    }
}

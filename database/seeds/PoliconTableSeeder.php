<?php

use Illuminate\Database\Seeder;
use App\Policon;


class PoliconTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $policon = new Policon();
        $policon->nombre = 'Policon';    	
        $policon->terminal_id=1;
        $policon->created_at = now();
        $policon->updated_at = now();  
        $policon->save();

        $policon = new Policon();
        $policon->nombre = 'Policon';    	
        $policon->terminal_id=2;
        $policon->created_at = now();
        $policon->updated_at = now();  
        $policon->save();

        $policon = new Policon();
        $policon->nombre = 'Policon';    	
        $policon->terminal_id=3;
        $policon->created_at = now();
        $policon->updated_at = now();  
        $policon->save();

        $policon = new Policon();
        $policon->nombre = 'Policon';    	
        $policon->terminal_id=4;
        $policon->created_at = now();
        $policon->updated_at = now();  
        $policon->save();

        $policon = new Policon();
        $policon->nombre = 'Policon';    	
        $policon->terminal_id=5;
        $policon->created_at = now();
        $policon->updated_at = now();  
        $policon->save();
    }
}

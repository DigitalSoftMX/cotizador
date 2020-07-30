<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call([TerminalTableSeeder::class]);
        //$this->call([EstacionsTableSeeder::class]);
        //$this->call([DatosubicacionTableSeeder::class]);
    	$this->call([RoleTableSeeder::class]);
        //$this->call([UserTableSeeder::class]);
        $this->call([MenuTableSeeder::class]);
        //$this->call([FitTableSeeder::class]);
        //$this->call([LiveTableSeeder::class]);
        //$this->call([DiscountTableSeeder::class]);
        //$this->call([CompetitionTableSeeder::class]);
        //$this->call([PoliconTableSeeder::class]);
        //$this->call([ImpulsaTableSeeder::class]);
        //$this->call([PriceTableSeeder::class]);
        //$this->call([PricePoliconTableSeeder::class]);
        //$this->call([PriceImpulsaTableSeeder::class]);
        //$this->call([ValeroTableSeeder::class]);
    }
}

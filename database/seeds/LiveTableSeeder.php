<?php

use Illuminate\Database\Seeder;
use App\Life;

class LiveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $life = new Life();
        $life->inicio = "2020-04-02";
        $life->fin = "2020-05-01";
        $life->save();
    }
}

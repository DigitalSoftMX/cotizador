<?php

use App\Fit;
use App\Terminal;
use Illuminate\Database\Seeder;

class FitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $fit = new Fit();
        $fit->terminal_id = 1;
        $fit->policom = "0.03";
        $fit->impulsa = "0.07";
        $fit->comision = "0.05";
        $fit->regular_fit = "0";
        $fit->premium_fit = "0";
        $fit->disel_fit = "0";
        $fit->created_at = now();
        $fit->updated_at = now();
        $fit->save();

        $fit = new Fit();
        $fit->terminal_id = 2;
        $fit->policom = "0.03";
        $fit->impulsa = "0.07";
        $fit->comision = "0.05";
        $fit->regular_fit = "0";
        $fit->premium_fit = "0";
        $fit->disel_fit = "0";
        $fit->created_at = now();
        $fit->updated_at = now();
        $fit->save();

        $fit = new Fit();
        $fit->terminal_id = 3;
        $fit->policom = "0.03";
        $fit->impulsa = "0.07";
        $fit->comision = "0.05";
        $fit->regular_fit = "0.48";
        $fit->premium_fit = "0.30";
        $fit->disel_fit = "0.57";
        $fit->created_at = now();
        $fit->updated_at = now();
        $fit->save();

        $fit = new Fit();
        $fit->terminal_id = 4;
        $fit->policom = "0.03";
        $fit->impulsa = "0.07";
        $fit->comision = "0.05";
        $fit->regular_fit = "0";
        $fit->premium_fit = "0";
        $fit->disel_fit = "0";
        $fit->created_at = now();
        $fit->updated_at = now();
        $fit->save();

        $fit = new Fit();
        $fit->terminal_id = 5;
        $fit->policom = "0.03";
        $fit->impulsa = "0.07";
        $fit->comision = "0.05";
        $fit->regular_fit = "0";
        $fit->premium_fit = "0";
        $fit->disel_fit = "0";
        $fit->created_at = now();
        $fit->updated_at = now();
        $fit->save();
    }
}

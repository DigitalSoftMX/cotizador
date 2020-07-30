<?php

use Illuminate\Database\Seeder;
use App\Discount;
use App\Life;

class DiscountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $primer_registro = Life::where('id','1')->first();

    	$array = array("0", "500", "0.092");
    	$array1 = array("501", "1250", "0.122");
    	$array2 = array("1251", "4167", "0.153");
    	$array3 = array("4168", "8333", "0.183");
    	$array4 = array("8334", "16667", "0.244");
    	$array5 = array("16668", "25000", "0.366");
    	$array6 = array("25001", "41667", "0.458");
    	$array7 = array("41668", "75000", "0.549");
    	$array8 = array("75001", "104167", "0.610");
    	$array9 = array("104168", "0", "0");

    	$array10 = array("0", "167", "0.108");
    	$array11 = array("168", "333", "0.144");
    	$array12 = array("334", "584", "0.180");
    	$array13 = array("585", "1333", "0.216");
    	$array14 = array("1334", "2500", "0.288");
    	$array15 = array("2501", "8333", "0.432");
    	$array16 = array("8344", "12500", "0.540");
    	$array17 = array("12501", "20833", "0.648");
    	$array18 = array("28834", "33333", "0.720");
    	$array19 = array("33334", "0", "0");

    	$array20 = array("0", "250", "0.122");
    	$array21 = array("251", "1083", "0.162");
    	$array22 = array("1084", "1167", "0.203");
    	$array23 = array("1168", "3417", "0.243");
    	$array24 = array("3418", "5750", "0.324");
    	$array25 = array("5751", "8083", "0.486");
    	$array26 = array("8084", "11583", "0.608");
    	$array27 = array("11584", "15083", "0.729");
    	$array28 = array("1584", "37500", "0.810");
    	$array29 = array("37501", "0", "0");



        $discount = new Discount();
        $discount->nivel_1 = implode(",",$array);
        $discount->nivel_2 = implode(",",$array1);
        $discount->nivel_3 = implode(",",$array2);
        $discount->nivel_4 = implode(",",$array3);
        $discount->nivel_5 = implode(",",$array4);
        $discount->nivel_6 = implode(",",$array5);
        $discount->nivel_7 = implode(",",$array6);
        $discount->nivel_8 = implode(",",$array7);
        $discount->nivel_9 = implode(",",$array8);
        $discount->nivel_10 = implode(",",$array9);
        $discount->producto = 'M';
        $discount->nombre='Valero';
        $discount->vigencia_now = true;
        $discount->vigencia_old = true;
        $discount->created_at = now();
        $discount->updated_at = now();
        $discount->save();
        $discount->lives()->attach($primer_registro);

        $discount = new Discount();
        $discount->nivel_1 = implode(",",$array10);
        $discount->nivel_2 = implode(",",$array11);
        $discount->nivel_3 = implode(",",$array12);
        $discount->nivel_4 = implode(",",$array13);
        $discount->nivel_5 = implode(",",$array14);
        $discount->nivel_6 = implode(",",$array15);
        $discount->nivel_7 = implode(",",$array16);
        $discount->nivel_8 = implode(",",$array17);
        $discount->nivel_9 = implode(",",$array18);
        $discount->nivel_10 = implode(",",$array19);
        $discount->nombre='Valero';
        $discount->producto = 'P';
        $discount->vigencia_now = true;
        $discount->vigencia_old = true;
        $discount->created_at = now();
        $discount->updated_at = now();
        $discount->save();
        $discount->lives()->attach($primer_registro);

        $discount = new Discount();
        $discount->nivel_1 = implode(",",$array20);
        $discount->nivel_2 = implode(",",$array21);
        $discount->nivel_3 = implode(",",$array22);
        $discount->nivel_4 = implode(",",$array23);
        $discount->nivel_5 = implode(",",$array24);
        $discount->nivel_6 = implode(",",$array25);
        $discount->nivel_7 = implode(",",$array26);
        $discount->nivel_8 = implode(",",$array27);
        $discount->nivel_9 = implode(",",$array28);
        $discount->nivel_10 = implode(",",$array29);
        $discount->nombre='Valero';
        $discount->producto = 'D';
        $discount->vigencia_now = true;
        $discount->vigencia_old = true;
        $discount->created_at = now();
        $discount->updated_at = now();
        $discount->save();
        $discount->lives()->attach($primer_registro);

        $discount = new Discount();
        $discount->nivel_1 = implode(",",$array);
        $discount->nivel_2 = implode(",",$array1);
        $discount->nivel_3 = implode(",",$array2);
        $discount->nivel_4 = implode(",",$array3);
        $discount->nivel_5 = implode(",",$array4);
        $discount->nivel_6 = implode(",",$array5);
        $discount->nivel_7 = implode(",",$array6);
        $discount->nivel_8 = implode(",",$array7);
        $discount->nivel_9 = implode(",",$array8);
        $discount->nivel_10 = implode(",",$array9);
        $discount->producto = 'M';
        $discount->nombre='Pemex';
        $discount->vigencia_now = true;
        $discount->vigencia_old = true;
        $discount->created_at = now();
        $discount->updated_at = now();
        $discount->save();

        $discount = new Discount();
        $discount->nivel_1 = implode(",",$array10);
        $discount->nivel_2 = implode(",",$array11);
        $discount->nivel_3 = implode(",",$array12);
        $discount->nivel_4 = implode(",",$array13);
        $discount->nivel_5 = implode(",",$array14);
        $discount->nivel_6 = implode(",",$array15);
        $discount->nivel_7 = implode(",",$array16);
        $discount->nivel_8 = implode(",",$array17);
        $discount->nivel_9 = implode(",",$array18);
        $discount->nivel_10 = implode(",",$array19);
        $discount->nombre='Pemex';
        $discount->producto = 'P';
        $discount->vigencia_now = true;
        $discount->vigencia_old = true;
        $discount->created_at = now();
        $discount->updated_at = now();
        $discount->save();

        $discount = new Discount();
        $discount->nivel_1 = implode(",",$array20);
        $discount->nivel_2 = implode(",",$array21);
        $discount->nivel_3 = implode(",",$array22);
        $discount->nivel_4 = implode(",",$array23);
        $discount->nivel_5 = implode(",",$array24);
        $discount->nivel_6 = implode(",",$array25);
        $discount->nivel_7 = implode(",",$array26);
        $discount->nivel_8 = implode(",",$array27);
        $discount->nivel_9 = implode(",",$array28);
        $discount->nivel_10 = implode(",",$array29);
        $discount->nombre='Pemex';
        $discount->producto = 'D';
        $discount->vigencia_now = true;
        $discount->vigencia_old = true;
        $discount->created_at = now();
        $discount->updated_at = now();
        $discount->save();


        

    }
}

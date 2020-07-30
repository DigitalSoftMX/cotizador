<?php

use Illuminate\Database\Seeder;
use App\PricePolicon;

class PricePoliconTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $price = new PricePolicon();
        $price->policon_id = 1;
        $price->precio_regular = 0;
        $price->precio_premium = 0;
        $price->precio_disel = 0;
        $price->created_at = '2020-06-01 13:20:35';
        $price->updated_at = '2020-06-01 13:20:35';
        $price->save();

        
        $price = new PricePolicon();
        $price->policon_id = 2;
        $price->precio_regular = 0;
        $price->precio_premium = 0;
        $price->precio_disel = 0;
        $price->created_at = '2020-06-01 13:20:35';
        $price->updated_at = '2020-06-01 13:20:35';
        $price->save();

        

        $price = new PricePolicon();
        $price->policon_id = 3;
        $price->precio_regular = 12.737;
        $price->precio_premium = 13.183;
        $price->precio_disel = 17.007;
        $price->created_at = '2020-06-01 13:20:35';
        $price->updated_at = '2020-06-01 13:20:35';
        $price->save();

        

        $price = new PricePolicon();
        $price->policon_id = 4;
        $price->precio_regular = 0;
        $price->precio_premium = 0;
        $price->precio_disel = 0;
        $price->created_at = '2020-06-01 13:20:35';
        $price->updated_at = '2020-06-01 13:20:35';
        $price->save();

        

        $price = new PricePolicon();
        $price->policon_id = 5;
        $price->precio_regular = 0;
        $price->precio_premium = 0;
        $price->precio_disel = 0;
        $price->created_at = '2020-06-01 13:20:35';
        $price->updated_at = '2020-06-01 13:20:35';
        $price->save();


    }
}

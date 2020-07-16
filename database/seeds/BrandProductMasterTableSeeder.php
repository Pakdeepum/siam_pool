<?php

use Illuminate\Database\Seeder;

class BrandProductMasterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('brand_product_master')->delete();

        \DB::table('brand_product_master')->insert([
          [
            'id_brand'=>1,
            'brand_name'=>'PURAPOOL',
            'brand_pic_url'=>'1.png',
            'stdel'=>0
            ],

            [
            'id_brand'=>2,
            'brand_name'=>'ASTRALPOOL',
            'brand_pic_url'=>'1.png',
            'stdel'=>0
            ],

            [
            'id_brand'=>3,
            'brand_name'=>'Dolphin',
            'brand_pic_url'=>'1.png',
            'stdel'=>0
            ],

            [
            'id_brand'=>4,
            'brand_name'=>'Emaux',
            'brand_pic_url'=>'1.png',
            'stdel'=>0
            ],

            [
            'id_brand'=>5,
            'brand_name'=>'maytronics',
            'brand_pic_url'=>'1.png',
            'stdel'=>0
            ],

            [
            'id_brand'=>6,
            'brand_name'=>'Siam Pool',
            'brand_pic_url'=>'1.jpg',
            'stdel'=>0
            ],

            [
            'id_brand'=>7,
            'brand_name'=>'Winner',
            'brand_pic_url'=>'1.jpg',
            'stdel'=>0
            ],

            [
            'id_brand'=>8,
            'brand_name'=>'Tecmark',
            'brand_pic_url'=>'1.jpg',
            'stdel'=>0
            ],

            [
            'id_brand'=>9,
            'brand_name'=>'ERA',
            'brand_pic_url'=>'1.jpg',
            'stdel'=>0
            ],

            [
            'id_brand'=>10,
            'brand_name'=>'Valdus',
            'brand_pic_url'=>'1.jpg',
            'stdel'=>0
            ],

            [
            'id_brand'=>11,
            'brand_name'=>'WD',
            'brand_pic_url'=>'1.jpg',
            'stdel'=>0
            ],

            [
            'id_brand'=>12,
            'brand_name'=>'POOLSPA',
            'brand_pic_url'=>'1.jpg',
            'stdel'=>0
            ],

            [
            'id_brand'=>13,
            'brand_name'=>'ZOF AQUA',
            'brand_pic_url'=>'1.jpg',
            'stdel'=>0
            ],

            [
            'id_brand'=>14,
            'brand_name'=>'Duraking',
            'brand_pic_url'=>'1.jpg',
            'stdel'=>0
            ],

            [
            'id_brand'=>15,
            'brand_name'=>'KOKIDO',
            'brand_pic_url'=>'1.jpg',
            'stdel'=>0
            ]
          ]);
    }
}

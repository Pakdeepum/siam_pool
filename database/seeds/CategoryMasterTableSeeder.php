<?php

use Illuminate\Database\Seeder;

class CategoryMasterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('category_product_master')->delete();

        \DB::table('category_product_master')->insert([
          [
          'id_category_product'=>1,
          'category_product_name'=>'Chlorinators',
          'category_product_detail'=>'For make Chlorine water',
          'stdel'=>0,
          'pic_url'=>'1.jpg'
          ],

          [
          'id_category_product'=>2,
          'category_product_name'=>'Pumps',
          'category_product_detail'=>'For pump water pool',
          'stdel'=>0,
          'pic_url'=>'1.jpg'
          ],

          [
          'id_category_product'=>3,
          'category_product_name'=>'Filters',
          'category_product_detail'=>'for Filter water',
          'stdel'=>0,
          'pic_url'=>'1.jpg'
          ],

          [
          'id_category_product'=>4,
          'category_product_name'=>'Cleaners',
          'category_product_detail'=>'for clean pool',
          'stdel'=>0,
          'pic_url'=>'1.jpg'
          ],

          [
          'id_category_product'=>5,
          'category_product_name'=>'Lighting',
          'category_product_detail'=>'for emit light',
          'stdel'=>0,
          'pic_url'=>'1.jpg'
          ],

          [
          'id_category_product'=>6,
          'category_product_name'=>'Accessories',
          'category_product_detail'=>'for decorate or use with pool',
          'stdel'=>0,
          'pic_url'=>'1.jpg'
        ],
        ['id_category_product'=>7,
        	'category_product_name'=>'Oxygen Minerale',
          'category_product_detail'=>'oxygen system',
          'stdel' =>0,
          'pic_url'=>	'1.jpg'
        ],
        ['id_category_product'=>8,
          'category_product_name'=>'Maintenance Kit',
          'category_product_detail'=>'Cleaning set',
          'stdel' =>0,
          'pic_url'=>	'1.jpg'
        ]
          ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class DeliveryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('delivery')->delete();

        \DB::table('delivery')->insert([
          [
          'id'=>1,
          'service'=>'Kerry',
          'service_url'=>'https://th.kerryexpress.com/en/track/',
          'service_charge'=>50.00,
          'status'=>1,
          'deleted_at'=>NULL,
          'created_at'=>'2019-04-25 21:19:36',
          'updated_at'=>'2019-04-26 00:09:04'
          ]
        ]);
    }
}

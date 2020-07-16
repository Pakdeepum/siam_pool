<?php

use Illuminate\Database\Seeder;

class GennerateKeyTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('gennerate_key')->delete();
        
        \DB::table('gennerate_key')->insert(array (
            0 => 
            array (
                'id' => 1,
                'index' => 0,
                'prefix' => 'HH',
                'created_at' => '2019-02-06 18:29:45',
                'updated_at' => '2019-02-07 11:02:32',
            ),
        ));
        
        
    }
}
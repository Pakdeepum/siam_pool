<?php

use Illuminate\Database\Seeder;

class CarouselTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('carousel')->delete();
        
        \DB::table('carousel')->insert(array (
            0 => 
            array (
                'id' => 7,
                'carousel_path' => '2048-81-1500x10001549513216.jpg',
                'created_at' => '2019-01-07 14:22:15',
                'updated_at' => '2019-01-07 14:22:15',
            ),
        ));
        
        
    }
}
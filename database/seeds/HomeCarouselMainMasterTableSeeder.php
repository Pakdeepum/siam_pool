<?php

use Illuminate\Database\Seeder;

class HomeCarouselMainMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('home_carousel_main_master')->delete();
        
        \DB::table('home_carousel_main_master')->insert(array (
            0 => 
            array (
                'id_home_carousel_main' => 1,
                'pic_url' => '1.jpg',
                'stdel' => 0,
            ),
        ));
        
        
    }
}
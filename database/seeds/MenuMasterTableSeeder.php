<?php

use Illuminate\Database\Seeder;

class MenuMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menu_master')->delete();
        
        \DB::table('menu_master')->insert(array (
            0 => 
            array (
                'id_menu' => 1,
                'menu_name' => 'Home',
                'stdel' => 0,
                'url' => '/',
            ),
            1 => 
            array (
                'id_menu' => 2,
                'menu_name' => 'Product',
                'stdel' => 0,
                'url' => '/showproduct',
            ),
            2 => 
            array (
                'id_menu' => 3,
                'menu_name' => 'Blog',
                'stdel' => 0,
                'url' => '/promotion',
            ),
            3 => 
            array (
                'id_menu' => 4,
                'menu_name' => 'Reviews',
                'stdel' => 0,
                'url' => '/reviews',
            ),
            4 => 
            array (
                'id_menu' => 5,
                'menu_name' => 'About',
                'stdel' => 0,
                'url' => '/about',
            ),
            5 => 
            array (
                'id_menu' => 6,
                'menu_name' => 'Contact Us',
                'stdel' => 0,
                'url' => '/contactUs',
            ),
        ));
        
        
    }
}
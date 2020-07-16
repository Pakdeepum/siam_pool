<?php

use Illuminate\Database\Seeder;

class LevelMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('level_master')->delete();
        
        \DB::table('level_master')->insert(array (
            0 => 
            array (
                'id_level' => 1,
                'level_name' => 'Super Admin',
                'stdel' => 1,
            ),
            1 => 
            array (
                'id_level' => 2,
                'level_name' => 'Admin',
                'stdel' => 0,
            ),
            2 => 
            array (
                'id_level' => 3,
                'level_name' => 'Admin Store',
                'stdel' => 1,
            ),
            3 => 
            array (
                'id_level' => 4,
                'level_name' => 'member',
                'stdel' => 0,
            ),
        ));
        
        
    }
}
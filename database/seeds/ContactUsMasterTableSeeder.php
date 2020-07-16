<?php

use Illuminate\Database\Seeder;

class ContactUsMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contact_us_master')->delete();
        
        \DB::table('contact_us_master')->insert(array (
            0 => 
            array (
                'id_contact_us' => 1,
                'contact_us_text_header' => 'We are always ready to cooperate.Write to us and we will contact you.',
                'contact_us_email' => 'info@handhealth.com',
                'contact_us_phone' => '081-234-5678',
                'contact_us_address' => '25 Si Phum, Muang District, Chiang Mai 50200
25 Si Phum, Muang District, Chiang Mai 50200
25 Si Phum, Muang District, Chiang Mai 50200
Thailand',
                'contact_us_facebook_url' => 'https://www.facebook.com/healthhandheart/',
                'contact_us_twitter_url' => 'https://www.instagram.com',
                'contact_us_instagram_url' => 'https://twitter.com/',
                'contact_us_phone1' => '089-876-5432s',
            ),
        ));
        
        
    }
}
<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AboutUsMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about_us_master')->insert([
            [
                'about_us_text_header' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing',
                'about_us_content_1_header' => 'VISION',
                'about_us_content_1_text_1' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. 1',
                'about_us_content_1_text_2' => 'Lorem Ipsum has been the industry\'s standard dummy text 2',
                'about_us_content_1_text_3' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. 3',
                'about_us_content_1_text_4' => 'Lorem Ipsum has been the industry\'s standard dummy text 4',
                'about_us_content_1_text_5' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. 5',
                'about_us_content_1_pic_url' => '1.png',
                'about_us_content_2_header' => 'MISSION',
                'about_us_content_2_text_1' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. 1',
                'about_us_content_2_text_2' => 'Lorem Ipsum has been the industry\'s standard dummy text 2',
                'about_us_content_2_text_3' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. 3',
                'about_us_content_2_text_4' => 'Lorem Ipsum has been the industry\'s standard dummy text 4',
                'about_us_content_2_text_5' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. 5',
                'about_us_content_2_pic_url' => '2.png',
                'created_at' => Carbon::now('Asia/Bangkok'),
                'updated_at' => Carbon::now('Asia/Bangkok')
            ]
        ]);
    }
}

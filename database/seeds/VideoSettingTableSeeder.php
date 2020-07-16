<?php

use Illuminate\Database\Seeder;

class VideoSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('video_setting')->delete();

        \DB::table('video_setting')->insert([
          [
          'id_video'=>1,
          'video_url_embed'=>'https://www.youtube.com/embed/ua7Z3deJtww',
          'video_url'=>'https://www.youtube.com/watch?v=ua7Z3deJtww',
          'status'=>1,
          'stdel'=>0,
          'deleted_at'=>NULL,
          'created_at'=>NULL,
          'updated_at'=>'2019-05-27 20:30:20'
          ],



          [
          'id_video'=>2,
          'video_url_embed'=>'https://www.youtube.com/embed/y6OtzSXXnaw',
          'video_url'=>'https://www.youtube.com/watch?v=y6OtzSXXnaw',
          'status'=>1,
          'stdel'=>0,
          'deleted_at'=>NULL,
          'created_at'=>NULL,
          'updated_at'=>'2019-05-28 21:18:15'
          ],



          [
          'id_video'=>3,
          'video_url_embed'=>'https://www.youtube.com/embed/xYglaBDyoiA',
          'video_url'=>'https://www.youtube.com/watch?v=xYglaBDyoiA',
          'status'=>1,
          'stdel'=>0,
          'deleted_at'=>NULL,
          'created_at'=>'2019-05-27 08:37:21',
          'updated_at'=>'2019-05-28 21:28:14'
          ],



          [
          'id_video'=>4,
          'video_url_embed'=>'https://www.youtube.com/embed/yvMrVdpi6KQ',
          'video_url'=>'https://www.youtube.com/watch?v=yvMrVdpi6KQ',
          'status'=>0,
          'stdel'=>0,
          'deleted_at'=>NULL,
          'created_at'=>'2019-05-28 08:08:14',
          'updated_at'=>'2019-05-28 21:31:28'
          ],



          [
          'id_video'=>5,
          'video_url_embed'=>'https://www.youtube.com/embed/xvs0mwPYrN0',
          'video_url'=>'https://www.youtube.com/watch?v=xvs0mwPYrN0',
          'status'=>1,
          'stdel'=>0,
          'deleted_at'=>NULL,
          'created_at'=>'2019-05-28 09:01:23',
          'updated_at'=>'2019-05-28 21:52:42'
          ],



          [
          'id_video'=>6,
          'video_url_embed'=>'https://www.youtube.com/embed/xp2l15Ikpng',
          'video_url'=>'https://www.youtube.com/watch?v=xp2l15Ikpng',
          'status'=>0,
          'stdel'=>0,
          'deleted_at'=>NULL,
          'created_at'=>'2019-05-28 09:48:14',
          'updated_at'=>'2019-05-28 21:17:43'
          ]
          ]);
    }
}

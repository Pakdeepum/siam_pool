<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert([
          [
            'id'=>  1,
            'username'=>"admin",
            'name' =>"admin",
            'email'=>"admin@gmail.com",
            'email_verified_at' =>NULL,
            'password'=>'$2y$10$P6ky7nMVj1AlYBeBqo6gNul5MHUnrp8eR0HC3g2QONYiv3UD7APPy',
            'remember_token'=>'DVoMyXMXt6N2uspF2bHnZN95q8NqcPxG9ihzWUBJDlUDt3FFUmPhaIcdIsK4',
            'access_token'=>'eVVqMmZWNFJoaUI0OW1pWjN0VGo=5cbee72f92cd9',
            'roles'=>0,
            'stdel'=>0,
            'stpic'=>0,
            'deleted_at'=>NULL,
            'created_at'=>"2019-04-23 09:21:44",
            'updated_at'=>"2019-04-23 10:21:35"
        ],
        [
          'id'=>  2,
          'username'=>"S25jS1M=5cbeda929caf6",
          'name' =>"kheukpon",
          'email'=>"kheukpon.h@gmail.com",
          'email_verified_at' =>NULL,
          'password'=>'$2y$10$P6ky7nMVj1AlYBeBqo6gNul5MHUnrp8eR0HC3g2QONYiv3UD7APPy',
          'remember_token'=>'XSC83ak9W9hnjcfIPmUKLp3xOt2WXjGFnMfeodcqxSuev83cBL9M9kLdKxKN',
          'access_token'=>'NzlnQ0ZnR2ozMGs1eFBoWFFxSE0=5ce655beeea71',
          'roles'=>4,
          'stdel'=>0,
          'stpic'=>0,
          'deleted_at'=>NULL,
          'created_at'=>"2019-04-23 09:27:46",
          'updated_at'=>"2019-05-23 08:11:43"
        ]

        ]);


    }
}

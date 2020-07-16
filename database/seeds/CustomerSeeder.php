<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'name' => 'maytee',
                'lastname' => 'palamee',
                'tel' => '0827817908',
                'address' => '80/3 ปล้อง เทิง เชียงราย 57160',
                'province_id' => '45',
                'district_id' => '5934',
                'amphur_id' => '660',
                'postcode_id' => '4878',
                'phone_code' => '66',
                'created_at' => Carbon::now('Asia/Bangkok'),
                'updated_at' => Carbon::now('Asia/Bangkok')
            ],
            [
                'name' => 'kheukpon',
                'lastname' => 'hongthong',
                'tel' => '0812223432',
                'address' => '123/35 ถ.วงแหวน',
                'province_id' => '45',
                'district_id' => '5934',
                'amphur_id' => '660',
                'postcode_id' => '4878',
                'phone_code' => '66',
                'created_at' => Carbon::now('Asia/Bangkok'),
                'updated_at' => Carbon::now('Asia/Bangkok')
            ]
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class BankMasterTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('bank_master')->delete();

        \DB::table('bank_master')->insert(array (
            0 =>
            array (
                'id' => 1,
                'bank_code' => 'BBL',
            'bank_name' => 'ธ.กรุงเทพ จำกัด(มหาชน)',
                'bank_icons' => 'storage/logo/bangkok.png',
                'created_at' => '2019-02-06 11:29:44',
                'updated_at' => '2019-02-06 11:29:44',
            ),
            1 =>
            array (
                'id' => 2,
                'bank_code' => 'KTB',
            'bank_name' => 'ธ.กรุงไทย(มหาชน)',
                'bank_icons' => 'storage/logo/ktb.png',
                'created_at' => '2019-02-06 11:29:44',
                'updated_at' => '2019-02-06 11:29:44',
            ),
            2 =>
            array (
                'id' => 3,
                'bank_code' => 'BAY',
            'bank_name' => 'ธ.กรุงศรีอยุธยา(มหาชน)',
                'bank_icons' => 'storage/logo/bay.png',
                'created_at' => '2019-02-06 11:29:44',
                'updated_at' => '2019-02-06 11:29:44',
            ),
            3 =>
            array (
                'id' => 4,
                'bank_code' => 'KBANK',
            'bank_name' => 'ธ.กสิกรไทย(มหาชน)',
                'bank_icons' => 'storage/logo/kbank.png',
                'created_at' => '2019-02-06 11:29:44',
                'updated_at' => '2019-02-06 11:29:44',
            ),
            4 =>
            array (
                'id' => 5,
                'bank_code' => 'CITI',
                'bank_name' => 'ธ.ซิตี้แบงค์',
                'bank_icons' => 'storage/logo/citi.png',
                'created_at' => '2019-02-06 11:29:44',
                'updated_at' => '2019-02-06 11:29:44',
            ),
            5 =>
            array (
                'id' => 6,
                'bank_code' => 'TMB',
            'bank_name' => 'ธ.ทหารไทย(มหาชน)',
                'bank_icons' => 'storage/logo/tmb.png',
                'created_at' => '2019-02-06 11:29:44',
                'updated_at' => '2019-02-06 11:29:44',
            ),
            6 =>
            array (
                'id' => 7,
                'bank_code' => 'SCB',
            'bank_name' => 'ธ.ไทยพาณิชย์(มหาชน)',
                'bank_icons' => 'storage/logo/scb.png',
                'created_at' => '2019-02-06 11:29:44',
                'updated_at' => '2019-02-06 11:29:44',
            ),
            7 =>
            array (
                'id' => 8,
                'bank_code' => 'TBANK',
                'bank_name' => 'ธ.ธนชาติ',
                'bank_icons' => 'storage/logo/thanachartbank.png',
                'created_at' => '2019-02-06 11:29:44',
                'updated_at' => '2019-02-06 11:29:44',
            ),
            8 =>
            array (
                'id' => 9,
                'bank_code' => 'GSB',
                'bank_name' => 'ธ.ออมสิน',
                'bank_icons' => 'storage/logo/gsb.png',
                'created_at' => '2019-02-06 11:29:44',
                'updated_at' => '2019-02-06 11:29:44',
            ),
            9 =>
            array (
                'id' => 10,
                'bank_code' => 'GHB',
                'bank_name' => 'ธ.อาคารสงเคราะห์',
                'bank_icons' => 'storage/logo/ghbank.png',
                'created_at' => '2019-02-06 11:29:44',
                'updated_at' => '2019-02-06 11:29:44',
            ),
            10 =>
            array (
                'id' => 11,
                'bank_code' => 'IBank',
                'bank_name' => 'ธ.อิสลามแห่งประเทศไทย',
                'bank_icons' => 'storage/logo/ibank.png',
                'created_at' => '2019-02-06 11:29:44',
                'updated_at' => '2019-02-06 11:29:44',
            ),
            11 =>
            array (
                'id' => 12,
                'bank_code' => 'BAAC',
                'bank_name' => 'ธ.เพื่อการเกษตรและสหกรณ์การเกษตร',
                'bank_icons' => 'storage/logo/baac.png',
                'created_at' => '2019-02-06 11:29:44',
                'updated_at' => '2019-02-06 11:29:44',
            ),
            12 =>
            array (
                'id' => 13,
                'bank_code' => 'CIMB',
            'bank_name' => 'ธ.ซีไอเอ็มบีไทย จำกัด (มหาชน)',
                'bank_icons' => 'storage/logo/cimb.png',
                'created_at' => '2019-02-06 11:29:44',
                'updated_at' => '2019-02-06 11:29:44',
            ),
            13 =>
            array (
                'id' => 14,
                'bank_code' => 'LHBANK',
            'bank_name' => 'ธ.แลนด์ & เฮ้าท์เพื่อรายย่อย จำกัด (มหาชน)',
                'bank_icons' => 'storage/logo/lhbank.png',
                'created_at' => '2019-02-06 11:29:44',
                'updated_at' => '2019-02-06 11:29:44',
            ),
            14 =>
            array (
                'id' => 15,
                'bank_code' => 'KK',
            'bank_name' => 'ธ.เกียรตินาคิน จำกัด (มหาชน)',
                'bank_icons' => 'storage/logo/kk.png',
                'created_at' => '2019-02-06 11:29:44',
                'updated_at' => '2019-02-06 11:29:44',
            ),
            15 =>
            array (
                'id' => 16,
                'bank_code' => 'ICBC',
            'bank_name' => 'ธ.ไอซีบีซี (ไทย)',
                'bank_icons' => 'storage/logo/icbcthai.png',
                'created_at' => '2019-02-06 11:29:44',
                'updated_at' => '2019-02-06 11:29:44',
            ),
            16 =>
            array (
                'id' => 17,
                'bank_code' => 'SCBT',
            'bank_name' => 'ธ.สแตนดาร์ดชาร์เตอร์ด(ไทย)',
                'bank_icons' => 'storage/logo/sc.png',
                'created_at' => '2019-02-06 11:29:44',
                'updated_at' => '2019-02-06 11:29:44',
            ),
            17 =>
            array (
                'id' => 18,
                'bank_code' => 'UOBT',
            'bank_name' => 'ธ.ยูโอบี จำกัด (มหาชน)',
                'bank_icons' => 'storage/logo/uob.png',
                'created_at' => '2019-02-06 11:29:44',
                'updated_at' => '2019-02-06 11:29:44',
            ),
            18 =>
            array (
                'id' => 19,
                'bank_code' => 'promptpay',
                'bank_name' => 'promptpay POOLSHOPBKK',
                'bank_icons' => 'storage/logo/promptpay.png',
                'created_at' => '2019-02-06 11:29:44',
                'updated_at' => '2019-02-06 11:29:44',
            ),
        ));


    }
}

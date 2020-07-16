<?php

use Illuminate\Database\Seeder;

class ProductMasterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('product_master')->delete();

        \DB::table('product_master')->insert([
          [
          'id_product'=>1,
          'product_name'=>'Purapool Chlorinators',
          'id_category_product'=>1,
          'id_brand_product'=>1,
          'product_detail'=>'detail',
          'id_user'=>1,
          'stdel'=>1,
          'pic1_url'=>'1.png',
          'promotion_id'=>NULL,
          'product_code'=>'pc1',
          'pic2_url'=>'2.png',
          'pic3_url'=>'3.png',
          'pic4_url'=>'4.png',
          'pic5_url'=>'5.png',
          'price'=>6000,
          'product_instruction'=>'instruction',
          'product_warning'=>'warning'
          ,'stock_amount'=>5],



          [
          'id_product'=>2,
          'product_name'=>'Purapool Chlorinators 2',
          'id_category_product'=>1,
          'id_brand_product'=>1,
          'product_detail'=>'detail 2',
          'id_user'=>2,
          'stdel'=>1,
          'pic1_url'=>'1.png',
          'promotion_id'=>NULL,
          'product_code'=>'pc1',
          'pic2_url'=>'2.png',
          'pic3_url'=>'3.png',
          'pic4_url'=>'4.png',
          'pic5_url'=>'5.png',
          'price'=>7000,
          'product_instruction'=>'instruction 2',
          'product_warning'=>'warning 2'
          ,'stock_amount'=>5],



          [
          'id_product'=>3,
          'product_name'=>'Purapool Chlorinators 3',
          'id_category_product'=>1,
          'id_brand_product'=>1,
          'product_detail'=>'detail 3',
          'id_user'=>2,
          'stdel'=>1,
          'pic1_url'=>'2.png',
          'promotion_id'=>NULL,
          'product_code'=>'pc1',
          'pic2_url'=>'1.png',
          'pic3_url'=>'3.png',
          'pic4_url'=>'4.png',
          'pic5_url'=>'5.png',
          'price'=>6500,
          'product_instruction'=>'instruction 2',
          'product_warning'=>'warning 2'
          ,'stock_amount'=>5],



          [
          'id_product'=>4,
          'product_name'=>'Purapool Chlorinators 4',
          'id_category_product'=>1,
          'id_brand_product'=>1,
          'product_detail'=>'detail 4',
          'id_user'=>2,
          'stdel'=>1,
          'pic1_url'=>'3.png',
          'promotion_id'=>NULL,
          'product_code'=>'pc1',
          'pic2_url'=>'2.png',
          'pic3_url'=>'1.png',
          'pic4_url'=>'4.png',
          'pic5_url'=>'5.png',
          'price'=>6200,
          'product_instruction'=>'instruction 4',
          'product_warning'=>'warning 4'
          ,'stock_amount'=>5],



          [
          'id_product'=>5,
          'product_name'=>'KT Series',
          'id_category_product'=>2,
          'id_brand_product'=>5,
          'product_detail'=>'KT Series detail',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'KT_PU',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>12000,
          'product_instruction'=>'KT Series instruction',
          'product_warning'=>'KT Series warning'
          ,'stock_amount'=>5],



          [
          'id_product'=>6,
          'product_name'=>'SWIM Series',
          'id_category_product'=>2,
          'id_brand_product'=>3,
          'product_detail'=>'SWIM Series Detail',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'SWIM_',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>17500,
          'product_instruction'=>'SWIM Series Instruction',
          'product_warning'=>'SWIM Series Warning'
          ,'stock_amount'=>5],



          [
          'id_product'=>7,
          'product_name'=>'SWPB Series',
          'id_category_product'=>2,
          'id_brand_product'=>4,
          'product_detail'=>'SWPB Series detail',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'SWPB_',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>12000,
          'product_instruction'=>'SWPB Series instruction',
          'product_warning'=>'SWPB Series warning'
          ,'stock_amount'=>5],



          [
          'id_product'=>8,
          'product_name'=>'Super II Series',
          'id_category_product'=>2,
          'id_brand_product'=>1,
          'product_detail'=>'Super II Series',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'Super',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>42000,
          'product_instruction'=>'Super II Series',
          'product_warning'=>'Super II Series'
          ,'stock_amount'=>5],



          [
          'id_product'=>9,
          'product_name'=>'SUPA Series',
          'id_category_product'=>2,
          'id_brand_product'=>5,
          'product_detail'=>'SUPA Series Detail',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'SUPA_',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>12000,
          'product_instruction'=>'SUPA Series Instruction',
          'product_warning'=>'SUPA Series Warning'
          ,'stock_amount'=>5],



          [
          'id_product'=>10,
          'product_name'=>'TDA Series',
          'id_category_product'=>2,
          'id_brand_product'=>4,
          'product_detail'=>'TDA Series Detail',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'TDA_P',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>13500,
          'product_instruction'=>'TDA Series Instruction',
          'product_warning'=>'TDA Series Warning'
          ,'stock_amount'=>5],



          [
          'id_product'=>11,
          'product_name'=>'BX High Performance Pump',
          'id_category_product'=>2,
          'id_brand_product'=>3,
          'product_detail'=>'BX High Performance Pump Detail',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'BX_Pu',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>17500,
          'product_instruction'=>'BX High Performance Pump Instruction',
          'product_warning'=>'BX High Performance Pump Warning'
          ,'stock_amount'=>5],



          [
          'id_product'=>12,
          'product_name'=>'WP Series',
          'id_category_product'=>1,
          'id_brand_product'=>2,
          'product_detail'=>'WP Series Detail',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'WP_Pu',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>12000,
          'product_instruction'=>'WP Series instruction',
          'product_warning'=>'WP Series warning'
          ,'stock_amount'=>5],



          [
          'id_product'=>13,
          'product_name'=>'FB Series',
          'id_category_product'=>3,
          'id_brand_product'=>5,
          'product_detail'=>'FB Series Detail',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FB_Fi',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>9999,
          'product_instruction'=>'FB Series instruction',
          'product_warning'=>'FB Series warning'
          ,'stock_amount'=>5],



          [
          'id_product'=>14,
          'product_name'=>'Purachlor BLU',
          'id_category_product'=>1,
          'id_brand_product'=>1,
          'product_detail'=>'\"Pristine water. Purachlor® BLU.\r\nOur top selling workhorse, Purachlor BLU generates chlorine automatically leaving your pool clean and healthy.Enjoy sparkling clear, germ and bacteria free water.\r\n\"',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'CHL1',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>6000,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>15,
          'product_name'=>'Purachlor GOLD',
          'id_category_product'=>1,
          'id_brand_product'=>1,
          'product_detail'=>'\"Big pools or high bather load. Purachlor® GOLD.\r\nHigh performance water treatment for extra large pool volumes or busy pools. Purachlor GOLD generates chlorine automatically leaving your pool clean and healthy.  Now with platinum grade E-cell.\r\n\"',
          'id_user'=>1,
          'stdel'=>1,
          'pic1_url'=>'1.png',
          'promotion_id'=>NULL,
          'product_code'=>'CHL7',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>6000,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>16,
          'product_name'=>'Purachlor GOLD',
          'id_category_product'=>1,
          'id_brand_product'=>1,
          'product_detail'=>'\"Big pools or high bather load. Purachlor® GOLD.\r\nHigh performance water treatment for extra large pool volumes or busy pools. Purachlor GOLD generates chlorine automatically leaving your pool clean and healthy.  Now with platinum grade E-cell.\r\n\"',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'CHL7',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>6000,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>17,
          'product_name'=>'Purachlor ECO',
          'id_category_product'=>1,
          'id_brand_product'=>1,
          'product_detail'=>'\"Super low salt. Purachlor® ECO.\r\nPurachlor ECO generates chlorine automatically leaving your pool clean and healthy. Now using 50% less salt with the same reliable cleaning power.\r\n\"',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'CHL4',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>6000,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>18,
          'product_name'=>'OXYGEN UV+30',
          'id_category_product'=>7,
          'id_brand_product'=>1,
          'product_detail'=>'\"Added ultraviolet protection. OXYGEN UV+.\r\nAll the benefits of Oxygen Minerale plus UV protection.  This Wonder unit also has a one touch Low Salt Mode for automatic chlorination. Perfect for pools with multi speed pumps or low circulation areas.\r\n\"',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'CHL10',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>6000,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>19,
          'product_name'=>'OXYGEN Mineral',
          'id_category_product'=>7,
          'id_brand_product'=>1,
          'product_detail'=>'\"Pure and natural, OXYGEN Minerale.\r\nImagine your pool as nature had intended, No chlorine smell or taste. No sore eyes or irritated skin. Pure Natural water. Enjoy your Pool or Spa without the potential health risks associated with harsh chemicals.\r\n\"',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'CHL8',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>6000,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>20,
          'product_name'=>'Purachlor SAL-ECO',
          'id_category_product'=>1,
          'id_brand_product'=>1,
          'product_detail'=>'\"Half the Salt! Purachlor® SAL-ECO.\r\nWith half the amount of salt, Purachlor SAL-ECO makes an even more environmentally friendly sanitation solution! Easily installed on standard filtration systems. For new construction and existing pools\r\n\"',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'CHL11',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>6000,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>21,
          'product_name'=>'Purachlor PURE GM',
          'id_category_product'=>1,
          'id_brand_product'=>1,
          'product_detail'=>'\"Eco freindly and economical. Purachlor® PURE GM.\r\nPurachlor PURE GM Uses current switch mode power supply technology coupled with Purapool\'s own Phase Reduction system. Just set and forget!\r\n\"',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'CHL12',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>6000,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>22,
          'product_name'=>'Purachlor SALSM',
          'id_category_product'=>1,
          'id_brand_product'=>1,
          'product_detail'=>'\"Our ever popular Classic!  Purachlor® SALSM.\r\nPurachlor SALSM Classic generates chlorine automatically leaving your pool clean and healthy. A true Workhorse ! Enjoy a safe, clean and clear swimming experience. Easy to set and operate, energy efficient, surge resistant and ultra reliable.  This amazing self cleaning unit also has a cover/ indoor mode!\r\n\"',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'CHL13',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>6000,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
            'id_product'=>23,
            'product_name'=>'OXY MINERAL',
            'id_category_product'=>1,
            'id_brand_product'=>1,
            'product_detail'=>'\"An enhanced bathing experience! Purapool® OXY MINERALE.\r\nImagine your pool as nature had intended, No chlorine smell or taste. No sore eyes or irritated skin. Pure Natural water. OXY MINERALE uses low levels of Himalayan mineral salts and a patented electrolysis process to generate \'active oxygen\', a highly efficient and non-toxic sanitizing agent.\r\n\"',
            'id_user'=>1,
            'stdel'=>0,
            'pic1_url'=>'1.jpg',
            'promotion_id'=>NULL,
            'product_code'=>'CHL18',
            'pic2_url'=>NULL,
            'pic3_url'=>NULL,
            'pic4_url'=>NULL,
            'pic5_url'=>NULL,
            'price'=>6000,
            'product_instruction'=>'-',
            'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>24,
          'product_name'=>'Water WIZARD',
          'id_category_product'=>1,
          'id_brand_product'=>1,
          'product_detail'=>'\"Sit back and watch the magic! Purachlor® WATER WIZARD™.\r\nNo more adding liquid chlorine to your pool. The popular Purachlor WATER WIZARD multipurpose convection system can be used on all types of existing above ground or in-ground swimming pools. A breeze to set and operate, power surge resistant and self-cleaning!\r\n\"',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'CHL20',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>6000,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>25,
          'product_name'=>'Purachlor 500SC',
          'id_category_product'=>1,
          'id_brand_product'=>1,
          'product_detail'=>'Our systems are suitable for any water treatment installation that requires chlorine-dosing for sanitation. No longer add large quantities of liquid chlorine and save on storage & transport. Designed to be retrofitted into any pump room. NEVER ADD CHLORINE AGAIN! Save up to 80% of chemical costs over 5 years.',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'CHL-C',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>26,
          'product_name'=>'Purachlor ECO',
          'id_category_product'=>1,
          'id_brand_product'=>1,
          'product_detail'=>'Fresh and Natural! Automatically sanitizes your water leaving your pool fresh, clean and healthy. Keeps pool water sparkling clear and free of pathogens. Designed to be easily retrofitted into any existing pump room.',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'CHL-C',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>27,
          'product_name'=>'OXYGEN RESORT 500',
          'id_category_product'=>7,
          'id_brand_product'=>1,
          'product_detail'=>'Your pool as nature had intended, No chlorine smell or taste. No sore eyes or irritated skin.  Enjoy your swimming experience without the health risks associated with harsh chemicals. The OXYGEN RESORT Series uses next-generation Active Oxygen Fusion technology to create refreshing pure natural water.',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'CHL-C',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>28,
          'product_name'=>'PURASALTS',
          'id_category_product'=>7,
          'id_brand_product'=>1,
          'product_detail'=>'Sourced from the Himalayas, our pure and unpolluted rock salts contain 84 beneficial elements and minerals to help create a healthy balance in your body. For use with our full range of OXYGEN Systems',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'CHL-C',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>29,
          'product_name'=>'pH Perfector',
          'id_category_product'=>1,
          'id_brand_product'=>1,
          'product_detail'=>'\"pH Profector.\r\nAutomatically motitors and controls your water pH letting your pool system operate at maximum afficiency to create refreshing pure natural water.\"',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'CHL21',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>0,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>30,
          'product_name'=>'V Series',
          'id_category_product'=>3,
          'id_brand_product'=>1,
          'product_detail'=>'\"V Series - Top mount\r\nBobbin-wound firberglass reinforce tank is till the most popular standard in the industry after all. With UV-resistance surface finish, it is able to operete under prolong sunlight for years of reliability.\"',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'SF7',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>0,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>31,
          'product_name'=>'S Series',
          'id_category_product'=>3,
          'id_brand_product'=>4,
          'product_detail'=>'\"S Series - Side mount\r\nBobbin-wound firberglass reinforce tank is till the most popular standard in the industry after all. With UV-resistance surface finish, it is able to operete under prolong sunlight for years of reliability. Transparent lid is designed for easy inspection of sand bed.\"',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'SF13',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>0,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>32,
          'product_name'=>'Main drain Round Fitting',
          'id_category_product'=>6,
          'id_brand_product'=>1,
          'product_detail'=>'Round pool navel, 8 \"white, round-shaped ABS, 8\" diameter for closing the sewer under the pool floor. Available for free form swimming pools and rectangular pools. The product is made of ABS material that is tough and durable to use.',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT1',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>0,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>33,
          'product_name'=>'Main drain Square Fitting',
          'id_category_product'=>6,
          'id_brand_product'=>1,
          'product_detail'=>'Siam Pool 9″ x 9″ Square White Main Drain. Plastic ABS Grade A With UV Stabilized, Flow Rate 757 Liters/Minute.',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT2',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>0,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>34,
          'product_name'=>'Heavy duty surface skimmer',
          'id_category_product'=>6,
          'id_brand_product'=>6,
          'product_detail'=>'The heavy-duty skimmer can be used for residential and commercial swimming pools suitable for concrete pool, pipe size, joints 2\" flowrate standard 150 L / min',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT6',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>0,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>35,
          'product_name'=>'Air valve control fitting',
          'id_category_product'=>6,
          'id_brand_product'=>1,
          'product_detail'=>'Mini Air Vaive Control (Snap) 1 inch white color for turning the air volume into the jet spa head or jacuzzi head. Used for concrete spa tub systems.',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT7',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>0,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>36,
          'product_name'=>'Wall inlet 1.5\"',
          'id_category_product'=>6,
          'id_brand_product'=>7,
          'product_detail'=>'Eyeball inlet, Push fit for 2\" pipe.  ABS plastic with  UV stabilser.',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT8',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>0,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>37,
          'product_name'=>'Wall inlet 2\"',
          'id_category_product'=>6,
          'id_brand_product'=>6,
          'product_detail'=>'Standard Eyeball White Wall Inlet Fitting. Plastic ABS Grade A With UV Stabilized, Flow Rate 68 Liters/Minute. 1.5″ & 2″ glue fitting connection.',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT9',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>0,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>38,
          'product_name'=>'Wall inlet 2\"',
          'id_category_product'=>6,
          'id_brand_product'=>1,
          'product_detail'=>'Eyeball inlet, Push fit for 2\" pipe.  ABS plastic with  UV stabilser.',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT10',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>0,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>39,
          'product_name'=>'Floor inlet 1.5\"',
          'id_category_product'=>6,
          'id_brand_product'=>7,
          'product_detail'=>'Wall Return and Floor Inlet are manufactured from ABS and PVC plastic by injection moulding. The high quality of materials and the rigorous controls of production processes guarantee a long life for our equipment',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT11',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>0,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>40,
          'product_name'=>'Floor inlet 2\"',
          'id_category_product'=>6,
          'id_brand_product'=>6,
          'product_detail'=>'Wall Return and Floor Inlet are manufactured from ABS and PVC plastic by injection moulding. The high quality of materials and the rigorous controls of production processes guarantee a long life for our equipment',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT12',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>41,
          'product_name'=>'Standard vacuum (new model)',
          'id_category_product'=>6,
          'id_brand_product'=>1,
          'product_detail'=>'Wall Return and Floor Inlet are manufactured from ABS and PVC plastic by injection moulding. The high quality of materials and the rigorous controls of production processes guarantee a long life for our equipment',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT15',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>42,
          'product_name'=>'Spa Jets Fiting',
          'id_category_product'=>6,
          'id_brand_product'=>1,
          'product_detail'=>'Jet Body are manufactured from ABS and PVC plastic by injection moulding. The high quality of materials and the rigorous controls of production processes guarantee a long life for our equipment',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT17',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>43,
          'product_name'=>'Floor Bubbles Fittings Square',
          'id_category_product'=>6,
          'id_brand_product'=>6,
          'product_detail'=>'-',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT20',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>44,
          'product_name'=>'Air Switch',
          'id_category_product'=>6,
          'id_brand_product'=>8,
          'product_detail'=>'\"MPT Series transmitters\r\nwhich safely isolate the user from the electrical current. air transmitters provide the pulse air pressure needed to operate a remote air switch. The compact and afficient features of these transmitts are designed for hand actuation and operate Tecmark component witches from distance of up to 100 feet.\"',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT22',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>45,
          'product_name'=>'Junction Box',
          'id_category_product'=>1,
          'id_brand_product'=>1,
          'product_detail'=>'A small plastic junction box may form part of an electrical conduit or thermoplastic-sheathed cable (TPS) wiring system, to cover the junction box to prevent short circuits inside the box during an accidental fire.',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT24',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>46,
          'product_name'=>'Union 1.5\"',
          'id_category_product'=>6,
          'id_brand_product'=>6,
          'product_detail'=>'Union 3 piece set with O-Ring 1.5″ in White for pump & filters.',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT26',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>47,
          'product_name'=>'Union 2\"',
          'id_category_product'=>6,
          'id_brand_product'=>6,
          'product_detail'=>'Union 3 piece set with O-Ring 2″ in White for pump & filters.',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT28',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>48,
          'product_name'=>'Pressure Gauges',
          'id_category_product'=>6,
          'id_brand_product'=>1,
          'product_detail'=>'Oil pressure gauge is a mechanical instrument designed to measure the internal pressure and/or vacuum of sand filter unit',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT30',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>49,
          'product_name'=>'Flashing Fitting',
          'id_category_product'=>6,
          'id_brand_product'=>1,
          'product_detail'=>'impervious material installed to prevent the passage of water into a structure from a joint',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT32',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>50,
          'product_name'=>'Foot valve',
          'id_category_product'=>6,
          'id_brand_product'=>1,
          'product_detail'=>'UPVC Foot Valve with Socket BSPT NPT',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT33',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>51,
          'product_name'=>'Check valve 1.5 \"',
          'id_category_product'=>6,
          'id_brand_product'=>9,
          'product_detail'=>'ERA Valves, CPVC BALL CHECK VALVE, CBC02, (ASTM F1970), NSF-pw & UPC System: CPVC valves System Valve pressure rating 150 psi at 73°F water non-shock full-port, Maximum service temperature 180°F, Full port, EPDM O-rings, Includes both socket and female NPT thread end connections.',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT34',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>52,
          'product_name'=>'Check valve 2\"',
          'id_category_product'=>1,
          'id_brand_product'=>1,
          'product_detail'=>'ERA Valves, CPVC BALL CHECK VALVE, CBC02, (ASTM F1970), NSF-pw & UPC System: CPVC valves System Valve pressure rating 150 psi at 73°F water non-shock full-port, Maximum service temperature 180°F, Full port, EPDM O-rings, Includes both socket and female NPT thread end connections.',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT35',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>53,
          'product_name'=>'Swing Check valve 1.5\"',
          'id_category_product'=>1,
          'id_brand_product'=>10,
          'product_detail'=>'Valdus has marked thermoplastic pipe fittings, valves and piping. UPVC is one of the most popular thermoplastic materials used for pressure pipe work installations. Light in weight PVC-U has excellent resistance to chemicals and abrasion.',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT36',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>54,
          'product_name'=>'Swing Check valve 2\"',
          'id_category_product'=>6,
          'id_brand_product'=>10,
          'product_detail'=>'Valdus has marked thermoplastic pipe fittings, valves and piping. UPVC is one of the most popular thermoplastic materials used for pressure pipe work installations. Light in weight PVC-U has excellent resistance to chemicals and abrasion.',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT37',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>55,
          'product_name'=>'Ball valve 1.5\"',
          'id_category_product'=>6,
          'id_brand_product'=>11,
          'product_detail'=>'WD is a professional manufacturer for UPVC, CPVC, PPH piping system and duct system, and PPR piping systems. They are widely used for chemical processing plating, high purity application, portable water system, electronic industries,water and wastewater treatment, drainage and other application.',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT39',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>56,
          'product_name'=>'Ball valve 1.5\"',
          'id_category_product'=>6,
          'id_brand_product'=>9,
          'product_detail'=>'ERA Valves, PVC TRUE UNION BALL VALVE, UTB01, PN10 (F1970), NSF-pw & UPC System: Ball valve has dual o-ring stem design. May be installed on Sch. 40 or 80 PVC pipe These valves are ideal for the following applications: water parks, fountains, aquariums, light-duty chemical and waste water',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT40',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>57,
          'product_name'=>'Ball valve 2\"',
          'id_category_product'=>6,
          'id_brand_product'=>11,
          'product_detail'=>'WD is a professional manufacturer for UPVC, CPVC, PPH piping system and duct system, and PPR piping systems. They are widely used for chemical processing plating, high purity application, portable water system, electronic industries,water and wastewater treatment, drainage and other application.',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT41',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>58,
          'product_name'=>'Ball valve 2\"',
          'id_category_product'=>1,
          'id_brand_product'=>1,
          'product_detail'=>'ERA Valves, PVC TRUE UNION BALL VALVE, UTB01, PN10 (F1970), NSF-pw & UPC System: Ball valve has dual o-ring stem design. May be installed on Sch. 40 or 80 PVC pipe These valves are ideal for the following applications: water parks, fountains, aquariums, light-duty chemical and waste water',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT42',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>59,
          'product_name'=>'Grating Plastic ABS Standard Single connection',
          'id_category_product'=>6,
          'id_brand_product'=>12,
          'product_detail'=>'Curvable Grating is constructed of injection molded ABS and PVC. It can be curved and extended based on the pool layout. Modular grating for bends (42 pcs per meter). Individual unit slot together to form a flexible continuous run.',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT43',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>60,
          'product_name'=>'Stainless steel ladder',
          'id_category_product'=>6,
          'id_brand_product'=>12,
          'product_detail'=>'Made only in thicker grades of stainless steel to with stand heavier usage, recommended for heavy duty commercial use at pool. Reinforced with cross brace for extra strength and rigidity. For right commercial or residential pools.',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'FIT55',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>61,
          'product_name'=>'E-LUMEN Series',
          'id_category_product'=>5,
          'id_brand_product'=>1,
          'product_detail'=>'\"E-LUMEN Series LED Underwater Light\r\nWhit the best LED technology, Nicheless E-Lumen mounts directly on the wall for simple installation. Direct wall-mount design for simple installation. Concrete & Vinly pool compatible. Light-duty of power usage works well with any standard of your existing transformer.\"',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'LIT1',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>62,
          'product_name'=>'TP-100 Series',
          'id_category_product'=>1,
          'id_brand_product'=>4,
          'product_detail'=>'\"TP Series - LED Underwater Light\r\nResin-filles LED panel allows 100% water proofing. ABS + UV stabilizer. IP68 wall mount type. Cable 2.5 meters\"',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'LIT2',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>63,
          'product_name'=>'W1001 Series',
          'id_category_product'=>1,
          'id_brand_product'=>1,
          'product_detail'=>'Wall mount ABS, 18W, White color 6400K',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'LIT5',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>64,
          'product_name'=>'W2002 Series',
          'id_category_product'=>5,
          'id_brand_product'=>13,
          'product_detail'=>'Wall mount PC, fill epoxy, 18W, White color',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'LIT8',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>65,
          'product_name'=>'W2003 Series',
          'id_category_product'=>5,
          'id_brand_product'=>1,
          'product_detail'=>'Wall mount ABS, fill epoxy, 18W, White color',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'LIT9',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>66,
          'product_name'=>'S 100',
          'id_category_product'=>1,
          'id_brand_product'=>1,
          'product_detail'=>'\"Dolphin S Series\r\nMulti-layer filter hight efficient clog-free filtration. Powerstream mobility system enchance navigation, Multi-function energy-saver power supply, Lightweight easy to life and handle.\"',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'CLE1',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>67,
          'product_name'=>'S 200',
          'id_category_product'=>4,
          'id_brand_product'=>1,
          'product_detail'=>'\"Dolphin S Series\r\nMulti-layer filter hight efficient clog-free filtration. Swivel-cable tangle prevention system. Powerstream mobility system enchance navigation, Multi-function energy-saver power supply, Lightweight easy to life and handle.\"',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'CLE2',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>68,
          'product_name'=>'S 300i',
          'id_category_product'=>4,
          'id_brand_product'=>3,
          'product_detail'=>'\"Dolphin S Series\r\nMulti-layer filter hight efficient clog-free filtration. Swivel-cable tangle prevention system. Smart phon app-control. Powerstream mobility system enchance navigation, Multi-function energy-saver power supply, Lightweight easy to life and handle.\"',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'CLE3',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>69,
          'product_name'=>'Vacuum Head',
          'id_category_product'=>8,
          'id_brand_product'=>4,
          'product_detail'=>'14 \"Vacuum Head 14\" EMAUX brand for swimming pool floor cleaning Used together with aluminum sludge sucker and sludge suction line, made of white ABS. Durable quality material \"EMAUX\", European brand standard product.',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'CLE4',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>70,
          'product_name'=>'Leaf skimmer net',
          'id_category_product'=>8,
          'id_brand_product'=>1,
          'product_detail'=>'\"Hand Skimmers and Leaf Rakes are made of high quality PP and Nylon. The function is to collect the leaves and\r\nother objects in the swimming pool. Designed to attach with telescopic pole\"',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'CLE7',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>71,
          'product_name'=>'Brush',
          'id_category_product'=>8,
          'id_brand_product'=>4,
          'product_detail'=>'\"Plastic Brushes are made of high quality ABS and PP. They are used to brush the swimming pool walls regularly, in\r\norder to prevent the build up of algae. Designed to attach with telescopic pole.\"',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'CLE9',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>72,
          'product_name'=>'Premium vacuum hose',
          'id_category_product'=>8,
          'id_brand_product'=>1,
          'product_detail'=>'The Duraking spiral wound hose has a crush proof construction and is used by service professionals to manually vacuum the pools. The hose is known for their high quality, durable construction, UV protection and abrasion resistance',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'CLE11',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>1,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5],



          [
          'id_product'=>73,
          'product_name'=>'Telescopic Poles',
          'id_category_product'=>8,
          'id_brand_product'=>4,
          'product_detail'=>'Telescopic Poles are constructed of premium drawn aluminium tubing. With the wall thickness of 1.2mm, the OD and ID are 31.8mm and 29.4mm respectively. It comes with vinyl handle and user-friendly grip lock. Designed to work with hand skimmers, leaf rakes, brushes and vacuum heads.',
          'id_user'=>1,
          'stdel'=>0,
          'pic1_url'=>'1.jpg',
          'promotion_id'=>NULL,
          'product_code'=>'CLE20',
          'pic2_url'=>NULL,
          'pic3_url'=>NULL,
          'pic4_url'=>NULL,
          'pic5_url'=>NULL,
          'price'=>0,
          'product_instruction'=>'-',
          'product_warning'=>'-'
          ,'stock_amount'=>5]
          ]);
    }
}

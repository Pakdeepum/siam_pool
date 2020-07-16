-- Database Manager 4.2.5 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `about_us_master`;
CREATE TABLE `about_us_master` (
  `id_about_us` int(11) NOT NULL,
  `about_us_text_header` text COLLATE utf8mb4_unicode_ci,
  `about_us_content_1_header` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us_content_1_text_1` text COLLATE utf8mb4_unicode_ci,
  `about_us_content_1_text_2` text COLLATE utf8mb4_unicode_ci,
  `about_us_content_1_text_3` text COLLATE utf8mb4_unicode_ci,
  `about_us_content_1_text_4` text COLLATE utf8mb4_unicode_ci,
  `about_us_content_1_text_5` text COLLATE utf8mb4_unicode_ci,
  `about_us_content_1_pic_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us_content_2_header` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us_content_2_text_1` text COLLATE utf8mb4_unicode_ci,
  `about_us_content_2_text_2` text COLLATE utf8mb4_unicode_ci,
  `about_us_content_2_text_3` text COLLATE utf8mb4_unicode_ci,
  `about_us_content_2_text_4` text COLLATE utf8mb4_unicode_ci,
  `about_us_content_2_text_5` text COLLATE utf8mb4_unicode_ci,
  `about_us_content_2_pic_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_about_us`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `amphur`;
CREATE TABLE `amphur` (
  `amphur_id` int(11) NOT NULL AUTO_INCREMENT,
  `amphur_code` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amphur_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geo_id` int(11) NOT NULL DEFAULT '0',
  `province_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`amphur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `bank_information`;
CREATE TABLE `bank_information` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `bank_master`;
CREATE TABLE `bank_master` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bank_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_icons` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `brand_product_master`;
CREATE TABLE `brand_product_master` (
  `id_brand` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_pic_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stdel` int(11) DEFAULT '0',
  PRIMARY KEY (`id_brand`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `carousel`;
CREATE TABLE `carousel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carousel_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `category_product_master`;
CREATE TABLE `category_product_master` (
  `id_category_product` int(11) NOT NULL AUTO_INCREMENT,
  `category_product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_product_detail` text COLLATE utf8mb4_unicode_ci,
  `stdel` int(11) DEFAULT '0',
  `pic_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_category_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `category_promotion_master`;
CREATE TABLE `category_promotion_master` (
  `id_category_promotion` int(11) NOT NULL AUTO_INCREMENT,
  `category_promotion_name` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_promotion_detail` text COLLATE utf8mb4_unicode_ci,
  `stdel` int(11) DEFAULT '0',
  PRIMARY KEY (`id_category_promotion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `contact_us_master`;
CREATE TABLE `contact_us_master` (
  `id_contact_us` int(11) NOT NULL,
  `contact_us_text_header` text COLLATE utf8mb4_unicode_ci,
  `contact_us_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_us_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_us_address` text COLLATE utf8mb4_unicode_ci,
  `contact_us_facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_us_twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_us_instagram_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_us_phone1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_contact_us`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nicename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numcode` int(11) DEFAULT NULL,
  `phonecode` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `full_address` text COLLATE utf8mb4_unicode_ci,
  `province_id` int(11) DEFAULT '0',
  `district_id` int(11) DEFAULT '0',
  `amphur_id` int(11) DEFAULT '0',
  `postcode_id` int(11) DEFAULT '0',
  `geo_id` int(11) DEFAULT '0',
  `phone_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `delivery`;
CREATE TABLE `delivery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_charge` double(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `district`;
CREATE TABLE `district` (
  `district_id` int(11) NOT NULL AUTO_INCREMENT,
  `district_code` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amphur_id` int(11) NOT NULL DEFAULT '0',
  `province_id` int(11) NOT NULL DEFAULT '0',
  `geo_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `gennerate_key`;
CREATE TABLE `gennerate_key` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `index` int(11) NOT NULL DEFAULT '0',
  `prefix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `home_carousel_main_master`;
CREATE TABLE `home_carousel_main_master` (
  `id_home_carousel_main` int(11) NOT NULL AUTO_INCREMENT,
  `pic_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stdel` int(11) DEFAULT '0',
  PRIMARY KEY (`id_home_carousel_main`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `level_master`;
CREATE TABLE `level_master` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stdel` int(11) DEFAULT '0',
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `menu_master`;
CREATE TABLE `menu_master` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stdel` int(11) DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_amount` int(11) NOT NULL,
  `charge` double(10,4) NOT NULL DEFAULT '0.0000',
  `slip_image` text COLLATE utf8mb4_unicode_ci,
  `delivery_address` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `paid_date` datetime DEFAULT NULL,
  `paid_price` double(10,4) NOT NULL DEFAULT '0.0000',
  `paid_bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `send_type` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `post_codes`;
CREATE TABLE `post_codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `district_code` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `product_master`;
CREATE TABLE `product_master` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category_product` int(11) DEFAULT NULL,
  `id_brand_product` int(11) DEFAULT NULL,
  `product_detail` text COLLATE utf8mb4_unicode_ci,
  `id_user` int(11) DEFAULT NULL,
  `stdel` int(11) DEFAULT '0',
  `pic1_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promotion_id` int(11) DEFAULT '0',
  `product_code` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic2_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic3_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic4_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic5_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `product_instruction` text COLLATE utf8mb4_unicode_ci,
  `product_warning` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `product_master` (`id_product`, `product_name`, `id_category_product`, `id_brand_product`, `product_detail`, `id_user`, `stdel`, `pic1_url`, `promotion_id`, `product_code`, `pic2_url`, `pic3_url`, `pic4_url`, `pic5_url`, `price`, `product_instruction`, `product_warning`) VALUES
(1,	'Purapool Chlorinators',	1,	1,	'detail',	1,	0,	'1.png',	NULL,	'pc1',	'2.png',	'3.png',	'4.png',	'5.png',	6000,	'instruction',	'warning'),
(2,	'Purapool Chlorinators 2',	1,	1,	'detail 2',	2,	0,	'1.png',	NULL,	'pc1',	'2.png',	'3.png',	'4.png',	'5.png',	7000,	'instruction 2',	'warning 2'),
(3,	'Purapool Chlorinators 3',	1,	1,	'detail 3',	2,	0,	'2.png',	NULL,	'pc1',	'1.png',	'3.png',	'4.png',	'5.png',	6500,	'instruction 2',	'warning 2'),
(4,	'Purapool Chlorinators 4',	1,	1,	'detail 4',	2,	0,	'3.png',	NULL,	'pc1',	'2.png',	'1.png',	'4.png',	'5.png',	6200,	'instruction 4',	'warning 4'),
(5,	'KT Series',	2,	5,	'KT Series detail',	1,	0,	'1.png',	NULL,	'KT_PU',	NULL,	NULL,	NULL,	NULL,	12000,	'KT Series instruction',	'KT Series warning'),
(6,	'SWIM Series',	2,	3,	'SWIM Series Detail',	1,	0,	'1.png',	NULL,	'SWIM_',	NULL,	NULL,	NULL,	NULL,	17500,	'SWIM Series Instruction',	'SWIM Series Warning'),
(7,	'SWPB Series',	2,	4,	'SWPB Series detail',	1,	0,	'1.png',	NULL,	'SWPB_',	NULL,	NULL,	NULL,	NULL,	12000,	'SWPB Series instruction',	'SWPB Series warning'),
(8,	'Super II Series',	2,	1,	'Super II Series',	1,	0,	'1.png',	NULL,	'Super',	NULL,	NULL,	NULL,	NULL,	42000,	'Super II Series',	'Super II Series'),
(9,	'SUPA Series',	2,	5,	'SUPA Series Detail',	1,	0,	'1.png',	NULL,	'SUPA_',	NULL,	NULL,	NULL,	NULL,	12000,	'SUPA Series Instruction',	'SUPA Series Warning'),
(10,	'TDA Series',	2,	4,	'TDA Series Detail',	1,	0,	'1.png',	NULL,	'TDA_P',	NULL,	NULL,	NULL,	NULL,	13500,	'TDA Series Instruction',	'TDA Series Warning'),
(11,	'BX High Performance Pump',	2,	3,	'BX High Performance Pump Detail',	1,	0,	'1.png',	NULL,	'BX_Pu',	NULL,	NULL,	NULL,	NULL,	17500,	'BX High Performance Pump Instruction',	'BX High Performance Pump Warning'),
(12,	'WP Series',	2,	2,	'WP Series Detail',	1,	0,	'1.png',	NULL,	'WP_Pu',	NULL,	NULL,	NULL,	NULL,	12000,	'WP Series instruction',	'WP Series warning'),
(13,	'FB Series',	3,	5,	'FB Series Detail',	1,	0,	'1.png',	NULL,	'FB_Fi',	NULL,	NULL,	NULL,	NULL,	9999,	'FB Series instruction',	'FB Series warning'),
(14,	'Purachlor BLU',	1,	1,	'\"Pristine water. Purachlor® BLU.\r\nOur top selling workhorse, Purachlor BLU generates chlorine automatically leaving your pool clean and healthy.Enjoy sparkling clear, germ and bacteria free water.\r\n\"',	1,	0,	'1.png',	NULL,	'CHL1',	NULL,	NULL,	NULL,	NULL,	6000,	'-',	'-'),
(15,	'Purachlor GOLD',	1,	1,	'\"Big pools or high bather load. Purachlor® GOLD.\r\nHigh performance water treatment for extra large pool volumes or busy pools. Purachlor GOLD generates chlorine automatically leaving your pool clean and healthy.  Now with platinum grade E-cell.\r\n\"',	1,	1,	'1.png',	NULL,	'CHL7',	NULL,	NULL,	NULL,	NULL,	6000,	'-',	'-'),
(16,	'Purachlor GOLD',	1,	1,	'\"Big pools or high bather load. Purachlor® GOLD.\r\nHigh performance water treatment for extra large pool volumes or busy pools. Purachlor GOLD generates chlorine automatically leaving your pool clean and healthy.  Now with platinum grade E-cell.\r\n\"',	1,	0,	'1.png',	NULL,	'CHL7',	NULL,	NULL,	NULL,	NULL,	6000,	'-',	'-'),
(17,	'Purachlor ECO',	1,	1,	'\"Super low salt. Purachlor® ECO.\r\nPurachlor ECO generates chlorine automatically leaving your pool clean and healthy. Now using 50% less salt with the same reliable cleaning power.\r\n\"',	1,	0,	'1.png',	NULL,	'CHL4',	NULL,	NULL,	NULL,	NULL,	6000,	'-',	'-'),
(18,	'OXYGEN UV+30',	1,	1,	'\"Added ultraviolet protection. OXYGEN UV+.\r\nAll the benefits of Oxygen Minerale plus UV protection.  This Wonder unit also has a one touch Low Salt Mode for automatic chlorination. Perfect for pools with multi speed pumps or low circulation areas.\r\n\"',	1,	0,	'1.png',	NULL,	'CHL10',	NULL,	NULL,	NULL,	NULL,	6000,	'-',	'-'),
(19,	'OXYGEN Mineral',	1,	1,	'\"Pure and natural, OXYGEN Minerale.\r\nImagine your pool as nature had intended, No chlorine smell or taste. No sore eyes or irritated skin. Pure Natural water. Enjoy your Pool or Spa without the potential health risks associated with harsh chemicals.\r\n\"',	1,	0,	'1.png',	NULL,	'CHL8',	NULL,	NULL,	NULL,	NULL,	6000,	'-',	'-'),
(20,	'Purachlor SAL-ECO',	1,	1,	'\"Half the Salt! Purachlor® SAL-ECO.\r\nWith half the amount of salt, Purachlor SAL-ECO makes an even more environmentally friendly sanitation solution! Easily installed on standard filtration systems. For new construction and existing pools\r\n\"',	1,	0,	'1.png',	NULL,	'CHL11',	NULL,	NULL,	NULL,	NULL,	6000,	'-',	'-'),
(21,	'Purachlor PURE GM',	1,	1,	'\"Eco freindly and economical. Purachlor® PURE GM.\r\nPurachlor PURE GM Uses current switch mode power supply technology coupled with Purapool’s own Phase Reduction system. Just set and forget!\r\n\"',	1,	0,	'1.png',	NULL,	'CHL12',	NULL,	NULL,	NULL,	NULL,	6000,	'-',	'-'),
(22,	'Purachlor SALSM',	1,	1,	'\"Our ever popular Classic!  Purachlor® SALSM.\r\nPurachlor SALSM Classic generates chlorine automatically leaving your pool clean and healthy. A true Workhorse ! Enjoy a safe, clean and clear swimming experience. Easy to set and operate, energy efficient, surge resistant and ultra reliable.  This amazing self cleaning unit also has a cover/ indoor mode!\r\n\"',	1,	0,	'1.png',	NULL,	'CHL13',	NULL,	NULL,	NULL,	NULL,	6000,	'-',	'-'),
(23,	'OXY MINERAL',	1,	1,	'\"An enhanced bathing experience! Purapool® OXY MINERALE.\r\nImagine your pool as nature had intended, No chlorine smell or taste. No sore eyes or irritated skin. Pure Natural water. OXY MINERALE uses low levels of Himalayan mineral salts and a patented electrolysis process to generate ‘active oxygen’, a highly efficient and non-toxic sanitizing agent.\r\n\"',	1,	0,	'1.png',	NULL,	'CHL18',	NULL,	NULL,	NULL,	NULL,	6000,	'-',	'-'),
(24,	'Water WIZARD',	1,	1,	'\"Sit back and watch the magic! Purachlor® WATER WIZARD™.\r\nNo more adding liquid chlorine to your pool. The popular Purachlor WATER WIZARD multipurpose convection system can be used on all types of existing above ground or in-ground swimming pools. A breeze to set and operate, power surge resistant and self-cleaning!\r\n\"',	1,	0,	'1.png',	NULL,	'CHL20',	NULL,	NULL,	NULL,	NULL,	6000,	'-',	'-'),
(25,	'Purachlor 500SC',	1,	1,	'Our systems are suitable for any water treatment installation that requires chlorine-dosing for sanitation. No longer add large quantities of liquid chlorine and save on storage & transport. Designed to be retrofitted into any pump room. NEVER ADD CHLORINE AGAIN! Save up to 80% of chemical costs over 5 years.',	1,	0,	'1.png',	NULL,	'CHL-C',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(26,	'Purachlor ECO',	1,	1,	'Fresh and Natural! Automatically sanitizes your water leaving your pool fresh, clean and healthy. Keeps pool water sparkling clear and free of pathogens. Designed to be easily retrofitted into any existing pump room.',	1,	0,	'1.png',	NULL,	'CHL-C',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(27,	'OXYGEN RESORT 500',	1,	1,	'Your pool as nature had intended, No chlorine smell or taste. No sore eyes or irritated skin.  Enjoy your swimming experience without the health risks associated with harsh chemicals. The OXYGEN RESORT Series uses next-generation Active Oxygen Fusion technology to create refreshing pure natural water.',	1,	0,	'1.png',	NULL,	'CHL-C',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(28,	'PURASALTS',	1,	1,	'Sourced from the Himalayas, our pure and unpolluted rock salts contain 84 beneficial elements and minerals to help create a healthy balance in your body. For use with our full range of OXYGEN Systems',	1,	0,	'1.png',	NULL,	'CHL-C',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(29,	'pH Perfector',	1,	1,	'\"pH Profector.\r\nAutomatically motitors and controls your water pH letting your pool system operate at maximum afficiency to create refreshing pure natural water.\"',	1,	0,	'1.jpg',	NULL,	'CHL21',	NULL,	NULL,	NULL,	NULL,	0,	'-',	'-'),
(30,	'V Series',	3,	4,	'\"V Series - Top mount\r\nBobbin-wound firberglass reinforce tank is till the most popular standard in the industry after all. With UV-resistance surface finish, it is able to operete under prolong sunlight for years of reliability.\"',	1,	0,	'1.jpg',	NULL,	'SF7',	NULL,	NULL,	NULL,	NULL,	0,	'-',	'-'),
(31,	'S Series',	3,	4,	'\"S Series - Side mount\r\nBobbin-wound firberglass reinforce tank is till the most popular standard in the industry after all. With UV-resistance surface finish, it is able to operete under prolong sunlight for years of reliability. Transparent lid is designed for easy inspection of sand bed.\"',	1,	0,	'1.jpg',	NULL,	'SF13',	NULL,	NULL,	NULL,	NULL,	0,	'-',	'-'),
(32,	'Main drain Round Fitting',	6,	6,	'Round pool navel, 8 \"white, round-shaped ABS, 8\" diameter for closing the sewer under the pool floor. Available for free form swimming pools and rectangular pools. The product is made of ABS material that is tough and durable to use.',	1,	0,	'1.jpg',	NULL,	'FIT1',	NULL,	NULL,	NULL,	NULL,	0,	'-',	'-'),
(33,	'Main drain Square Fitting',	6,	6,	'Siam Pool 9″ x 9″ Square White Main Drain. Plastic ABS Grade A With UV Stabilized, Flow Rate 757 Liters/Minute.',	1,	0,	'1.jpg',	NULL,	'FIT2',	NULL,	NULL,	NULL,	NULL,	0,	'-',	'-'),
(34,	'Heavy duty surface skimmer',	6,	6,	'The heavy-duty skimmer can be used for residential and commercial swimming pools suitable for concrete pool, pipe size, joints 2\" flowrate standard 150 L / min',	1,	0,	'1.jpg',	NULL,	'FIT6',	NULL,	NULL,	NULL,	NULL,	0,	'-',	'-'),
(35,	'Air valve control fitting',	6,	6,	'Mini Air Vaive Control (Snap) 1 inch white color for turning the air volume into the jet spa head or jacuzzi head. Used for concrete spa tub systems.',	1,	0,	'1.jpg',	NULL,	'FIT7',	NULL,	NULL,	NULL,	NULL,	0,	'-',	'-'),
(36,	'Wall inlet 1.5\"',	6,	7,	'Eyeball inlet, Push fit for 2\" pipe.  ABS plastic with  UV stabilser.',	1,	0,	'1.jpg',	NULL,	'FIT8',	NULL,	NULL,	NULL,	NULL,	0,	'-',	'-'),
(37,	'Wall inlet 2\"',	6,	6,	'Standard Eyeball White Wall Inlet Fitting. Plastic ABS Grade A With UV Stabilized, Flow Rate 68 Liters/Minute. 1.5″ & 2″ glue fitting connection.',	1,	0,	'1.jpg',	NULL,	'FIT9',	NULL,	NULL,	NULL,	NULL,	0,	'-',	'-'),
(38,	'Wall inlet 2\"',	6,	7,	'Eyeball inlet, Push fit for 2\" pipe.  ABS plastic with  UV stabilser.',	1,	0,	'1.jpg',	NULL,	'FIT10',	NULL,	NULL,	NULL,	NULL,	0,	'-',	'-'),
(39,	'Floor inlet 1.5\"',	6,	7,	'Wall Return and Floor Inlet are manufactured from ABS and PVC plastic by injection moulding. The high quality of materials and the rigorous controls of production processes guarantee a long life for our equipment',	1,	0,	'1.jpg',	NULL,	'FIT11',	NULL,	NULL,	NULL,	NULL,	0,	'-',	'-'),
(40,	'Floor inlet 2\"',	6,	6,	'Wall Return and Floor Inlet are manufactured from ABS and PVC plastic by injection moulding. The high quality of materials and the rigorous controls of production processes guarantee a long life for our equipment',	1,	0,	'1.jpg',	NULL,	'FIT12',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(41,	'Standard vacuum (new model)',	6,	6,	'Wall Return and Floor Inlet are manufactured from ABS and PVC plastic by injection moulding. The high quality of materials and the rigorous controls of production processes guarantee a long life for our equipment',	1,	0,	'1.jpg',	NULL,	'FIT15',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(42,	'Spa Jets Fiting',	6,	6,	'Jet Body are manufactured from ABS and PVC plastic by injection moulding. The high quality of materials and the rigorous controls of production processes guarantee a long life for our equipment',	1,	0,	'1.jpg',	NULL,	'FIT17',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(43,	'Floor Bubbles Fittings Square',	6,	6,	'-',	1,	0,	'1.jpg',	NULL,	'FIT20',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(44,	'Air Switch',	6,	8,	'\"MPT Series transmitters\r\nwhich safely isolate the user from the electrical current. air transmitters provide the pulse air pressure needed to operate a remote air switch. The compact and afficient features of these transmitts are designed for hand actuation and operate Tecmark component witches from distance of up to 100 feet.\"',	1,	0,	'1.jpg',	NULL,	'FIT22',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(45,	'Junction Box',	6,	6,	'A small plastic junction box may form part of an electrical conduit or thermoplastic-sheathed cable (TPS) wiring system, to cover the junction box to prevent short circuits inside the box during an accidental fire.',	1,	0,	'1.jpg',	NULL,	'FIT24',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(46,	'Union 1.5\"',	6,	6,	'Union 3 piece set with O-Ring 1.5″ in White for pump & filters.',	1,	0,	'1.jpg',	NULL,	'FIT26',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(47,	'Union 2\"',	6,	6,	'Union 3 piece set with O-Ring 2″ in White for pump & filters.',	1,	0,	'1.jpg',	NULL,	'FIT28',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(48,	'Pressure Gauges',	6,	6,	'Oil pressure gauge is a mechanical instrument designed to measure the internal pressure and/or vacuum of sand filter unit',	1,	0,	'1.jpg',	NULL,	'FIT30',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(49,	'Flashing Fitting',	6,	6,	'impervious material installed to prevent the passage of water into a structure from a joint',	1,	0,	'1.jpg',	NULL,	'FIT32',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(50,	'Foot valve',	6,	7,	'UPVC Foot Valve with Socket BSPT NPT',	1,	0,	'1.jpg',	NULL,	'FIT33',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(51,	'Check valve 1.5 \"',	6,	9,	'ERA Valves, CPVC BALL CHECK VALVE, CBC02, (ASTM F1970), NSF-pw & UPC System: CPVC valves System Valve pressure rating 150 psi at 73°F water non-shock full-port, Maximum service temperature 180°F, Full port, EPDM O-rings, Includes both socket and female NPT thread end connections.',	1,	0,	'1.jpg',	NULL,	'FIT34',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(52,	'Check valve 2\"',	6,	9,	'ERA Valves, CPVC BALL CHECK VALVE, CBC02, (ASTM F1970), NSF-pw & UPC System: CPVC valves System Valve pressure rating 150 psi at 73°F water non-shock full-port, Maximum service temperature 180°F, Full port, EPDM O-rings, Includes both socket and female NPT thread end connections.',	1,	0,	'1.jpg',	NULL,	'FIT35',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(53,	'Swing Check valve 1.5\"',	6,	10,	'Valdus has marked thermoplastic pipe fittings, valves and piping. UPVC is one of the most popular thermoplastic materials used for pressure pipe work installations. Light in weight PVC-U has excellent resistance to chemicals and abrasion.',	1,	0,	'1.jpg',	NULL,	'FIT36',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(54,	'Swing Check valve 2\"',	6,	10,	'Valdus has marked thermoplastic pipe fittings, valves and piping. UPVC is one of the most popular thermoplastic materials used for pressure pipe work installations. Light in weight PVC-U has excellent resistance to chemicals and abrasion.',	1,	0,	'1.jpg',	NULL,	'FIT37',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(55,	'Ball valve 1.5\"',	6,	11,	'WD is a professional manufacturer for UPVC, CPVC, PPH piping system and duct system, and PPR piping systems. They are widely used for chemical processing plating, high purity application, portable water system, electronic industries,water and wastewater treatment, drainage and other application.',	1,	0,	'1.jpg',	NULL,	'FIT39',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(56,	'Ball valve 1.5\"',	6,	9,	'ERA Valves, PVC TRUE UNION BALL VALVE, UTB01, PN10 (F1970), NSF-pw & UPC System: Ball valve has dual o-ring stem design. May be installed on Sch. 40 or 80 PVC pipe These valves are ideal for the following applications: water parks, fountains, aquariums, light-duty chemical and waste water',	1,	0,	'1.jpg',	NULL,	'FIT40',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(57,	'Ball valve 2\"',	6,	11,	'WD is a professional manufacturer for UPVC, CPVC, PPH piping system and duct system, and PPR piping systems. They are widely used for chemical processing plating, high purity application, portable water system, electronic industries,water and wastewater treatment, drainage and other application.',	1,	0,	'1.jpg',	NULL,	'FIT41',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(58,	'Ball valve 2\"',	6,	9,	'ERA Valves, PVC TRUE UNION BALL VALVE, UTB01, PN10 (F1970), NSF-pw & UPC System: Ball valve has dual o-ring stem design. May be installed on Sch. 40 or 80 PVC pipe These valves are ideal for the following applications: water parks, fountains, aquariums, light-duty chemical and waste water',	1,	0,	'1.jpg',	NULL,	'FIT42',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(59,	'Grating Plastic ABS Standard Single connection',	6,	12,	'Curvable Grating is constructed of injection molded ABS and PVC. It can be curved and extended based on the pool layout. Modular grating for bends (42 pcs per meter). Individual unit slot together to form a flexible continuous run.',	1,	0,	'1.jpg',	NULL,	'FIT43',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(60,	'Stainless steel ladder',	6,	12,	'Made only in thicker grades of stainless steel to with stand heavier usage, recommended for heavy duty commercial use at pool. Reinforced with cross brace for extra strength and rigidity. For right commercial or residential pools.',	1,	0,	'1.jpg',	NULL,	'FIT55',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(61,	'E-LUMEN Series',	5,	4,	'\"E-LUMEN Series LED Underwater Light\r\nWhit the best LED technology, Nicheless E-Lumen mounts directly on the wall for simple installation. Direct wall-mount design for simple installation. Concrete & Vinly pool compatible. Light-duty of power usage works well with any standard of your existing transformer.\"',	1,	0,	'1.jpg',	NULL,	'LIT1',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(62,	'TP-100 Series',	5,	4,	'\"TP Series - LED Underwater Light\r\nResin-filles LED panel allows 100% water proofing. ABS + UV stabilizer. IP68 wall mount type. Cable 2.5 meters\"',	1,	0,	'1.jpg',	NULL,	'LIT2',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(63,	'W1001 Series',	1,	13,	'Wall mount ABS, 18W, White color 6400K',	1,	0,	'1.jpg',	NULL,	'LIT5',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(64,	'W2002 Series',	5,	13,	'Wall mount PC, fill epoxy, 18W, White color',	1,	0,	'1.jpg',	NULL,	'LIT8',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(65,	'W2003 Series',	5,	13,	'Wall mount ABS, fill epoxy, 18W, White color',	1,	0,	'1.jpg',	NULL,	'LIT9',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(66,	'S 100',	4,	3,	'\"Dolphin S Series\r\nMulti-layer filter hight efficient clog-free filtration. Powerstream mobility system enchance navigation, Multi-function energy-saver power supply, Lightweight easy to life and handle.\"',	1,	0,	'1.jpg',	NULL,	'CLE1',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(67,	'S 200',	4,	3,	'\"Dolphin S Series\r\nMulti-layer filter hight efficient clog-free filtration. Swivel-cable tangle prevention system. Powerstream mobility system enchance navigation, Multi-function energy-saver power supply, Lightweight easy to life and handle.\"',	1,	0,	'1.jpg',	NULL,	'CLE2',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(68,	'S 300i',	4,	3,	'\"Dolphin S Series\r\nMulti-layer filter hight efficient clog-free filtration. Swivel-cable tangle prevention system. Smart phon app-control. Powerstream mobility system enchance navigation, Multi-function energy-saver power supply, Lightweight easy to life and handle.\"',	1,	0,	'1.jpg',	NULL,	'CLE3',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(69,	'Vacuum Head',	7,	4,	'14 \"Vacuum Head 14\" EMAUX brand for swimming pool floor cleaning Used together with aluminum sludge sucker and sludge suction line, made of white ABS. Durable quality material \"EMAUX\", European brand standard product.',	1,	0,	'1.jpg',	NULL,	'CLE4',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(70,	'Leaf skimmer net',	7,	4,	'\"Hand Skimmers and Leaf Rakes are made of high quality PP and Nylon. The function is to collect the leaves and\r\nother objects in the swimming pool. Designed to attach with telescopic pole\"',	1,	0,	'1.jpg',	NULL,	'CLE7',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(71,	'Brush',	7,	4,	'\"Plastic Brushes are made of high quality ABS and PP. They are used to brush the swimming pool walls regularly, in\r\norder to prevent the build up of algae. Designed to attach with telescopic pole.\"',	1,	0,	'1.jpg',	NULL,	'CLE9',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(72,	'Premium vacuum hose',	7,	14,	'The Duraking spiral wound hose has a crush proof construction and is used by service professionals to manually vacuum the pools. The hose is known for their high quality, durable construction, UV protection and abrasion resistance',	1,	0,	'1.jpg',	NULL,	'CLE11',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-'),
(73,	'Telescopic Poles',	7,	4,	'Telescopic Poles are constructed of premium drawn aluminium tubing. With the wall thickness of 1.2mm, the OD and ID are 31.8mm and 29.4mm respectively. It comes with vinyl handle and user-friendly grip lock. Designed to work with hand skimmers, leaf rakes, brushes and vacuum heads.',	1,	0,	'1.jpg',	NULL,	'CLE20',	NULL,	NULL,	NULL,	NULL,	0,	'-',	'-'),
(74,	'Test Kit',	7,	15,	'\"Test Kits are guaranteed to manufacture under the best quality. The test kit allows you to measure the pH and\r\nchlorine levels of your pool water. Refill package is available\"',	1,	0,	'1.jpg',	NULL,	'CLE22',	NULL,	NULL,	NULL,	NULL,	1,	'-',	'-');

DROP TABLE IF EXISTS `promotion_master`;
CREATE TABLE `promotion_master` (
  `id_promotion` int(11) NOT NULL AUTO_INCREMENT,
  `promotion_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promotion_detail` text COLLATE utf8mb4_unicode_ci,
  `stdel` int(11) DEFAULT '0',
  `id_user` int(11) DEFAULT NULL,
  `date_upload` datetime DEFAULT NULL,
  `date_end_show` datetime DEFAULT NULL,
  `pic_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_category_promotion` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_promotion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `province`;
CREATE TABLE `province` (
  `province_id` int(11) NOT NULL AUTO_INCREMENT,
  `province_code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `geo_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`province_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `relate_menu_level`;
CREATE TABLE `relate_menu_level` (
  `id_relate` int(11) NOT NULL AUTO_INCREMENT,
  `id_level` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_relate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `review_master`;
CREATE TABLE `review_master` (
  `id_review` int(11) NOT NULL AUTO_INCREMENT,
  `pic_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stdel` int(11) DEFAULT '0',
  `id_product` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `review_detail` text COLLATE utf8mb4_unicode_ci,
  `name_review` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_review`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `special`;
CREATE TABLE `special` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `special_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `special_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double(10,4) NOT NULL DEFAULT '0.0000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` int(11) NOT NULL DEFAULT '0',
  `stdel` int(11) NOT NULL DEFAULT '0',
  `stpic` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `video_setting`;
CREATE TABLE `video_setting` (
  `id_video` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `video_url_embed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `stdel` int(11) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_video`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2019-06-12 06:03:57
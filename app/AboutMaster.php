<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutMaster extends Model
{
    public $timestamps = false;
    protected $table = "about_us_master";

    protected $fillable = [
        'about_us_text_header',
        'about_us_content_1_header',
        'about_us_content_1_text_1',
        'about_us_content_1_text_2',
        'about_us_content_1_text_3',
        'about_us_content_1_text_4',
        'about_us_content_1_text_5',
        'about_us_content_1_pic_url',
        'about_us_content_2_header',
        'about_us_content_2_text_1',
        'about_us_content_2_text_2',
        'about_us_content_2_text_3',
        'about_us_content_2_text_4',
        'about_us_content_2_text_5',
        'about_us_content_2_pic_url',
    ];
}

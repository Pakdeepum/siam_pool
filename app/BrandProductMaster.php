<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandProductMaster extends Model
{
    //
    public $timestamps = false;
    public  $table = "brand_product_master";
    public $primaryKey = 'id_brand';
    public function products(){
        return $this->hasMany('App\ProductMaster','id_brand_product','id_brand');
    }
}

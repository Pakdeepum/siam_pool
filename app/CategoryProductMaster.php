<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProductMaster extends Model
{ 
    public $timestamps = false;
    public  $table = "category_product_master";

    public function products(){
        return $this->hasMany('App\ProductMaster','id_category_product','id_category_product');
    }
}

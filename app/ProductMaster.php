<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductMaster extends Model
{
    public $timestamps = false;
    public $table = "product_master";
    public $primaryKey = 'id_category_product';
    
    public function orders(){
        return $this->belongsTo('App\Order');
    }

    public function category(){
        return $this->belongsToMany('App\CategoryProductMaster');
    }

    public function special(){
        return $this->hasMany('App\Special','id','promotion_id');
    }
}

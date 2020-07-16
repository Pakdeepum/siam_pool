<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Special extends Model
{
    //
    use SoftDeletes;
    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
   protected $dates = ['deleted_at'];
   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'special_name', 
       'special_image',
       'discount'
   ];
   
   protected $table = "special";

   public function products(){
       return $this->belongsTo('App\ProductMaster','promotion_id','id');
   }
}

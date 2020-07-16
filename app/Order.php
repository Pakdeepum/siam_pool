<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
   protected $dates = ['deleted_at'];
   /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'order';
   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'order_id',
       'product_id',
       'customer_id',
       'product_amount',
       'slip_image',
       'paid_date',
       'paid_price',
       'paid_bank',
       'status',
       'send_type',
       'charge','delivery_address',
       'description'
   ];

  public function user(){
      return $this->belongsTo('App\User','customer_id');
  }

  public function customers(){
  return $this->belongsTo('App\Customers','customer_id');
  }

  public function products(){
    return $this->hasMany('App\ProductMaster','id_product','product_id')->with('special');
  }
}

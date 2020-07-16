<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'customers';
   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'name',
       'lastname',
       'tel',
       'address',
       'province_id',
       'district_id',
       'amphur_id',
       'postcode_id',
       'phone_code',
       'id'
   ];

   public function users(){
       return $this->belongsTo("App\User", 'id');
   }

   public function orders(){
    return $this->hasMany("App\Order", 'id');
}
}

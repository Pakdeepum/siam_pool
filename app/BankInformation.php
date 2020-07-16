<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankInformation extends Model
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
   protected $table = 'bank_information';
   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'account_number',
       'account_name',
       'bank_code'
   ];
}

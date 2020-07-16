<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    const ADMIN_TYPE = 0;
    const DEFAULT_TYPE = 4;

    use Notifiable;
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
        'id',
        'name', 
        'email', 
        'email_verified_at',
        'password',
        'username',
        'roles',
        'access_token',
        'remember_token',
        'stpic',
        'stdel'
    ];
    protected $table = "users";
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function customers(){
        return $this->hasOne('App\Customers','id');
    }

    public function order(){
        return $this->hasMany('App\Order','customer_id');
    }
    public function currentUserId(){
            return $this->belongsTo('App\User', 'id');
        }
    public function isAdmin(){
        return $this->roles === self::ADMIN_TYPE;
    }
        
}

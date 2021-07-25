<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserAddress extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table="user_addresses";
    
    protected $fillable = [
            'user_id','type','contact_name','contact_no','address','address1','city','state','pincode','is_default','status'
    ];
	public function User(){
		return $this->hasOne(\App\User::class,'id','user_id');
	}
	public function City(){
		return $this->hasOne(\App\City::class,'id','city');
	}
	public function State(){
		return $this->hasOne(\App\State::class,'id','state');
	}

    
   
}

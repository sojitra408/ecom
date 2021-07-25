<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class OrderAddress extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table="order_addresses";
    
    protected $fillable = [
            'order_id','user_id','type','contact_name','contact_no','address','address1','city','state','pincode','is_default','status'
    ];
	public function Order(){
		return $this->hasOne(\App\Models\admin\orders::class,'id','order_id');
	}
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

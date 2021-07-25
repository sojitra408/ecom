<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodTurner extends Model
{
    protected $table='food_turners';
    protected $fillable=['product_id'];
	
	public function Products(){
		return $this->hasOne(\App\Products::class,'id','product_id');
	}
}

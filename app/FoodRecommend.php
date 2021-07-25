<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodRecommend extends Model
{
    protected $table='food_recommends';
    protected $fillable=['product_id'];
	
	public function Products(){
		return $this->hasOne(\App\Products::class,'id','product_id');
	}
}

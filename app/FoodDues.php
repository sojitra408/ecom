<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodDues extends Model
{
    protected $table='food_dues';
    protected $fillable=['product_id','category_id'];
	
	public function Products(){
		return $this->hasOne(\App\Products::class,'id','product_id');
	}
	public function Category(){
		return $this->hasOne(\App\Category::class,'id','category_id');
	}
}

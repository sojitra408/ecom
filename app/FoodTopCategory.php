<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodTopCategory extends Model
{
    protected $table='food_topcategories';
    protected $fillable=['category_id'];
	
	public function Category(){
		return $this->hasOne(\App\Category::class,'id','category_id');
	}
}

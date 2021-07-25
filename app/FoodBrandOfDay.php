<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodBrandOfDay extends Model
{
    protected $table='foodbrand_ofday';
    protected $fillable=['brand_id','price'];
	
	public function Brand(){
		return $this->hasOne(\App\Brand::class,'id','brand_id');
	}
}

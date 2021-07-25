<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodCateBrandSponsor extends Model
{
    protected $table='foodcate_brand_sponsor';
    protected $fillable=['product_id'];
	
	public function Products(){
		return $this->hasOne(\App\Products::class,'id','product_id');
	}
}

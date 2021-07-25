<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeautyCateBrandSponsor extends Model
{
    protected $table='beautycate_brand_sponsor';
    protected $fillable=['product_id'];
	
	public function Products(){
		return $this->hasOne(\App\Products::class,'id','product_id');
	}
}

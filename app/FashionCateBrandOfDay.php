<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FashionCateBrandOfDay extends Model
{
    protected $table='fashioncate_brand_ofday';
    protected $fillable=['brand_id'];
	
	public function Brand(){
		return $this->hasOne(\App\Brand::class,'id','brand_id');
	}
}
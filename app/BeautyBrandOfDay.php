<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeautyBrandOfDay extends Model
{
    protected $table='beautybrand_ofday';
    protected $fillable=['brand_id','price'];
	
	public function Brand(){
		return $this->hasOne(\App\Brand::class,'id','brand_id');
	}
}

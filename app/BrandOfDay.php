<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandOfDay extends Model
{
    protected $table='brand_ofday';
    protected $fillable=['brand_id'];
	
	public function Brand(){
		return $this->hasOne(\App\Brand::class,'id','brand_id');
	}
}

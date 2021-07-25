<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandSquare extends Model
{
    protected $table='brand_square';
    protected $fillable=['brand_id'];
	
	public function Brand(){
		return $this->hasOne(\App\Brand::class,'id','brand_id');
	}
}

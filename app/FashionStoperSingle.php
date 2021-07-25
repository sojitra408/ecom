<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FashionStoperSingle extends Model
{
    protected $table='fashioncate_stopersingle';
    protected $fillable=['brand_id'];
	
	public function Brand(){
		return $this->hasOne(\App\Brand::class,'id','brand_id');
	}
}

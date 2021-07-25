<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeautyRecommend extends Model
{
    protected $table='beauty_recommends';
    protected $fillable=['product_id'];
	
	public function Products(){
		return $this->hasOne(\App\Products::class,'id','product_id');
	}
}

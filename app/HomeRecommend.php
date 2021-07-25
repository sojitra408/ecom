<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeRecommend extends Model
{
    protected $table='home_recommends';
    protected $fillable=['product_id'];
	
	public function Products(){
		return $this->hasOne(\App\Products::class,'id','product_id');
	}
}

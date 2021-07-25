<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeSponsor extends Model
{
    protected $table='home_sponsors';
    protected $fillable=['product_id'];
	
	public function Products(){
		return $this->hasOne(\App\Products::class,'id','product_id');
	}
}

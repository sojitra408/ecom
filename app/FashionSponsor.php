<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FashionSponsor extends Model
{
    protected $table='fashion_sponsors';
    protected $fillable=['product_id'];
	
	public function Products(){
		return $this->hasOne(\App\Products::class,'id','product_id');
	}
}

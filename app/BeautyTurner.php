<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeautyTurner extends Model
{
    protected $table='beauty_turners';
    protected $fillable=['product_id'];
	
	public function Products(){
		return $this->hasOne(\App\Products::class,'id','product_id');
	}
}

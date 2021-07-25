<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beauty_Head_Turners_For_Little_Grown_Ups extends Model
{
    protected $table='beauty_head_turners_for_little_grown_ups';
    protected $fillable=['category_id'];
	
	public function Products(){
		return $this->hasOne(\App\Products::class,'id','product_id');
	}

}
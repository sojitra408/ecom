<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food_Head_Turners_For_Stoppers_In_City extends Model
{
    protected $table='food_head_turners_for_stoppers_in_city';
    protected $fillable=['category_id'];
	
	public function Products(){
		return $this->hasOne(\App\Products::class,'id','product_id');
	}

}
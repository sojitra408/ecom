<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food_Head_Turners_For_Dudes extends Model
{
    protected $table='food_head_turners_for_dudes';
    protected $fillable=['category_id'];
	
	public function Products(){
		return $this->hasOne(\App\Products::class,'id','product_id');
	}

}
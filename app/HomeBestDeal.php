<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeBestDeal extends Model
{
    protected $table='home_bestdeals';
    protected $fillable=['category_id'];
	
	public function Category(){
		return $this->hasOne(\App\Category::class,'id','category_id');
	}
}

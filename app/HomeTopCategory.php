<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeTopCategory extends Model
{
    protected $table='home_topcategories';
    protected $fillable=['category_id'];
	
	public function Category(){
		return $this->hasOne(\App\Category::class,'id','category_id');
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FashionTopCategory extends Model
{
    protected $table='fashion_topcategories';
    protected $fillable=['category_id'];
	
	public function Category(){
		return $this->hasOne(\App\Category::class,'id','category_id');
	}
}

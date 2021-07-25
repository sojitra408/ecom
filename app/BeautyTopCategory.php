<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeautyTopCategory extends Model
{
    protected $table='beauty_topcategories';
    protected $fillable=['category_id'];
	
	public function Category(){
		return $this->hasOne(\App\Category::class,'id','category_id');
	}
}

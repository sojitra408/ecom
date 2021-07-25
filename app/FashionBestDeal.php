<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FashionBestDeal extends Model
{
    protected $table='fashion_bestdeals';
    protected $fillable=['category_id'];
	
	public function Category(){
		return $this->hasOne(\App\Category::class,'id','category_id');
	}
}

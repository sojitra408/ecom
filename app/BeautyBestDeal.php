<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeautyBestDeal extends Model
{
    protected $table='beauty_bestdeals';
    protected $fillable=['category_id'];
	
	public function Category(){
		return $this->hasOne(\App\Category::class,'id','category_id');
	}
}

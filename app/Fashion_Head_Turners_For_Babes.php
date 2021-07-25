<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fashion_Head_Turners_For_Babes extends Model
{
    protected $table='fashion_head_turners_for_babes';
    protected $fillable=['category_id'];

	public function Category(){
		return $this->hasOne(\App\Category::class,'id','category_id');
	}
}
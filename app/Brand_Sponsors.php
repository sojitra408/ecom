<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand_Sponsors extends Model
{
    protected $table='brand_sponsors';
    protected $fillable=['brand_id','product_id'];
	
	public function Products(){
		return $this->hasOne(\App\Products::class,'id','product_id');
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSizeGuide extends Model
{
    protected $table="product_size_guide";
    protected $fillable = [
        'product_id','all_size_master_value_id','size_name','master_label','value_name','status','trash'
    ];

    protected $hidden = [
        
    ];
	
	public function All_Size_Master_Value(){
		return $this->hasOne(\App\All_Size_Master_Value::class,'id','master_label');
	}

   
}
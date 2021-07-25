<?php
namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
class VariantValues extends Model
{
    
protected $table = 'variant_values';
protected $fillable = ['product_id','variant_id','attribute_id','value_id','sku','status','trash'];

public function Products(){
		return $this->hasOne(\App\Products::class,'id','product_id');
	}
	public function ProductVariant(){
		return $this->hasOne(\App\ProductVariant::class,'id','variant_id');
	}
	public function Attributes(){
		return $this->hasOne(\App\Attributes::class,'id','attribute_id');
	}
	public function AttributeValue(){
		return $this->hasOne(\App\AttributeValue::class,'id','value_id');
	}
}
 
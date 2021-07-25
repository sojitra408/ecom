<?php
namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
class ProductVariant extends Model
{
    
protected $table = 'product_variants';
protected $fillable = ['variant_id','product_id','attribute_id','stock','mrp','offer_price','tsin','featured_image','gallery_image','sku','manu_date','expiry_type','no_of_days','expiry_date','status','trash'];

public function Products(){
		return $this->hasOne(\App\Products::class,'id','product_id');
	}
	public function Attributes(){
		return $this->hasOne(\App\Attributes::class,'id','attribute_id');
	}
}
 
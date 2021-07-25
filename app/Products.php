<?php
namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
class Products extends Model
{
    
protected $table = 'products';
protected $fillable = ['company_id','brand_id','category_id','subcategory_id','sub_cate','sub_sub_cate','sku','tsin','ean_code','product_name','long_description','short_description','usp','tags','pack_type','weight','base_unit','gross_weight','length','breadth','height','master_carton','master_cartonL','master_cartonB','master_cartonH','net_weight','mrp','hsn_code','igst','sgst','cgst','place_origin','manuf_address','cc_address','cc_contact','cc_email','fssai','ingredients','how_to_use','nutrients','benifits','desclaimer','keywords','meta_desc','others','created_by','status','has_expiry','trash','return_allowed','exchange_allowed','attributes','size_guid','product_id','warranty','solematerial','product_type','inventory_type','country_origin','disclaimer','item_form'];

public function Brand(){
		return $this->hasOne(\App\Brand::class,'id','brand_id');
	}
	
	public function Category(){
		return $this->hasOne(\App\Category::class,'id','category_id');
	}
	
	


}
 
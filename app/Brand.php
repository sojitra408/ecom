<?php
namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
class Brand extends Model
{
    
protected $table = 'brand';
protected $fillable = ['brand_name','slug','seller_id','thumbnail','select_category','home_pic','banner','description','brand_seller_id','tag_ids','status','fssai_licence_number','brand_usp','live',];


    public function Seller()
    {
        return $this->hasOne(\App\Seller::class,'id','seller_id');
    }
}
 
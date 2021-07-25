<?php
namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
class ProductFeature extends Model
{
    
protected $table = 'product_features';
protected $fillable = ['feature_id','feature_values','product_id'];

public function Features(){
		return $this->hasOne(\App\Features::class,'id','feature_id');
	}
}
<?php
namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
class CategoryFeature extends Model
{
    
protected $table = 'category_features';
protected $fillable = ['feature_id','category_id','value_id','status','trash'];

public function Features(){
		return $this->hasOne(\App\Features::class,'id','feature_id');
	}
	public function Category(){
		return $this->hasOne(\App\Category::class,'id','category_id');
	}
	public function FeatureValue(){
		return $this->hasOne(\App\FeatureValue::class,'id','value_id');
	}
}
 
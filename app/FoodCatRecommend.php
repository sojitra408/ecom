<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodCatRecommend extends Model
{
	protected $table="foodcat_recommend";
    protected $fillable = ['brand_id'];

   
}

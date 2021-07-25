<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FashionCatRecommend extends Model
{
	protected $table="fashioncat_recommend";
    protected $fillable = ['brand_id'];

   
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fashion_Best_Deals_In_Town extends Model
{
    protected $table='fashion_best_deals_in_town';
    protected $fillable=['title','price','category_id','image'];
	
	
}

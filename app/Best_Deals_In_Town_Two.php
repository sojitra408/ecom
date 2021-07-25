<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Best_Deals_In_Town_Two extends Model
{
    protected $table='best_deals_in_town_two';
    protected $fillable=['title','price','category_id','image'];
	
	
}

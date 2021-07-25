<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodBanner extends Model
{
    protected $table='food_banners';
    protected $fillable=['title','left_image','left_image','description','heading','subheading','status','trash','created_by','updated_by'];
}

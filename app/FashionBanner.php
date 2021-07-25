<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FashionBanner extends Model
{
    protected $table='fashion_banners';
    protected $fillable=['title','left_image','left_image','description','heading','subheading','status','trash','created_by','updated_by'];
}

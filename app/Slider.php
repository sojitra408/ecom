<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table='sliders';
    protected $fillable=['title','left_image','left_image','description','heading','subheading','status','trash','created_by','updated_by'];
}

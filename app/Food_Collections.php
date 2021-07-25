<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food_Collections extends Model
{
    protected $table="food_collections";
    protected $fillable = [
        'collections_id',];

    protected $hidden = [
        
    ];
}

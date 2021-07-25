<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home_Collections extends Model
{
    protected $table="home_collections";
    protected $fillable = [
        'collections_id',];

    protected $hidden = [
        
    ];
}

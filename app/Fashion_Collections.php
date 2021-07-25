<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fashion_Collections extends Model
{
    protected $table="fashion_collections";
    protected $fillable = [
        'collections_id',];

    protected $hidden = [
        
    ];
}

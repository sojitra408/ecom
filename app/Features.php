<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class features extends Model
{
    protected $table="features";
    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        
    ];
}

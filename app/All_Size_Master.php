<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class All_Size_Master extends Model
{
    protected $table="all_size_master";
    protected $fillable = [
        'name','image',
    ];

    protected $hidden = [
        
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    protected $table="tags";
    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        
    ];
}

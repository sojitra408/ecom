<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HelpCenter extends Model
{
    protected $table="help_center";
    protected $fillable = [
        'question', 'answer','category_id',
    ];

    protected $hidden = [
        
    ];
}

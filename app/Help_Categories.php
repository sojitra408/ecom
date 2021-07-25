<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Help_Categories extends Model
{
	protected $table="help_categories";
    protected $fillable = [
        'name','parent_id',
    ];

    public function childs() {
           return $this->hasMany('App\Help_Categories','parent_id','id') ;
   }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
	protected $table="blogcategories";
    protected $fillable = [
        'name','attribute','thumbnail','banner','parent_id, slug'
    ];

    public function childs() {
           return $this->hasMany('App\BlogCategory','parent_id','id') ;
   }
}

<?php
namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
class Size_category extends Model
{
    
protected $table = 'size_category';
protected $fillable = ['name','status','trash',];
}
 
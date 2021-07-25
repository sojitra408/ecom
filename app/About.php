<?php
namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
class About extends Model
{
    
protected $table = 'about';
protected $fillable = ['title','date','description','link','image',];
}
 
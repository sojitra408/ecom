<?php
namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
class RefundOtp extends Model
{
    
protected $table = 'refund_otp';
protected $fillable = ['user_id','otp',];
}
 
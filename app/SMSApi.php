<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SMSApi extends Authenticatable
{
    use Notifiable;

     
public function sendSMS($mobile,$msg)
	 {
	 
	  
 

 
      $myURL = 'http://103.16.101.52:8080/sendsms/bulksms?';   
        $options = array("username"=>"oz07-soch","password"=>"pAxqy5eh","type"=>0,"dlr"=>"1","destination"=>$mobile,"source"=>"THSTHT","message"=>$msg);
     $myURL .= http_build_query($options,'','&');
     $myData = file_get_contents($myURL) or die(print_r(error_get_last()));
 

return 1;
  
 
 
 	 
	 }
}

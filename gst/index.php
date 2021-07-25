<?php
$gst='10DEFPK1653k1zq';
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://preprod.aadhaarapi.com/verify-gst-lite",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\n    \"gstin\":\"$gst\",\n    \"consent\":\"Y\",\n    \"consent_text\":\"rttr trtr trtrt trtre eeree reree ree\"\n} ",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json",
    "qt_api_key: 453e7c9a-435f-4a9f-8d93-9c8036cbad59",
    "qt_agency_id: 939bfa63-d284-4a51-a557-2a3594981666"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo "<pre>",print_r($response);die;

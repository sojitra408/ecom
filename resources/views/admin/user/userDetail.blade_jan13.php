<?php Use App\Helper\CommonFunction;?>
@extends('admin.layout')
@section('content')
<style>
.text{
  font-size: 18px;
    color: #00000080;
}
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
  <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users Detail</h1>
      
      </div>

      <!-- Content Row --> 
        <!-- Earnings (Monthly) Card Example --> 
        <div class="card border-left-primary shadow h-100 py-2 card-body"> 
            <div class="row no-gutters align-items-center"> 
              <div class="col-lg-12 mr-2"> 
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                  <p style="margin: 20px;font-size: 18px;"><b>Unique Id:-</b> {{CommonFunction::encryptId($users['id'])}}</p>
                </div>
              </div>
              <div class="col-lg-5 mr-2">  
                  <p><b>Name:-</b> {{$users['name']}} </p> 
              </div>
              <div class="col-lg-5 mr-2">  
                  <p><b>Email:-</b> {{$users['email']}} </p> 
              </div>
              <div class="col-lg-5 mr-2"> 
                  <p><b> Phone:-</b> {{$users['mobile']}}</p> 
              </div>
              <div class="col-lg-5 mr-2">  
                  <p><b>Entity:-</b> {{$users['entity']}}</p> 
              </div>
              <div class="col-lg-5 mr-2"> 
                  <p><b>Company:-</b> {{$users['company']}} </p> 
              </div>
              <div class="col-lg-6 mr-2">  
                  <p><b> Turnover:-</b> {{$users['turnover']}} </p> 
              </div>
              <div class="col-lg-5 mr-2"> 
                  <p><b>Password Value:-</b> {{$users['password_val']}} </p> 
              </div>
              <div class="col-lg-5 mr-2"> 
                  <p><b>OTP:-</b> {{$users['otp']}} </p> 
              </div>
              <div class="col-lg-5 mr-2"> 
                  <p><b> Brand:-</b> {{$users['brand']}} </p> 
              </div>
              <div class="col-lg-5 mr-2"> 
                  <p> <b>Website:-</b> {{$users['website']}}</p> 
              </div>
              <div class="col-lg-5 mr-2"> 
                  <p><b>Instagram:-</b> {{$users['insta']}} </p> 
              </div>
              <div class="col-lg-5 mr-2"> 
                  <p><b> User IP:-</b> {{$users['user_ip']}} </p> 
              </div>
              <div class="col-lg-5 mr-2"> 
                  <p><b> Registration Date:-</b> {{date('Y-m-d',strtotime($users['created_at']))}} </p> 
              </div>  
            </div> 
        </div> 
  </div>
    
@endsection
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  

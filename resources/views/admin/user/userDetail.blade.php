
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
                 
                </div>
              </div>
              <div class="col-lg-5 mr-2">  
                  <p><b>First Name:-</b> {{$users->first_name}} </p> 
              </div>
			  <div class="col-lg-5 mr-2">  
                  <p><b>Last Name:-</b> {{$users->last_name}} </p> 
              </div>
              <div class="col-lg-5 mr-2">  
                  <p><b>Email:-</b> {{$users['email']}} </p> 
              </div>
              <div class="col-lg-5 mr-2"> 
                  <p><b> Phone:-</b> {{$users['mobile']}}</p> 
              </div>
			 
              <div class="col-lg-5 mr-2"> 
                  <p><b>Password Value:-</b> {{$users['password_val']}} </p> 
              </div>
              <div class="col-lg-5 mr-2"> 
                  <p><b>City:-</b> {{$users['city']}} </p> 
              </div>
			   <div class="col-lg-5 mr-2"> 
                  <p><b>State:-</b> {{$users['state']}} </p> 
              </div>

              <div class="col-lg-5 mr-2"> 
                  <p><b> Registration Date:-</b> {{date('Y-m-d',strtotime($users['created_at']))}} </p> 
              </div>  
            </div> 
			<br><br>
			<div class="row no-gutters align-items-center"> 
              <div class="col-lg-12 mr-2"> 
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                <h1 class="h4 mb-0 text-gray-800">Addresses</h1>
                </div>
              </div>
			  <a class="btn btn-primary" href="{{route('address.create',$users->id)}}">Add New</a>
			 
			  </div>
			   <hr>
			  <br>
			  <div class="row no-gutters align-items-center"> 
			  @if(!$address->isEmpty())
				@foreach($address as $add) 
				@if($add->is_default==1)
			<div class="col-lg-12 mr-2">  
                  <p style="color:green;"><b>Default</b></p> 
              </div>
			  @endif
			  <div class="col-lg-5 mr-2">  
                  <p><b>Type:-</b>{{$add->type}}</p> 
              </div>
              <div class="col-lg-5 mr-2">  
                  <p><b>Contact Name:-</b> {{$add->contact_name}} </p> 
              </div>
			  <div class="col-lg-5 mr-2">  
                  <p><b>Contact Phone:-</b> {{$add->contact_no}} </p> 
              </div>
              <div class="col-lg-5 mr-2">  
                  <p><b>Address:-</b> {{$add->address}},{{$add->address1}},{{$add->city}},{{$add->state}} - {{$add->pincode}} </p> 
              </div>
			   <div class="col-lg-12 mr-2"> 
              <a class="btn btn-success" href="{{route('address.edit',$add->id)}}">Edit</a>
			   </div>
			  <hr>
			  @endforeach
			 @endif
              
            </div> 
        </div> 
  </div>
    
@endsection
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  

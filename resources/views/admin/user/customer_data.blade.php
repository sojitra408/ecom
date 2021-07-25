@extends('admin.layout')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
     <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users Data</h1>
          
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
				  @if(isset($result['company_data'][0]))
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$result['company_data'][0]->name}}</div>
                      <div class="text-xs mb-0  text-gray-400">Email:{{$result['company_data'][0]->email}}<br><span class="text-gray-600"> </span></div>
                      
                       <div class="text-xs mb-0  text-gray-400">Phone:{{$result['company_data'][0]->mobile}}<br><span class="text-gray-600"> </span></div>
                    </div>
					@endif
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            

            
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">My Profile</h6>
                 
                </div>
                <!-- Card Body -->
                <div class="card-body">
                 <div class="row">
    <div class="col-md-2 mb-3 small">
        <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Company Details</a>
  </li>
  <li class="nav-item" disabled>
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Bank Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">GST Details</a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" id="founder-tab" data-toggle="tab" href="#founder" role="tab" aria-controls="founder" aria-selected="false">Founder Details</a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" id="brand-tab" data-toggle="tab" href="#brand" role="tab" aria-controls="brand" aria-selected="false">Brand Details</a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" id="areturn-tab" data-toggle="tab" href="#areturn" role="tab" aria-controls="areturn" aria-selected="false">Address for Returns </a>
  </li>
  
  
  <li class="nav-item">
    <a class="nav-link" id="areturn-tab" data-toggle="tab" href="#contactdetails" role="tab" aria-controls="contactdetails" aria-selected="false">Contact Details </a>
  </li>
</ul>
    </div>
    <!-- /.col-md-4 -->
        <div class="col-md-10 small">
      <div class="tab-content" id="myTabContent">
        	@include('includes.messages')            
                  
        
  <div class="tab-pane fade  <?php echo(session('step1')==1)?'':'active show'?>" id="home" role="tabpanel" aria-labelledby="home-tab">
  <?php
  if(isset($result['company_data']) && count($result['company_data'])>0)
  {
  
  $company_name=$result['company_data'][0]->company_name;
  $type_of_entity=$result['company_data'][0]->type_of_entity;
  $cnn_no=$result['company_data'][0]->cnn_no;
  $date_of_incorporation	=$result['company_data'][0]->date_of_incorporation	;
  	$line_1=$result['company_data'][0]->line_1;
 	$line_2=$result['company_data'][0]->line_2;
 	$line_3=$result['company_data'][0]->line_3;
  	$landmark=$result['company_data'][0]->landmark;
  	$district=$result['company_data'][0]->district;
   	$city=$result['company_data'][0]->city;
    $state=$result['company_data'][0]->state;
	$pin=$result['company_data'][0]->pin;
	$district=$result['company_data'][0]->district;
	$fy_1_amount=$result['company_data'][0]->fy_1_amount;
	$fy_2_amount=$result['company_data'][0]->fy_2_amount;
	$fy_3_amount=$result['company_data'][0]->fy_3_amount;
	$pan_no=$result['company_data'][0]->pan_no;
	$tan_no=$result['company_data'][0]->tan_no;
	$u_aadhar=$result['company_data'][0]->u_aadhar;
	$start_up_no=$result['company_data'][0]->start_up_no;
	$company_linkedin=$result['company_data'][0]->company_linkedin;
	  
  
  }else{
   $company_name='';
   $type_of_entity='';
   $cnn_no='';
   $date_of_incorporation	='';
   $line_1='';
   $line_2='';
   $line_3='';
   $landmark='';
   $city='';
   $pin='';
   $state='';
   $district='';
   $fy_1_amount='';
   $fy_2_amount='';
   $fy_3_amount='';
   $pan_no='';
   $tan_no='';
   $start_up_no='';
   $start_up_no='';
   $company_linkedin='';
   $u_aadhar='';
  }
  
   ?>
    
   
 	 
	   
	    {{ csrf_field() }}
  <div class="form-group row">
    <label for="Type of Entity" class="col-4 col-form-label">Type of Entity</label> 
    <div class="col-8">
       <?php echo  $type_of_entity;?> 
    </div>
  </div>
  <div class="form-group row">
    <label for="Name of the company" class="col-4 col-form-label">Name of the company</label> 
    <div class="col-8">
      {{$company_name}} 
    </div>
  </div>
  <div class="form-group row">
    <label for="CIN or LLP-IN" class="col-4 col-form-label">CIN or LLP-IN</label> 
    <div class="col-8">
     {{$cnn_no}} 
    </div>
  </div>
  <div class="form-group row">
    <label for="Date of Incorporation" class="col-4 col-form-label">Date of Incorporation</label> 
    <div class="col-8">
      {{$date_of_incorporation}} 
    </div>
  </div>
  
  
  <div class="form-group row">
    <label for="Turnover Details" class="col-12 col-form-label">Address Details</label> 
    <div class="col-12">
        <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Line 1</label> 
    <div class="col-8">
      {{$line_1}} 
    </div>
  </div>
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Line 2</label> 
    <div class="col-8">
     {{$line_2}} 
    </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Line 3</label> 
    <div class="col-8">
     {{$line_3}} 
    </div>
  </div>
  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label">Landmark</label> 
    <div class="col-8">
      {{$landmark}} 
    </div>
  </div>
  <div class="form-group row">
    <label for="text4" class="col-4 col-form-label">City</label> 
    <div class="col-8">
     {{$city}} 
    </div>
  </div>
  <div class="form-group row">
    <label for="text5" class="col-4 col-form-label">District</label> 
    <div class="col-8">
      {{$district}} 
    </div>
  </div>
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">State</label> 
    <div class="col-8">
      Maharashtra 
    </div>
  </div>
  <div class="form-group row">
    <label for="text6" class="col-4 col-form-label">PIN</label> 
    <div class="col-8">
       {{$pin}} 
    </div>
  </div> 
        
    </div></div>
  
  <div class="form-group row">
    <label for="Turnover Details" class="col-12 col-form-label">Turnover Details</label> 
    <div class="col-12">
      <table class="table mb-0">
  
  <tbody>
    <tr>
    
      <td>FY 2019-20
</td>
      <td>      {{$fy_1_amount}} 
</td>
      <td>     
	  		<?php $filedata=array();?>
		        @if($user_files->getUserFile('fy_1_amount_doc',$result['company_data'][0]->user_id)!='')
				@php $filedata=$user_files->getUserFile('fy_1_amount_doc',$result['company_data'][0]->user_id);@endphp
				 <span class="small" style="color:green"><i class="fa fa-check" aria-hidden="true"></i> Document Uploaded</span>
				 

<iframe src="{{asset('storage/app/')}}/{{$filedata[0]->image_path}}" width="100%" style="height:100%"></iframe>;

 
				 @endif	   

  
	   
</td>
    </tr>
    <tr>
     
      <td>FY 2018-19
</td>
      <td> {{$fy_2_amount}} </td>
      <td>
	 @if($user_files->getUserFile('fy_2_amount_doc',$result['company_data'][0]->user_id)!='')
				@php $filedata=$user_files->getUserFile('fy_2_amount_doc',$result['company_data'][0]->user_id); @endphp
				 <span class="small" style="color:green"><i class="fa fa-check" aria-hidden="true"></i> Document Uploaded</span>
<iframe src="{{asset('storage/app/')}}/{{$filedata[0]->image_path}}" width="100%" style="height:100%"></iframe>;

				 @endif	  
	  </td>
    </tr>
    <tr>
      
      <td>FY 2017-18
</td>
      <td> {{$fy_3_amount}} </td>
      <td>  @if($user_files->getUserFile('fy_3_amount_doc',$result['company_data'][0]->user_id)!='')
	  @php $filedata=$user_files->getUserFile('fy_3_amount_doc',$result['company_data'][0]->user_id); @endphp
				 <span class="small" style="color:green"><i class="fa fa-check" aria-hidden="true"></i> Document Uploaded</span>
				 <iframe src="{{asset('storage/app/')}}/{{$filedata[0]->image_path}}" width="100%" style="height:100%"></iframe>;

				 @endif	
				</td>
    </tr>
  </tbody>
</table>
    </div>
  </div> 
  
  
   <div class="form-group row">
    <label for="Turnover Details" class="col-12 col-form-label">PAN</label> 
    <div class="col-12">
      <table class="table mb-0">
  
  <tbody>
    <tr>
    
    
      <td>     {{$pan_no}} 
</td>
      <td>     
	    @if($user_files->getUserFile('pan_doc',$result['company_data'][0]->user_id)!='')
		@php $filedata=$user_files->getUserFile('pan_doc',$result['company_data'][0]->user_id); @endphp
				 <span class="small" style="color:green"><i class="fa fa-check" aria-hidden="true"></i> Document Uploaded</span>
				 <iframe src="{{asset('storage/app/')}}/{{$filedata[0]->image_path}}" width="100%" style="height:100%"></iframe>;

				 @endif	 
	  
</td>
    </tr>
    
  </tbody>
</table>
    </div>
  </div> 
  
  
  
   <div class="form-group row">
    <label for="Turnover Details" class="col-12 col-form-label">TAN</label> 
    <div class="col-12">
     <table class="table mb-0 ">
  
  <tbody>
    <tr>
    
    
      <td>      {{$tan_no}} 
</td>
      <td>     
	 @if($user_files->getUserFile('tan_doc',$result['company_data'][0]->user_id)!='')
	 @php $filedata=$user_files->getUserFile('tan_doc',$result['company_data'][0]->user_id); @endphp
				 <span class="small" style="color:green"><i class="fa fa-check" aria-hidden="true"></i> Document Uploaded</span>
				 <iframe src="{{asset('storage/app/')}}/{{$filedata[0]->image_path}}" width="100%" style="height:100%"></iframe>;

				 @endif	   
</td>
    </tr>
    
  </tbody>
</table>
    </div>
  </div> 
  
    <div class="form-group row">
    <label for="Turnover Details" class="col-12 col-form-label">Udyog Aadhaar</label> 
    <div class="col-12">
     <table class="table mb-0 ">
  
  <tbody>
    <tr>
    
    
      <td>       {{$u_aadhar}} 
</td>
      <td>    
	    @if($user_files->getUserFile('u_aadhar_doc',$result['company_data'][0]->user_id)!='')
		 @php $filedata=$user_files->getUserFile('u_aadhar_doc',$result['company_data'][0]->user_id); @endphp
				 <span class="small" style="color:green"><i class="fa fa-check" aria-hidden="true"></i> Document Uploaded</span>
				 <iframe src="{{asset('storage/app/')}}/{{$filedata[0]->image_path}}" width="100%" style="height:100%"></iframe>;

				 @endif	
</td>
    </tr>
    
  </tbody>
</table>
    </div>
  </div> 
  
    <div class="form-group row">
    <label for="Turnover Details" class="col-12 col-form-label">Start-up India Registration number</label> 
    <div class="col-12">
     <table class="table mb-0 ">
  
  <tbody>
    <tr>
    
    
      <td>      {{$start_up_no}} 
</td>
      <td>     
	  
	    	@if($user_files->getUserFile('start_up_no_doc',$result['company_data'][0]->user_id)!='')
			 @php $filedata=$user_files->getUserFile('start_up_no_doc',$result['company_data'][0]->user_id); @endphp
				 <span class="small" style="color:green"><i class="fa fa-check" aria-hidden="true"></i> Document Uploaded</span>
				 <iframe src="{{asset('storage/app/')}}/{{$filedata[0]->image_path}}" width="100%" style="height:100%"></iframe>;

				 @endif	
</td>
    </tr>
    
  </tbody>
</table>
    </div>
  </div> 
  
   <div class="form-group row">
    <label for="CIN or LLP-IN" class="col-4 col-form-label">Company LinkedIn Page</label> 
    <div class="col-8">
      {{$company_linkedin}} 
    </div>
  </div>
  
  <div class="form-group row">
    <div class="offset-4 col-8">
	 
    </div>
  </div>
</form>
  </div>
  <div class="tab-pane fade <?php echo(session('step1')==1)?'active show':''?>" id="profile" role="tabpanel" aria-labelledby="profile-tab"><form class="pt-2"><div class="form-group row">
    <label for="Name of the company" class="col-4 col-form-label">Upload copy of cheque</label> 
    <div class="col-8">
     <input type="file" class="form-control-file form-control-sm "  id="exampleFormControlFile1">
    </div>
  </div>
  <div class="form-group row">
    <label for="CIN or LLP-IN" class="col-4 col-form-label">Name in bank account</label> 
    <div class="col-8">
      <input id="CIN or LLP-IN" name="CIN or LLP-IN" type="text" class="form-control form-control-sm" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="Date of Incorporation" class="col-4 col-form-label">Name of bank</label> 
    <div class="col-8">
      <input id="Date of Incorporation" name="Date of Incorporation" type="text" class="form-control form-control-sm" required="required">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="Date of Incorporation" class="col-4 col-form-label">Type of account</label> 
    <div class="col-8">
       <select id="select" name="select" class="form-control form-control-sm">
        <option value="Current">Current</option>
        <option value="Current">Savings</option>
      </select>
    </div>
  </div>
  
  <div class="form-group row">
    <label for="Date of Incorporation" class="col-4 col-form-label">Branch Address</label> 
    <div class="col-8">
      <textarea id="Date of Incorporation" name="Date of Incorporation" type="text" class="form-control form-control-sm" required="required"></textarea>
    </div>
  </div>
  
  <div class="form-group row">
    <label for="Date of Incorporation" class="col-4 col-form-label">IFSC</label> 
    <div class="col-8">
      <input id="Date of Incorporation" name="Date of Incorporation" type="text" class="form-control form-control-sm" required="required">
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary " style="padding:10px;">Next Step</button>
    </div>
  </div>
  </form>
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  <form class="pt-2">
                  
                  
  <div class="form-group row">
    <label for="Turnover Details" class="col-12 col-form-label">Address Details</label> 
    <div class="col-12">
        <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Line 1</label> 
    <div class="col-8">
      <input id="text" name="text" type="text" class="form-control form-control-sm">
    </div>
  </div>
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Line 2</label> 
    <div class="col-8">
      <input id="text1" name="text1" type="text" class="form-control form-control-sm">
    </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Line 3</label> 
    <div class="col-8">
      <input id="text2" name="text2" type="text" class="form-control form-control-sm">
    </div>
  </div>
  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label">Landmark</label> 
    <div class="col-8">
      <input id="text3" name="text3" type="text" class="form-control form-control-sm">
    </div>
  </div>
  <div class="form-group row">
    <label for="text4" class="col-4 col-form-label">City</label> 
    <div class="col-8">
      <input id="text4" name="text4" type="text" class="form-control form-control-sm">
    </div>
  </div>
  <div class="form-group row">
    <label for="text5" class="col-4 col-form-label">District</label> 
    <div class="col-8">
      <input id="text5" name="text5" type="text" class="form-control form-control-sm">
    </div>
  </div>
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">State</label> 
    <div class="col-8">
      <select id="select" name="select" class="form-control form-control-sm">
        <option value="maharashtra">Maharashtra</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="text6" class="col-4 col-form-label">PIN</label> 
    <div class="col-8">
      <input id="text6" name="text6" type="text" class="form-control form-control-sm">
    </div>
  </div> 
        <div class="form-group row">
    <label for="text6" class="col-12 col-form-label">GST Details </label> 
    <div class="col-12">
        
        <table class="table"><tr><td> <input id="text6" name="text6" type="text" class="form-control form-control-sm"></td><td><input type="file" class="form-control-file form-control-sm"  id="exampleFormControlFile1"></td> </tr></table>
     
    </div>
  </div> 
  
   <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary " style="padding:10px;">Next Step</button>
    </div>
  </div>
  
  
    </div></div>
    
    
                  
              </form>
  
  </div>
  
   <div class="tab-pane fade" id="founder" role="tabpanel" aria-labelledby="founder-tab">
  <form class="pt-2">
                  
                  
  <div class="form-group row">
    <label for="Turnover Details" class="col-12 col-form-label">Founder Details</label> 
    <div class="col-12">
        
 
        <div class="form-group row">
    <div class="col-12">
        
        <table class="table">
           <thead><tr><th> Full Name</th><th>Email</th> <th>Mobile</th> </tr>
            </thead> <tbody>
            <tr><td> <input id="text6" name="text6" type="text" class="form-control form-control-sm"></td><td><input id="text6" name="text6" type="email" class="form-control form-control-sm"></td> <td><input id="text6" name="text6" type="tel" class="form-control form-control-sm"></td> </tr></tbody></table>
     
    </div>
  </div> 
  
   <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary " style="padding:10px;">Next Step</button>
    </div>
  </div>
  
  
    </div></div>
    
    
                  
              </form>
  
  </div>
  
   <div class="tab-pane fade" id="brand" role="tabpanel" aria-labelledby="brand-tab">
  <form class="pt-2">
                  
                  
  <div class="form-group row">
    <label for="Turnover Details" class="col-12 col-form-label">Brand Details</label> 
    <div class="col-12 border">
        
 
        <div class="form-group row">
   
    <div class="col-6">
        <label for="text6" class="col-form-label">Name of the Brand</label> 
      <input id="text6" name="text6" type="text" class="form-control form-control-sm">
    </div>
    
    <div class="col-6">
        <label for="text6" class=" col-form-label">Brand Website</label> 
      <input id="text6" name="text6" type="text" class="form-control form-control-sm">
    </div>
 
   
    <div class="col-6">
        <label for="text6" class=" col-form-label">Brand Instagram Handle</label> 
      <input id="text6" name="text6" type="text" class="form-control form-control-sm">
    </div>
    
    <div class="col-6">
        <label for="text6" class=" col-form-label">Brand Facebook Page</label> 
      <input id="text6" name="text6" type="text" class="form-control form-control-sm">
    </div>
  
   
    <div class="col-6">
        <label for="text6" class="col-form-label">Brand LinkedIn Page</label> 
      <input id="text6" name="text6" type="text" class="form-control form-control-sm">
    </div>
    
    <div class="col-6">
        <label for="text6" class=" col-form-label">Brand YouTube Page</label> 
      <input id="text6" name="text6" type="text" class="form-control form-control-sm">
    </div>
    
    <div class="col-6">
        <label for="text6" class=" col-form-label">Category</label> 
     <select id="Type of Entity" name="Type of Entity" class="form-control  form-control-sm">
        <option value="Sole Proprietorship">Baby Products
</option>
        <option value="Partnerships-General and Limited">Beauty & Men's Grooming
</option>
        <option value="Limited Liability Company ">Fashion & Apparels
</option>

 <option value="Limited Liability Company ">Food & Beverages

</option>
        <option value="Corporation">Furnishing & D�cor
</option>
      </select>
    </div>
  </div> 
  
  
  
  
    </div>
   <div class="form-group row mt-3">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary " style="padding:10px;">Save</button>
    </div>
  </div></div>
    
    
                  
              </form>
  
  </div>
  
  
  
   <div class="tab-pane fade" id="areturn" role="tabpanel" aria-labelledby="areturn-tab">
  <form class="pt-2">
                  
                  
  <div class="form-group row">
    <label for="Turnover Details" class="col-12 col-form-label">Address for Returns</label> 
    <div class="col-12">
        
 
        <div class="form-group row">
    <div class="col-12">
        <div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="optradio">Same as Registered address
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="optradio">Same as Primary GST Address
  </label>
</div>
<div class="form-check-inline ">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="optradio" >Enter new address
  </label>
</div>
       
     
    </div>
  </div> 
  
  
  <div class="form-group row">
    <label for="Turnover Details" class="col-12 col-form-label">Address Details</label> 
    <div class="col-6">
        <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Line 1</label> 
    <div class="col-8">
      <input id="text" name="text" type="text" class="form-control form-control-sm">
    </div>
  </div></div>  <div class="col-6">
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Line 2</label> 
    <div class="col-8">
      <input id="text1" name="text1" type="text" class="form-control form-control-sm">
    </div>
  </div></div>  <div class="col-6">
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Line 3</label> 
    <div class="col-8">
      <input id="text2" name="text2" type="text" class="form-control form-control-sm">
    </div>
  </div></div>  <div class="col-6">
  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label">Landmark</label> 
    <div class="col-8">
      <input id="text3" name="text3" type="text" class="form-control form-control-sm">
    </div>
  </div></div>  <div class="col-6">
  <div class="form-group row">
    <label for="text4" class="col-4 col-form-label">City</label> 
    <div class="col-8">
      <input id="text4" name="text4" type="text" class="form-control form-control-sm">
    </div>
  </div></div>  <div class="col-6">
  <div class="form-group row">
    <label for="text5" class="col-4 col-form-label">District</label> 
    <div class="col-8">
      <input id="text5" name="text5" type="text" class="form-control form-control-sm">
    </div>
  </div></div>  <div class="col-6">
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">State</label> 
    <div class="col-8">
      <select id="select" name="select" class="form-control form-control-sm">
        <option value="maharashtra">Maharashtra</option>
      </select>
    </div>
  </div></div>  <div class="col-6">
  <div class="form-group row">
    <label for="text6" class="col-4 col-form-label">PIN</label> 
    <div class="col-8">
      <input id="text6" name="text6" type="text" class="form-control form-control-sm">
    </div>
  </div> 
        
    </div></div>
  
   <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary " style="padding:10px;">Next Step</button>
    </div>
  </div>
  
  
    </div></div>
    
    
                  
              </form>
  
  </div>
  
  
  
  
  
   <div class="tab-pane fade" id="contactdetails" role="tabpanel" aria-labelledby="contactdetails-tab">
  <form class="pt-2">
                  
                      
  <div class="form-group row">
    <label for="Turnover Details" class="col-12 col-form-label">Contact Details
</label> 
    <div class="col-12 ">
        
 
        <div class="form-group row">
    <div class="col-12"> <label for="" class="col-form-label font-weight-bold">CEO or Main point of contact for any escalations</label></div>
    <div class="col-4">
        <label for="text6" class="col-form-label">Name</label> 
      <input id="text6" name="text6" type="text" class="form-control form-control-sm">
    </div>
    
    <div class="col-4">
        <label for="text6" class=" col-form-label">Email</label> 
      <input id="text6" name="text6" type="text" class="form-control form-control-sm">
    </div>
 
   
    <div class="col-4">
        <label for="text6" class=" col-form-label">Mobile</label> 
      <input id="text6" name="text6" type="text" class="form-control form-control-sm">
    </div></div>
     <div class="form-group row">
  
     <div class="col-12"> <label for="" class="col-form-label font-weight-bold">Head � Accounts</label></div>
    <div class="col-4">
        <label for="text6" class="col-form-label">Name</label> 
      <input id="text6" name="text6" type="text" class="form-control form-control-sm">
    </div>
    
    <div class="col-4">
        <label for="text6" class=" col-form-label">Email</label> 
      <input id="text6" name="text6" type="text" class="form-control form-control-sm">
    </div>
 
   
    <div class="col-4">
        <label for="text6" class=" col-form-label">Mobile</label> 
      <input id="text6" name="text6" type="text" class="form-control form-control-sm">
    </div>
  </div> 
  
  
   <div class="form-group row">
  
     <div class="col-12"> <label for="" class="col-form-label font-weight-bold">Head � Marketing</label></div>
    <div class="col-4">
        <label for="text6" class="col-form-label">Name</label> 
      <input id="text6" name="text6" type="text" class="form-control form-control-sm">
    </div>
    
    <div class="col-4">
        <label for="text6" class=" col-form-label">Email</label> 
      <input id="text6" name="text6" type="text" class="form-control form-control-sm">
    </div>
 
   
    <div class="col-4">
        <label for="text6" class=" col-form-label">Mobile</label> 
      <input id="text6" name="text6" type="text" class="form-control form-control-sm">
    </div>
  </div> 
  
  
   <div class="form-group row">
  
     <div class="col-12"> <label for="" class="col-form-label font-weight-bold">Head � Operations</label></div>
    <div class="col-4">
        <label for="text6" class="col-form-label">Name</label> 
      <input id="text6" name="text6" type="text" class="form-control form-control-sm">
    </div>
    
    <div class="col-4">
        <label for="text6" class=" col-form-label">Email</label> 
      <input id="text6" name="text6" type="text" class="form-control form-control-sm">
    </div>
 
   
    <div class="col-4">
        <label for="text6" class=" col-form-label">Mobile</label> 
      <input id="text6" name="text6" type="text" class="form-control form-control-sm">
    </div>
  </div> 
  
  
  
    </div>
   <div class="form-group row mt-3">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary " style="padding:10px;">Save</button>
    </div>
  </div></div>
    
    
                  
              </form>
  
  </div>
</div>
    </div>
    <!-- /.col-md-8 -->
  </div>
                </div>
              </div>
            </div>

           
          </div>

         

        </div>
    
@endsection
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script>
 

$(document).ready(function (e) {
  
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
		
		 

 
       
    });
	
	function uploadfile(fileid,filename)
{
    
	 
  var file_data = $('#'+filename).prop("files")[0]; // Getting the properties of file from file field
  var form_data = new FormData(); // Creating object of FormData class
  form_data.append(filename, file_data) // Appending parameter named file with properties of file_field to form_data
   // Adding extra parameters to form_data
  $.ajax({
    url: "{{ route('ajaxupload.action')}}", // Upload Script
    dataType: 'script',
    cache: false,
    contentType: false,
    processData: false,
    data: form_data, // Setting the data attribute of ajax with file_data
    type: 'post',
	beforeSend: function() {
        $('.'+filename).show();
    },
    success: function(data) {
      
	  // $('.'+filename).hide();
	    $('.'+filename).html('Uploaded[file.pdf]');
		 $('#'+filename).val('');
    }
  });
  
  }

</script>

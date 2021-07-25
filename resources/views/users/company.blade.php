@extends('users.layout')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style>
	.error {
    color:#CC0000;
  }
  label.error {font-size:100%;}
	</style>
	 
  <script>
  $(document).ready(function () {
  
   
 
  

    $('#gst_form').validate({ // initialize the plugin
	
	 
        rules: {
            gst_no: {
                required: true,
				 minlength: 15,
				 maxlength: 15
                
            },
			 
			
			 
        }
    });
	
	$('#upload_image_form').validate({ // initialize the plugin
	 
	 
        rules: {
            cnn_no: {
                required: true
				 
                
            },
			city: {
                required: true
			 },
			 line_1: {
                required: true
			 },
			 line_2: {
                required: true
			 },
			 line_3: {
                required: true
			 },
			 state: {
                required: true
			 },
			 district: {
                required: true
			 },
			  pin: {
                required: true,
				minlength: 6,
				maxlength: 6
			 },
			
			tan_no: {
                required: true,
				minlength: 10,
				maxlength: 10
			  },
			 
			 start_up_no: {
                
				minlength: 9,
				maxlength: 9
			  },
			  
			   msme_no: {
                
				minlength:12,
				maxlength: 12
			  },
			 
			
			 
        }
    });

});
 
  </script> 
<meta name="csrf-token" content="{{ csrf_token() }}">
     <div class="container-fluid">

          

          <!-- Content Row -->
          

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-10 col-lg-10 ">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header  pb-0 pt-2 d-flex flex-row align-items-center justify-content-between">
                 
                 <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="{{route('page.myaccount')}}">Company Details
</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{route('page.documentation')}}">Documentation</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{route('page.founder')}}">Founder Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{route('page.bank')}}">Banking Details</a>
  </li>
    
</ul>
                </div>
                
                <!-- Card Body -->
                <div class="card-body">
                 <div class="row">
     
    <!-- /.col-md-4 -->
        <div class="col-md-12 small">
      <div class="tab-content" id="myTabContent">
        	@include('includes.messages')            
                  
        
  <div class="tab-pane fade  <?php echo(session('step1')==1)?'':'active show'?>" id="home" role="tabpanel" aria-labelledby="home-tab">
  <?php
  if(count($company_data)>0)
  {
  
  $company_name=$company_data[0]->company_name;
  $type_of_entity=$company_data[0]->type_of_entity;
  $cnn_no=$company_data[0]->cnn_no;
  $date_of_incorporation	=$company_data[0]->date_of_incorporation	;
  	$line_1=$company_data[0]->line_1;
 	$line_2=$company_data[0]->line_2;
 	$line_3=$company_data[0]->line_3;
  	$landmark=$company_data[0]->landmark;
  	$district=$company_data[0]->district;
   	$city=$company_data[0]->city;
    $state=$company_data[0]->state;
	$pin=$company_data[0]->pin;
	$district=$company_data[0]->district;
	$fy_1_amount=$company_data[0]->fy_1_amount;
	$fy_2_amount=$company_data[0]->fy_2_amount;
	$fy_3_amount=$company_data[0]->fy_3_amount;
	$pan_no=$company_data[0]->pan_no;
	$tan_no=$company_data[0]->tan_no;
	$u_aadhar=$company_data[0]->u_aadhar;
	$start_up_no=$company_data[0]->start_up_no;
	$company_linkedin=$company_data[0]->company_linkedin;
	$gst_no=$company_data[0]->gst_no;
	$company_type=$company_data[0]->company_type;
	$msme_no=$company_data[0]->msme_no;
	$type_of_msme=$company_data[0]->type_of_msme;
	$update_status=$company_data[0]->update_status;
	  
  
  }else{
  $update_status=0;
   $company_name='';
   $company_type='';
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
    $gst_no='';
	$msme_no='';
	$type_of_msme='';
  }
      
  


   ?>
    <form method="POST" enctype="multipart/form-data" id="gst_form" action="{{ route('post.gstvalidate') }}" > 
	 {{ csrf_field() }}
  <div class="row"><div class="col-lg-8 offset-lg-2">
  <?php if( count($company_data)==0){?>
   <div class="form-group row">
    <label for="Type of Entity" class="col-3 col-form-label text-right">GST No  </label> 
    <div class="col-8">
	<div class="input-group mb-0">
	
  <input  id="gst_no" name="gst_no" type="text"   class="form-control font-100" value="{{old('gst_no')}}" required="required">
   <div class="input-group-append">
    <button class="btn btn-secondary" type="submit"  ><span class="small" id="vgst"  >Verify GST</span>  </button>
  </div>

   

</div>
           

    </div>
  </div>
  
   <?php } ?>
  </div></div> 
  </form>
  @if(count($company_data)>0)
   
 	 <form method="POST" enctype="multipart/form-data" id="upload_image_form" action="{{ route('post.updatestep1') }}"  onsubmit="return confirm('Once you submit the form, you can not modify it. Are you sure to proceed?');"> 
	 
	   
	    {{ csrf_field() }}
  <div class="row"><div class="col-lg-6">  
   <div class="form-group row">
    <label for="Name of the company" class="col-4 col-form-label">GST No:</label> 
    <div class="col-8">
     {{$gst_no}} <i class="fa fa-check-circle" style="color:green; margin-left:10px; font-size:18px;"></i>
    </div>
  </div>
  <div class="form-group row">
    <label for="Name of the company" class="col-4 col-form-label">Company Type</label> 
    <div class="col-8">
       {{$company_type}} 
    </div>
  </div>
  
  <div class="form-group row">
    <label for="Name of the company" class="col-4 col-form-label">Company PAN</label> 
    <div class="col-8">
      {{$pan_no}} 
    </div>
  </div>
  
   <div class="form-group row">
    <label for="Name of the company" class="col-4 col-form-label">Company Name</label> 
    <div class="col-8">
       {{$company_name}} 
    </div>
  </div>
    
      <div class="form-group row">
    <label for="Date of Incorporation" class="col-4 col-form-label">Date of Incorporation</label> 
    <div class="col-8">
     {{$date_of_incorporation}} 
    </div>
  </div>
  <div class="form-group row">
    <label for="CIN or LLP-IN" class="col-4 col-form-label">CIN or LLP-IN</label> 
    <div class="col-8">
     
	  @if($cnn_no=='')
      <input id="cnn_no" name="cnn_no" type="text" value="{{$cnn_no}}" class="form-control form-control-sm font-100"  >
	  @else
	  {{$cnn_no}}
	  @endif
    </div>
  </div>
 <div class="form-group row">
    <label for="text6" class="col-4 col-form-label"> Start up India Certificate Number
</label> 
    <div class="col-8">
 	   @if($start_up_no=='')
      <input id="start_up_no" name="start_up_no" type="text" value="{{$start_up_no}}" maxlength="9" class="form-control form-control-sm font-100"  >
	  @else
	  {{$start_up_no}}
	  @endif
    </div>
  </div>
  
  <div class="form-group row">
    <label for="text6" class="col-4 col-form-label"> Contact Name (Super Admin)
</label> 
    <div class="col-8">
      {{Auth::user()->name}}
    </div>
  </div>
  
  <div class="form-group row">
    <label for="text6" class="col-4 col-form-label"> Contact Email (Super Admin)
</label> 
    <div class="col-8">
     {{Auth::user()->email}}
    </div>
  </div>
  
  <div class="form-group row">
    <label for="text6" class="col-4 col-form-label"> Contact Phone (Super Admin)
</label> 
    <div class="col-8">
     {{Auth::user()->mobile}}
    </div>
  </div>
  
  </div> <div class="col-lg-6">
    
  
  
  <div class="form-group row">
    <label for="Turnover Details" class="col-12 col-form-label"><strong>Address Details</strong></label> 
    <div class="col-12">
        <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Line 1</label> 
    <div class="col-8">
      
	   @if($line_1=='')
      <input id="line_1" name="line_1"   type="text" class="form-control form-control-sm">
	  @else
	 {{$line_1}} 
	  @endif
    </div>
  </div>
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Line 2</label> 
    <div class="col-8">
        
	    @if($line_2=='')
      <input id="line_2" name="line_2"   type="text" class="form-control form-control-sm">
	  @else
	 {{$line_2}} 
	  @endif
    </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Line 3</label> 
    <div class="col-8">
    
	    @if($line_3=='')
      <input id="line_3" name="line_3"   type="text" class="form-control form-control-sm">
	  @else
	 {{$line_3}} 
	  @endif
    </div>
  </div>
   
  <div class="form-group row">
    <label for="text4" class="col-4 col-form-label">City</label> 
    <div class="col-8">
	@if($city=='')
      <input id="city" name="city" value="" type="text" class="form-control form-control-sm font-100">
	  @else
	  {{$city}}
	  @endif
    </div>
  </div>
  <div class="form-group row">
    <label for="text5" class="col-4 col-form-label">District</label> 
    <div class="col-8">
      
	   @if($district=='')
      <input id="district" name="district"   type="text" class="form-control form-control-sm">
	  @else
	 {{$district}} 
	  @endif
    </div>
  </div>
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">State</label> 
    <div class="col-8">
      
	   @if($state=='')
      <input id="state" name="state"   type="text" class="form-control form-control-sm">
	  @else
	 {{$state}} 
	  @endif
    </div>
  </div>
  <div class="form-group row">
    <label for="text6" class="col-4 col-form-label">PIN</label> 
    <div class="col-8">
	 @if($pin=='')
      <input id="pin" name="pin" value="{{$pin}}" type="text" class="form-control form-control-sm font-100">
	  @else
	  {{$pin}}
	  @endif
       
    </div>
  </div> 
  <div class="form-group row">
    <label for="text6" class="col-4 col-form-label">TAN</label> 
    <div class="col-8">
 	  @if($tan_no=='')
      <input id="tan_no" name="tan_no" value="{{$tan_no}}" type="text" class="form-control form-control-sm font-100">
	  @else
	  {{$tan_no}}
	  @endif
    </div>
  </div> 
  
  <div class="form-group row">
    <label for="text6" class="col-4 col-form-label">MSME Number (UAM)</label> 
    <div class="col-8">
	@if($msme_no=='')
      <input id="msme_no" name="msme_no" value="{{$msme_no}}" maxlength="12" type="text" class="form-control form-control-sm font-100">
	  @else
	  {{$msme_no}}
	  @endif
    </div>
  </div> 
  <div class="form-group row">
    <label for="text6" class="col-4 col-form-label">Type of MSME Enterprise</label> 
    <div class="col-8">
 
	  





	  @if($type_of_msme=='')        
	  <select id="type_of_msme" name="type_of_msme"  class="form-control  form-control-sm">
	   <option value="">--Select MSME Type--</option>
        <option value="A (Manufacturing - Micro)">A (Manufacturing - Micro)</option>
        <option value="B (Manufacturing - Small)">B (Manufacturing - Small)</option>
        <option value="C (Manufacturing - Medium)">C (Manufacturing - Medium)</option>
        <option value="A (Services - Micro)">A (Services - Micro)</option>
		 <option value="B (Services - Small)">B (Services - Small)</option>
		  <option value="C (Services - Medium)">C (Services - Medium)</option>
      </select>
	  @else
	  {{$type_of_msme}}
	  @endif    </div>
  </div> 
  
        
    </div></div> </div>    </div>
 
   
   
  
      
  
      
  
    
  
  <div class="form-group row">
    <div class="offset-4 col-8">
	 @if($update_status==0)
      <button name="submit" type="submit" class="btn btn-primary" style="padding:10px;">Submit</button>
	  @endif
    </div>
  </div>
</form>
@endif
  </div>
  
</div>
    </div>
    <!-- /.col-md-8 -->
  </div>
                </div>
              </div>
            </div>
<div class="col-xl-2 col-lg-2 ">Ad Placeholder</div>
           
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

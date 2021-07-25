@extends('users.layout')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<meta name="csrf-token" content="{{ csrf_token() }}">
     <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-0">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?php if( Auth::guard()->check()){ 
				echo Auth::user()->name;
				  }?></div>
                      <div class="text-xs mb-0  text-gray-400">Email:<br><span class="text-gray-600"><?php if( Auth::guard()->check()){ 
				echo Auth::user()->email;
				  }?></span></div>
                      
                       <div class="text-xs mb-0  text-gray-400">Phone:<br><span class="text-gray-600"><?php if( Auth::guard()->check()){ 
				echo Auth::user()->mobile;
				  }?></span></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            

            
          </div>
		  <?php 
		  $company=0;
		   $sqlcompany=DB::table('company_details')->where('user_id',Auth::user()->id)->get();
		  if(count($sqlcompany)>0)
		  $company= $sqlcompany[0]->update_status;
		  
		  $document=0;
		  $sqldoc=DB::table('user_file_upload')->where('user_id',Auth::user()->id)->get();
		  if(count($sqldoc)>0)
		 $document= $sqldoc[0]->upload_status;
		 
		  $founder=0;
		  $sqlfounder=DB::table('founder')->where('user_id',Auth::user()->id)->get();
		  if(count($sqlfounder)>0)
		  $founder= 1;
		  
		   $brand=0;
		  $sqlbrand=DB::table('brand_details')->where('user_id',Auth::user()->id)->get();
		  if(count($sqlbrand)>0)
		  $brand= 1;
		  
		   $bank=0;
		  $sqlbank=DB::table('bank_details')->where('user_id',Auth::user()->id)->get();
		  if(count($sqlbank)>0)
		  $bank= 1;
		  
		  
		  ?>
          
             <div class="row">
                  <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">KYC</h6>
                 
                </div>
                <!-- Card Body -->
                <div class="card-body">
                   <div class="row">
                       
                        <div class="col-xl-2 col-md-3 mb-4">
              <div class="card  shadow h-100 py-1">
                <div class="card-body p-2">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Company Details</div>
                      
                     
                    </div>
                    <div class="col-auto">
                      <a href="#"><?php echo($company==1)?'<i class="fas fa-check-circle fa-2x  text-success "></i>':'<i class="fas fa-times-circle fa-2x text-danger"></i>'?>  </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                      
                      <div class="col-xl-2 col-md-3 mb-4">
              <div class="card  shadow h-100 py-1">
                <div class="card-body p-2">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Documentation</div>
                      
                     
                    </div>
                    <div class="col-auto">
                     <a href="#"><?php echo($document==1)?'<i class="fas fa-check-circle fa-2x  text-success "></i>':'<i class="fas fa-times-circle fa-2x text-danger"></i>'?>  </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>   
            <div class="col-xl-2 col-md-3 mb-4">
              <div class="card  shadow h-100 py-1">
                <div class="card-body p-2">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Founder Details</div>
                      
                     

                    </div>
                    <div class="col-auto">
                     <a href="#"> <?php echo($founder==1)?'<i class="fas fa-check-circle fa-2x  text-success "></i>':'<i class="fas fa-times-circle fa-2x text-danger"></i>'?></a>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
             <div class="col-xl-2 col-md-3 mb-4">
              <div class="card  shadow h-100 py-1">
                <div class="card-body p-2">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Banking Details</div>
                      
                     
                    </div>
                    <div class="col-auto">
                     <a href="#"> <?php echo($bank==1)?'<i class="fas fa-check-circle fa-2x  text-success "></i>':'<i class="fas fa-times-circle fa-2x text-danger"></i>'?></a>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
            
             <div class="col-xl-2 col-md-3 mb-4">
              <div class="card  shadow h-100 py-1">
                <div class="card-body p-2">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Brand Details</div>
                      
                     
                    </div>
                    <div class="col-auto">
                     <a href="#"> <?php echo($brand==1)?'<i class="fas fa-check-circle fa-2x  text-success "></i>':'<i class="fas fa-times-circle fa-2x text-danger"></i>'?></a>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
                   </div>  </div>  </div> </div></div>

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

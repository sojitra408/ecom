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
  
   
 
  

    
	
	$('#frmBank').validate({ // initialize the plugin
	 
	 
        rules: {
            cheque: {
                required: true
			 },
			 account_name: {
                required: true
			 },
			 bank_name: {
                required: true
			 },
			 account_type: {
                required: true
			 },
			 branch_address: {
                required: true
			 },
			  ifsc_code: {
                required: true
			 },
			 
			 other_acc: {
                required: true
			 },
		 	 
		 	 
        },
		 messages: {
                cheque: "Please select cheque pic!",
                account_name: "Please enter account holder name",
                bank_name: "Please enter bank phone",
				 account_type: "Please selct account type",
				  branch_address: "Please enter branch address",
				    ifsc_code: "Please enter ifce code"
                
            },
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
    <a class="nav-link " href="{{route('page.company')}}">Company Details
</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{route('page.documentation')}}">Documentation</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{route('page.founder')}}">Founder Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{route('page.bank')}}">Banking Details</a>
  </li>
   
</ul>
                </div>
                
                <!-- Card Body -->
                <div class="card-body">
                 <div class="row">
  
    <!-- /.col-md-4 -->
        <div class="col-md-10 small">
    <div class=" <?php echo(session('step1')==1)?'active show':''?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
	 <?php
  if(count($bank_data)>0)
  {
  
  $bank_name=$bank_data[0]->bank_name;
  $account_name=$bank_data[0]->account_name;
  $account_type=$bank_data[0]->account_type;
  $ifsc_code	=$bank_data[0]->ifsc_code	;
  	$branch_address=$bank_data[0]->branch_address;
	 $cheque_doc	=$bank_data[0]->cheque_doc;	
  
 	 
	  
  
  }else{
   $bank_name='';
  $account_name='';
  $account_type='';
  $ifsc_code=''	;
  	$branch_address='';
	 $cheque_doc='';	}
      
  


   ?>
	<form class="pt-2" id="frmBank" method="post" action="{{ route('post.savebank') }}" enctype="multipart/form-data">
	 {{ csrf_field() }}
	<div class="form-group row">
    <label for="Name of the company" class="col-4 col-form-label">Upload copy of cheque</label> 
    <div class="col-8">
	@if($cheque_doc=='')
      <input type="file" class="form-control-file form-control-sm font-100" name="cheque"  id="cheque" accept=".gif,.jpeg,.png,.jpg" >
	  (File type jpeg,png,gif only!)
	  @else
	 <img src="{{asset('')}}/storage/app/{{$cheque_doc}}" height="150"    />
	  @endif
    
    </div>
  </div>
  <div class="form-group row">
    <label for="CIN or LLP-IN" class="col-4 col-form-label">Name in bank account</label> 
    <div class="col-8">
	@if($account_name=='')
      <input id="account_name" name="account_name" type="text" class="form-control form-control-sm font-100" required="required">
	  @else
	  {{$account_name}}
	  @endif
    </div>
  </div>
  <div class="form-group row">
    <label for="Date of Incorporation" class="col-4 col-form-label">Name of bank</label> 
    <div class="col-8">
      
	  @if($bank_name=='')
      <input id="bank_name" name="bank_name" type="text" class="form-control form-control-sm font-100" required="required">
	  @else
	  {{$bank_name}}
	  @endif
    </div>
  </div>
  
  <div class="form-group row">
    <label for="Date of Incorporation" class="col-4 col-form-label">Type of account</label> 
    <div class="col-8">
      
	   @if($account_type=='')
      <select id="select" name="account_type" id="account_type" onchange="return accountType(this.value)" class="form-control form-control-sm font-100 ">
	    <option value="">--Select--</option>
        <option value="Current">Current</option>
        <option value="Savings">Savings</option>
		 <option value="Other">Other</option>
      </select>
	  <br />
	  <input type="text" name="other_acc" id="other_acc" placeholder="Other Account Type" style="display:none" class="form-control form-control-sm font-100 "/>
	  @else
	  {{$account_type}}
	  @endif
    </div>
  </div>
  
  <div class="form-group row">
    <label for="Date of Incorporation" class="col-4 col-form-label">Branch Address</label> 
    <div class="col-8">
      
	   @if($branch_address=='')
     <textarea id="branch_address" name="branch_address" type="text" class="form-control form-control-sm font-100" required="required"></textarea>
	  @else
	  {{$branch_address}}
	  @endif
    </div>
  </div>
  
  <div class="form-group row">
    <label for="Date of Incorporation" class="col-4 col-form-label">IFSC</label> 
    <div class="col-8">
 	   @if($ifsc_code=='')
      <input id="ifsc_code" name="ifsc_code" type="text" class="form-control form-control-sm font-100" required="required">
	  @else
	  {{$ifsc_code}}
	  @endif
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
	<?php if(count($bank_data)==0)
  {
  ?>
      <button name="submit" type="submit" class="btn btn-primary " style="padding:10px;">Submit</button>
	  <?php }?>
    </div>
  </div>
  </form>
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
	
	function accountType(type){
	
	if(type=='Other'){
	$('#other_acc').show()
	}else{
	
	$('#other_acc').hide()
	}
	
	}
	
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

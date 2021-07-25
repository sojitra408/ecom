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
  
   
 
  

    
	
	$('#frmFounder').validate({ // initialize the plugin
	 
	 
        rules: {
            founder_name: {
                required: true
			 },
			 founder_email: {
                required: true,
				email: true
				 
			 },
			 founder_mobile: {
                required: true,
				  minlength: 10,
				maxlength: 10
				 
			 },
			 
		 	 
        },
		 messages: {
                founder_name: "Please enter founder name!",
                founder_email: "Please enter founder email",
                founder_mobile: "Please enter founder mobile",
                
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
    <a class="nav-link active" href="{{route('page.founder')}}">Founder Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{route('page.bank')}}">Banking Details</a>
  </li>
    
</ul>
                </div>
                
                <!-- Card Body -->
                <div class="card-body">
				 <div class="row">
                 @if(count($founder_data)>0)
			<?php $i=1;?>
			  @foreach($founder_data as $index=>$res)
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-1">
                <div class="card-body p-2">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">{{$res->founder_name}}
				   </div>
                      <div class="text-xs mb-0  text-gray-400">Email:<br><span class="text-gray-600">{{$res->founder_email}}</span></div>
                      
                       <div class="text-xs mb-0  text-gray-400">Phone:<br><span class="text-gray-600">{{$res->founder_mobile}}</span></div>
                    </div>
                    <div class="col-auto">
				 
					 
					    
                     <a href="{{Request::url()}}?edit={{$res->id}}" alt="Add New"> <i class="fas fa-pen-square   fa-2x text-gray-500"></i></a>
				 
					 
                    </div>
                  </div>
                </div>
              </div>
            </div>
			<?php $i++; ?>
			@endforeach
			@endif
			  

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Founder Details</h6>
                 
                </div>
                 
                <!-- Card Body -->
                <div class="card-body">
                 <div class="row">
  <div class="col-12">@include('includes.messages')</div>
    <!-- /.col-md-4 -->
        <div class="col-md-12 small">
		  <?php if(app('request')->input('edit')!=''){ 
		  $brandd=DB::table('founder')->where('id',app('request')->input('edit'))->first();
		  $founder_name=$brandd->founder_name;
		  $founder_email=$brandd->founder_email;
		  $founder_mobile=$brandd->founder_mobile;
		 
		  
		 } else{
		    $founder_name='';
		  $founder_email='';
		  $founder_mobile='';
		    }?>
		  
     @if(app('request')->input('edit')!='')
         <form method="POST" enctype="multipart/form-data" id="frmFounder" action="{{ route('post.updatefounder') }}" > 
		 <input type="hidden" name="id" id="id" value="{{app('request')->input('edit')}}" />
		 @else
		   <form method="POST" enctype="multipart/form-data" id="frmFounder" action="{{ route('post.savefounder') }}" onsubmit="return confirm('Once you submit the form, you can not modify it. Are you sure to proceed?');" > 
		 @endif
		 
	 {{ csrf_field() }}
    <div class=" <?php echo(session('step1')==1)?'active show':''?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
 
 
        <div class="form-group row">
		 
		
	 
		   <div class="col-4">
      Full Name
            <input id="founder_name" name="founder_name" value="<?php echo($founder_name!='')?$founder_name:session('founder_name')?>" type="text" class="form-control form-control-sm font-100">
     
    </div>
    
    <div class="col-4"> Email    <input id="founder_email" name="founder_email" type="email" class="form-control form-control-sm font-100" value="<?php echo($founder_email!='')?$founder_email:session('founder_email')?>"> </div>
     <div class="col-4">Mobile <input id="founder_mobile" name="founder_mobile" type="tel" value="<?php echo($founder_mobile!='')?$founder_mobile:session('founder_mobile')?>" class="form-control form-control-sm font-100"></div>
    
  </div> 
  
   <div class="form-group row">
    <div class="offset-5 col-6">
      <button name="submit" type="submit" class="btn btn-primary btn-sm p-2 ">Save</button>
    </div>
  </div>
   
  </div>
  </form>
    </div>
    <!-- /.col-md-8 -->
  </div>
                </div>
              </div>
            </div>
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
 
 

</script>

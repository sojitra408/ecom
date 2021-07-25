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
  
   
 
  

    
	
	$('#brand_form').validate({ // initialize the plugin
	 
	 
        rules: {
            brand_name: {
                required: true
			 },
			 
			   category: {
                required: true
			 },
			 
		 	 
		 	 
        },
		 messages: {
                
                brand_name: "Please enter account brand name",
				category:"Please select category",
                
                
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
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Brand Details</h6>
                 
                </div>
                
                <!-- Card Body -->
                <div class="card-body">
                 <div class="row">

            <!-- Earnings (Monthly) Card Example -->
				@if(count($brand_data)>0)
			<?php $i=1;?>
			  @foreach($brand_data as $index=>$res)
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-1">
                <div class="card-body p-2">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><span class="text-gray-400">Brand Name:</span> <br> {{$res->brand_name}}</div>
                      <div class="text-xs mb-0  text-gray-400">Website:<br><span class="text-gray-600">{{$res->brand_site}}</span></div>
                     
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
  
            <div class="col-12"> @include('includes.messages')  </div>
    <!-- /.col-md-4 -->
        <div class="col-md-12 small">
		
		  <?php if(app('request')->input('edit')!=''){ 
		  $brandd=DB::table('brand_details')->where('id',app('request')->input('edit'))->first();
		  $brand_site=$brandd->brand_site;
		  $brand_insta=$brandd->brand_insta;
		  $brand_fb=$brandd->brand_fb;
		  $brand_link=$brandd->brand_link;
		  $brand_youtube=$brandd->brand_youtube;
		   $category=$brandd->category;
		    $brand_name=$brandd->brand_name;
		  
		 } else{
		    $brand_site='';
		  $brand_insta='';
		  $brand_fb='';
		  $brand_link='';
		  $brand_youtube='';
		   $category='';
		    $brand_name='';
		    }?>
		  
     @if(app('request')->input('edit')!='')
         <form method="POST" enctype="multipart/form-data" id="brand_form" action="{{ route('post.updateBrand') }}" > 
		 <input type="hidden" name="id" id="id" value="{{app('request')->input('edit')}}" />
		 @else
		  <form method="POST" enctype="multipart/form-data" id="brand_form" action="{{ route('post.saveBrand') }}" > 
		 @endif
	 {{ csrf_field() }}
 
        <div class="form-group row">
   
    <div class="col-6 col-lg-4">
        <label for="text6" class="col-form-label">Name of the Brand</label> 
      <input id="brand_name" name="brand_name" value="{{$brand_name}}" <?php echo (app('request')->input('edit')!='')?'disabled="disabled"':''?> type="text" class="form-control form-control-sm font-100">
    </div>
    
    <div class="col-6 col-lg-4">
        <label for="text6" class=" col-form-label">Brand Website</label> 
      <input id="brand_site" name="brand_site" value="{{$brand_site}}" type="text" class="form-control form-control-sm font-100">
    </div>
 
   
    <div class="col-6 col-lg-4">
        <label for="text6" class=" col-form-label">Brand Instagram Handle</label> 
      <input id="brand_insta" name="brand_insta" value="{{$brand_insta}}" type="text" class="form-control form-control-sm font-100">
    </div>
    
    <div class="col-6 col-lg-4">
        <label for="text6" class=" col-form-label">Brand Facebook Page</label> 
      <input id="brand_fb" name="brand_fb"  value="{{$brand_fb}}"type="text" class="form-control form-control-sm font-100">
    </div>
  
   
    <div class="col-6 col-lg-4">
        <label for="text6" class="col-form-label">Brand LinkedIn Page</label> 
      <input id="brand_link" name="brand_link" type="text" value="{{$brand_link}}" class="form-control form-control-sm font-100">
    </div>
    
    <div class="col-6 col-lg-4">
        <label for="text6" class=" col-form-label">Brand YouTube Page</label> 
      <input id="brand_youtube" name="brand_youtube" value="{{$brand_youtube}}" type="text" class="form-control form-control-sm font-100">
    </div>
    
    <div class="col-6 col-lg-4">
        <label for="text6" class=" col-form-label">Category</label> 
     <select id="category" name="category" class="form-control  form-control-sm font-100">
	  <option value="">--Select--</option>
        <option value="Baby Products" <?php echo($category=='Baby Products')?'selected':''?>>Baby Products
</option>
        <option value="Beauty & Men's Grooming" <?php echo($category=="Beauty & Men's Grooming")?'selected':''?>>Beauty & Men's Grooming
</option>
        <option value="Fashion & Apparels" <?php echo($category=='Fashion & Apparels')?'selected':''?>>Fashion & Apparels
</option>

 <option value="Food & Beverages" <?php echo($category=='Food & Beverages')?'selected':''?>>Food & Beverages

</option>
        <option value="Furnishing & Décor" <?php echo($category=='Furnishing & Décor')?'selected':''?>>Furnishing & Décor
</option>
      </select>
    </div>
  </div> 
  
  
  
   <div class="form-group row mt-3">
    <div class="offset-lg-5 col-6">
      <button name="submit" type="submit" class="btn btn-primary btn-sm p-2 " style="">Save</button>
    </div>
  </div>
  </form>
  
   
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

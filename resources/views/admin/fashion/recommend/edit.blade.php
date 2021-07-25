@extends('admin.layout')
@section('content')

 
        <div class="container-fluid">
<div class="row">

<div class="col-md-3">
@include('admin.fashion.menu')

</div>

<div class="col-md-9">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit TOT Recommends Product</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Head TOT Recommends Product</h6>
            </div>
            
            <div class="peer mt-2">
                        <form action="{{route('deletefashion.recommends')}}" class="actionDelete" method="post">
                            <input type="hidden" name="_method" vlaue="DELETE">
                            @csrf
                            
                            <button class="btn btn-danger btn-sm ml-3" onclick="return confirm('Are you sure Want Delete?')"><i class="fa fa-trash" aria-hidden="true"></i>
 Delete all selected TOT Recommends</button>
        				</form>
	                </div>
            <!--<div id="selected_brand"></div>-->
            <div class="peer mt-2">
	@foreach($all_brands as $brand)
		<span class="badge badge-secondary mr-2">{{$brand->Products->product_name}}</span>    
	@endforeach
</div>
            <form role="form" action="#" method="post">
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class=" col-lg-12 py-2">
	            	<div class="alert alert-success" style="display:none;"><p class="add-message"></p></div>
					<div class="alert alert-danger" style="display:none;"><p class="remove-message"></p></div>
				<label>Select up to 12 Products</label>	 
				<div class="table-responsive">
                <table class="table table-bordered" id="fashionRecommends_table" style="width:100%">
                    <thead> 
                    <th>Id</th>
                    <th>Product Name</th>
                    <th>Brand Name</th> 
                    <th>Price</th>
                    
                    </thead> 
                    </table>
              </div>	 


               
	            <!--<div class="form-group">-->
	            <!--  <button type="submit" class="btn btn-primary btn-sm">Submit</button>-->
	             
	            <!--</div>-->
	          
				</div>
				</div>
	          </form>
            </div>
          
        </div>
        </div>
        </div>
		
	
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
<script>
  var adminUrl='<?php echo url('/admin')?>';
  </script>

<script>


function showpass(id)
{
 var input = $("#pass_log_id"+id);
  
 if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
}


$(document).ready(function() {

 setTimeout(function () {
     
    var all_names = "";
    $(".product-id-checked").each(function() {
        var name = $(this).data("name");
        
        if(name != undefined && name !='')
        {
            all_names = all_names + name + "|";    
        }
        
        
    });
    
    var arr = all_names.split('|');
    $.each( arr, function( index, value ) {
        $('#selected_brand').append("&nbsp<span class='badge badge-secondary'>" + value + "</span>&nbsp");
    });
     
 },1000);
 
 
   
} );


function checkboxSelect(id) {


       $("#overlay").fadeIn(300);
 
		 
		$.ajax({
		   type:'GET',
		   url:"{{ route('fashion_tot_recommend_update') }}",
		   data:{
			   _token:'<?php echo csrf_token();?>',
			   id:id
			   
		   },
		   success:function(data){
			   //alert('updated')
			   var obj = jQuery.parseJSON(data);
			   //console.log(obj);
			   if(obj.status==true){
				   $('.alert-success').show();
				    $('.add-message').html(obj.message);
					
					setTimeout(function() {
						$('.alert-success').fadeOut('slow');
					}, 2000);
			   }
			   if(obj.status==false){
				   $('.alert-danger').show();
				    $('.remove-message').html(obj.message);
					
					setTimeout(function() {
						$('.alert-danger').fadeOut('slow');
					}, 2000);
			   }
			 
			  
		   }
		}).done(function() {
      setTimeout(function(){
        $("#overlay").fadeOut(300);
      },500);
    });
location.reload();
   
}


$(document).ready(function() {


      $("#product_id").select2();
$('#category_id').change(function(){
		var cate_id=$(this).find('option:selected').val();
		$.ajax({
		   type:'POST',
		   url:adminUrl+'/product/getproductbyparentcategory',
		   data:{
			   _token:'<?php echo csrf_token();?>',
			   cate_id:cate_id
		   },
		   success:function(data){
			   console.log(data);
			  $('#product_id').html('').select2({data: $.parseJSON(data)});
		   }
		});
	});

   
} );
</script>
@extends('admin.layout')
@section('content')

 
        <div class="container-fluid">
<div class="row">

<div class="col-md-3">
@include('admin.fashion.menu')

</div>

<div class="col-md-9">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Head Turners Product</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Head Turners Products</h6>
            </div>
            <form role="form" action="#" method="post">
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class=" col-lg-12 py-2">
	            	@include('includes.messages') 
				<label>Select up to 12 Products</label>	 
				<div class="table-responsive">
                <table class="table table-bordered" id="turner_table" style="width:100%">
                    <thead> 
                    <th>Id</th>
                    <th>Product Name</th>
                    <th>Brand Name</th> 
                    <th>Price</th>
                    
                    </thead> 
                    </table>
              </div>	 


               
	            <div class="form-group">
	              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	             
	            </div>
	          
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
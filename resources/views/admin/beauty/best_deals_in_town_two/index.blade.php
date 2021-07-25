@extends('admin.layout')
@section('content')

 
        <div class="container-fluid">
<div class="row">

<div class="col-md-3">
@include('admin.beauty.menu')

</div>

<div class="col-md-9">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Best Deals In Town Second</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Best Deals In Town  Second</h6>
            </div>
            <form role="form" action="#" method="post">
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class=" col-lg-12 py-2">
	            	<div class="alert alert-success" style="display:none;"><p class="add-message"></p></div>
					<div class="alert alert-danger" style="display:none;"><p class="remove-message"></p></div>
				<!-- <label>Select up to 12 Products</label>	  -->
				<div class="table-responsive">
                <table class="table table-bordered" id="" style="width:100%">
                    <thead> 
                    <th>Id</th>
                    <th>Title</th>
                    
                    <!--<th>Description</th>-->
                    <th>Action</th>
                    
                    </thead> 

                    <tbody>
                        <?php if(count($single)>0){
                        
                        $i=1;
                        foreach ($single as $page){?>
                          <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $page->title }}</td>
                           
                           
                            <!--<td>{!!html_entity_decode($page->description)!!}</td>-->
                            
                            
                           
                           
                           
                            <th><!--<a href="{{route('user.detail',$page->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i>--></a>
                              <a href="{{route('beauty.best_deals_in_town_two.edit',$page->id)}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                              <!-- <a href="{{route('reviews.delete',$page->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> -->
                            </th>
                          </tr>
                      <?php $i++; } }else{?>
                            <tr align="center">
                              <td colspan=10>No Record Found</td>
                            </tr>
                      <?php } ?>
                             
                    </tbody> 

                    </table>
              </div>	 


               
	           <!-- <div class="form-group">
	              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	             
	            </div>-->
	          
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

function checkboxSelect(id) {


      
 
		 
		$.ajax({
		   type:'GET',
		   url:"{{ route('saveHomeTotRecommend') }}",
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
		});
	 

   
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
@extends('admin.layout')
@section('content')
<style>.hide{display:none;}</style>
 <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Brand Additional</h1>
        

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Additional Settings</h6>             </div>
              
              
                <div class="p-2">
               <h3 class="my-2">Select Sponsored Products</h3>
               
                   <form action="{{route('saveSponsoredBrand')}}" method='post'>
                       <input type="hidden" class="form-control" id="brand_id" name="brand_id"  value="{{$project->id }}">
                       {{ csrf_field() }}
                       <select class="sponsored-product-select" id="select_limit" name="products[]" style="maxWidth: 80%; width: 400px; " multiple="multiple">
                        
                               @if(!$brand_sponsors->isEmpty())
                               
                               @foreach($brand_sponsors as $brand)
				                    @foreach($products as $product)
                				   
                                        <option name="products[]" value="{{$product->id}}" {{ $brand->product_id == $product->id ? 'selected' : '' }}>{{$product->product_name}}</option>
                			        @endforeach
				                @endforeach
                				 @else
                				 @foreach($products as $product)
                				   
                                        <option name="products[]" value="{{$product->id}}">{{$product->product_name}}</option>
                			        @endforeach
                			   @endif
                        </select>
                        @if(Auth::user()->can('brands-edit'))
                        <button class="my-2 btn btn-primary btn-sm">Save Sponsored Product</button>
                        @endif
                   </form>
                   
                   
               </div> 
              
              <div class="p-2">
               <h3 class="my-2">Select Head Turners Products</h3>
               
                   <form action="{{route('brand_head_turners')}}" method='post'>
                       <input type="hidden" class="form-control" id="brand_id" name="brand_id"  value="{{$project->id }}">
                       {{ csrf_field() }}
                       <select class="sponsored-product-select" id="select_no_limit" name="products[]" style="maxWidth: 80%; width: 400px; " multiple="multiple">
                        
                               @if(!$brand_head_turners->isEmpty())
                               
                               @foreach($brand_head_turners as $brand_turners)
				                    @foreach($products as $product)
                				   
                                        <option name="products[]" value="{{$product->id}}" {{ $brand_turners->product_id == $product->id ? 'selected' : '' }}>{{$product->product_name}}</option>
                			        @endforeach
				                @endforeach
                				 @else
                				 @foreach($products as $product)
                				   
                                        <option name="products[]" value="{{$product->id}}">{{$product->product_name}}</option>
                			        @endforeach
                			   @endif
                        </select>
                        @if(Auth::user()->can('brands-edit'))
                        <button class="my-2 btn btn-primary btn-sm">Save Head Turners Product</button>
                        @endif
                   </form>
                   
                   
               </div>
            <form role="form" action="#" method="post">
                <input type="hidden" class="form-control" id="collection_id" value="{{ $project->id }}">
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class="col-lg-offset-2 col-lg-8 py-2">
	            	<div class="alert alert-success" style="display:none;"><p class="add-message"></p></div>
					<div class="alert alert-danger" style="display:none;"><p class="remove-message"></p></div>
	            <div class="row">
               @if(!$galleries->isEmpty())
				   @foreach($galleries as $gl)
			   <?php $brand = preg_replace('/\s+/', '', $project->brand_name);
			   $img="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/".$brand."/small/".getSliderMediaById($gl->image_id);
				?>
				<div class="col-md-3">
			   <img src="{{$img}}" height="150" width="150"> &nbsp;
			   </div>
			   @endforeach
			   @endif
             </div>
 <div class="form-group"><label for="name" class="col-md-6 control-label text-left">Brand Gallery<span class="m-l-5 text-red">*</span></label><div class="col-md-9">
                                            <!--
                                            <input name="banner" class="form-control  form-control-sm " id="banner" value="<?php if(!empty($category)){?> {{ $category->banner }} <?php }else{ }?>" type="file">
                                        -->
                                        @if(Auth::user()->can('brands-edit'))
                                        <button type="button" data-toggle="modal" data-target="#exampleModal" class="image-picker btn btn-default" data-input-name="files[base_image]">
            <i class="fa fa-folder-open m-r-5"></i> Browse
        </button>@endif
        
        <div class="clearfix"></div>
        
   
       
       
       
       
                                        </div></div>
                                        <hr>
                                        <div class="card shadow mb-4 mt-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tags</h6>
            </div>
            
            {{ csrf_field() }}
                <div class="box-body">
              <div class=" col-lg-12 py-2">
          <!--      <div class="alert alert-success" style="display:none;"><p class="add-message"></p></div>-->
          <!--<div class="alert alert-danger" style="display:none;"><p class="remove-message"></p></div>-->
        <label>Select tags</label>   
        <div class="table-responsive">
                <table class="table table-bordered" id="brand_tag_table" style="width:100%">
                    <thead> 
                    <th>Id </th>
                    <th>Tag Name</th>
                    
                    </thead> 
                    </table>
              </div>
            
        </div>
        </div>
          
            </div>
            
                                         <div class="clearfix"></div>
                                       
                  
				
                
	            <!--<div class="form-group">
	              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	              <a href="{{ route('admin.brand') }}" class="btn btn-warning btn-sm">Back</a>
	            </div>
	          -->
					
				</div>
	          </form>
            </div>
          </div>

        </div>
		
		
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Media</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	   <div class="row">
            <div class="col-md-12">
               
                <form method="post" action="{{route('brandimage.store')}}" enctype="multipart/form-data"
                            class="dropzone" id="dropzone" style="border:dashed 1px">
				<input type="hidden" class="form-control" id="brand_id" name="brand_id"  value="{{$project->id }}">	
                @csrf
                </form>
            </div>
		 
        </div>
        <p id="sucess-message" style="color:#0f6848;"></p>
        <table class="table table-bordered" id="brand_gallery" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>#</th>
                    <th>Img Name</th>
					  <th>Folder</th>
                      <th>Img</th>

                       
                            
                    </tr>
                  </thead>
                 
                  <tbody class="homemedia_body">
				  
                    
                  </tbody>
                </table>
      </div>
     
    </div>
  </div>
</div>






@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
    
    <script type="text/javascript">


        console.log('javascript running')


    Dropzone.options.dropzone =
     {
        maxFilesize: 10,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
           return time+file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 50000,
        removedfile: function(file)
        {
            var name = file.upload.filename;
            $.ajax({
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                type: 'POST',
                url: '{{ url("delete") }}',
                data: {filename: name},
                success: function (data){
                    console.log("File has been successfully removed!!");
					
                },
                error: function(e) {
                    console.log(e);
                }});
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },
        success: function(file, response)
        {
			var response = $.parseJSON(response);
			
		  
		  var rowCount = $('#brand_gallery tr').length;			
          $('.homemedia_body').append('<tr role="row" class="even"><td class="sorting_1"><input class="product-id-checked" type="checkbox" name="image_id[]" checked="checked" onClick="checkboxSelectGallery(this.value)" value="'+response.media.id+'"></td><td>'+response.media.filename+'</td><td><img src="'+response.media.small+'" width="75"></td></tr>');
        },
        error: function(file, response)
        {
           return false;
        }
    };
    



function showpass(id)
{
 var input = $("#pass_log_id"+id);
  
 if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
}



function checkboxSelectGallery(id) {

	  $("#overlay").fadeIn(300);	 
		$.ajax({
		   type:'GET',
		   url:"{{ route('savebrandGallery') }}",
		   data:{
			   _token:'<?php echo csrf_token();?>',
			   id:id,
			   brand_id:'{{$project->id}}',
			   
		   },
		   success:function(data){
			   //alert('updated')
			   
			   var obj = jQuery.parseJSON(data);
			   //console.log(obj);
			   if(obj.status==true){
			     //  console.log(obj.message);
				   $('.alert-success').show();
				    $('.add-message').html(obj.message);
				    $('#sucess-message').html(obj.message);
					
					setTimeout(function() {
						$('.alert-success').fadeOut('slow');
					}, 2000);
			   }
			   if(obj.status==false){
				   $('.alert-danger').show();
				    $('.remove-message').html(obj.message);
				    $('#sucess-message').html(obj.message);
					
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

   
} 

$(document).ready(function() {


      $("#seller_id").select2();
	  $("#select_limit").select2({
	      maximumSelectionLength: 2
	  });
	  
	   $("#seller_id").select2();
	  $("#select_no_limit").select2({
	      
	  });
	  



$(document).on('click','.select-rightimage',function(e){

	e.preventDefault();

	var id=$(this).attr('data-imageid');
	$('#thumbnail_image').val(id);
	 $.ajax({
		
		type: 'POST',
		url: '{{ url("admin/getbrandthumbnailimagebyid") }}',
		data: {id: id,_token:'{{ csrf_token() }}',brand_id:'{{$project->id}}'},
		success: function (data){
			$('.selected-rightimg').html('');			
			$('.selected-rightimg').html(data);
			$('.close-modal').trigger('click');
			$('body').removeClass('modal-open');        
			$('body').css('padding-right', '');
			$(".modal-backdrop").remove();
			$('#rightModal').hide();
		}
	
	});
	
	
});








    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "../server_side/scripts/server_processing.php"
    } );
} );





function checkboxSelectTag(id) {
//  alert()
$collection_id=$("#collection_id").val();
     // console.log($collection_id);
    $.ajax({
       type:'GET',
       url:"{{ route('save.brand.tag') }}",
       data:{
         _token:'<?php echo csrf_token();?>',
         id:id,
         collection_id:$collection_id,
         
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
</script>

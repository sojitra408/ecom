@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Add New Brand</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Brand</h6>
            </div>
            <form role="form" action="{{ route('brand.store') }}" enctype="multipart/form-data" method="post">
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6 py-2">
	            	@include('includes.messages') 
	              <div class="form-group">
                  <label for="name">Brand Name</label>
                  <input type="text" class="form-control" id="brand_name" name="brand_name"  value="{{ old('brand_name') }}">
                </div>

               

         <div class="form-group">
                  <label for="name">Seller</label>        
<select class="form-control form-control-sm myselect" id="seller_id" name="seller_id">
      @if(!$seller->isEmpty())
		@foreach($seller as $sel )
      <option  value="{{$sel->id}}">{{$sel->seller_name}}</option>
	  @endforeach
     @endif
    </select>    
</div>           
<input type="hidden" id="banner" name="banner">  
<input type="hidden" id="thumbnail" name="thumbnail">  
          <!--  
                 <div class="form-group"><label for="name" > Banner</label>
				 <input name="banner" class="form-control  form-control-sm " id="banner"  type="file">
				 </div>
				 <div class="form-group">
				 <label for="name" >Thumbnail</label>
				 <input name="thumbnail" class="form-control  form-control-sm " id="thumbnail"  type="file"></div>
			-->					
			  <div class="form-group"><label for="name" class="col-md-6 control-label text-left">Brand Banner<span class="m-l-5 text-red">*</span></label><div class="col-md-9">
                                            <!--
                                            <input name="banner" class="form-control  form-control-sm " id="banner" value="<?php if(!empty($category)){?> {{ $category->banner }} <?php }else{ }?>" type="file">
                                        -->
                                        <button type="button" data-toggle="modal" data-target="#exampleModal" class="image-picker btn btn-default" data-input-name="files[base_image]">
            <i class="fa fa-folder-open m-r-5"></i> Browse
        </button>
        
        <div class="clearfix"></div>
		
        
        
                                        </div></div>
                                        
                                        <div class="form-group"><label for="name" class="col-md-6 control-label text-left">Thumbnail<span class="m-l-5 text-red">*</span></label><div class="col-md-9">
                                            
                                            
                                            <!--<input name="thumbnail" class="form-control  form-control-sm " id="thumbnail" value="<?php if(!empty($category)){?> {{ $category->thumbnail }} <?php }else{ }?>" type="file">
                                            -->
                                            
                                             <button type="button" data-toggle="modal" data-target="#exampleModal" class="image-picker btn btn-default" data-input-name="files[base_image]">
            <i class="fa fa-folder-open m-r-5"></i> Browse
        </button>
        
        <div class="clearfix"></div>
                                            </div></div>
				<div class="form-group">
				<label for="">Status</label>
				<div class="checkbox">
				<label ><input type="checkbox" name="status"   @if (old('status') == 1)
				checked
				@endif value="1"> Active</label>
				</div>
				</div>

                
                
	            <div class="form-group">
	              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	              <a href="{{ route('admin.brand') }}" class="btn btn-warning btn-sm">Back</a>
	            </div>
	          
					
				</div>
	          </form>
            </div>
          </div>

        </div>
<!-- Modal -->
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
		

				<form action="{{ route('brand.store') }}" class="dropzone" id="myId" enctype="multipart/form-data">
				 {{ csrf_field() }}
				<div class="fallback">
				<input name="file" type="file" multiple />
				</div>
				</form>
		</div>
		</div>	
		
		
		
		<div class="row">
		<div class="col-md-12">
		

	@include('admin.showmedia')			
		</div>
		</div>	
		
		
		
		
		
		
		
		
		

		</div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
      </div>

    </div>
  
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
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
$('.banner').click(function(){
	$('#banner').val($(this).val());
});
$('.thumbnail').click(function(){
	$('#thumbnail').val($(this).val());
});

      $("#seller_id").select2();


    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "../server_side/scripts/server_processing.php"
    } );
} );
</script>
 <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
<script type="text/javascript">
        Dropzone.options.imageUpload = {
            maxFilesize         :       1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
        };
		$(document).ready(function() {
		//$("#myId").dropzone({ url: "{{ route('brand.store') }}" });
		});
</script>

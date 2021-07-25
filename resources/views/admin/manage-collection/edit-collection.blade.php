@extends('admin.layout')
@section('content')
<style>.hide{display:none;}</style>
 <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">edit {{$collection->name}} Collection</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Collection</h6>
            </div>
            <form role="form" action="{{ route('admin.update.collection',$collection->id) }}" enctype="multipart/form-data" method="post">
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6 py-2">
	            	@include('includes.messages') 
	              <div class="form-group">
                  <label for="name">Collection Name</label>
                  <input type="text" class="form-control" id="brand_name" name="name"  value="{{ $collection->name }}">
                  <input type="hidden" class="form-control" id="collection_id" value="{{ $collection->id }}">
                </div>

               <div class="form-group">
				    <label for="textarea">Description</label> 
				    <textarea id="textarea" name="description" cols="40" rows="5" class="form-control">{{ $collection->description }}</textarea>
			  </div>
			  <div class="form-group">
			    <label for="select">Collection Type</label> 
			    <div>
			      <select disabled id="select" name="collection_type" class="custom-select" required="required">
			        <option {{$collection->collection_type=='product'?'selected':''}} value="products">Products</option>
			        <option {{$collection->collection_type=='tags'?'selected':''}} value="tags">Tags</option>
			      </select>
			    </div>
			  </div>
			  @if($collection->collection_type=='products')
			   <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Products</h6>
            </div>
            
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class=" col-lg-12 py-2">
	            	<div class="alert alert-success" style="display:none;"><p class="add-message"></p></div>
					<div class="alert alert-danger" style="display:none;"><p class="remove-message"></p></div>
				<label>Select Products</label>	 
				<div class="table-responsive">
                <table class="table table-bordered" id="collection_product_table" style="width:100%">
                    <thead> 
                    <th>Id </th>
                    <th>Product Name</th>
                    <th>Brand Name</th> 
                    <th>Price</th>
                    
                    </thead> 
                    </table>
              </div>
	          
				</div>
				</div>
	        
            </div>
            @endif
             @if($collection->collection_type=='tags')
			   <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tags</h6>
            </div>
            
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class=" col-lg-12 py-2">
	            	<div class="alert alert-success" style="display:none;"><p class="add-message"></p></div>
					<div class="alert alert-danger" style="display:none;"><p class="remove-message"></p></div>
				<label>Select tags</label>	 
				<div class="table-responsive">
                <table class="table table-bordered" id="collection_tag_table" style="width:100%">
                    <thead> 
                    <th>Id </th>
                    <th>Tag Name</th>
                    
                    </thead> 
                    </table>
              </div>
	          
				</div>
				</div>
	        
            </div>
            @endif
			  <div class="form-group">
			    <label for="text1">Expiry</label> 
			    <div class="input-group">
			      <div class="input-group-prepend">
			        <div class="input-group-text">Date</div>
			      </div> 
			      <input  name="expiry_date" type="date" value="{{$collection->expiry_date}}" class="form-control">
			    </div>
			  </div>
				<div class="form-group">
				<label for="">Status</label>
				<div class="checkbox">
				<label ><input {{$collection->status==true?'checked':''}} type="checkbox" name="status"  value="1"> Active</label>
				</div>
				</div>
  <div class="row">
               @if(!$galleries->isEmpty())
				   @foreach($galleries as $gl)
			   <?php $brand = 'collection';
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
                                        <button type="button" data-toggle="modal" data-target="#exampleModal" class="image-picker btn btn-default" data-input-name="files[base_image]">
            <i class="fa fa-folder-open m-r-5"></i> Browse
        </button>
        
        <div class="clearfix"></div>
        
       
                                        </div></div>
                                         <div class="clearfix"></div>
                
	            <div class="form-group">
	            	@if(Auth::user()->can('collections-edit'))
	              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	              @endif
	              <a href="{{ route('admin.manage.collection') }}" class="btn btn-warning btn-sm">Back</a>
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
               
                <form method="post" action="{{route('collectionimage.store')}}" enctype="multipart/form-data"
                            class="dropzone" id="dropzone" style="border:dashed 1px">
				<input type="hidden" class="form-control" id="collection_id" name="collection_id"  value="{{$collection->id }}">	
                @csrf
                </form>
            </div>
		 
        </div>
        <table class="table table-bordered" id="collection_gallery" width="100%" cellspacing="0">
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/tinymce.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
<script type="text/javascript">
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
			
		  
		  var rowCount = $('#collection_gallery tr').length;			
          $('.homemedia_body').append('<tr role="row" class="even"><td class="sorting_1"><input class="product-id-checked" type="checkbox" name="image_id[]" checked="checked" onClick="checkboxgallerySelect(this.value)" value="'+response.media.id+'"></td><td>'+response.media.filename+'</td><td><img src="'+response.media.small+'" width="75"></td></tr>');
        },
        error: function(file, response)
        {
           return false;
        }
    };
    </script>

<script>
tinymce.init({
  selector: 'textarea#textarea',
  height: 300,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat ',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});
function checkboxgallerySelect(id) {

		 
		$.ajax({
		   type:'GET',
		   url:"{{ route('savecollectionGallery') }}",
		   data:{
			   _token:'<?php echo csrf_token();?>',
			   id:id,
			   brand_id:'{{$collection->id}}',
			   
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
function checkboxSelect(id) {


      
//  alert()
$collection_id=$("#collection_id").val();
		 
		$.ajax({
		   type:'GET',
		   url:"{{ route('save.collection.products') }}",
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

function checkboxSelectTag(id) {
//  alert()
$collection_id=$("#collection_id").val();
		 
		$.ajax({
		   type:'GET',
		   url:"{{ route('save.collection.tag') }}",
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
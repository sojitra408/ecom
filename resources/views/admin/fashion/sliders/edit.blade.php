@extends('admin.layout')
@section('content')
 <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
        <div class="container-fluid">
<div class="row">

<div class="col-md-3">
@include('admin.fashion.menu')

</div>

<div class="col-md-9">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Slider</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Slider</h6>
            </div>
            <form role="form" action="{{ route('fashion_banner.update',$slider->id) }}" method="post">
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class=" col-lg-8 py-2">
	            	@include('includes.messages') 
	              <div class="form-group">
                  <label for="name">Slider Title</label>
				  <input class="form-control" type="text" placeholder="Title" name="title" id="title"  value="{{$slider->title}}">
                  
                </div>
				 <div class="form-group">
                  <label for="name">Sub Title</label>
				  <input class="form-control" type="text" placeholder="Heading" name="heading" id="sub_title"  value="{{$slider->heading}}">
                  
                </div>
				<div class="form-group">
                  <label for="name">Description</label>
				  <textarea class="form-control" type="text"  name="description" id="sub_title"  >
				  {{$slider->description}}</textarea>
                  
                </div>

               <div class="form-group"><label for="name" class="control-label text-left">Left Banner<span class="m-l-5 text-red">*</span></label><div class="col-md-9">
				<button type="button" data-toggle="modal" data-target="#exampleModal" class="image-picker btn btn-default" data-input-name="files[base_image]">
				<i class="fa fa-folder-open m-r-5"></i> Browse
				</button>
        </div>
				<div class="clearfix"></div>

                <br>
				<div class="selected-img"> 
				@if($slider->left_image!='')
				<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/slider/medium/{{getSliderMediaById($slider->left_image)}}" width="250" height="250" />	
				@endif
				</div>
                <input type="hidden" id="left_image" value="{{$slider->left_image}}" name="left_image" >
				 <br> <br>
				 </div>
				 
				  <div class="form-group"><label for="name" class="control-label text-left">Right Banner<span class="m-l-5 text-red">*</span></label><div class="col-md-9">
				<button type="button" data-toggle="modal" data-target="#rightModal" class="image-picker btn btn-default" data-input-name="files[base_image]">
				<i class="fa fa-folder-open m-r-5"></i> Browse
				</button>
        </div>
				<div class="clearfix"></div>

                <br>
				<div class="selected-rightimg"> 
				@if($slider->right_image!='')
				<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/slider/medium/{{getSliderMediaById($slider->right_image)}}" width="250" height="250" />	
				@endif
				</div>
                <input type="hidden" id="right_image" value="{{$slider->right_image}}" name="right_image" >
				 <br> <br>
				 </div>
	            <div class="form-group">
	              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	              <a href="{{route('sliders.index')}}" class="btn btn-warning btn-sm">Back</a>
	            </div>
	          
				</div>
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
        <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	   <div class="row">
            <div class="col-md-12">
               
                <form method="post" action="{{route('mediaslider.store')}}" enctype="multipart/form-data"
                            class="dropzone" id="dropzone" style="border:dashed 1px">
			
                @csrf
                </form>
            </div>
		 
        </div>
        <table class="table table-bordered" id="media_slider" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>#</th>
                      <th>Name</th>
                      <th>Image</th>
                       <th>Action</th>
                      
                       
                            
                    </tr>
                  </thead>
                 
                  <tbody class="media-body leftmedia_body">
				  
                    
                  </tbody>
                </table>
      </div>
     
    </div>
  </div>
</div>

	<div class="modal fade" id="rightModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Media</h5>
        <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	   <div class="row">
            <div class="col-md-12">
               
                <form method="post" action="{{route('mediaslider.store')}}" enctype="multipart/form-data"
                            class="dropzone" id="dropzone" style="border:dashed 1px">
			
                @csrf
                </form>
            </div>
		 
        </div>
        <table class="table table-bordered" id="rightmedia_slider" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>#</th>
                      <th>Name</th>
                      <th>Image</th>
                       <th>Action</th>
                      
                       
                            
                    </tr>
                  </thead>
                 
                  <tbody class="media-body rightmedia_body">
				  
                    
                  </tbody>
                </table>
      </div>
     
    </div>
  </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
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
			var rowCount = $('#media_slider tr').length;			
          $('.leftmedia_body').append('<tr role="row" class="even"><td class="sorting_1">'+rowCount+'</td><td>'+response.media.filename+'</td><td><img src="'+response.media.small+'" width="75"></td><td><a href="javascript:void(0)" data-imageid="'+response.media.id+'" class="select-image"> Select</a></td></tr>');
		  var rowCount = $('#rightmedia_slider tr').length;			
          $('.rightmedia_body').append('<tr role="row" class="even"><td class="sorting_1">'+rowCount+'</td><td>'+response.media.filename+'</td><td><img src="'+response.media.small+'" width="75"></td><td><a href="javascript:void(0)" data-imageid="'+response.media.id+'" class="select-rightimage"> Select</a></td></tr>');
		 
        },
        error: function(file, response)
        {
           return false;
        }
    };
    </script>
<script>



$(document).on('click','.select-image',function(e){

	e.preventDefault();

	var id=$(this).attr('data-imageid');
	$('#left_image').val(id);
	 $.ajax({
		
		type: 'POST',
		url: '{{ url("admin/getimagebyid") }}',
		data: {id: id,_token:'{{ csrf_token() }}'},
		success: function (data){
			$('.selected-img').html('');			
			$('.selected-img').html(data);
			$('.close-modal').trigger('click');
			$('body').removeClass('modal-open');        
			$('body').css('padding-right', '');
			$(".modal-backdrop").remove();
			$('#exampleModal').hide();
		}
	
	});
	
	
});
$(document).on('click','.select-rightimage',function(e){

	e.preventDefault();

	var id=$(this).attr('data-imageid');
	$('#right_image').val(id);
	 $.ajax({
		
		type: 'POST',
		url: '{{ url("admin/getimagebyid") }}',
		data: {id: id,_token:'{{ csrf_token() }}'},
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


     


    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "../server_side/scripts/server_processing.php"
    } );
} );
</script>
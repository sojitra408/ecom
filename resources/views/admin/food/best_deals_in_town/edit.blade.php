@extends('admin.layout')
@section('content')
 <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
        <div class="container-fluid">
<div class="row">

<div class="col-md-3">
@include('admin.food.menu')

</div>
<style>
/*body{
  background-color:#f5f5f5;
}*/
.imagePreview {
  width: 100%;
  height: 180px;
  background-position: center center;

 
    background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
 
  background-color:#fff;
  background-size: cover;
  background-repeat:no-repeat;
  display: inline-block;
  box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
}
/*.btn-primary
{
  display:block;
  border-radius:0px;
  box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
  margin-top:-5px;
}*/
.imgUp
{
  margin-bottom:15px;
}
/*.del
{
  position:absolute;
  top:0px;
  right:15px;
  width:30px;
  height:30px;
  text-align:center;
  line-height:30px;
  background-color:rgba(255,255,255,0.6);
  cursor:pointer;
}*/
/*.imgAdd
{
  width:30px;
  height:30px;
  border-radius:50%;
  background-color:#4bd7ef;
  color:#fff;
  box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
  text-align:center;
  line-height:30px;
  margin-top:0px;
  cursor:pointer;
  font-size:15px;
}*/

.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}       
 </style>

<div class="col-md-9">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Best Deals In Town</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Best Deals In Town</h6>
            </div>
            <form role="form" action="{{ route('food.best_deals_in_town.update',$single->id) }}" method="post" enctype=multipart/form-data>
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class=" col-lg-8 py-2">
	            	@include('includes.messages') 
	              <div class="form-group">
                  <label for="name">Title</label>
				  <input class="form-control" type="text" placeholder="Title" name="title" id="title"  value="{{$single->title}}">
                  
                </div>
                
                <div class="form-group">
                  <label for="name">Price</label>
				  <input class="form-control" type="text" placeholder="Price" name="price" id="price"  value="{{$single->price}}">
                  
                </div>
                
                <div class="form-group">
                  <label for="name">Category</label>
				  
				 
				  
				  <select class="form-control form-control-sm" id="select_no_limit" name="category[]" multiple="multiple" required>

          <?php $str_arr=explode(',',$single->category_id); 
                                    
                                     ?>

          @if(!$all_category->isEmpty())

          @foreach ($all_category as $key => $value)

                        <?php $select=""; if(count($str_arr)>0 && !empty($str_arr)){
                              foreach($str_arr as $strarr){
                              
                                if($strarr == $value->id){
                              
                                    $select="selected='selected'";
                              
                                }
                              
                              }}?>
                                             
													@if($value->parent_id==0)
                                                 <option  <?php echo $select ?> value="{{$value->id}}">{{ $value->name }}</option>
													<?php $subcates=getCateByParentId($value->id);
													if(!empty($subcates)){ ?>
													 @foreach ($subcates as $key1 => $value1)
													 
													 
													 <?php $select=""; if(count($str_arr)>0 && !empty($str_arr)){
                              foreach($str_arr as $strarr){
                              
                                if($strarr == $value1->id){
                              
                                    $select="selected='selected'";
                              
                                }
                              
                              }}?>
													 
													 
													 
													 <option <?php echo $select ?> value="{{$value1->id}}">-{{ $value1->name }}</option>
													 <?php $subsubcates=getCateByParentId($value1->id);
													if(!empty($subsubcates)){ ?>
													 @foreach ($subsubcates as $key2 => $value2)
													 
													 <?php $select=""; if(count($str_arr)>0 && !empty($str_arr)){
                              foreach($str_arr as $strarr){
                              
                                if($strarr == $value2->id){
                              
                                    $select="selected='selected'";
                              
                                }
                              
                              }}?>
													 
													 <option <?php echo $select ?> value="{{$value2->id}}">--{{ $value2->name }}</option>
													 @endforeach
													<?php } ?>
													 @endforeach
													<?php } ?>
													@endif
                                                @endforeach


           @endif

        </select>
                  
                </div>
                
                <div class="form-group">
                  <label for="name">Thumbnail</label>
				  <div class="col-md-9">


                                <label type="button"><i class="fa fa-folder-open m-r-5"></i>Browse <input type="file"
                                        name="image" placeholder="Choose image" id="image"
                                        style="width: 0px;height: 0px;overflow: hidden;"></label>
                            </div>
                            
                            <div class="form-group">

                                @if(!empty($single->image))
                                <img id="preview-image-before-upload" src="{{asset('public/'.$single->image)}}"
                                    alt="preview image" style="max-height: 250px;">
                                @else
                                <img id="preview-image-before-upload"
                                    src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                    alt="preview image" style="max-height: 250px;">
                                @endif

                              


                            </div>
                  
                </div>
			

               
                                
                               
				  
	            <div class="form-group">
	              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	              <a href="{{route('food.best_deals_in_town.index')}}" class="btn btn-warning btn-sm">Back</a>
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
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    
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



<script>
//   $(".imgAdd").click(function(){
//   $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
// });
// $(document).on("click", "i.del" , function() {
// //  to remove card
//   $(this).parent().remove();
// // to clear image
//   // $(this).parent().find('.imagePreview').css("background-image","url('')");
// });
$(function() {
    $(document).on("change", ".uploadFile", function() {
        var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test(files[0].type)) { // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function() { // set image data as background of div
                //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url(" +
                    this.result + ")");
            }
        }

    });
});
</script>



<script type="text/javascript">
$(document).ready(function(e) {


    $('#image').change(function() {

        let reader = new FileReader();

        reader.onload = (e) => {

            $('#preview-image-before-upload').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);

    });

});
</script>

<script type="text/javascript">
$(document).ready(function(e) {
    $("#seller_id").select2();
    $("#select_no_limit").select2({
        // tags: true
        maximumSelectionLength: 1
    });

});
</script>


<script>
$(function() {
    $(document).on("change", ".uploadFile", function() {
        var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test(files[0].type)) { // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function() { // set image data as background of div
                //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                uploadFile.closest(".imgUp").find('.imagePrevieww').css("background-image", "url(" +
                    this.result + ")");
            }
        }

    });
});
</script>

<script type="text/javascript">
$(document).ready(function(e) {


    $('#imagee').change(function() {

        let reader = new FileReader();

        reader.onload = (e) => {

            $('#preview-image-before-uploadd').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);

    });

});
</script>
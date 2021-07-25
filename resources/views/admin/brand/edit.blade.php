@extends('admin.layout')
@section('content')
<style>.hide{display:none;}

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
 <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Brand</h1>
        

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary float-left mr-5">Brand</h6>  @if(Auth::user()->can('brands-edit'))<a href="{{route('brand.additional',$project->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Additional Settings</a>@endif
            </div>
            <form role="form" action="{{ route('brand.update',$project->id) }}" method="post">
	          {{ csrf_field() }}
	              <div class="box-body">
	                  <div class="row">
	            <div class=" col-md-6 p-5">
	            	@include('includes.messages') 
	              <div class="form-group">
                  <label for="name">Brand Name</label>
                  <input type="text" class="form-control" id="brand_name" name="brand_name"  value="{{ $project->brand_name }}">
                </div>
                
                <div class="form-group">
                  <label for="name">Brand Id</label>
                  <input type="text" class="form-control" id="brand_seller_id" name="brand_seller_id"  value="{{ $project->brand_seller_id }}" maxlength="11">
                </div>

               

         <div class="form-group">
                  <label for="name">Seller</label>        
<select class="form-control form-control-sm myselect" id="seller_id" name="seller_id">
      @if(!$seller->isEmpty())
		@foreach($seller as $sel )
      <option  value="{{$sel->id}}" 
	  @if($project->seller_id == $sel->id) 
	  selected
	  @endif 
	  >{{$sel->seller_name}}</option>
	  @endforeach
     @endif
    </select>    
</div>               
 <div class="form-group"><label for="name" class="col-md-6 control-label text-left">Brand Banner<span class="m-l-5 text-red">*</span></label><div class="col-md-9">
                                            <!--
                                            <input name="banner" class="form-control  form-control-sm " id="banner" value="<?php if(!empty($category)){?> {{ $category->banner }} <?php }else{ }?>" type="file">
                                        -->
                                        <button type="button" data-toggle="modal" data-target="#exampleModal" class="image-picker btn btn-default" data-input-name="files[base_image]">
            <i class="fa fa-folder-open m-r-5"></i> Browse
        </button>
        
        <div class="clearfix"></div>
        
         <div class="selected-img">
		@if( $project->banner!='')
			<?php $brand_banner = preg_replace('/\s+/', '', $project->brand_name); ?>
		<img width="75" height="75" src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/{{ $brand_banner }}/small/{{getSliderMediaById($project->banner)}}">
		@endif
		</div>
		<input type="hidden" id="banner_image" value="{{$project->banner}}" name="banner_image" >
        
                                        </div></div>
                                         <div class="clearfix"></div><hr>
                                        <div class="form-group"><label for="name" class="col-md-6 control-label text-left">Logo<span class="m-l-5 text-red">*</span></label><div class="col-md-9">
                                            
                                            
                                            <!--<input name="thumbnail" class="form-control  form-control-sm " id="thumbnail" value="<?php if(!empty($category)){?> {{ $category->thumbnail }} <?php }else{ }?>" type="file">
                                            -->
                                            
                                             <button type="button" data-toggle="modal" data-target="#rightModal" class="image-picker btn btn-default" data-input-name="files[base_image]">
            <i class="fa fa-folder-open m-r-5"></i> Browse
        </button>
        
        <div class="clearfix"></div>
		
		 <div class="selected-rightimg">
		@if( $project->thumbnail!='')
			<?php $brand_thumbnail = preg_replace('/\s+/', '', $project->brand_name); ?>
		<img width="75" height="75" src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/{{ $brand_thumbnail }}/small/{{getSliderMediaById($project->thumbnail)}}">
		@endif
		</div>
		<input type="hidden" id="thumbnail_image" value="{{$project->thumbnail}}" name="thumbnail_image" >
                                            </div></div>
                  <div class="clearfix"></div><hr>
				  
				   <div class="form-group">
				   <label for="name" class="col-md-6 control-label text-left">Home Picture<span class="m-l-5 text-red">*</span></label><div class="col-md-9">
                                  
                                            
                    <button type="button" data-toggle="modal" data-target="#homePicModal" class="image-picker btn btn-default" data-input-name="files[base_image]">
            <i class="fa fa-folder-open m-r-5"></i> Browse
        </button>
        
        <div class="clearfix"></div>
		
		 <div class="selected-home_pic">
		@if( $project->home_pic!='')
			<?php $brand_home_pic = preg_replace('/\s+/', '', $project->brand_name); ?>
		<img width="75" height="75" src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/{{ $brand_home_pic }}/small/{{getSliderMediaById($project->home_pic)}}">
		@endif
		</div>
		<input type="hidden" id="home_pic" value="{{$project->home_pic}}" name="home_pic" >
                                            </div></div>

								
							

               
	           
	          
					
				</div>
				
				<div class="col-md-6  p-5"> 
					<div class="form-group">
                  <label for="">Status</label>
                  <div class="checkbox">
                    <label ><input type="checkbox" name="status"   @if ($project->status == 1)
                      checked
                    @endif value="1"> Active</label>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="">Brand Live</label>
                  <div class="checkbox">
                  <label class="switch"> 
                    <input type="checkbox" name="live" @if ($project->live == 1)

                      checked

                    @endif value="1">
                    <span class="slider round"></span>
                 </label>
               </div>

                </div>



                <div class="form-group">

                  <label for="name">FSSAI Licence Number</label>

                  <input type="Number" class="form-control" id="fssai" name="fssai"  value="{{ $project->fssai_licence_number }}">

                </div>
				 <div class="form-group">
				 <label for="name">Category</label><br>
				
				 <?php $attrs=explode(',',$project->category_id);?>
							  @if(!$categories->isEmpty())
								  <?php $c=0; ?>
                            @foreach($categories as $cat )
								<label class=" <?php echo ($cat->id==$project->category_id)?'active':''; ?> " >
    <input required class="checkboxes"  type="checkbox"  value="{{$cat->id}}" name="category[]" id="option{{$c}}" autocomplete="off" <?php echo (in_array($cat->id,$attrs))?'checked ':''; ?> > {{$cat->name}}
  </label>
									
									
								<?php $c++; ?>
                            @endforeach
                          @endif
						 
						  </div>

                <div class="form-group">

                  <label for="name">Brand USP</label>
				  
				  <?php
                        
                        $str_arr = explode (",", $project->brand_usp);
                        // print_r($str_arr); 

                      ?>
                     <select class="form-control form-control-sm" name="usp[]" id="usp" multiple required >

                          <option value="">Select Product USP</option>
                            
                          @if(!$usp->isEmpty())
                          
                          
                          @foreach ($usp as $key => $sel)
                      <?php $select=""; if(count($str_arr)>0 && !empty($str_arr)){
                        foreach($str_arr as $strarr){
                          if($strarr == $sel->id){
                              $select="selected='selected'";
                          }
                      }}?>

                        <option <?php echo $select ?> value="{{$sel->id}}">{{ $sel->code }}</option>
                                                
                      @endforeach
                          
          

                          @endif

                        </select> 

                

                </div>
                
                 <div class="form-group">
                  <label for="">Description</label>
                  <textarea name="description" class="form-control">{{$project->description}}</textarea>
                </div>
                
				</div>
				
				<div class="col-md-12 p-5"> <div class="form-group">
          @if(Auth::user()->can('brands-edit'))
	              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                @endif
	              <a href="{{ route('admin.brand') }}" class="btn btn-warning btn-sm">Back</a>
	            </div></div>
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
        <table class="table table-bordered" id="meadia_list2" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>#</th>
                    <th>Img Name</th>
					  <th>Folder</th>
                      <th>Img</th>
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
               
                <form method="post" action="{{route('brandimage.store')}}" enctype="multipart/form-data"
                            class="dropzone" id="dropzone" style="border:dashed 1px">
							
							<input type="hidden" class="form-control" id="brand_id1" name="brand_id"  value="{{$project->id }}">	
			
                @csrf
                </form>
            </div>
		 
        </div>
        <table class="table table-bordered" id="rightmedia_brand" width="100%" cellspacing="0">
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

	<div class="modal fade" id="homePicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
               
                <form method="post" action="{{route('brandimage.store')}}" enctype="multipart/form-data"
                            class="dropzone" id="dropzone" style="border:dashed 1px">
							
							<input type="hidden" class="form-control" id="brand_id2" name="brand_id"  value="{{$project->id }}">	
			
                @csrf
                </form>
            </div>
		 
        </div>
        <table class="table table-bordered" id="homemedia_brand" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>#</th>
                      <th>Name</th>
                      <th>Image</th>
                       <th>Action</th>
                      
                       
                            
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
			var rowCount = $('#meadia_list2 tr').length;			
          $('.leftmedia_body').append('<tr role="row" class="even"><td class="sorting_1">'+rowCount+'</td><td>'+response.media.filename+'</td><td><img src="'+response.media.small+'" width="75"></td><td><a href="javascript:void(0)" data-imageid="'+response.media.id+'" class="select-image"> Select</a></td></tr>');
		  var rowCount = $('#rightmedia_brand tr').length;			
          $('.rightmedia_body').append('<tr role="row" class="even"><td class="sorting_1">'+rowCount+'</td><td>'+response.media.filename+'</td><td><img src="'+response.media.small+'" width="75"></td><td><a href="javascript:void(0)" data-imageid="'+response.media.id+'" class="select-rightimage"> Select</a></td></tr>');
		  
		  var rowCount = $('#homemedia_brand tr').length;			
          $('.homemedia_body').append('<tr role="row" class="even"><td class="sorting_1">'+rowCount+'</td><td>'+response.media.filename+'</td><td><img src="'+response.media.small+'" width="75"></td><td><a href="javascript:void(0)" data-imageid="'+response.media.id+'" class="select-homeimage"> Select</a></td></tr>');
        },
        error: function(file, response)
        {
           return false;
        }
    };
    </script>
	
	<script type="text/javascript">
$(document).ready(function(){
    var checkboxes = $('.checkboxes');
    checkboxes.change(function(){
        if($('.checkboxes:checked').length>0) {
            checkboxes.removeAttr('required');
        } else {
            checkboxes.attr('required', 'required');
        }
    });
});
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


      $("#seller_id").select2();
	  
	  
$(document).on('click','.select-image',function(e){

	e.preventDefault();
	var id=$(this).attr('data-imageid');
	$('#banner_image').val(id);
	 $.ajax({		
		type: 'POST',
		url: '{{ url("admin/getbrandbannerimagebyid") }}',
		data: {id: id,_token:'{{ csrf_token() }}',brand_id:'{{$project->id}}'},
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

$(document).on('click','.select-homeimage',function(e){

	e.preventDefault();

	var id=$(this).attr('data-imageid');
	$('#home_pic').val(id);
	 $.ajax({
		
		type: 'POST',
		url: '{{ url("admin/getbrandhomeimagebyid") }}',
		data: {id: id,_token:'{{ csrf_token() }}',brand_id:'{{$project->id}}'},
		success: function (data){
			$('.selected-home_pic').html('');			
			$('.selected-home_pic').html(data);
			$('.close-modal').trigger('click');
			$('body').removeClass('modal-open');        
			$('body').css('padding-right', '');
			$(".modal-backdrop").remove();
			$('#homePicModal').hide();
		}
	
	});
	
	
});



    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "../server_side/scripts/server_processing.php"
    } );
} );
</script>

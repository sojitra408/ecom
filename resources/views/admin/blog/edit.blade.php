@extends('admin.layout')
@section('content')
<style>.hide{display:none;}</style>
 <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Blog Post</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Blog Post</h6>
            </div>
            <form role="form" action="{{ route('blog.update',$project->id) }}" method="post">
                <input type="hidden" class="form-control" id="id" name="id"  value="{{ $project->id }}">
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class=" col-lg-8 py-2">
	            	@include('includes.messages') 
	              <div class="form-group">
                  <label for="name">Blog Title</label>
                  <input type="text" class="form-control" id="blog_title" name="blog_title"  value="{{ $project->blog_title }}">
                </div>
                
                 <div class="form-group">
                  <label for="name">Blog Category</label>
                  
                  <div class="col-md-10"> 
            <table class="table ">
                             <td>
               <div class=" btn-group-toggle btn-group-vertical" data-toggle="buttons">
                   
                @if(!$categories->isEmpty())
                  <?php $c=0; ?>
                            @foreach($categories as $cat )
                <label class="btn btn-secondary <?php echo ($cat->id==$project->category_id)?'active':''; ?> ">
                    <input type="radio" value="{{$cat->id}}" name="category" id="option{{$c}}" autocomplete="off" <?php echo ($cat->id==$project->category_id)?'checked':''; ?>  > {{$cat->name}}
                </label>
                  
                  
                <?php $c++; ?>
                            @endforeach
                          @endif
                          
                
                          
              </div>
               </td>
               <td><div class="sub-category"> 
               <?php $sub=explode(',',$project->subcategory_id);
                     
              // echo '<pre>';print_r($sub);
               ?>

               <ul style="list-style: none;">   
 @foreach($subcategories as $sub_cat )
 <li><div class="form-check"> <input type="checkbox"  data-id="{{$sub_cat['id']}}" data-name="{{$sub_cat['text']}}" name="blog_cat[]" value="{{$sub_cat['id']}}" id="option{{$sub_cat['id']}}" autocomplete="off" <?php echo (in_array($sub_cat['id'],$sub))?'checked':''; ?> > <label class="form-check-label" for="option{{$sub_cat['id']}}" >{{$sub_cat['text']}}</label></div> 
  <?php if(!empty($sub_cat['sub_cate'])){ ?>
   <ul style="list-style: none;"> 
    @foreach($sub_cat['sub_cate'] as $cat )
    <li><div class="form-check"> <input type="checkbox"  data-id="{{$cat['id']}}" data-name="{{$cat['text']}}" name="blog_cat[]" value="{{$cat['id']}}" id="option{{$cat['id']}}" autocomplete="off" <?php echo (in_array($cat['id'],$sub))?'checked':''; ?> > <label class="form-check-label" for="option{{$cat['id']}}">{{$cat['text']}}</label></div> </li>
  @endforeach
  </ul>
  <?php } ?>
</li>
 @endforeach
 </ul>
              
               
               
               </div></td>
              
                         </table>
             </div>
                 
                 <!-- <div class="type">
                       <?php $result=DB::table('blog_category')->where('status','1')->orderBy('category_name','asc')->get();
                       
                       $resultarray=DB::table('blog_details')->select('cat_id')->where('blog_id',$project->id)->get();
                       $inarr=array();
                       
                       foreach($resultarray as $ay)
                       {
                         array_push($inarr, $ay->cat_id);  
                       }
					 // echo implode(',',$inarr);
                      foreach($result as $r){
				   ?>
                     <input type="checkbox" name="blog_cat[]" <?php echo (in_array($r->id,$inarr))?'checked':''?>   value="{{$r->id}}">{{$r->category_name}}
                     
                       <?php }?>
                    
				 
				   
				   
				   
				    
                </div> -->
				</div>

               
 	<div class="form-group">
                  <label for="">Short Description</label>
                  <div class="type">
                     <textarea name="short_des"  class="form-control" id="short_des">{{ $project->short_des }}</textarea>
                  </div>
                </div>
                
               
                <div class="form-group">
                  <label for=""> Description</label>
                  <div class="type">
                     <textarea name="description"  class="form-control" id="description">{{ $project->description }}</textarea>
                  </div>
                </div>
                
                <div class="card shadow mb-4 mt-4">

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
                <table class="table table-bordered" id="blog_tag_table" style="width:100%">
                  <input type="hidden" class="form-control" id="collection_id" value="{{ $project->id }}">
                    <thead> 
                    <th>Id </th>
                    <th>Tag Name</th>
                    
                    </thead> 
                    </table>
              </div>
            
        </div>
        </div>
          
            </div>
             
                 
				 <div class="form-group"><label for="name" class="col-md-6 control-label text-left">Featured Image<span class="m-l-5 text-red">*</span></label><div class="col-md-9">
                                           
                                        <button type="button" data-toggle="modal" data-target="#exampleModal" class="image-picker btn btn-default" data-input-name="files[base_image]">
            <i class="fa fa-folder-open m-r-5"></i> Browse
        </button>
        
        <div class="clearfix"></div>
        
         <div class="selected-featured_image">
		@if( $project->featured_image!='')
			<?php $brand_banner = 'blogs'; ?>
		<img width="75" height="75" src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/{{ $brand_banner }}/small/{{getSliderMediaById($project->featured_image)}}">
		@endif
		</div>
		<input type="hidden" id="featured_image" value="{{$project->featured_image}}" name="featured_image" >
        
                                        </div></div>
                                         <div class="clearfix"></div>
                                        <div class="form-group"><label for="name" class="col-md-6 control-label text-left">Horizontal Image<span class="m-l-5 text-red">*</span></label><div class="col-md-9">
                                            
                                            
                                         
                                            
                                             <button type="button" data-toggle="modal" data-target="#rightModal" class="image-picker btn btn-default" data-input-name="files[base_image]">
            <i class="fa fa-folder-open m-r-5"></i> Browse
        </button>
        
        <div class="clearfix"></div>
		
		 <div class="selected-horizontal_image">
		@if( $project->horizontal_image!='')
			<?php $brand_thumbnail = 'blogs'; ?>
		<img width="75" height="75" src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/{{ $brand_thumbnail }}/small/{{getSliderMediaById($project->horizontal_image)}}">
		@endif
		</div>
		<input type="hidden" id="horizontal_image" value="{{$project->horizontal_image}}" name="horizontal_image" >
                                            </div></div>
                  <div class="clearfix"></div>
				  
				   <div class="form-group">
				   <label for="name" class="col-md-6 control-label text-left">Vertical Image<span class="m-l-5 text-red">*</span></label><div class="col-md-9">
                                  
                                            
                    <button type="button" data-toggle="modal" data-target="#homePicModal" class="image-picker btn btn-default" data-input-name="files[base_image]">
            <i class="fa fa-folder-open m-r-5"></i> Browse
        </button>
        
        <div class="clearfix"></div>
		
		 <div class="selected-vertical_image">
		@if( $project->vertical_image!='')
			<?php $brand_home_pic = 'blogs'; ?>
		<img width="75" height="75" src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/{{ $brand_home_pic }}/small/{{getSliderMediaById($project->vertical_image)}}">
		@endif
		</div>
		<input type="hidden" id="vertical_image" value="{{$project->vertical_image}}" name="vertical_image" >
                                            </div></div>
                	 <div class="form-group">
                  <label for="">Reading Time</label>
                  <div class="type">
                   <select name="read_time" id="read_time" class="form_control">
				   <option <?php echo($project->read_time=='1 Min')?'selected':''?>>1 Min</option>
				    <option <?php echo($project->read_time=='2 Min')?'selected':''?>>2 Min</option>
					 <option <?php echo($project->read_time=='3 Min')?'selected':''?>>3 Min</option>
					  <option <?php echo($project->read_time=='4 Min')?'selected':''?>>4 Min</option>
				   </select>
                  </div>
                </div> <div class="form-group">
                  <label for=""> Date Time</label>
                  <div class="type">
                     <input type="date" name="added_date" id="added_date" value="{{$project->added_date}}">
                  </div>
                </div>

        
                 
								
								<div class="form-group">
                  <label for="">Status</label>
                  <div class="checkbox">
                    <label ><input type="checkbox" name="status"   @if ($project->status) == 1)
                      checked
                    @endif value="1"> Active</label>
                  </div>
                </div>

                
                 @if(Auth::user()->can('post-list'))
	              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                @endif
	              <a href="{{ route('admin.blog') }}" class="btn btn-warning btn-sm">Back</a>
	            </div>
	          
					
				</div>
	          </form>
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
               
                <form method="post" action="{{route('blogimage.store')}}" enctype="multipart/form-data"
                            class="dropzone" id="dropzone" style="border:dashed 1px">
				<input type="hidden" class="form-control" id="brand_id" name="brand_id"  value="{{$project->id }}">	
                @csrf
                </form>
            </div>
		 
        </div>
        <table class="table table-bordered" id="blogimage1" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>#</th>
                    <th>Img Name</th>
					
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
               
                <form method="post" action="{{route('blogimage.store')}}" enctype="multipart/form-data"
                            class="dropzone" id="dropzone" style="border:dashed 1px">
							
							<input type="hidden" class="form-control" id="brand_id1" name="brand_id"  value="{{$project->id }}">	
			
                @csrf
                </form>
            </div>
		 
        </div>
        <table class="table table-bordered" id="blogimage2" width="100%" cellspacing="0">
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
               
                <form method="post" action="{{route('blogimage.store')}}" enctype="multipart/form-data"
                            class="dropzone" id="dropzone" style="border:dashed 1px">
							
							<input type="hidden" class="form-control" id="brand_id2" name="brand_id"  value="{{$project->id }}">	
			
                @csrf
                </form>
            </div>
		 
        </div>
        <table class="table table-bordered" id="blogimage3" width="100%" cellspacing="0">
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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/tinymce.min.js"></script>
		   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
<script>
tinymce.init({
  selector: 'textarea#short_des',
  height: 300,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code wordcount',
    
  ],
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat ',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});
tinymce.init({
  selector: 'textarea#description',
  height: 300,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code wordcount',
    'image',
  ],
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat '+
    'image',
  
  
  
  
  image_title: true,
  /* enable automatic uploads of images represented by blob or data URIs*/
  automatic_uploads: true,

  file_picker_types: 'image',

  file_picker_callback: function (cb, value, meta) {
    var input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');

    input.onchange = function () {
      var file = this.files[0];

      var reader = new FileReader();
      reader.onload = function () {


       var id = 'blobid' + (new Date()).getTime();
        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        var base64 = reader.result.split(',')[1];
        var blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);

         cb(blobInfo.blobUri(), { title: file.name });
      };
      reader.readAsDataURL(file);
    };

    input.click();
    },
  
  
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});
$(document).on('click','.add_more_size',function(e){

	e.preventDefault();

	var size=$('#size').html();

	

	var html='<div class="form-group row"><div class="col-sm-8"><input type="hidden" name="attr_id[]" value=""><label for="attr_value" class="control-label col-form-label">Attribute Value <span class="required">*</span></label><input type="text" name="attr_value[]" id="attr_value" class="form-control"  value="" placeholder=""/></div><div class="col-sm-4"><a href="javascript:void(0)" class="btn btn-danger less_more_size" style="margin-top:34px;"><i class="fa fa-minus"></i></a></div></div>';

	

	$('.size_section').append(html);

});



$(document).on('click','.less_more_size',function(e){

	e.preventDefault();

	$(this).parent().parent('div').remove();

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


      $("#seller_id").select2();


    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "../server_side/scripts/server_processing.php"
    } );
} );

$(document).on('click','.select-img1',function(e){

	e.preventDefault();
	var id=$(this).attr('data-imageid');
	$('#featured_image').val(id);
	 $.ajax({		
		type: 'POST',
		url: '{{ url("admin/getblogimagebyid") }}',
		data: {id: id,_token:'{{ csrf_token() }}',brand_id:'{{$project->id}}'},
		success: function (data){
			$('.selected-featured_image').html('');			
			$('.selected-featured_image').html(data);
			$('.close-modal').trigger('click');
			$('body').removeClass('modal-open');        
			$('body').css('padding-right', '');
			$(".modal-backdrop").remove();
			$('#exampleModal').hide();
		}
	
	});	
	
});

$(document).on('click','.select-img2',function(e){

	e.preventDefault();
	var id=$(this).attr('data-imageid');
	$('#horizontal_image').val(id);
	 $.ajax({		
		type: 'POST',
		url: '{{ url("admin/getblogimagebyid") }}',
		data: {id: id,_token:'{{ csrf_token() }}',brand_id:'{{$project->id}}'},
		success: function (data){
			$('.selected-horizontal_image').html('');			
			$('.selected-horizontal_image').html(data);
			$('.close-modal').trigger('click');
			$('body').removeClass('modal-open');        
			$('body').css('padding-right', '');
			$(".modal-backdrop").remove();
			$('#rightModal').hide();
		}
	
	});	
	
});

$(document).on('click','.select-img3',function(e){

	e.preventDefault();
	var id=$(this).attr('data-imageid');
	$('#vertical_image').val(id);
	 $.ajax({		
		type: 'POST',
		url: '{{ url("admin/getblogimagebyid") }}',
		data: {id: id,_token:'{{ csrf_token() }}',brand_id:'{{$project->id}}'},
		success: function (data){
			$('.selected-vertical_image').html('');			
			$('.selected-vertical_image').html(data);
			$('.close-modal').trigger('click');
			$('body').removeClass('modal-open');        
			$('body').css('padding-right', '');
			$(".modal-backdrop").remove();
			$('#homePicModal').hide();
		}
	
	});	
	
});
</script>

<script>
    $(document).ready(function() {
 $("#category").select2();	
 
 
  
	
	$("input[name='category']").change(function(){
		
		var cate_id=$(this).val();
		 var adminUrl='<?php echo url('/admin')?>';
		$.ajax({
		   type:'POST',
		   url:adminUrl+'/getSubCateByCategory',
		   data:{
			   _token:'<?php echo csrf_token();?>',
			   cate_id:cate_id
		   },
		   success:function(data){
			console.log($.parseJSON(data));
		
			$('.sub-category').html('');
			var obj=$.parseJSON(data);
	var html='<ul style="list-style: none;">';		  
$.each(obj, function(key,value) {

 
 html+='<li><div class="form-check"><input type="checkbox" class="form-check-input" data-id="'+value.id+'" data-name="'+value.text+'" name="subcategory[]" value="'+value.id+'" id="option'+value.id+'" autocomplete="off"><label class="form-check-label" for="option'+value.id+'">'+value.text+'</label></div>';
 if(value.sub_cate.length>0){
 html+='<ul style="list-style: none;">';
 $.each(value.sub_cate, function(key1,value1) {
html+=' <li><div class="form-check">    <input type="checkbox" class="form-check-input" data-id="'+value1.id+'" data-name="'+value1.text+'" name="subcategory[]" value="'+value1.id+'" id="option'+value1.id+'" autocomplete="off"><label class="form-check-label" for="exampleCheck1">'+value1.text+'</label></div> </li>';
 });
html+='</ul>';
}

html+='</li>';

}); 
html+='</ul>';

			
			$('.sub-category').html(html);
		   }
		});
	}); 
		});
		
		function checkboxSelectTag(id) {
//  alert()
$collection_id=$("#collection_id").val();
  
    $.ajax({
       type:'GET',
       url:"{{ route('save.blog.tag') }}",
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
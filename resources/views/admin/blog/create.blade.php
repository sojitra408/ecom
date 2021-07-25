@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Add New Blog</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Blog</h6>
            </div>
            <form role="form" action="{{ route('blog.store') }}" enctype="multipart/form-data" method="post">
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class=" col-lg-8 py-2">
	            	@include('includes.messages') 
	              <div class="form-group">
                  <label for="name">Blog Title</label>
                  <input type="text" class="form-control" id="blog_title" name="blog_title"  value="{{ old('blog_title') }}">
                </div>
				<div class="form-group row">
                      <label for="brand" class="col-md-2 ">Categories<span class="m-l-5 text-red">*</span></label>
					                          <div class="col-md-10"> 
					  <table class="table ">
                             <td>
							 <div class=" btn-group-toggle btn-group-vertical" data-toggle="buttons">
							  @if(!$categories->isEmpty())
								  <?php $c=0; ?>
                            @foreach($categories as $cat )
								<label class="btn btn-secondary  ">
    <input type="radio" value="{{$cat->id}}" name="category" id="option{{$c}}" autocomplete="off"  required> {{$cat->name}}
  </label>
									
									
								<?php $c++; ?>
                            @endforeach
                          @endif
						  </div>
							 </td>
							 <td><div class="sub-category"> 
							 <?php 
							// echo '<pre>';print_r($sub);
							 ?>
							
							 
							 
							 </div></td>
							
                         </table>
						 </div>
                     <!-- <div class="col-md-4">
                        <select class="form-control form-control-sm" id="category"  name="category" required>
                           <option value="">Select Category Name</option>
                           @if(!$categories->isEmpty())
                            @foreach($categories as $cat )
								
									<option value="{{$cat->id}}">{{$cat->name}}</option>
									
								
                            @endforeach
                          @endif
                        </select>                 
                      </div> 
                     <label for="sub_category" class="col-md-2 control-label text-left">Sub Categories<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <select class="form-control form-control-sm" multiple="multiple" id="sub_category"  name="sub_category" required>
                           <option value="">Select Category Name</option>
                           
                        </select>                 
                      </div> -->
                    </div>
				 
				
				
				
				<div class="form-group">
                  <label for="">Short Description</label>
                  <div class="type">
                     <textarea name="short_des"  class="form-control" id="short_des">{{ old('short_des') }}</textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for=""> Description</label>
                  <div class="type">
                     <textarea name="description"  class="form-control" id="description">{{ old('description') }}</textarea>
                  </div>
                </div>
                
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
                <table class="table table-bordered" id="blog_tag_table" style="width:100%">
                    <thead> 
                    <th>Id </th>
                    <th>Tag Name</th>
                    
                    </thead> 
                    </table>
              </div>
            
        </div>
        </div>
          
            </div>
            
                <!--<div class="form-group">-->
                <!--  <label for=""> Tags</label>-->
                <!--  <div class="type">-->
                <!--     <textarea name="tags"  class="form-control" id="tags">{{ old('tags') }}</textarea>-->
                <!--  </div>-->
                <!--</div>-->
                
               
                	 <div class="form-group">
                  <label for="">Reading Time</label>
                  <div class="type">
                   <select name="read_time" id="read_time" class="form_control">
				   <option>1 Min</option>
				    <option>2 Min</option>
					 <option>3 Min</option>
					  <option>4 Min</option>
				   </select>
                  </div>
                </div> <div class="form-group">
                  <label for=""> Date Time</label>
                  <div class="type">
                     <input type="date" name="added_date" id="added_date">
                  </div>
                </div>


                 <div class="form-group">
                  <label for="">Status</label>
                  <div class="checkbox">
                    <label ><input type="checkbox" name="status"   @if (old('status') == 1)
                      checked
                    @endif value="1"> Active</label>
                  </div>
                </div>

                 
                
	            <div class="form-group">
                @if(Auth::user()->can('post-list'))
      
	              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                @endif
	              <a href="{{ route('admin.blog') }}" class="btn btn-warning btn-sm">Back</a>
	            </div>
	          
					
				</div>
	          </form>
            </div>
			
          </div>

        </div>
		<!-- Modal -->

@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/tinymce.min.js"></script>
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
    'image'
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

	

	var html='<div class="form-group row"><div class="col-sm-8"><label for="attr_value" class="control-label col-form-label">Attribute Value <span class="required">*</span></label><input type="text" name="attr_value[]" id="attr_value" class="form-control"  value="" placeholder=""/></div><div class="col-sm-4"><a href="javascript:void(0)" class="btn btn-danger less_more_size" style="margin-top:34px;"><i class="fa fa-minus"></i></a></div></div>';

	

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

$(document).ready(function() {
 $("#category").select2();	
 
 
  
	
	$("input[name='category']").change(function(){
		//$("#sub_category").val('').trigger('change');
		//var cate_id=$(this).find('option:selected').val();
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
			// $('#sub_category').select2({data: $.parseJSON(data)});
			$('.sub-category').html('');
			var obj=$.parseJSON(data);
	var html='<ul style="list-style: none;">';		  
$.each(obj, function(key,value) {
 // html+='<label class="btn btn-secondary active"> <input type="checkbox" class="sub-cate-check" data-id="'+value.id+'" data-name="'+value.text+'" name="subcategory[]" value="'+value.id+'" id="option'+value.id+'" autocomplete="off" > '+value.text+' </label>';
 
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
     // console.log($collection_id);
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
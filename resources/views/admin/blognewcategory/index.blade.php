@extends('admin.layout')

@section('content')
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
        <div class="container-fluid">



          <!-- Page Heading -->

          <h1 class="h3 mb-2 text-gray-800">All Category</h1>

         



          <!-- DataTales Example -->

          <div class="card shadow mb-4">

            <div class="card-header py-3">

              <h6 class="m-0 font-weight-bold text-primary">Category Tree</h6>

            </div>

            <div class="card-body">



              <!-- <div class="col-lg-2 col-md-3">

                <div class="row">
                  
                  <button class="btn btn-default add-root-category">Add Root Category</button>
                  <button class="btn btn-default add-sub-category disabled">Add Subcategory</button>

                </div>


              </div> -->



                <div class="row">

                    <div class="col-md-4">
                      <button type="button" class="btn btn-primary btn-sm add-root-category" id="categorys"><i class="fas fa-plus"></i> Add Root Category</button></br>
                      <button class="btn  btn-warning btn-sm mt-2 add-sub-category" id="subcategorys"><i class="fas fa-plus"></i> Add Subcategory</button>




                        <div class="tree well">
                          {!! $tree !!}


                          

    <!-- <ul class="m-0 p-0">

        <li>

            <span><i class=" fas fa-folder-open"></i> Parent</span> <a href="">Create</a>

            <ul>

                <li>

                	<span><i class="fas fa-minus-circle"></i></i> Child</span> <a href="">Create</a>

                    <ul>

                        <li>

	                        <span><i class=" fas fa-leaf"></i> Grand Child</span> <a href="">Create</a>

                        </li>

                    </ul>

                </li>

                <li>

                	<span><i class="icon-minus-sign"></i> Child</span> <a href="">Goes somewhere</a>

                    <ul>

                        <li>

	                        <span><i class="icon-leaf"></i> Grand Child</span> <a href="">Goes somewhere</a>

                        </li>

                        <li>

                        	<span><i class="icon-minus-sign"></i> Grand Child</span> <a href="">Goes somewhere</a>

                            

                        </li>

                        

                    </ul>

                </li>

            </ul>

        </li>
    </ul> -->

</div>

                        

                    </div>

                    

                    <div class="col-md-8" id="category" style="display:none">

                      <form method="POST" action="<?php if(!empty($category)){?> {{ route('blogcategory.update',$category->id) }} <?php }else{ ?> {{ route('admin.blogcategorycreate') }} <?php } ?>" class="form-horizontal" id="category-form" novalidate="" enctype="multipart/form-data">
                     
                        {{ csrf_field() }}

                                        <div id="id-field" class="hide">
                                          @include('includes.messages')

                                        <div class="form-group"> <div class="col-md-9"><input name="id" class="form-control form-control-sm " id="id" value="<?php if(!empty($category)){?> {{ $category->id }} <?php }else{ ?>{!! empty($lastid) ? 1 : $lastid+1 !!} <?php } ?>" type="hidden" disabled=""></div></div>

                                        </div>
                                        <div class="form-group"><label for="name" class="col-md-3 control-label text-left">Name<span class="m-l-5 text-red">*</span></label><div class="col-md-9"><input name="name" class="form-control  form-control-sm " id="name" value="<?php if(!empty($category)){?> {{ $category->name }} <?php }else{ }?>" type="text"></div></div>
                                        
                                        <div class="form-group"><label for="name" class="col-md-3 control-label text-left">Category Banner<span class="m-l-5 text-red">*</span></label><div class="col-md-9">
                                            <!--
                                            <input name="banner" class="form-control  form-control-sm " id="banner" value="<?php if(!empty($category)){?> {{ $category->banner }} <?php }else{ }?>" type="file">
                                        -->
                                        <button type="button"  data-toggle="modal" data-target="#exampleModal" class=" open-modal image-picker btn btn-default" data-input-name="files[base_image]">
            <i class="fa fa-folder-open m-r-5"></i> Browse
        </button>
        
        <div class="clearfix"></div>
        
        <div class="selected-img">
		@if(!empty($category) && $category->banner!='')
		<img width="75" height="75" src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/category/small/{{getSliderMediaById($category->banner)}}">
		@endif
		</div>
		<input type="hidden" id="banner_image" value="<?php echo (!empty($category) && $category->banner!='')?$category->banner:''; ?>" name="banner_image" >
        
                                        </div></div>
                                        
                                        <div class="form-group"><label for="name" class="col-md-3 control-label text-left">Thumbnail<span class="m-l-5 text-red">*</span></label><div class="col-md-9">
                                            
                                            
                                            <!--<input name="thumbnail" class="form-control  form-control-sm " id="thumbnail" value="<?php if(!empty($category)){?> {{ $category->thumbnail }} <?php }else{ }?>" type="file">
                                            -->
                                            
                                             <button type="button"  data-toggle="modal" data-target="#rightModal" class="image-picker btn btn-default" data-input-name="files[base_image]">
            <i class="fa fa-folder-open m-r-5"></i> Browse
        </button>
        
        <div class="clearfix"></div>
		 <br>
				<div class="selected-rightimg"> 
				@if(!empty($category) && $category->thumbnail!='')
				<img width="75" height="75" src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/category/small/{{getSliderMediaById($category->thumbnail)}}">
		
				@endif
				</div>
                <input type="hidden" id="thumbnail_image" value="<?php echo (!empty($category) && $category->thumbnail!='')?$category->thumbnail:''; ?>" name="thumbnail_image" >
				 <br> <br>
		
                                            </div></div>
                                        
                                        <div class="form-group">
                                          <label for="attribute" class="col-md-3 control-label text-left">Select Feature<span class="m-l-5 text-red">*</span></label>
                                          <div class="col-md-9">
                                            <select name="feature[]" class="form-control  form-control-sm " id="feature" multiple onclick="test()">
                                              <option value="">--- Select Feature ---</option>
                                              <?php if(!empty($features)){ 
                                                $attribute=array();
                                                foreach($features as $attr){
                                                  if(!empty($category)){
                                                    $attribute=explode(',',$category->attribute);
                                                   }?>  
                                                  <option <?php if(!empty($attribute)){ if(in_array($attr->id,$attribute)){echo 'selected';}} ?> value="{{$attr->id}}">{{$attr->name}}</option>
                                              <?php } }else{ ?>
                                                <option value="">No Record Found</option>
                                              <?php } ?>
                                            </select>
                                          </div>
                                        </div>
										<div class="form-group">
                                          <label for="attribute" class="col-md-3 control-label text-left">Select Feature Values<span class="m-l-5 text-red">*</span></label>
                                          <div class="col-md-9 featuresection">
										  @if (count($attribute)>0)
										  <?php
										  $values=\App\FeatureValue::whereIn('feature_id',$attribute)->where('status',1)->where('trash',0)->get();
										  $ik=0;
										  if(!$values->isEmpty()){
											foreach ($values as $val){
												$ik++;
												echo '<input type="checkbox" name="fval[]" id="fval'.$ik.'" ';
												$catf=\App\CategoryFeature::where('category_id',$category->id)->where('value_id',$val->id)->get();
												if(!$catf->isEmpty())
												{
													echo "checked ";
												}
												echo 'value="'.$val->id.'">'.$val->value_name.'&nbsp;&nbsp;&nbsp;&nbsp;'  ;
						}
		}
										  
										  ?>
										  @endif
                                                                           
																		   </div>
                                        </div>
                                        <?php if(empty($category)){?>
                                          <div class="form-group"><label for="is_searchable" class="col-md-3 control-label text-left"><b>Searchable</b></label><div class="col-md-9"><div class="checkbox"><input type="hidden" value="0" name="is_searchable"> <input type="checkbox" name="is_searchable" class="" id="is_searchable" value="1"> <label for="is_searchable">Show this category in search box category list</label></div></div></div>

                                          <div class="form-group"><label for="is_active" class="col-md-3 control-label text-left">Status</label><div class="col-md-9"><div class="checkbox"><input type="hidden" value="0" name="is_active"> <input type="checkbox" name="is_active" class="" id="is_active" value="1"> <label for="is_active">Enable the category</label></div></div></div>
                                        <?php } ?>
                                        <div class="col-md-offset-2 col-md-10">
                                          @if(Auth::user()->can('blog-category-list'))
                                <button type="submit" class="btn btn-primary btn-sm" data-loading="">
                                    Save
                                </button>
                                @endif

                             <!--   <button type="button" class="btn btn-link text-red btn-delete p-l-0 hide" data-confirm="">
                                    Delete
                                </button>-->
                            </div>
                          </form>
                                   
                    </div>

                    <div class="col-md-8 toshow" id="subcategory" style="display:none">

                        <form method="POST" action="{{ route('admin.subblogcategorycreate') }}" class="form-horizontal" id="subcategory-form" novalidate="" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="">
                        {{ csrf_field() }}

                                        <div id="id-field" class="hide">
                                          @include('includes.messages')

                                            <div class="form-group"><label for="id" class="col-md-3 control-label text-left">Category</label><div class="col-md-9"><!-- <input name="id" class="form-control " id="id" value="{!! empty($lastid) ? 1 : $lastid+1 !!}" type="text" disabled=""></div> -->
                                              <select name="select_category" id="select_category" class="form-control form-control-sm" onclick="test()">

                                                <option value="">--- Select Category ---</option>

                                                @foreach ($data as $key => $value)

                                                 <!-- <option value="{{ $value->id }}">{{ $value->name }}</option> -->
													@if($value->parent_id==0)
                                                 <option  value="{{$value->id}}">{{ $value->name }}</option>
													<?php $subcates=getCateByParentId($value->id);
													if(!empty($subcates)){ ?>
													 @foreach ($subcates as $key1 => $value1)
													 <option value="{{$value1->id}}">-{{ $value1->name }}</option>
													 <?php $subsubcates=getCateByParentId($value1->id);
													if(!empty($subsubcates)){ ?>
													 @foreach ($subsubcates as $key2 => $value2)
													 <option value="{{$value2->id}}">--{{ $value2->name }}</option>
													 @endforeach
													<?php } ?>
													 @endforeach
													<?php } ?>
													@endif
                                                @endforeach
                                              </select>

                                            </div>

                                        </div>
                                        <div class="form-group">
                                          <label for="attribute" class="col-md-3 control-label text-left">Select Feature<span class="m-l-5 text-red">*</span></label>
                                          <div class="col-md-9">
                                            <select name="feature[]" class="form-control  form-control-sm " id="feature" multiple>
                                              <option value="">--- Select Feature ---</option>
                                              <?php if(count($features) > 0){ 
                                                $attribute=array();
                                                foreach($features as $attr){
                                                  if(!empty($category)){
                                                    $attribute=explode(',',$category->attribute);
                                                   }?>  
                                                  <option <?php if(count($attribute)>0){ if(in_array($attr->id,$attribute)){echo 'selected';}} ?> value="{{$attr->id}}">{{$attr->name}}</option>
                                              <?php } }else{ ?>
                                                <option value="">No Record Found</option>
                                              <?php } ?>
                                            </select>
                                          </div>
                                        </div>
										<div class="form-group">
                                          <label for="attribute" class="col-md-3 control-label text-left">Select Feature Values<span class="m-l-5 text-red">*</span></label>
                                          <div class="col-md-9 featuresection">
                                         @if (count($attribute)>0)
										  <?php
										  $values=\App\FeatureValue::whereIn('feature_id',$attribute)->where('status',1)->where('trash',0)->get();
										  $ik=0;
										  if(!$values->isEmpty()){
											foreach ($values as $val){
												$ik++;
												echo '<input type="checkbox" name="fval[]" id="fval'.$ik.'" ';
												$catf=\App\CategoryFeature::where('category_id',$category->id)->where('value_id',$val->id)->get();
												if(!$catf->isEmpty())
												{
													echo "checked ";
												}
												echo 'value="'.$val->id.'">'.$val->value_name.'&nbsp;&nbsp;&nbsp;&nbsp;'  ;
						}
		}
										  
										  ?>
										  @endif
                                    
																		   </div>
                                        </div>
                                       
                                       <div class="form-group"><label for="name" class="col-md-3 control-label text-left">Category Banner<span class="m-l-5 text-red">*</span></label><div class="col-md-9">
                                            <!--
                                            <input name="banner" class="form-control  form-control-sm " id="banner" value="<?php if(!empty($category)){?> {{ $category->banner }} <?php }else{ }?>" type="file">
                                        -->
                                        <button type="button"  data-toggle="modal" data-target="#exampleModal" class=" open-modal image-picker btn btn-default" data-input-name="files[base_image]">
            <i class="fa fa-folder-open m-r-5"></i> Browse
        </button>
        
        <div class="clearfix"></div>
        
        
        
                                        </div></div>
                                        
                                        <div class="form-group"><label for="name" class="col-md-3 control-label text-left">Thumbnail<span class="m-l-5 text-red">*</span></label><div class="col-md-9">
                                            
                                            
                                            <!--<input name="thumbnail" class="form-control  form-control-sm " id="thumbnail" value="<?php if(!empty($category)){?> {{ $category->thumbnail }} <?php }else{ }?>" type="file">
                                            -->
                                            
                                             <button type="button"  data-toggle="modal" data-target="#rightModal" class="image-picker btn btn-default" data-input-name="files[base_image]">
            <i class="fa fa-folder-open m-r-5"></i> Browse
        </button>
        
       <div class="clearfix"></div>

               
                                            </div></div>

                                        <div class="form-group"><label for="name" class="col-md-3 control-label text-left">Sub Category<span class="m-l-5 text-red">*</span></label><div class="col-md-9"><input name="name" class="form-control form-control-sm " id="name" value="" type="text"></div></div>

                                        <div class="form-group"><label for="is_searchable" class="col-md-3 control-label text-left">Searchable</label><div class="col-md-9"><div class="checkbox"><input type="hidden" value="0" name="is_searchable"> <input type="checkbox" name="is_searchable" class="" id="is_searchable" value="1"> <label for="is_searchable">Show this category in search box category list</label></div></div></div>

                                        <div class="form-group"><label for="is_active" class="col-md-3 control-label text-left">Status</label><div class="col-md-9"><div class="checkbox"><input type="hidden" value="0" name="is_active"> <input type="checkbox" name="is_active" class="" id="is_active" value="1"> <label for="is_active">Enable the category</label></div></div></div>

                                        <div class="col-md-offset-2 col-md-10">
                                          @if(Auth::user()->can('blog-category-list'))
                                <button type="submit" class="btn btn-primary" data-loading="">
                                    Save
                                </button>
                                @endif

                                <button type="button" class="btn btn-link text-red btn-delete p-l-0 hide" data-confirm="">
                                    Delete
                                </button>
                            </div>
                          </form>
                                   
                    </div>

                    

                </div>

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
               
                <form method="post" action="{{route('categoryimage.store')}}" enctype="multipart/form-data"
                            class="dropzone" id="dropzone" style="border:dashed 1px">
                @csrf
                </form>
            </div>
		 
        </div>
        <table class="table table-bordered" id="category_media" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>#</th>
                      <th>Image Name</th>
                      <th>Img</th>
                       <th>Action</th>
                             
                    </tr>
                  </thead>
                 
                  <tbody class="media-body">
				  
                    
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
        <table class="table table-bordered" id="rightcategory_media" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>#</th>
                      <th>Name</th>
                      <th>Image</th>
                       <th>Action</th>
                      
                       
                            
                    </tr>
                  </thead>
                 
                  <tbody class="rightmedia_body">
				  
                    
                  </tbody>
                </table>
      </div>
     
    </div>
  </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
			var rowCount = $('#category_media tr').length;			
          $('.media-body').append('<tr role="row" class="even"><td class="sorting_1">'+rowCount+'</td><td><img src="'+response.media.small+'" width="75"></td><td><a href="javascript:void(0)" data-imageid="'+response.media.id+'" class="select-image"> Select</a></td></tr>');
		  var rowCount = $('#rightcategory_media tr').length;			
          $('.rightmedia_body').append('<tr role="row" class="even"><td class="sorting_1">'+rowCount+'</td><td><img src="'+response.media.small+'" width="75"></td><td><a href="javascript:void(0)" data-imageid="'+response.media.id+'" class="select-rightimage"> Select</a></td></tr>');;
        },
        error: function(file, response)
        {
           return false;
        }
    };
    </script>
<script type="text/javascript">
function test(){
var invoice_id=""//$(this).find('option:selected').val();
	//var contract_type=$('#contract_type').find('option:selected').val();
  var selected = [];
  for (var option of document.getElementById('feature').options) {
    if (option.selected) {
      selected.push(option.value);
    }
  }
feature_id=selected;
//if(feature_id!=''){
		$.ajax({
		   type:'POST',
		   url:'{{ url("admin/get-featurevalues") }}',
		   data:{
			   _token:'<?php echo csrf_token() ?>',
			   feature_id:feature_id
		   },
		   success:function(data) {			  $(".featuresection").html(data);
		   }
		});
	//}
	}
 $('#feature').change(function(){
	
});



  $(document).ready(function(){ 
    $("#category").show();
    $("div.toshow").hide();

    $("#categorys").click(function(){ 
      //console.log("hii");
      $("#category-form").attr('action','{{url('/')}}/admin/addcategory');
        $("#name").val('Enter Name');
      $("#id").val(0);
      
      $("#category").show();
      $("div.toshow").hide();
    });
  
    $("#subcategorys").click(function(){ 
       $("#subcategory-form").attr('action','{{url('/')}}/admin/addsubcategory')
       $("#name").val();
      $("div.toshow").show();
      $("#category").hide();
      
    });
});

$(document).on('click','.select-image',function(e){

	e.preventDefault();

	var id=$(this).attr('data-imageid');
	$('#banner_image').val(id);
	 $.ajax({
		
		type: 'POST',
		url: '{{ url("admin/getcateimagebyid") }}',
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
	$('#thumbnail_image').val(id);
	 $.ajax({
		
		type: 'POST',
		url: '{{ url("admin/getcateimagebyid") }}',
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
</script>
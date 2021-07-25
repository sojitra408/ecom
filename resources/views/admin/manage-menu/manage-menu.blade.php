@extends('admin.layout')
@section('content')
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">All Menu</h1>
@include('includes.messages') 
<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
   <!--<a class="btn btn-primary btn-sm" href="{{route('menu.create')}}" ><i class="fas fa-plus"></i> Add New Main Menu</a>-->
   <!--<a class="btn btn-primary btn-sm" href="{{route('menu.sub.create')}}" ><i class="fas fa-plus"></i> Add New Sub Menu</a>-->
</div>
<div class="card-body">
   <div class="row">
      
      <div class="col-md-4">
          
          @include('admin.manage-menu.leftbar')
          
          
          
    <!--     <div class="list-group">-->
    <!--        <a href="{{route('admin.manage.menu')}}" class="list-group-item list-group-item-action active">-->
    <!--        Categories-->
    <!--        </a>-->
			 <!--<a href="{{route('category.order')}}" class="list-group-item list-group-item-action">Category Order </a>-->
    <!--        <a href="#" class="list-group-item list-group-item-action">Brands</a>-->
    <!--        <a href="#" class="list-group-item list-group-item-action">Collection</a>-->
    <!--        <a href="#" class="list-group-item list-group-item-action">TOT Corner</a>-->
           
    <!--     </div>-->
      </div>
      <div class="col-md-8">
         <div id="accordion">

            @php
            $i = 0
            @endphp

            @foreach($data as $key => $menu)
            	

            <div class="card">
               <div class="card-header" id="heading-<?php echo("$menu->id")?>">
                  <h5 class="mb-0">
                     <a role="button" data-toggle="collapse" href="#collapse-<?php echo("$menu->id")?>" aria-expanded="true" aria-controls="collapse-<?php echo("$menu->id")?>">
                     {{ $menu->name }}
                     </a>
                     @if(Auth::user()->can('menu-management'))
                     <a class="btn btn-success btn-sm" role="button" data-toggle="modal" data-target="#exampleModal-{{$menu->id}}"><span class="fa fa-edit"></span></a>
                    
                    <form action="{{route('manage-menu.delete',$menu->id)}}" method="POST"
                                style="display: inline"
                                onsubmit="return confirm('Are you sure?');">
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}
                                <button class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>
                            </form>
                            @endif

                   <!--  <a href="" class="btn btn-danger delete" data-id="{{$menu->id}}"><i class="fa fa-trash"></i></a> -->

                     <!-- <a class="btn btn-danger" role="button" data-toggle="modal" data-target="#exampleModal-{{$menu->id}}"><span class="fa fa-trash"></span></a> -->
                  </h5>
               </div>
	               @if(count($menu->childs))
	               @include('admin.manage-menu.manageChild',['childs' => $menu->childs])
					@else

						 <div class="col-md-12">
                            @if(Auth::user()->can('menu-management'))
            <a class="btn btn-success btn-sm" role="button" data-toggle="modal" data-target="#addModal-{{$menu->id}}"><span class="fa fa-plus"></span></a>@endif
         </div>
	               @endif
               </div>
			  
			   
			   <div class="modal fade" id="exampleModal-{{$menu->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form role="form" action="{{ route('menu.edit',$menu->id) }}" method="post" enctype= multipart/form-data>
               {{ csrf_field() }}
              
               <div class="row">
                  <div class="col-lg-offset-3 col-lg-12">
                     <div class="form-group">
                        <label for="address">Name</label>
                        <input type="text" class="form-control form-control-sm" id="name" name="name" required="" value="{{$menu->name}}">
                     </div>
                     
                     <div class="form-group">
                        <label for="address">Url</label>
                        <!--<input type="text" class="form-control form-control-sm" id="name" name="name" required="" value="">-->
                        
                        <select name="url" id="select_category" class="form-control form-control-sm"  required="" >

                                                <option value="">--- Select Brand ---</option>
						<?php $subcates=getBrandByParentMenuId($menu->id); ?>
                                               
                                        @foreach ($subcates as $key1 => $value1)
                                        <option value="{{$value1->id}}" {{ ( $value1->id == $menu->url) ? 'selected' : '' }} >{{ $value1->brand_name }}</option>
                                        
                                                @endforeach
                                              </select>
                        
                        
                        
                     </div>
                     
					 <div class="form-group"><label for="name" class="col-md-6 control-label text-left">Brand Banner<span class="m-l-5 text-red">*</span></label><div class="col-md-9">
                                            
                                        <button type="button" data-toggle="modal" data-target="#bannerModal" class="image-picker btn btn-default" data-input-name="files[base_image]">
            <i class="fa fa-folder-open m-r-5"></i> Browse
        </button>
        
        <div class="clearfix"></div>
        
         <div class="selected-img">
		@if( $menu->banner!='')
			<?php $brand_banner = 'menu'; ?>
		<img width="75" height="75" src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/{{ $brand_banner }}/small/{{getSliderMediaById($menu->banner)}}">
		@endif
		</div>
		<input type="hidden" class="banner_image" id="banner_image" value="{{$menu->banner}}" name="banner_image" >
        
                                        </div></div>
                                         <div class="clearfix"></div><hr>
                                        <div class="form-group"><label for="name" class="col-md-6 control-label text-left">Logo<span class="m-l-5 text-red">*</span></label><div class="col-md-9">
                                            
                                          
                                            
                                             <button type="button" data-toggle="modal" data-target="#rightModal" class="image-picker btn btn-default" data-input-name="files[base_image]">
            <i class="fa fa-folder-open m-r-5"></i> Browse
        </button>
        
        <div class="clearfix"></div>
		
		 <div class="selected-rightimg">
		@if( $menu->icon!='')
			<?php $brand_thumbnail = 'menu'; ?>
		<img width="75" height="75" src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/{{ $brand_thumbnail }}/small/{{getSliderMediaById($menu->icon)}}">
		@endif
		</div>
		<input type="hidden" class="thumbnail_image" id="thumbnail_image" value="{{$menu->icon}}" name="thumbnail_image" >
                                            </div></div>
                  </div>
               </div>
               <div class="col-lg-offset-3 col-lg-12">
                  <div class="form-group">
                     <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
               </div>
            </form>
         </div>
         
      </div>
   </div>
</div>


<div class="modal fade" id="addModal-{{$menu->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form role="form" action="{{ route('menu.save') }}" method="post" enctype= multipart/form-data>
               {{ csrf_field() }}

               <input type="hidden" name="mainmenu" value="{{$menu->id}}">
               
               <div class="row">
                  <div class="col-lg-offset-3 col-lg-12">
                     <div class="form-group">
                        <label for="address">Menu Name</label>
                        <input type="text" class="form-control form-control-sm" id="submenu" name="submenu" required="" value="{{old('name')}}">
                     </div>
					  <div class="form-group"><label for="id" class="col-md-3 control-label text-left">Category</label><div class="">
						
                                              <select name="select_category" id="select_category" class="form-control form-control-sm"  required="" >

                                                <option value="">--- Select Category ---</option>
						<?php $subcates=getCateByParentMenuId($menu->id); ?>
                                               
                                        @foreach ($subcates as $key1 => $value1)
                                        <option value="{{$value1->id}}">{{ $value1->name }}</option>
                                        
                                                @endforeach
                                              </select>

                                            </div>

                                        </div>
                  </div>
               </div>
               <div class="col-lg-offset-3 col-lg-12">
                  <div class="form-group">
                     <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
               </div>
            </form>
         </div>
       
      </div>
   </div>
</div>
               



<div class="modal fade" id="bannerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:50000000">
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
               
                <form method="post" action="{{route('menuimage.store')}}" enctype="multipart/form-data"
                            class="dropzone" id="dropzone" style="border:dashed 1px">
				<input type="hidden" class="form-control" id="brand_id" name="brand_id"  value="{{$menu->id }}">	
                @csrf
                </form>
            </div>
		 
        </div>
        <table class="table table-bordered" id="menubanner" width="100%" cellspacing="0">
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



	<div class="modal fade" id="rightModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  style="z-index:500000000">
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
               
                <form method="post" action="{{route('menuimage.store')}}" enctype="multipart/form-data"
                            class="dropzone" id="dropzone" style="border:dashed 1px">
							
							<input type="hidden" class="form-control" id="brand_id1" name="brand_id"  value="{{$menu->id }}">	
			
                @csrf
                </form>
            </div>
		 
        </div>
        <table class="table table-bordered" id="menuicontbl" width="100%" cellspacing="0">
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


			   @endforeach
                   
               </div>
            </div>
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
		  
		 
        },
        error: function(file, response)
        {
           return false;
        }
    };
	
	$(document).on('click','.select-image',function(e){

	e.preventDefault();
	var id=$(this).attr('data-imageid');
	$('.banner_image').val(id);
	 $.ajax({		
		type: 'POST',
		url: '{{ url("admin/getmenubannerimagebyid") }}',
		data: {id: id,_token:'{{ csrf_token() }}',brand_id:''},
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
	$('.thumbnail_image').val(id);
	 $.ajax({
		
		type: 'POST',
		url: '{{ url("admin/getmenuthumbnailimagebyid") }}',
		data: {id: id,_token:'{{ csrf_token() }}',brand_id:''},
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
<script>
   $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
   })
   
</script>


<script type="text/javascript">

  $(document).ready(function (e) {
   $("#seller_id").select2();
   $("#select_no_limit").select2({
    // tags: true
    maximumSelectionLength: 1
   });
   
 });

</script>

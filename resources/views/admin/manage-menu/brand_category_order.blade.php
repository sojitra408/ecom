@extends('admin.layout')
@section('content')
<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">All Category</h1>
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
         

           

           
                
                     
					 <form action="{{route('categorymenu.order')}}" method="POST"
                                >
								 @php
            $i = 0
            @endphp

            @foreach($data as $key => $menu)
            	
						<strong>	{{ $menu->name }}	</strong>
					 <br><br>

@foreach($menu->childs as $k=>$child)
					  <div class="form-group">
                        <label for="address">{{ $child->name }}</label>
                        <input type="hidden" class="form-control form-control-sm" name="id[]"  value="{{$child->id}}">
                        <input type="text" class="form-control form-control-sm" id="name" name="name[]"  value="{{$child->order_id}}">
                     </div>
					 
					
    @endforeach                 
                    
                   <br> 
                    <hr> 
                                  @endforeach
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                  
             
			  
			   
	


			 
                   
               
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
	$('#banner_image').val(id);
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
	$('#thumbnail_image').val(id);
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

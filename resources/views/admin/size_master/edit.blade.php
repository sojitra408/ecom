@extends('admin.layout')
@section('content')

        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Size Master</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Size Master</h6>
            </div>
            <form role="form" action="{{ route('size_master.update',$project->id) }}" method="post" enctype="multipart/form-data">
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class=" col-lg-8 py-2">
	            	@include('includes.messages') 
	              <div class="form-group">
                  <label for="name">Size Master Name</label>
                  <input type="text" class="form-control" id="name" name="name"  value="{{ $project->name }}">
                </div>


                <div class="col-lg-offset-3 col-lg-6"> 
                                <div class="form-group">
                                    <label for="image">Image</label>
                                     
                                    

                              <div class="col-md-9">
                      
                       
                      <label type="button"><i class="fa fa-folder-open m-r-5"></i>Browse <input type="file" name="image" placeholder="Choose image" id="image" style="width: 0px;height: 0px;overflow: hidden;"></label>
                      </div>

                      <div class="form-group">

                        @if(!empty($project->image))
   <img id="preview-image-before-upload" src="{{asset('public/images/'.$project->image)}}"
                      alt="preview image" style="max-height: 250px;">
  @else
     <img id="preview-image-before-upload" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                      alt="preview image" style="max-height: 250px;">
  @endif  
              
                 

            </div> 


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

                
                <div class="sizes">

					<strong>Size Value</strong>

					<hr>
					

					<div class="size_section">

					<div class="form-group row">					

					<div class="col-sm-12">
						<input type="hidden" name="attr_id[]" value="">
						<label for="attr_value" class="control-label col-form-label">Size Value <span class="required">*</span></label>
							@if(!$values->isEmpty())
								<?php $i=1; ?>
					@foreach($values as $val)
						<div class="row">
							<div class="col">
							<label>Label {{$i}}</label>
								<input type="text" name="attr_value[]" id="attr_value{{$i}}" class="form-control"  value="{{$val->value_name}}" placeholder=""/>
							</div>
							
						</div>
						<?php $i++; ?>
						@endforeach					
				@endif
							<!--<div class="col">
								<input type="text" name="attr_value[]" id="attr_value" class="form-control"  value="" placeholder=""/>
							</div>
							<div class="col">
								<input type="text" name="attr_value[]" id="attr_value" class="form-control"  value="" placeholder=""/>
							</div>
							<div class="col">
								<input type="text" name="attr_value[]" id="attr_value" class="form-control"  value="" placeholder=""/>
							</div>
							<div class="col">
								<input type="text" name="attr_value[]" id="attr_value" class="form-control"  value="" placeholder=""/>
							</div>
							
						</div>-->

						<!-- <input type="text" name="attr_value[]" id="attr_value" class="form-control"  value="" placeholder=""/> -->
					</div>	
					<!--<div class="col-sm-2">

						<a href="" class="btn btn-success add_more_size" style="margin-top:34px;"><i class="fa fa-plus"></i></a>

					</div>-->

					</div>
										
			

					</div>
					</div>
                
	            <div class="form-group">
	            	@if(Auth::user()->can('size-master-edit'))
	              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	              @endif
	              <a href="{{ route('admin.size_master') }}" class="btn btn-warning btn-sm">Back</a>
	            </div>
	          
					
				</div>
	          </form>
            </div>
          
        </div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
<script>
$(document).on('click','.add_more_size',function(e){

	e.preventDefault();

	var size=$('#size').html();

	

	var html='<div class="form-group row"><div class="col-sm-10"><input type="hidden" name="attr_id[]" value=""><label for="attr_value" class="control-label col-form-label">Size Value <span class="required">*</span></label><div class="row"><div class="col"><input type="text" name="attr_value1[]" id="attr_value" class="form-control"  value="" placeholder=""/></div><div class="col"><input type="text" name="attr_value2[]" id="attr_value" class="form-control"  value="" placeholder=""/></div><div class="col"><input type="text" name="attr_value3[]" id="attr_value" class="form-control"  value="" placeholder=""/></div><div class="col"><input type="text" name="attr_value4[]" id="attr_value" class="form-control"  value="" placeholder=""/></div><div class="col"><input type="text" name="attr_value5[]" id="attr_value" class="form-control"  value="" placeholder=""/></div><div class="col"><input type="text" name="attr_value6[]" id="attr_value" class="form-control"  value="" placeholder=""/></div></div></div><div class="col-sm-2"><a href="javascript:void(0)" class="btn btn-danger less_more_size" style="margin-top:34px;"><i class="fa fa-minus"></i></a></div></div>';

	

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
</script>


<script type="text/javascript">
      
$(document).ready(function (e) {
 
   
   $('#image').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});
 
</script>
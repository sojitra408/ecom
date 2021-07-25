@extends('admin.layout')
@section('content')

        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Feature</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Feature</h6>
            </div>
            <form role="form" action="{{ route('features.update',$project->id) }}" method="post">
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class=" col-lg-8 py-2">
	            	@include('includes.messages') 
	              <div class="form-group">
                  <label for="name">Feature Name</label>
                  <input type="text" class="form-control" id="name" name="name"  value="{{ $project->name }}">
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

					<strong>Features Value</strong>

					<hr>
					

					<div class="size_section">

					<div class="form-group row">					

					<div class="col-sm-8">
						<input type="hidden" name="attr_id[]" value="">
						<label for="attr_value" class="control-label col-form-label">Features Value <span class="required">*</span></label>

						<input type="text" name="attr_value[]" id="attr_value" class="form-control"  value="" placeholder=""/>
					</div>	
					<div class="col-sm-4">

						<a href="" class="btn btn-success add_more_size" style="margin-top:34px;"><i class="fa fa-plus"></i></a>

					</div>

					</div>
					
					
				@if(!$values->isEmpty())
					@foreach($values as $val)
<div class="form-group row">					

					<div class="col-sm-8">
<input type="hidden" name="attr_id[]" value="{{$val->id}}">
						<label for="attr_value" class="control-label col-form-label">Features Value <span class="required">*</span></label>

						<input type="text" name="attr_value[]" id="attr_value" class="form-control"  value="{{$val->value_name}}" placeholder=""/>
					</div>	
					<div class="col-sm-4">
<a href="javascript:void(0)" class="btn btn-danger less_more_size" style="margin-top:34px;"><i class="fa fa-minus"></i></a>

					</div>

					</div>	
@endforeach					
				@endif

					</div>
					</div
                
	            <div class="form-group">
	            	@if(Auth::user()->can('features-master'))
	              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	              @endif
	              <a href="{{ route('admin.features') }}" class="btn btn-warning btn-sm">Back</a>
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
</script>
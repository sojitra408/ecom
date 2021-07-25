@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Add Features</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4 p-3">
            
            <form role="form" action="{{route('features.store')}}" method="post">
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6">
	            	@include('includes.messages') 
	              <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control form-control-sm" id="name" name="name"  value="{{ old('name') }}">
                </div>


               

                

                <div class="sizes">

					<strong>Features Value</strong>

					<hr>
					

					<div class="size_section">

					<div class="form-group row">					

					<div class="col-sm-8">

						<label for="attr_value" class="control-label col-form-label">Features Value <span class="required">*</span></label>

						<input type="text" name="attr_value[]" id="attr_value" class="form-control"  value="" placeholder=""/>
					</div>	
					<div class="col-sm-4">

						<a href="" class="btn btn-success add_more_size" style="margin-top:34px;"><i class="fa fa-plus"></i></a>

					</div>

					</div>

					</div>
					</div>

                
                
	            <div class="form-group">
	            	@if(Auth::user()->can('features-master'))
	              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	              @endif
	              <a href="{{route('admin.features')}}" class="btn btn-warning btn-sm">Back</a>
	            </div>
	          
					
				</div>
	          </form>
            </div>
          </div>

        </div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>

$(document).on('click','.add_more_size',function(e){

	e.preventDefault();

	var size=$('#size').html();

	

	var html='<div class="form-group row"><div class="col-sm-8"><label for="attr_value" class="control-label col-form-label">Features Value <span class="required">*</span></label><input type="text" name="attr_value[]" id="attr_value" class="form-control"  value="" placeholder=""/></div><div class="col-sm-4"><a href="javascript:void(0)" class="btn btn-danger less_more_size" style="margin-top:34px;"><i class="fa fa-minus"></i></a></div></div>';

	

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

 


    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "../server_side/scripts/server_processing.php"
    } );
} );
</script>
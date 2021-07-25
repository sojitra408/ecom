@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Add New Postalcode</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Postalcode</h6>
            </div>
            <form role="form" action="{{ route('postal.store') }}" enctype="multipart/form-data" method="post">
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class=" col-lg-8 py-2">
	            	@include('includes.messages') 
	              <div class="form-group">
                  <label for="name">Postalcode<br><strong></strong>(Please put postal code as comma seperated. e.g 854301,854326)</strong></label>
                  <textarea class="form-control" id="postalcode" name="postalcode">{{ old('postalcode') }}</textarea> 
                </div>
				
				
				<div class="form-group">
                  <label for="">Postal Type</label>
                  <div class="type">
                    <select class="form-control" name="postcode_type">
					<option value="COD">COD</option>
					<option value="PREPAID">PREPAID</option>
					</select>
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
                @if(Auth::user()->can('postalcode-management-add'))
	              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                @endif
	              <a href="{{ route('admin.postal') }}" class="btn btn-warning btn-sm">Back</a>
	            </div>
	          
					
				</div>
	          </form>
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
        Comming Soon
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save </button>
      </div>
    </div>
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
</script>
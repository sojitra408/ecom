@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Tax</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4 p-3">
            
            <form role="form" action="{{ route('tax.update',$project->id) }}" method="post">
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6">
	            	@include('includes.messages') 
	              <div class="form-group">
                  <label for="name">Tax Name</label>
                  <input type="text" class="form-control  form-control-sm" id="tax_name" name="tax_name"  value="{{ $project->name }}">
                </div>

                <div class="form-group">
                  <label for="name">Tax Percentage</label>
                  <input type="text" class="form-control form-control-sm" id="tax_percentage" name="tax_percentage"  value="{{ $project->percentage }}">
                </div>

               

                

               

                 
								
								<!-- <div class="form-group">
                  <label for="confirm_passowrd">Status</label>
                  <div class="checkbox">
                    <label ><input type="checkbox" name="status"   @if (old('status') == 1)
                      checked
                    @endif value="1">Status</label>
                  </div>
                </div> -->

                
                
	            <div class="form-group">
                @if(Auth::user()->can('taxes-edit'))
	              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                @endif
	              <a href='{{ route('admin.tax') }}' class="btn btn-warning btn-sm">Back</a>
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
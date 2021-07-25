@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Add Shipping</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
           



            <!-- <form role="form" action="" method="post">
            {{ csrf_field() }}

            <div class="form-group">

              <label for="title">Title</label>

              <input type="text" class="form-control" id="title" >

            </div>

            <div class="form-group">

              <label for="price">Price</label>

              <input type="number" class="form-control" id="price" >

            </div>

            

            <div class="form-group">

              <label for="description">Description</label>

              <textarea class="form-control" id="description" rows="3"></textarea>

            </div>

          </form> -->



            <form role="form" action="{{ route('shipping.store') }}" method="post">
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6 p-3">
	            	@include('includes.messages') 
	              <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control form-control-sm" id="title" name="title" value="{{ old('title') }}">
                </div>

                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" class="form-control form-control-sm" id="price" name="price"  value="{{ old('price') }}">
                </div>

               <div class="form-group">

              <label for="description">Description</label>

              <textarea class="form-control form-control-sm" id="description" rows="3" name="description" value="{{ old('description') }}"></textarea>

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
                @if(Auth::user()->can('shipping-add'))
	              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                @endif
	              <a href='{{ route('admin.shipping') }}' class="btn btn-warning btn-sm">Back</a>
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
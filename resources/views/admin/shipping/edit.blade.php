@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Shipping</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Shipping</h6>
            </div>



            <form role="form" action="{{ route('shipping.update',$shipping->id) }}" method="post">
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6">
	            	@include('includes.messages') 
	              <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ $shipping->title }}">
                </div>
				<div class="form-group">
                  <label for="price">Type</label>
				  <select class="form-control" name="type">
				  <option <?php echo ($shipping->type=='free')?'selected':''; ?> value="free">Free</option>
				  <option <?php echo ($shipping->type=='paid')?'selected':''; ?> value="paid">Paid</option>
				  </select>
             
                </div>

                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="text" class="form-control" id="price" name="price" placeholder="Price " value="{{ $shipping->price }}">
                </div>
				
				<div class="form-group">
                  <label for="price">Cart Price</label>
                  <input type="text" class="form-control" id="cart_price" name="cart_price" placeholder="Cart Price " value="{{ $shipping->cart_price }}">
                </div>

               <div class="form-group">

              <label for="description">Description</label>

              <textarea class="form-control" id="description" rows="3" name="description" value="{{ $shipping->description }}">{{ $shipping->description }}</textarea>

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
                @if(Auth::user()->can('shipping-edit'))
	              <button type="submit" class="btn btn-primary">Submit</button>
                @endif
	              <a href='{{ route('admin.shipping') }}' class="btn btn-warning">Back</a>
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
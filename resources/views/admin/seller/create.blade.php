@extends('admin.layout')

@section('content')

        <div class="container-fluid">



          <!-- Page Heading -->

          <h1 class="h3 mb-2 text-gray-800">Add New Seller</h1>

         



          <!-- DataTales Example -->

          <div class="card shadow mb-4">

            <div class="card-header py-3">

              <h6 class="m-0 font-weight-bold text-primary">Seller</h6>

            </div>

            <form role="form" action="{{route('seller.store')}}" method="post">

	          {{ csrf_field() }}

	              <div class="box-body">

	            <div class="col-lg-offset-3 col-lg-6 py-2">

	            	@include('includes.messages') 

	              <div class="form-group">

                  <label for="name">Seller Id</label>

                  <input maxlength="8" type="text" class="form-control" id="seller_id" name="seller_id"  value="" >

                </div>

                <div class="form-group">

                  <label for="name">Seller Name</label>

                  <input type="text" class="form-control" id="seller_name" name="seller_name"  value="{{ old('seller_name') }}">

                </div>


	            <div class="form-group">
                 @if(Auth::user()->can('seller-add'))
	              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                @endif
	              <a href='{{route('admin.seller')}}' class="btn btn-warning btn-sm">Back</a>

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
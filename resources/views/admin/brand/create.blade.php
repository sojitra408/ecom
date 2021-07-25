@extends('admin.layout')
@section('content')

        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Add New Brand</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Brand</h6>
            </div>
            <form role="form" action="{{ route('brand.store') }}" enctype="multipart/form-data" method="post">
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6 py-2">
	            	@include('includes.messages') 
	              <div class="form-group">
                  <label for="name">Brand Name</label>
                  <input type="text" class="form-control" id="brand_name" name="brand_name"  value="{{ old('brand_name') }}">
                </div>
				
				      <div class="form-group">
                  <label for="name">Brand Id</label>
                  <input type="text" class="form-control" id="brand_seller_id" name="brand_seller_id"  value="" maxlength="11">
                </div>

               

         <div class="form-group">
                  <label for="name">Seller</label>        
<select class="form-control form-control-sm myselect" id="seller_id" name="seller_id">
      @if(!$seller->isEmpty())
		@foreach($seller as $sel )
      <option  value="{{$sel->id}}">{{$sel->seller_name}}</option>
	  @endforeach
     @endif
    </select>    
</div>           
				
			 
				<!--<div class="form-group">-->
				<!--<label for="">Status</label>-->
				<!--<div class="checkbox">-->
				<!--<label ><input type="checkbox" name="status"   @if (old('status') == 1)-->
				<!--checked-->
				<!--@endif value="1"> Active</label>-->
				<!--</div>-->
				<!--</div>-->

                
                
	            <div class="form-group">
	            	@if(Auth::user()->can('brands-add'))
	              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	              @endif
	              <a href="{{ route('admin.brand') }}" class="btn btn-warning btn-sm">Back</a>
	            </div>
	          
					
				</div>
	          </form>
            </div>
          </div>

        </div>
<!-- Modal -->

@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>




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
$('.banner').click(function(){
	$('#banner').val($(this).val());
});
$('.thumbnail').click(function(){
	$('#thumbnail').val($(this).val());
});

      $("#seller_id").select2();


    
} );
</script>
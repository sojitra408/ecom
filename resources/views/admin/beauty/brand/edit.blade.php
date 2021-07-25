@extends('admin.layout')
@section('content')

 
        <div class="container-fluid">
<div class="row">

<div class="col-md-3">
@include('admin.beauty.menu')

</div>

<div class="col-md-9">
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Brand of the Day</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Brand of the Day</h6>
            </div>
 <!--           <div class="peer mt-2">-->
 <!--                       <form action="{{route('deletebeauty.brandofady')}}" class="actionDelete" method="post">-->
 <!--                           <input type="hidden" name="_method" vlaue="DELETE">-->
 <!--                           @csrf-->
                            
 <!--                           <button class="btn btn-danger btn-sm ml-3" onclick="return confirm('Are you sure Want Delete?')"><i class="fa fa-trash" aria-hidden="true"></i>-->
 <!--Delete all selected Fashion Products</button>-->
 <!--       				</form>-->
	<!--                </div>-->
            <form role="form" action="{{ route('beauty_brand_ofday.update',$single->id) }}" method="post">
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class=" col-lg-8 py-2">
	            	@include('includes.messages') 
					 <div class="form-group">
                  <label for="name">Select Brand</label>
				  <select class="form-control form-control-sm myselect" id="brand_id" name="brand_id">
				  @if(!$brands->isEmpty())
					@foreach($brands as $sel )
				  <option  value="{{$sel->id}}" 
				  @if($single->brand_id == $sel->id) 
				  selected
				  @endif 
				  >{{$sel->brand_name}}</option>
				  @endforeach
				 @endif
				</select> 
                  
                </div>
                
                
                <div class="form-group">
                  <label for="name">Of Price</label>
				  <input type="text" name="price" class="form-control form-control-sm" id="price" value="{{ $single->price }}"> 
                  
                </div>
	             

               
	            <div class="form-group">
	              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	             
	            </div>
	          
				</div>
				</div>
	          </form>
            </div>
          
        </div>
        </div>
        </div>
		
	
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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


      $("#brand_id").select2();


    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "../server_side/scripts/server_processing.php"
    } );
} );
</script>
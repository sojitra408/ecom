@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Add Discount</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4 p-3">
           
            <form role="form" action="{{route('discount.store')}}" method="post">
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6">
	            	@include('includes.messages') 
	              <div class="form-group">
                  <label for="name">Discount Name</label>
                  <input type="text" class="form-control form-control-sm" id="discount_name" name="discount_name"  value="{{ old('discount_name') }}">
                </div>
				
				  <div class="form-group">
                  <label for="name">Discount Code</label>
                  <input type="text" class="form-control form-control-sm" id="discount_code" name="discount_code"  value="{{ old('discount_code') }}">
                </div>
				
				 <div class="form-group">
                  <label for="name">Description</label>
                  <textarea class="form-control form-control-sm" id="description" name="description"  ></textarea>
                </div>

               


                  <div class="custom-control custom-radio custom-control-inline">
                    
                    <label class="radio-inline"><input type="radio" id="products" name="option" value="product" > Product</label>
                    
                  </div>

                  <!-- Default inline 2-->
                  <div class="custom-control custom-radio custom-control-inline">

                    <label class="radio-inline"> <input type="radio"  id="categorys" name="option" value="categories" > Categories</label>
                    
                    
                  </div>
				   <div class="custom-control custom-radio custom-control-inline">

                    <label class="radio-inline"> <input type="radio"  id="drands" name="option" value="brands" > Brands</label>
                    
                    
                  </div>

                  <div class="custom-control custom-radio custom-control-inline">

                    <label class="radio-inline"><input type="radio"  id="flats" value="flats" name="option" > Flat Discount</label>
                    
                  </div>


               <div class="form-group toshow" id="product" style="display:none;">
                <label for="id" class="control-label text-left"> Product</label>
               
                  
                    <select name="select_product[]" multiple id="select_product" class="form-control form-control-sm">

                      <option value="">--- Select Product ---</option>

                     
                      @foreach ($products as $key => $product)

                     

                        <option value="{{$product->id}}">{{ $product->product_name }}</option>
                                                
                      @endforeach
                      
                      
                    </select>

                  
              </div>

              <div class="form-group toshow" id="category" style="display:none">
                <label for="id" class="control-label text-left"> Category</label>
                
                  
                    <select name="select_category[]" multiple id="select_category" class="form-control form-control-sm">

                      <option value="">--- Select Category ---</option>

                     @foreach ($data as $key => $value)

                     

                        <option value="{{$value->id}}">{{ $value->parent_id ? ' -- ' . $value->name : $value->name }}</option>
                                                
                      @endforeach
                      
                    </select>

                 

              </div>
			  
			   <div class="form-group toshow" id="selectbrand" style="display:none">
                <label for="id" class="control-label text-left"> Brands</label>
                
                  
                    <select name="select_brand[]" multiple id="select_brand" class="form-control form-control-sm">

                      <option value="">--- Select Brand ---</option>

                     @foreach ($brands as $key => $value)

                     

                        <option value="{{$value->id}}">{{ $value->brand_name }}</option>
                                                
                      @endforeach
                      
                    </select>

                 

              </div>

              <div class="form-group" id="price_minimum">
                  <label for="name">Minimum Price</label>
                  <input type="number" class="form-control form-control-sm" id="minimum_price" name="minimum_price"  value="{{ old('minimum_price') ?? 0 }}">
                </div>
                
                <div class="form-group" id="price_minimum">
                  <label for="name">Maximum Discount</label>
                  <input type="number" class="form-control form-control-sm" id="maximum_discount" name="maximum_discount"  value="{{ old('maximum_discount') ?? 0 }}">
                </div>


                <div>Discount Type</div>
              <div class="custom-control custom-radio custom-control-inline">

                <label class="radio-inline"> <input type="radio" id="percentage" name="discount_fix" value="percentage"> Percentage</label>
                    
                    
                  </div>

                  <div class="custom-control custom-radio custom-control-inline">

                    <label class="radio-inline"> <input type="radio" name="discount_fix" id="fix" value="fix"> Fix</label>
                    
                    
                  </div>

              <div class="form-group" id="price_percentage" style="display:none">
                  <label for="name">Discount Percentage</label>
                  <input type="number" class="form-control form-control-sm" id="discount_percentage" name="discount_percentage"  value="{{ old('discount_percentage')?? 0 }}">
                </div>

                <div class="form-group" id="price_fix" style="display:none">
                  <label for="name">Discount Fix</label>
                  <input type="number" class="form-control form-control-sm" id="discount_fix" name="discount_fix_price" value="{{ old('discount_fix_price')?? 0 }}">
                </div>

                
                 
								
				 <div class="form-group">
                  <label for="name">Start Date</label>
                  <input type="date" class="form-control form-control-sm" id="start_date" name="start_date"  value="">
                </div>				

                				
				 <div class="form-group">
                  <label for="name">End Date</label>
                  <input type="date" class="form-control form-control-sm" id="end_date" name="end_date"  value="">
                </div>	
                
                
                
                <div class="form-group">
                  <label for="showin_list" class="mr-2">Show in Coupon List</label>
                  <input type="checkbox" id="showin_list" name="showin_list" value="1">
                </div>
                
                <div class="form-group">
                  <label for="apply_oncart" class="mr-2">Apply on cart</label>
                  <input type="checkbox" id="apply_oncart" name="apply_oncart" value="1">
                </div>
                
                <div class="form-group">
                  <label for="one_time" class="mr-2">One Time</label>
                  <input type="checkbox" id="one_time" name="one_time" value="1">
                </div>
                
                  
	            <div class="form-group">
                @if(Auth::user()->can('discount-add'))
	              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                @endif
	              <a href="{{route('admin.discount')}}" class="btn btn-warning btn-sm">Back</a>
	            </div>
	          
					
				</div>
	          </form>
            </div>
          </div>

        </div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>


<script type="text/javascript">
  $(document).ready(function(){

    $("#products").click(function(){
      //console.log("hii");
      $("#product").show();
      $("#category").hide();
	   $("#selectbrand").hide();

    });
  
    $("#categorys").click(function(){
      $("#category").show();
      $("#product").hide();
      $("#selectbrand").hide();
    });
	$("#drands").click(function(){
      $("#selectbrand").show();
      $("#product").hide();
      $("#category").hide();
    });

    $("#flats").click(function(){
      $("#category").hide();
      $("#product").hide();
	   $("#selectbrand").hide();
    });

    $("#fix").click(function(){
      $("#price_percentage").hide();
      $("#price_fix").show();
    });

    $("#percentage").click(function(){
      $("#price_percentage").show();
      $("#price_fix").hide();
    });
	
	$('#discount_code').keyup(function() {
  $(this).val($(this).val().replace(/ +?/g, ''));
});


});


</script>




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
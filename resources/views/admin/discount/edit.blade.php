@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Discount</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4 p-3">
            
            <form role="form" action="{{route('discount.update',$discounts->id)}}" method="post">
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6">
	            	@include('includes.messages') 
	              
                <div class="form-group">
                  <label for="name">Discount Name</label>
                  <input type="text" class="form-control  form-control-sm" id="discount_name" name="discount_name" value="{{$discounts->discount_name }}" readonly>
                </div>
				
				<div class="form-group">
                  <label for="name">Discount Code</label>
                  <input type="text" class="form-control form-control-sm" id="discount_code" name="discount_code"  value="{{$discounts->discount_code }}" readonly>
                </div>
				
				 <div class="form-group">
                  <label for="name">Description</label>
                  <textarea class="form-control form-control-sm" id="description" name="description"  >{{$discounts->description }}</textarea>
                </div>


                @if($discounts->option == "product")

               <div class="custom-control custom-radio custom-control-inline">
                    
                    

                    <label class="radio-inline"> <input type="radio" id="products" name="option" value="product" {{  ($discounts->option == "product" ? ' checked' : '') }}> Product</label>
                    
                  </div>

                  @elseif($discounts->option == "categories")
                  <!-- Default inline 2-->
                  <div class="custom-control custom-radio custom-control-inline">

                    <label class="radio-inline"> <input type="radio"  id="categorys" name="option" value="categories" {{  ($discounts->option == "categories" ? ' checked' : '') }} > Categories</label>
                    
                    
                  </div>
				  
				  @elseif($discounts->option == "drands")
                  <!-- Default inline 2-->
                  <div class="custom-control custom-radio custom-control-inline">

                    <label class="radio-inline"> <input type="radio"  id="drands" name="option" value="brands" {{  ($discounts->option == "drands" ? ' checked' : '') }} > Brands</label>
                    
                    
                  </div>

                  

                  @else
				
			

                  <div class="custom-control custom-radio custom-control-inline">

                    <label class="radio-inline"><input type="radio"  id="flats" value="flats" name="option" {{  ($discounts->option == "flats" ? ' checked' : '') }} > Flat</label>
                    
                  </div>
                  @endif


                  @if($discounts->option == "product")

                  <div class="form-group toshow" id="product" style="">
                <label for="id" class="control-label text-left"> Product</label>
               
                    <?php
                        
                        $str_arr = explode (",", $discounts->product_id);
                       

                      ?>

                    <select name="select_product[]" multiple="" id="select_product" class="form-control form-control-sm">

                      <option value="">--- Select Product ---</option>



                      @foreach ($products as $key => $product)
                      <?php $select=""; if(count($str_arr)>0 && !empty($str_arr)){
                        foreach($str_arr as $strarr){
                          if($strarr == $product->id){
                              $select="selected='selected'";
                          }
                      }}?>

                        <option <?php echo $select ?> value="{{$product->id}}">{{ $product->product_name }}</option>
                                                
                      @endforeach
                      
                      
                    </select>

                  
              </div>

              @elseif($discounts->option == "categories")

              <div class="form-group toshow" id="category" style="">
                <label for="id" class="control-label text-left">Category</label>
                <?php
                        
                        $str_arr = explode (",", $discounts->category_id);
                      

                      ?>

                  
                    <select name="select_category[]" multiple id="select_category" class="form-control form-control-sm">

                      <option value="">--- Select Category ---</option>

                     @foreach ($data as $key => $value)

                     <?php $select=""; if(count($str_arr)>0 && !empty($str_arr)){
                        foreach($str_arr as $strarr){
                          if($strarr == $value->id){
                              $select="selected='selected'";
                          }
                      }}?>

                        <option <?php echo $select; ?> value="{{$value->id}}">{{$value->parent_id ? ' -- ' . $value->name : $value->name }}</option>
                                                
                      @endforeach
                      
                    </select>

                 

              </div>
			  @else
			   <div class="form-group toshow" id="selectbrand" style="display:none">
                <label for="id" class="control-label text-left"> Brands</label>
                
                   <?php
                        
                        $str_arr = explode (",", $discounts->brand_id);
                       

                      ?>
                    <select name="select_brand[]" multiple id="select_brand" class="form-control form-control-sm">

                      <option value="">--- Select Brand ---</option>

                     @foreach ($brands as $key => $value)

                     <?php $select=""; if(count($str_arr)>0 && !empty($str_arr)){
                        foreach($str_arr as $strarr){
                          if($strarr == $value->id){
                              $select="selected='selected'";
                          }
                      }}?>

                        <option  <?php echo $select; ?>value="{{$value->id}}">{{ $value->brand_name }}</option>
                                                
                      @endforeach
                      
                    </select>

                 

              </div>

              @endif

              <div class="form-group" id="price_minimum">
                  <label for="name">Minimum Price</label>
                  <input type="text" class="form-control" id="minimum_price" name="minimum_price" value="{{$discounts->minimum_price }}">
                </div>
                
                
                <div class="form-group" id="price_minimum">
                  <label for="name">Maximum Discount</label>
                  <input type="text" class="form-control" id="maximum_discount" name="maximum_discount" value="{{$discounts->maximum_discount }}">
                </div>
                
                
                @if($discounts->discount_percentage != 0)
                <div class="custom-control custom-radio custom-control-inline">

                <label class="radio-inline"><input type="radio" id="percentage" name="discount_fix" value="percentage" checked=""> Percentage</label>
                    
                    
                  </div>

                  @else

                  <div class="custom-control custom-radio custom-control-inline">

                    <label class="radio-inline"><input type="radio" name="discount_fix" id="fix" value="fix" checked=""> Fix</label>
                    
                    
                  </div>
                  @endif
               

                  @if($discounts->discount_percentage != 0)

                  <div class="form-group" id="price_percentage">
                  <label for="name">Discount Percentage</label>
                  <input type="text" class="form-control  form-control-sm" id="discount_percentage" name="discount_percentage"  value="{{$discounts->discount_percentage }}">
                </div>
                
                @else

                <div class="form-group" id="price_fix">
                  <label for="name">Discount Fix</label>
                  <input type="text" class="form-control form-control-sm" id="discount_fix" name="discount_fix_price"  value="{{$discounts->discount_fix }}">
                </div>
                 
                 @endif
										
				 <div class="form-group">
                  <label for="name">Start Date</label>
                  <input type="date" class="form-control form-control-sm" id="start_date" name="start_date"  value="{{$discounts->start_date }}">
                </div>				

                				
				 <div class="form-group">
                  <label for="name">End Date</label>
                  <input type="date" class="form-control form-control-sm" id="end_date" name="end_date"  value="{{$discounts->end_date }}">
                </div>	


              <div class="form-group">
                  <label for="showin_list" class="mr-2">Show in Coupon List</label>
                  <input type="checkbox" id="showin_list" name="showin_list" {{$discounts->showin_list ? 'checked' : ''}} value="1">
                </div>
                
              <div class="form-group">
                  <label for="apply_oncart" class="mr-2">Apply on cart</label>
                  <input type="checkbox" id="apply_oncart" name="apply_oncart" {{$discounts->apply_oncart ? 'checked' : ''}} value="1">
                </div>
                
              <div class="form-group">
                  <label for="one_time" class="mr-2">One Time</label>
                  <input type="checkbox" id="one_time" name="one_time" {{$discounts->one_time ? 'checked' : ''}} value="1"}>
                </div>
                
                
                
	            <div class="form-group">
                @if(Auth::user()->can('discount-edit'))
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

 
	$('#discount_code').keyup(function() {
  $(this).val($(this).val().replace(/ +?/g, ''));
});

    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "../server_side/scripts/server_processing.php"
    } );
} );
</script>
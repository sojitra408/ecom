@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">All Discount</h1>

          @include('includes.messages')
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              @if(Auth::user()->can('discount-add'))
              <a class="btn btn-primary btn-sm" href="{{route('discount.create')}}" ><i class="fas fa-plus"></i> Add Discount</a>
              @endif
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered small" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align="center">
                        <th>#</th>
                      <th>Discount Name</th>
                      <th>Discount Code</th>
                      <th>Product</th>
                      <th>Category</th>
                      <!-- <th>Sub Category</th> -->
                      <th>Option </th>
                      <th>Minimum Price</th>
                      <th>Maximum Discount </th>
                      <th>Discount Type</th>
                      <th>Discount Percentage</th>
                      <th>Discount Fix</th>
                      <th>Show In List</th>
                      <th>Apply on Cart</th>
                      <th>One Time</th>
                      <th>Action</th>
                       
                            
                    </tr>
                  </thead>
                  <tbody>

                    @php($count=0)
                      

                    @forelse($discounts as $discount)
                    @php($count++)

                    
                                                
                      <tr align="center">
                          <td>{{ $count }}</td>
                          <td>{{ $discount->discount_name }}</td>
                          <td>{{ $discount->discount_code }}</td>
                          <td>
                            <?php $pidro=array();
                            $pid=explode(',',$discount->product_id); 
                              if(count($pid)>0){
                                foreach($pid as $p){ 
                                  $prod=DB::table('products')->select('product_name')->where('id',$p)->first();
                                  if(!empty($prod)){
                                    $pidro[]=$prod->product_name;
                                  } 
                                }
                              } echo implode(',',$pidro);
                            ?>
                          </td>
                           <td><?php $catage=array();
                            $categ=explode(',',$discount->category_id); 
                              if(count($categ)>0){
                                foreach($categ as $cat){ 
                                  $catager=DB::table('categories')->select('name')->where('id',$cat)->first();
                                  if(!empty($catager)){
                                    $catage[]=$catager->name;
                                  } 
                                }
                              } echo implode(',',$catage);
                            ?></td>
                          <!-- <td>{{ $discount->cat_parent_id }}</td> -->
                           <td>{{ $discount->option }}</td>
                          <td>{{ $discount->minimum_price }}</td>
                          <td>{{ $discount->maximum_discount }}</td>
                           <td>{{ $discount->type }}</td>
                           <td>{{ $discount->discount_percentage }}</td>
                          <td>{{ $discount->discount_fix }}</td>
                           <td>{{ $discount->showin_list ? 'Yes' : 'No' }}</td>
                           <td>{{ $discount->apply_oncart ? 'Yes' : 'No'}}</td>
                          <td>{{ $discount->one_time? 'Yes' : 'No' }}</td>
                          <td>
                            @if(Auth::user()->can('discount-edit')||Auth::user()->can('discount-view'))
                            <a href="{{route('discount.edit',$discount->id)}}">Edit</a> 
                            @endif
                            @if(Auth::user()->can('discount-delete'))
                            <form action="{{route('discount.delete',$discount->id)}}" method="POST"
                                style="display: inline"
                                onsubmit="return confirm('Are you sure?');">
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            @endif
                        </td>
                          
                          
                      </tr>
                      
                      @empty
                      <tr align="center">
                          <td colspan="7">No entries found.</td>
                      </tr>
                      

                      

                    @endforelse

                   
                  
                </table>
              </div>
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

 


    // $('#example').DataTable( {
    //     "processing": true,
    //     "serverSide": true,
    //     "ajax": "../server_side/scripts/server_processing.php"
    // } );
} );
</script>
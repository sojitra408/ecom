@extends('admin.layout')
@section('content')

        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">All Orders</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
			<!-- {{route('order.create')}} -->
              <a href="#" class="btn btn-primary btn-sm" ><i class="fas fa-plus"></i> Add New Order</a>
            </div>
            <div class="card-body">
             @include('includes.messages')  
              <div class="table-responsive"> 
                <table class="table table-bordered small" id="dataTable" width="100%" cellspacing="0">
                    <thead>  
                        <tr>
                            <th>Id</th>
                            <th>Customer Name</th>
                            <th>Order Id</th> 
                            <th>Order Date</th> 
                            <th>Product Name</th>                            
                            <th>Amount</th>                           
                            <th>Payment Status</th>
                            <th>Payment Mode</th>
                            <th>Transaction ID</th>
							<th>Order Status</th>
                            <th>Action</th>
                        </tr>
                    </thead> 
                    <?php if(count($orders)>0){
                        $i=1;
                        foreach($orders as $ord){?>
                            <tr>
                                <td>{{$i}}</td>
                                <td><?php $user = DB::table('users')->where('id',$ord->user_id)->first(); if(!empty($user)){?>{{$user->first_name}} {{$user->last_name}}<?php } ?></td>
                                <td>{{$ord->order_id}}</td> 
                                <td>{{date('d M Y | h:i A',strtotime($ord->created_at))}}</td>  
                                <td><?php $orderDet = DB::table('order_details')->select('product_name')->where('order_id',$ord->order_id)->get(); 
                                   $product =array();
                                   if(count($orderDet)>0){
                                        foreach($orderDet as $ordet){
                                        $product[]=$ordet->product_name;  
                                    }} $pro=implode(',',$product);echo $pro; ?>
                                </td> 
                                
                               
                                <td>Rs.{{$ord->grand_total}}</td>
                                <td>@if($ord->payment_status==0)Pending @elseif($ord->payment_status==1)Received @endif</td> 
                                <td>{{$ord->payment_type}}</td> 
                                <td><!--<?php $trans = DB::table('transaction')->select('transaction_id')->where('order_id',$ord->order_id)->first(); if(!empty($trans)){?>{{$trans->transaction_id}}<?php } ?>-->
								{{$ord->transaction_id}}
								</td>
								<td>
								@if($ord->order_status==1)Order received
								@elseif($ord->order_status==1)Received 
								@elseif($ord->order_status==2) Cancel
								@endif
								</td>
                                <td>
                                    
                                    @if($ord->order_status==2)
                                        <!--<a href="javascript:void(0)" id="otpCompany" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#otpModal" data-id="{{$ord->id}}"><i class="fas fa-rupee-sign"></i></a>-->
                                    @endif
                                    @if(Auth::user()->can('view-orders-edit') ||Auth::user()->can('view-orders-view'))
                                    <a href="{{route('order.view',$ord->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                    @endif
                                    @if(Auth::user()->can('view-orders-delete'))
                                <a href="{{route('order.delete',$ord->id)}}" class="btn btn-danger btn-sm d-none"><i class="fas fa-trash"></i></a>
                                @endif
                            </td>
                            </tr>
                        <?php $i++; }
                    }else{?>
                        <tr align="center">
                          <td colspan=10>No Record Found</td>
                        </tr>
                    <?php } ?>
                </table>
              </div>
            </div>
          </div>

        </div>
        
        
         <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <form id="companydata">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Refund Money</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <input type="hidden" id="color_id" name="color_id" value="">
         <input type="text" name="name" id="name" value="" class="form-control">
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!--<input type="submit" value="Submit" id="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;">-->
        <button type="button" id="submit" class="btn btn-primary">Refund</button>
      </div>
    </div>
    </form>
  </div>
</div>
        
        
        
        
        
<!-- otp Modal -->
<div class="modal fade" id="otpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <form id="otpdata">
          
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Otp Verify</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <input type="hidden" id="data_id" name="data_id" value="">
         <input type="text" name="otp" id="otp" value="" class="form-control">
         <p id="response_msg" style="color:red"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!--<input type="submit" value="Submit" id="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;">-->
        <button type="button" id="otpVerify" class="btn btn-primary">Verify</button>
      </div>
    </div>
    </form>
  </div>
</div>
        
        
@endsection
 
 
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
<script>

$(document).ready(function () {

$.ajaxSetup({
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});



$('body').on('click', '#submit', function (event) {
    
    event.preventDefault()
    var id = $("#color_id").val();
    var name = $("#name").val();
   
    $.ajax({
      url: 'refund/' + id,
      type: "POST",
      data: {
        id: id,
        amount: name,
        "_token": "{{ csrf_token() }}",
      },
      dataType: 'json',
      success: function (data) {
        //   console.log('ok');
          $('#companydata').trigger("reset");
          $('#exampleModal').modal('hide');
        //   window.location.reload(true);
      }
  });
});


$('body').on('click', '#editCompany', function (event) {

    event.preventDefault();
    var id = $(this).data('id');
    console.log(id)
    $.get('order-refund/' + id, function (data) {
         
         $('#exampleModal').modal('show');
          $('#color_id').val(data.data.id);
         $('#name').val(data.data.grand_total);
         
     })
});





$('body').on('click', '#otpCompany', function (event) {

    event.preventDefault();
    var id = $(this).data('id');
    console.log(id)
    
    $.get('refund-otp', function () {
         
         $('#otpModal').modal('show');
          $('#data_id').val(id);
           
         
     })
});



$('body').on('click', '#otpVerify', function (event) {
    
    event.preventDefault()
    var id = $("#data_id").val();
    var otp = $("#otp").val();
   
    $.ajax({
      url: 'refund-otp/verify',
      type: "POST",
      data: {
        id: id,
        otp: otp,
        "_token": "{{ csrf_token() }}",
      },
      dataType: 'json',
      success: function (data) {
        //   console.log(data);
          $('#otpdata').trigger("reset");
          if(data.success == true)
          {
            $('#otpModal').modal('hide');
            $('#exampleModal').modal('show');
            $('#color_id').val(id);
            $('#name').val(data.data.grand_total);
            
            //   window.location.reload(true);    
          }
          else
          {
            //   response_msg
            $('#response_msg').text(data.message);  
          }
          
      }
  });
});
 

 
}); 
 
 
 
</script> 
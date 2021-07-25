@extends('admin.layout')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Order Details</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
			<div class="row">
				<div class="col-md-2 small">
              Order ID: <strong>{{$orders->order_id}}</strong>
			  </div>
			  <div class="col-md-3 small">
              Order Price: <strong>{{$orders->grand_total}}</strong>
			  </div>
			  <div class="col-md-3 small">
              Order Status: <strong>@if($orders->order_status==0) Pending @elseif($orders->order_status==1) Received     @elseif($orders->order_status==7) In Progress @elseif($orders->order_status==8) Completed  @endif</strong>
			  </div>
			  
			  <div class="col-md-4 small">
				  <form method="POST" action="{{route('orderstatus.change')}}" >
				  @csrf
				  <input type="hidden" name="order_id" value="{{$orders->id}}">
				  <div class="form-group ">
				      
				      <label for="inputPassword" class="col-sm-12 col-form-label">Change Status: </label>
				      <div class="col-sm-12 text-left">
				          <div class="input-group">
						  <select name="order_status" class="form-control form-control-sm custom-select-sm">
						  <option >Select Status</option>
						  <option value="0">Pending</option>
						  <option value="1">Received</option>							 
						  <option value="7">In Progress </option>
						  <option value="8">Completed </option>
						</select>
						<div class="input-group-append">
							@if(Auth::user()->can('view-orders-edit'))
    	<button class=" btn btn-primary btn-sm" type="submit">Change</button>
    	@endif
  </div>
				      </div></div>
				    </div>
				
					</form>
             
			  </div>
			  </div>
			  <div class="row">
			  <div class="col-md-6 small">
			   <strong>Billing Address:</strong>
			    <br>
			  {{$address1->contact_name}} <br>
			  {{$address1->address}} {{$address1->address1}},{{$address1->City->city}}<br>
			  {{$address1->State->name}} - {{$address1->pincode}}
			  </div>
			  <div class="col-md-6 small">
			  <strong>Shipping Address:</strong> <br>
			  {{$address->contact_name}} <br>
			  {{$address->address}} {{$address->address1}},{{$address->City->city}}<br>
			  {{$address->State->name}} - {{$address->pincode}}
			  </div>
			  </div>
            </div>
            <div class="card-body">
             @include('includes.messages')  
              <div class="table-responsive"> 
                <table class="table table-bordered small"  width="100%" cellspacing="0">
                    <thead>  
                        <tr>
                            <th>Id</th>
                            <th>Product ID</th>
                            <th>Product Details</th>
                            <th>Image</th>
							 <th>Status</th>
							 <th>Inventory Type</th>
							 <th>Quantity</th>
                            <th>IGST</th> 
                            <th>SGST</th> 
                            <th>CGST</th> 
                            <th>UGST</th>                           
                             <th>Price</th>   
							  <th>Shipping Tracking</th>                         
                           
                            
                        </tr>
                    </thead> 
                    <?php if(count($products)>0){
                        $i=1;$price=0;
                        foreach($products as $ord){?>
						<?php $variant=getVariantById($ord->product_id); ?>
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$variant->variant_id}}</td>
                                <td>{{$ord->product_name}}</td>
                                <td><img src="{{$variant->img}}" width="70"></td>
                                <td>
								<form method="POST" action="{{route('orderitemstatus.change',$ord->id)}}" >
				  @csrf
				  <input type="hidden" name="order_id" value="{{$orders->id}}">
				  <div class="form-group ">
				      <label for="inputPassword" class="col-sm-12 col-form-label">Change Status: <strong>
					  @if($ord->status==28) Pending @elseif($ord->status==27) Order Received    @elseif($ord->status==2) Order confirmed @elseif($ord->status==3) Cancel @elseif($ord->status==4) Ready to ship @elseif($ord->status==5) In transit @elseif($ord->status==6) Delivered @elseif($ord->status==9) Exchange request received @elseif($ord->status==10) Exchange Cancelled @elseif($ord->status==11) Pick up scheduled @elseif($ord->status==12) Pick up in transit @elseif($ord->status==13) Exchange received @elseif($ord->status==14) Exchange confirmed @elseif($ord->status==15) Exchange ready to ship @elseif($ord->status==16) Exchange dispatched- in transit @elseif($ord->status==17) Exchange delivered @elseif($ord->status==18) Exchange on hold @elseif($ord->status==19) Return request received @elseif($ord->status==20) Return return cancelled @elseif($ord->status==21) Return  pick up scheduled @elseif($ord->status==22) Return  in transit @elseif($ord->status==23) Return  received @elseif($ord->status==24) Refund  initiated @elseif($ord->status==25) Refund  completed @elseif($ord->status==26) Refund on hold @endif
					  </strong></label>
					  @if($ord->status==3)
					<p><strong>Reason:</strong> {{$ord->cancel_reason}}</p>
					  @endif
				      <div class="col-sm-12 text-left">
				          <div class="input-group">
  
						               <select name="order_status" id="order_status" class="form-control form-control-sm custom-select custom-select-sm">
						  <option >Select Status</option>
						  <option value="28">Pending</option>
						  <option value="27">Order Received </option>
						  <option value="2">Order confirmed </option>
						  <option value="3">Cancel</option>
						  <option value="4">Ready to ship</option>
						  <option value="5">In transit </option>
						  <option value="6">Delivered  </option>
						  <option value="9">Exchange request received  </option>
						  <option value="10">Exchange Cancelled  </option>
						  <option value="11">Pick up scheduled  </option>
						  <option value="12">Pick up in transit  </option>
						  <option value="13">Exchange received  </option>
						  <option value="14">Exchange confirmed  </option>
						  <option value="15">Exchange ready to ship  </option>
						  <option value="16">Exchange dispatched- in transit  </option>
						  <option value="17">Exchange delivered  </option>
						  <option value="18">Exchange on hold  </option>
						  <option value="19">Return request received  </option>
						  <option value="20">Return return cancelled  </option>
						  <option value="21">Return  pick up scheduled  </option>
						  <option value="22">Return  in transit  </option>
						  <option value="23">Return  received  </option>
						  <option value="24">Refund  initiated  </option>
						  <option value="25">Refund  completed  </option>
						  <option value="26">Refund on hold</option>
						</select>
						<div class="input-group-append">
							@if(Auth::user()->can('view-orders-edit'))
							<button class=" btn btn-primary btn-sm" type="submit"><i class="fa fa-check"></i></button>
							@endif
						</div>
				      </div>
				    </div>
				
					</form>
								
								</td>
								<td>{{$ord->inventory_type}}</td>
								<td>{{$ord->qty}} X ₹{{$ord->price}}</td>
                                <td>{{$ord->igst}}</td> 
                                <td>{{$ord->sgst}}</td> 
                                <td>{{$ord->cgst}}</td> 
                                <td>{{$ord->ugst}}</td> 
                                 <td>{{$ord->qty * $ord->price}}</td> 
								  <td>
<div class="input-group mb-3">
  <input id="track-no-{{$ord->id}}" type="text" class="form-control form-control-sm" value="{{$ord->track_id}}" >
  <div class="input-group-append">
    <button class="btn btn-outline-secondary track_this btn-sm" data-item-id="{{$ord->id}}" type="button">Track</button>
  </div>
</div>

<div class="shipdata-{{$ord->id}}"> {{trackingData($ord->track_id)}}</div>
</td> 
                               
                              
                            </tr>
                        <?php $i++; $price = $price + ($ord->qty * $ord->price); } ?>
						<tr><td style="text-align: end;" colspan="12"></td><td></td></tr>
						
						<tr><td style="text-align: end;" colspan="12"><strong>Price</strong></td><td><strong>₹ {{$price}}</strong></td></tr>
						<tr><td style="text-align: end;" colspan="12"><strong>Discount</strong></td><td><strong>-₹ {{$orders->discount + $orders->coupon_discount }}</strong></td></tr>
						<tr><td style="text-align: end;" colspan="12"><strong>Shhipping Charge</strong></td><td><strong>₹ {{$orders->shipping_charge}}</strong></td></tr>
						<tr><td style="text-align: end;" colspan="12"><strong>Total Price</strong></td><td><strong>₹ {{$orders->grand_total}}</strong></td></tr>
                   <?php }else{?>
                        <tr align="center">
                          <td colspan=12>No Record Found</td>
                        </tr>
                    <?php } ?>
                </table>
              </div>
            </div>
          </div>

        </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script>
 
 $(document).on('click','.track_this',function(e){

	e.preventDefault();

	var id=$(this).attr('data-item-id');
	var track_id=$('#track-no-'+id).val();
	var html='';
	//alert(track_id);
	 $.ajax({
		
		type: 'POST',
		url: '{{ url("admin/orderitem-trackshipment") }}',
		data: {id:id,track_id: track_id,_token:'{{ csrf_token() }}'},
		success: function (data){
			$('.shipdata-'+id).html('');
			var obj = JSON.parse(data);
			if(obj.length>0){
				$.each(obj, function(key,val) { 
				 
				  html+='<a class="" data-toggle="collapse" href="#collapseExample-'+key+'" role="button" aria-expanded="false" aria-controls="collapseExample">'+val.status+'</a><div class="collapse" id="collapseExample-'+key+'"><div class="card card-body">Comments: '+val.comments+'<br>Location: '+val.location+'<br>datetime: '+val.datetime+'</div></div><br>';
			}); 
			$('.shipdata-'+id).html(html);
			}else{
				$('.shipdata-'+id).html('Please enter valid details');
			}
		}
	
	});
	
	
});
$(function () {
  $('[data-toggle="popover"]').popover()
})
 </script>
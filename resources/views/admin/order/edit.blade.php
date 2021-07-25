@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Order</h1>
         

          <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Enter Details Below</h6>
                </div>
                <form role="form" action="{{ route('order.update',$id) }}" method="post">
                    {{ csrf_field() }}
                    <div class="box-body p-3">
                    @include('includes.messages')  
                        <div class="row"> 
                            <div class="col-lg-offset-3 col-lg-6"> 
                                <div class="form-group">
                                    <label for="name">Order Id</label>
                                    <input type="text" class="form-control form-control-sm" id="order_id" name="order_id"  value="{{$order->order_id}}" readOnly>
                                </div> 
                                <div class="form-group">
                                    <label for="name">Order Date</label>
                                    <input type="date" class="form-control form-control-sm" id="order_date" name="order_date" value="{{$order->order_date}}">
                                </div> 
                                <div class="form-group">
                                    <label for="name">Order Status</label>
                                    <select class="form-control  form-control-sm" id="order_status" name="order_status">
                                        <?php  $issel="";$ipsel="";$icsel="";
                                        if($order->order_status == 1){
                                            $issel="selected='selected'";
                                        }else if($order->order_status == 2){
                                            $ipsel="selected='selected'";
                                        }else if($order->order_status == 3){
                                            $icsel="selected='selected'";
                                        }?>
                                        <option value="">Select Order Status</option>
                                        <option <?php echo $issel?> value="1">Placed</option> 
                                        <option <?php echo $ipsel?> value="2">Cancel</option> 
                                        <option <?php echo $icsel?> value="3">Completed</option> 
                                    </select>
                                </div>  
                            </div>
                            <div class="col-lg-offset-3 col-lg-6">  
                                <div class="form-group">
                                    <label for="name">Payment Status</label>
                                    <select class="form-control  form-control-sm" id="payment_status" name="payment_status">
                                        <?php  $issel="";$ipsel="";$icsel="";
                                            if($order->payment_status == "Pending"){
                                                $issel="selected='selected'";
                                            }else if($order->payment_status == "Success"){
                                                $ipsel="selected='selected'";
                                            }else if($order->payment_status == "Failed"){
                                                $icsel="selected='selected'";
                                            }?>
                                        <option value="">Select Payment Status</option>
                                        <option <?= $issel?> value="Pending">Pending</option> 
                                        <option <?= $ipsel?> value="Success">Success</option> 
                                        <option <?= $icsel?> value="Failed">Failed</option> 
                                    </select>
                                </div>  
                                <div class="form-group">
                                    <label for="name">User</label>
                                    <select class="form-control  form-control-sm" id="user_id" name="user_id">
                                        <option value="">Select User</option>
                                        <?php if(count($users)>0){
                                            foreach($users as $user){?>
                                                <option <?php if($order->user_id == $user->id){ echo 'selected'; }?> value="{{$user->id}}">{{$user->name}}</option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>  
                                <div class="form-group">
                                    <label for="name">Products</label>
                                    <select name="product_id[]" multiple id="product_id" class="form-control form-control-sm">
                                        <option value="">--- Select Product ---</option> 
                                        @foreach ($products as $key => $product) 
                                            <?php $select='';
                                            if(count($ordersDet)>0){
                                                foreach($ordersDet as $ordDet){
                                                    if($product->id == $ordDet->product_id){
                                                        $select="selected='selected'";
                                                    }
                                                }
                                            }?>
                                            <option <?php echo $select ?> value="{{$product->id}}">{{ $product->product_name }}</option> 
                                        @endforeach 
                                    </select>
                                </div>  
                            </div>
                            <div class="col-lg-offset-3 col-lg-12">
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
                                    <a href="{{ route('admin.order') }}" class="btn btn-warning  btn-sm">Back</a>
                                </div> 
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> 
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> 
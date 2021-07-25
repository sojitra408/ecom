@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Add Order</h1>
         

          <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Enter Details Below</h6>
                </div>
                <form role="form" action="{{ route('order.save') }}" method="post">
                    {{ csrf_field() }}
                    <div class="box-body p-3">
                     @include('includes.messages')
                        <div class="row"> 
                            <div class="col-lg-offset-3 col-lg-6"> 
                                <div class="form-group">
                                    <label for="name">Order Id</label>
                                    <input type="text" class="form-control form-control-sm" id="order_id" name="order_id"  value="<?php echo rand("10001","99999")?>" readOnly>
                                </div> 
                                <div class="form-group">
                                    <label for="name">Order Date</label>
                                    <input type="date" class="form-control form-control-sm" id="order_date" name="order_date" value="{{old('order_date')}}">
                                </div> 
                                <div class="form-group">
                                    <label for="name">Order Status</label>
                                    <select class="form-control  form-control-sm" id="order_status" name="order_status">
                                        <option value="">Select Order Status</option>
                                        <option value="1">Placed</option> 
                                        <option value="2">Cancel</option> 
                                        <option value="3">Completed</option> 
                                    </select>
                                </div>  
                            </div>
                            <div class="col-lg-offset-3 col-lg-6"> 
                                <div class="form-group">
                                    <label for="name">Payment Status</label>
                                    <select class="form-control  form-control-sm" id="payment_status" name="payment_status">
                                        <option value="">Select Payment Status</option>
                                        <option value="Pending">Pending</option> 
                                        <option value="Success">Success</option> 
                                        <option value="Failed">Failed</option> 
                                    </select>
                                </div>  
                                <div class="form-group">
                                    <label for="name">User</label>
                                    <select class="form-control  form-control-sm" id="user_id" name="user_id">
                                        <option value="">Select User</option>
                                        <?php if(count($users)>0){
                                            foreach($users as $user){?>
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>  
                                <div class="form-group">
                                    <label for="name">Products</label>
                                    <select name="product_id[]" multiple id="product_id" class="form-control form-control-sm">
                                        <option value="">--- Select Product ---</option> 
                                        @foreach ($products as $key => $product) 
                                            <option value="{{$product->id}}">{{ $product->product_name }}</option> 
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
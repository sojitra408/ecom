@extends('admin.layout')
@section('content')

        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Add Address</h1>
         

          <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Enter Details Below</h6>
                </div>
                <form role="form" action="{{ route('address.update',$address->id) }}" method="post">
                    {{ csrf_field() }}
					
                    <div class="box-body p-3">
                    @include('includes.messages')  
                        <div class="row"> 
							
                            <div class="col-lg-offset-3 col-lg-6"> 
                            <div class="form-group">
                                    <label for="first_name">Contact Name</label>
                                    <input type="text" class="form-control form-control-sm" id="first_name" name="first_name"  value="{{$address->contact_name}}">
                                </div>
                                </div>

								
								<div class="col-lg-offset-3 col-lg-6"> 
								<div class="form-group">
                                    <label for="phone">Contact Phone</label>
                                    <input type="number" class="form-control form-control-sm" id="phone" name="phone" value="{{$address->contact_no}}">
                                </div> 
                                </div> 
								<div class="col-lg-offset-3 col-lg-6"> 
								<div class="form-group">
                                    <label for="address">Address </label>
                                    <textarea class="form-control form-control-sm" id="address" name="address" >{{$address->address}}</textarea>
                                </div> 
                                </div> 
								<div class="col-lg-offset-3 col-lg-6"> 
								<div class="form-group">
                                    <label for="address1">Address 1 </label>
                                    <textarea class="form-control form-control-sm" id="address1" name="address1" >{{$address->address1}}</textarea>
                                </div> 
                                </div>
                           
                            <div class="col-lg-offset-3 col-lg-6">  
							
							     
								<div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control form-control-sm" id="city" name="city" value="{{$address->city}}">
                                </div>
                                </div>
								<div class="col-lg-offset-3 col-lg-6"> 
								<div class="form-group">
                                    <label for="name">State</label>
                                    <input type="text" class="form-control form-control-sm" id="state" name="state" value="{{$address->state}}">
                                </div>								
                                </div>								
								<div class="col-lg-offset-3 col-lg-6"> 
							
                                <div class="form-group"> 
                                    <label for="pincode">Pin Code</label>
                                    <input type="number" class="form-control form-control-sm" id="pincode" name="pincode" value="{{$address->pincode}}">
                                </div> 
                                </div> 
								<div class="col-lg-offset-3 col-lg-6"> 
								   <div class="form-group">
                                    <label for="dob">Make as Default</label>
									<div class="checkbox">
                                    <input type="checkbox" <?php echo ($address->is_default==1)?'checked':''; ?>  id="is_dafault" name="is_dafault" value="1" >
                                </div>	
                                </div>	
								
							</div>
							 <div class="col-lg-offset-3 col-lg-6"> 
                            <div class="form-group">
                                    <label for="type">Address Type</label>
                                    <select class="form-control  form-control-sm" id="type" name="type"> 
                                        <option value="">Select Address Type</option>
                                        <option <?php echo ($address->type=='home')?'selected':''; ?> value="home">Home</option> 
                                        <option <?php echo ($address->type=='office')?'selected':''; ?> value="office">Office</option>  
                                        <option <?php echo ($address->type=='other')?'selected':''; ?> value="other">Other</option>  
                                    </select>
                                </div>
                                </div>
							</div>
							
                            <div class="col-lg-offset-3 col-lg-12">
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
                                    <a href="{{ route('admin.users') }}" class="btn btn-warning  btn-sm">Back</a>
                                </div> 
                            </div>
                       
                    </div>
                </form>
            </div>
        </div> 
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> 

<script>


</script>
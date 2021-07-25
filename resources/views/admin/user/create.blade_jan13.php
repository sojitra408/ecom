@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Add User</h1>
         

          <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Enter Details Below</h6>
                </div>
                <form role="form" action="{{ route('user.save') }}" method="post">
                    {{ csrf_field() }}
                    <div class="box-body p-3">
                    @include('includes.messages')  
                        <div class="row"> 
                            <div class="col-lg-offset-3 col-lg-6"> 
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control form-control-sm" id="name" name="name"  value="{{old('name')}}">
                                </div>   
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="text" class="form-control form-control-sm" id="email" name="email" value="{{old('email')}}">
                                </div> 
								<div class="form-group">
                                    <label for="name">Mobile</label>
                                    <input type="text" class="form-control form-control-sm" id="mobile" name="mobile" value="{{old('mobile')}}">
                                </div> 
                                <div class="form-group">
                                    <label for="name">Entity</label>
                                    <select class="form-control  form-control-sm" id="entity" name="entity"> 
                                        <option value="">Select Entity</option>
                                        <option value="Yes">Yes</option> 
                                        <option value="No">No</option>  
                                    </select>
                                </div>  
                            </div>
                            <div class="col-lg-offset-3 col-lg-6">  
                                <div class="form-group"> 
                                    <label for="name">Company</label>
                                    <select class="form-control  form-control-sm" id="company" name="company"> 
                                        <option value="">Select Company</option>
                                        <option value="Yes">Yes</option> 
                                        <option value="No">No</option>  
                                    </select>
                                </div>    
								<div class="form-group"> 
                                    <label for="name">Role</label>
                                    <select class="form-control  form-control-sm" id="role_id" name="role_id"> 
                                        <option value="">Select Role</option>
                                        <option value="1">Admin</option> 
                                        <option value="3">Customer</option>  
                                    </select>
                                </div>     
								<div class="form-group">
                                    <label for="name">Turnover</label>
                                    <input type="text" class="form-control form-control-sm" id="turnover" name="turnover"  value="{{old('turnover')}}">
                                </div>   
								<div class="form-group">
                                    <label for="name">Brand</label>
                                    <input type="text" class="form-control form-control-sm" id="brand" name="brand" value="{{old('brand')}}">
                                </div> 
							</div>
							<div class="col-lg-offset-3 col-lg-6">   
								<div class="form-group">
                                    <label for="name">Website</label>
                                    <input type="text" class="form-control form-control-sm" id="website" name="website" value="{{old('website')}}">
                                </div> 
                                <div class="form-group">
                                    <label for="name">insta</label>
                                    <input type="text" class="form-control form-control-sm" id="insta" name="insta" value="{{old('insta')}}">
                                </div> 
							</div>
							<div class="col-lg-offset-3 col-lg-6">   
								<div class="form-group">
                                    <label for="name">User Ip</label>
                                    <input type="text" class="form-control form-control-sm" id="user_ip" name="user_ip" value="{{old('user_ip')}}">
                                </div> 
                            </div>
                            <div class="col-lg-offset-3 col-lg-12">
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
                                    <a href="{{ route('admin.users') }}" class="btn btn-warning  btn-sm">Back</a>
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
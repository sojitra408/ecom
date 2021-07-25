@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit User</h1>
         

          <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Enter Details Below</h6>
                </div>
                <form role="form" action="{{ route('user.update',$users->id) }}" method="post">
                    {{ csrf_field() }}
                    <div class="box-body p-3">
                    @include('includes.messages') 
                        <div class="row"> 
                            <div class="col-lg-offset-3 col-lg-6"> 
                            <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control form-control-sm" id="first_name" name="first_name"  value="{{$users->first_name}}">
                                </div>
                                </div>
                                <div class="col-lg-offset-3 col-lg-6"> 
								<div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control form-control-sm" id="last_name" name="last_name" value="{{$users->last_name}}">
                                </div> 
                                </div> 
								<div class="col-lg-offset-3 col-lg-6"> 
								<div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="email" class="form-control form-control-sm" id="email" name="email" value="{{$users->email}}">
                                </div>
                                </div>
								<div class="col-lg-offset-3 col-lg-6"> 
								<div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="number" class="form-control form-control-sm" id="phone" name="phone" value="{{$users->mobile}}">
                                </div> 
                                </div> 
								<div class="col-lg-offset-3 col-lg-6"> 
								<div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control form-control-sm" id="password" name="password" >
                                </div> 
                                </div> 
								<div class="col-lg-offset-3 col-lg-6"> 
								<div class="form-group">
                                    <label for="password_confirmation"> Confirm Password</label>
                                    <input type="password_confirmation" class="form-control form-control-sm" id="password_confirmation" name="password_confirmation" >
                                </div> 
                                </div> 
								
                           
                            <div class="col-lg-offset-3 col-lg-6">  
							
							     
								<div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control form-control-sm" id="city" name="city" value="{{$users->city}}">
                                </div>
                                </div>
								<div class="col-lg-offset-3 col-lg-6"> 
								<div class="form-group">
                                    <label for="name">State</label>
                                    <input type="text" class="form-control form-control-sm" id="state" name="state" value="{{$users->state}}">
                                </div>								
                                </div>								
								<div class="col-lg-offset-3 col-lg-6"> 
							
                                <div class="form-group"> 
                                    <label for="gender">Gender</label>
                                    <select class="form-control  form-control-sm" id="gender" name="gender"> 
                                        <option value="">Select Gender</option>
                                        <option <?php echo ($users->gender=='male')?'selected':''; ?> value="male">Male</option> 
                                        <option <?php echo ($users->gender=='female')?'selected':''; ?> value="female">Female</option>  
                                    </select>
                                </div> 
                                </div> 
								<div class="col-lg-offset-3 col-lg-6"> 
								   <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="text" class="form-control form-control-sm" id="dob" name="dob" value="{{$users->dob}}">
                                </div>	
								
							</div>
							</div>
							
							 <div class="col-lg-offset-3 col-lg-12">
                                <div class="form-group">
                                    @if(Auth::user()->can('users-edit'))
                                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
                                    @endif
                                    <a href="{{ route('admin.users') }}" class="btn btn-warning  btn-sm">Back</a>
                                </div> 
                            </div>
                </form>
            </div>
        </div> 
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> 
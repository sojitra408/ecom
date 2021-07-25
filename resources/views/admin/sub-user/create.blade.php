@extends('admin.layout')
@section('content')

<style type="text/css">
     .switch {

  position: relative;

  display: inline-block;

  width: 60px;

  height: 34px;

}
    .switch input { 

  opacity: 0;

  width: 0;

  height: 0;

}



.slider {

  position: absolute;

  cursor: pointer;

  top: 0;

  left: 0;

  right: 0;

  bottom: 0;

  background-color: #ccc;

  -webkit-transition: .4s;

  transition: .4s;

}



.slider:before {

  position: absolute;

  content: "";

  height: 26px;

  width: 26px;

  left: 4px;

  bottom: 4px;

  background-color: white;

  -webkit-transition: .4s;

  transition: .4s;

}



input:checked + .slider {

  background-color: #2196F3;

}



input:focus + .slider {

  box-shadow: 0 0 1px #2196F3;

}



input:checked + .slider:before {

  -webkit-transform: translateX(26px);

  -ms-transform: translateX(26px);

  transform: translateX(26px);

}



/* Rounded sliders */

.slider.round {

  border-radius: 34px;

}



.slider.round:before {

  border-radius: 50%;

}
</style>

        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Add User</h1>
         

          <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Enter Details Below</h6>
                </div>
                <form role="form" action="{{ route('sub.user.save') }}" method="post">
                    {{ csrf_field() }}
                    <div class="box-body p-3">
                    @include('includes.messages')  
                        <div class="row"> 
                            <div class="col-lg-offset-3 col-lg-6"> 
                            <div class="form-group">
                                    <label for="first_name">Name</label>
                                    <input type="text" class="form-control form-control-sm" id="first_name" name="first_name"  value="{{old('first_name')}}">
                                </div>
                                </div>
                                
								<div class="col-lg-offset-3 col-lg-6"> 
								<div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="email" class="form-control form-control-sm" id="email" name="email" value="{{old('email')}}">
                                </div>
                                </div>
								<!-- <div class="col-lg-offset-3 col-lg-6"> 
								<div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="number" class="form-control form-control-sm" id="phone" name="phone" value="{{old('phone')}}">
                                </div> 
                                </div> --> 
								<div class="col-lg-offset-3 col-lg-6"> 
								<div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control form-control-sm" id="password" name="password" value="{{old('password')}}">
                                </div> 
                                </div> 
								<div class="col-lg-offset-3 col-lg-6"> 
								<div class="form-group">
                                    <label for="password_confirmation"> Confirm Password</label>
                                    <input type="password_confirmation" class="form-control form-control-sm" id="password_confirmation" name="password_confirmation" value="{{old('password_confirmation')}}">
                                </div> 
                                </div> 
								
                           		<div class="col-lg-offset-3 col-lg-6"> 
                            
                                <div class="form-group"> 
                                    <label for="gender">Select Role</label>
                                    <select class="form-control  form-control-sm" id="select_no_limit" name="role" multiple="multiple">
                                        
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                        
                                        
                                    </select>
                                </div> 
                                </div>

								<div class="col-lg-offset-3 col-lg-6"> 
							
                                <div class="form-group"> 
                                    <label for="gender">Permissions</label>
                                    <select class="form-control  form-control-sm" id="select_no_limit2" name="permissions[]" multiple="multiple">
                                    @foreach ($permissions as $permission)
                                            <option value="{{$permission->id}}">{{$permission->name}}</option>
                                        @endforeach 
                                       
                                    </select>
                                </div> 
                                </div> 
                                
                                <div class="col-lg-offset-3 col-lg-6"> 
                            
                                <div class="form-group"> 
                                    <label for="allergens" class="col-md-2 control-label text-left">Active</label>
                                    <div class="col-md-4">
                        <div class="checkbox">
                           <label class="switch"> 
                           <input type="checkbox" name="active" >
                           <span class="slider round"></span>
                           </label>
                        </div>
                     </div>
                                </div> 
                                </div>
								
							</div>
							
                            <div class="col-lg-offset-3 col-lg-12">
                                <div class="form-group">
                                    @if(Auth::user()->can('sub-users-add'))
                                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
                                    @endif
                                    <a href="{{ route('admin.sub.users') }}" class="btn btn-warning  btn-sm">Back</a>
                                </div> 
                            </div>
                       
                    </div>
                </form>
            </div>
        </div> 
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

<script>
$(document).ready(function(e) {
    $("#seller_id").select2();
    $("#select_no_limit").select2({
        // tags: true
        placeholder: "Select Role",
        maximumSelectionLength: 1
    });

});

</script>

<script>
$(document).ready(function(e) {
    $("#seller_id").select2();
    $("#select_no_limit2").select2({
        // tags: true
        placeholder: "Select Permission",
        // maximumSelectionLength: 1
    });

});

</script>
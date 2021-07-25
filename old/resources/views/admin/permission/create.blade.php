@extends('admin.app')

@section('main-content')
<link rel="stylesheet" href="{{ asset('public/admin_css/dist/css/skins/_all-skins.min.css') }}">
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	  <!-- Content Header (Page header) -->
	  <section class="content-header">
	    <h1>
	      Create New User
	      <small>Create form element</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
	      <li><a href="{{ route('permission.index') }}">Permission Table</a></li>
	      <li class="active">Create Form</li>
	    </ol>
	  </section>

	  <!-- Main content -->
	  <section class="content">
	    <div class="row">
	      <div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <div class="box-header with-border">
	            <h3 class="box-title">Create User</h3>
	          </div>   
	          <!-- /.box-header -->
	          <!-- form start -->
	          <form role="form" action="{{ route('permission.store') }}" method="post">
	          {{ csrf_field() }}
	            <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6">
	            	@include('includes.messages') 
	              <div class="form-group">
	                <label for="name">User Name</label>
	                <input type="text" class="form-control" id="name" name="name" placeholder="Username">
	              </div>
				   <div class="form-group">
	                <label for="name">Phone</label>
	                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
	              </div>
				  <div class="form-group">
	                <label for="name">Email (Use as user name )</label>
	                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
	              </div>
				  
				  <div class="form-group">
	                <label for="name">Password</label>
	                <input type="text" class="form-control" id="password" name="password" placeholder="Password">
	              </div>

	              <div class="form-group">
	              	<label for="for">Permission for</label>
	              	<select name="userType" id="userType" class="form-control">
	              		<option  value="">Select Permission for</option>
	              		<option value="Admin">Admin</option>
	              		<option value="Editor">Editor</option>
	              		<option value="Limited">Limited</option>
	              	</select>
	              </div>

	            <div class="form-group">
	              <button type="submit" class="btn btn-primary">Submit</button>
	              <a href='{{ route('permission.index') }}' class="btn btn-warning">Back</a>
	            </div>
	            	
	            </div>
					
				</div>

	          </form>
	        </div>
	        <!-- /.box -->

	        
	      </div>
	      <!-- /.col-->
	    </div>
	    <!-- ./row -->
	  </section>
	  <!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
@endsection
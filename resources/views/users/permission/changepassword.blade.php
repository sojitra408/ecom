@extends('admin.layout')
@section('content')

<link rel="stylesheet" href="{{ asset('public/admin_css/dist/css/skins/_all-skins.min.css') }}">
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	  <!-- Content Header (Page header) -->
	  <section class="content-header">
	    <h1>
	     Change Password
	      <small>Change Password</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
	      <li><a href="{{ route('permission.index') }}">Permission Table</a></li>
	      <li class="active">Change Password</li>
	    </ol>
	  </section>

	  <!-- Main content -->
	  <section class="content">
	    <div class="row">
	      <div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <div class="box-header with-border">
	            <h3 class="box-title">Change Password for {{$permission->name}}</h3>
	          </div>   
	          <!-- /.box-header -->
	          <!-- form start -->
	          <form role="form" action="{{ route('permission.changepass_post') }}" method="post">
			   <input type="hidden" class="form-control" id="id" name="id" value="{{$permission->id}}" >
	          {{ csrf_field() }}
	            <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6">
	            	@include('includes.messages') 
	              <div class="form-group">
	                <label for="name">New Password</label>
	                <input type="text" class="form-control" id="password" name="password" placeholder="New Password">
	              </div>
				   <div class="form-group">
	                <label for="name">Confirm New Password</label>
	                <input type="text" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
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
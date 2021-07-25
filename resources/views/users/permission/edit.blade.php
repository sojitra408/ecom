@extends('admin.layout')
@section('content')
<link rel="stylesheet" href="{{ asset('public/admin_css/dist/css/skins/_all-skins.min.css') }}">

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	  <!-- Content Header (Page header) -->
	  <section class="content-header">
	    <h1>
	      permission
	      <small>Edit form element</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
	      <li><a href="{{ route('permission.index') }}">permission Table</a></li>
	      <li class="active">Edit Form</li>
	    </ol>
	  </section>

	  <!-- Main content -->
	  <section class="content">
	    <div class="row">
	      <div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <div class="box-header with-border">
	            <h3 class="box-title">Edit permission</h3>
	          </div>
	          <!-- /.box-header -->
	          <!-- form start -->
	          <form role="form" action="{{ route('permission.update') }}" method="post">
			  <input type="hidden" class="form-control" id="id" name="id" value="{{$permission->id}}" >
			  
	          {{ csrf_field() }}
	          
	            <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6">
	            	@include('includes.messages') 
	              <div class="form-group">
	                <label for="name">Name</label>
	                <input type="text" class="form-control" id="name" name="name" value="{{$permission->name}}" >
	              </div>
				   <div class="form-group">
				   <label for="name">User Name/Email</label>
	                <input type="text" class="form-control" id="email" disabled="disabled" name="email" value="{{$permission->email}}" >
	              </div>
				    
				  
				  
				 

	               

	            <div class="form-group">
	              <button type="submit" class="btn btn-primary">Submit</button>
	              <a href='{{ route('permission.index') }}' class="btn btn-warning">Back</a>
	            </div>
				 <div class="form-group">
				<label for="for">Manage Permission(If leave all blanks then user has all permission):</label></div>
				</div>
	            	
	           
				<table class="table table-bordered table-striped">
				 
				<tr>
				<td><input type="checkbox" <?php echo(in_array('view_product',$userPermission))?'checked':''?> name="permission[]" value="view_product"/> View Product</td>
				<td><input type="checkbox" <?php echo(in_array('delete_product',$userPermission))?'checked':''?> name="permission[]" value="delete_product"/> Delete/Edit Product</td>
				</tr>
				<tr>
				<td><input type="checkbox" <?php echo(in_array('view_user',$userPermission))?'checked':''?> name="permission[]" value="view_user"/>  View User </td>
				<td><input type="checkbox" <?php echo(in_array('create_user',$userPermission))?'checked':''?> name="permission[]" value="create_user"/> Manage User</td>
				</tr>
				<tr>
				<td><input type="checkbox" <?php echo(in_array('manage_permission',$userPermission))?'checked':''?> name="permission[]" value="manage_permission"/> Manage Permission</td>
				<td> </td>
				</tr>
				
				 
				 
				
				
				</table>
					
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
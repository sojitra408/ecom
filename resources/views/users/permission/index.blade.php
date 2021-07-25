@extends('admin.layout')
@section('content')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('public/admin_css/bower_components/datatables.net-bs/css/dataTables.bootstrap.css') }}">
<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{{ asset('public/admin_css/dist/css/skins/_all-skins.min.css') }}">
  
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-ticket" aria-hidden="true"></i>Permission
      <small>Create, Read, Update, Delete</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('permission.index') }}">Permission Table</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
        <h3 class="box-title">permission</h3>
        <a class='pull-right btn btn-success' href="{{ route('permission.create') }}">Add New</a>
      </div>
      @include('includes.messages')
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                  <th>S.No</th>
                  <th>Name</th>
				   <th>User Name/Email</th>
                  
                  <th>Manage</th>
				   <th></th>
                  
                </tr>
                </thead>
                <tbody>
                @foreach ($permissions as $permission)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $permission->name }}</td>
				    <td>{{ $permission->email }}</td>
                  
                  <td>@if($permission->id!=1)<a href="{{route('permission.edit',$permission->id)}} "><span class="glyphicon glyphicon-edit"></span></a>@endif</td>
				  <td> <a href="{{ route('permission.changepass',$permission->id) }}">Change Password</a> </td>
                   
                </tr>
                          </tr>
                  @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
				    <th>User Name/Email</th>
                  <th>User Type</th>
                  <th>Manage</th>
				    <th></th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
 
<!-- jQuery 3 -->
<script src="{{ asset('public/admin_css/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('public/admin_css/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('public/admin_css/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/admin_css/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('public/admin_css/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('public/admin_css/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('public/admin_css/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/admin_css/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/admin_css/dist/js/demo.js') }}"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
 
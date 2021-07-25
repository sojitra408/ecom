@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-ticket" aria-hidden="true"></i>User
      <small>Create, Read, Update, Delete</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('user.display') }}">User Table</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
        <h3 class="box-title">User</h3>
        <a class='pull-right btn btn-success' href="{{ route('user.create') }}">Add New</a>
      </div>
      @include('includes.messages')
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>User Name</th>
                    <th>Assigned Roles</th>
					 <th>Manage Permission</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                    <tr>
                      <td>{{ $loop->index + 1 }}</td>
                      <td>{{ $user->name }}</td>
                      <td>
                        @foreach ($user->roles as $role)
                          {{ $role->name }}
                        @endforeach
                      </td>
					  <td>@if($user->id!=1)<a href="{{route('permission.edit',$user->id)}} "><span class="glyphicon glyphicon-edit"></span></a>@endif
					  | <a href="{{ route('permission.changepass',$user->id) }}">Change Password</a>
					  </td>
                        <td>@if($user->id!=1)<a href="{{ route('user.edit',$user->id) }}"><span class="glyphicon glyphicon-edit"></span></a>@endif</td>
                        <td>
                          <form id="delete-form-{{ $user->id }}" method="post" action="{{ route('user.destroy',$user->id) }}" style="display: none">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                          </form>
                          <a href="" onclick="
                          if(confirm('Are you sure, You Want to delete this?'))
                              {
                                event.preventDefault();
                                document.getElementById('delete-form-{{ $user->id }}').submit();
                              }
                              else{
                                event.preventDefault();
                              }" ><span class="glyphicon glyphicon-trash"></span></a>
                        </td>
                      </tr>
                    </tr>
                  @endforeach
                  </tbody>
                <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>User Name</th>
                  <th>Assigned Roles</th>
				  <th>Manage Permission</th>
                  <th>Edit</th>
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
</div>
	<!-- /.content-wrapper -->
@endsection
<!-- jQuery 3 -->
<script src="{{ asset('admin_css/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('admin_css/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('admin_css/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_css/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('admin_css/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('admin_css/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('admin_css/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin_css/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin_css/dist/js/demo.js') }}"></script>
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
 
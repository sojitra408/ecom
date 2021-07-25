@extends('admin.layout')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">All Users</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a href="{{route('user.create')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add New User</a>
            </div>
            <div class="card-body">
             @include('includes.messages')  
              <div class="table-responsive"> 
                <table class="table table-bordered small" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Role</th>
                        <th>Password Value</th>
                        <th>Created On</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(count($users)>0){
                        
                        $i=1;
                        foreach ($users as $user){?>
                          <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->mobile }}</td>
                            <td><?php $role= DB::table('roles')->select('name')->where('id',$user->role_id)->first(); if(!empty($role)){ echo $role->name; }?></td> 
                            <td>{{ $user->password_val }}</td>
                            <td>{{ date('Y-m-d',strtotime($user->created_at))}}</td>
                            <th><a href="{{route('user.detail',$user->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                              <a href="{{route('user.edit',$user->id)}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                              <a href="{{route('user.delete',$user->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </th>
                          </tr>
                      <?php $i++; } }else{?>
                            <tr align="center">
                              <td colspan=10>No Record Found</td>
                            </tr>
                      <?php } ?>
                    </tbody> 
                </table>
              </div>
            </div>
          </div>

        </div>
@endsection
 
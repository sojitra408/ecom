@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">All Registrations</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Registrations Requests</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered small" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>#</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Brand Name</th>
                      <th>Company Name</th>
                      <th>
                          <div class=" d-flex flex-row align-items-center justify-content-between">
                  <span class=""> Condition&nbsp;1</span>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-800"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header text-gray-800">Entity registered as a Limited, Private Limited, One Person Company or Limited Liability Partnership?</div>
                     
                    </div>
                  </div>
                </div> </th> <th><div class=" d-flex flex-row align-items-center justify-content-between">
                  <span class=""> Condition&nbsp;2</span>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-800"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header text-gray-800">company less than 10 year old?</div>
                     
                    </div>
                  </div>
                </div></th> <th><div class=" d-flex flex-row align-items-center justify-content-between">
                  <span class=""> Condition&nbsp;3</span>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-800"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header text-gray-800">company tunover less than 100 crore?</div>
                     
                    </div>
                  </div>
                </div></th> <th>Password</th><th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr><th>#</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Brand Name</th>
                      <th>Company Name</th>
                     
					  <th>
                          <div class=" d-flex flex-row align-items-center justify-content-between">
                  <span class=""> Condition&nbsp;1</span>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-800"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header text-gray-800">Entity registered as a Limited, Private Limited, One Person Company or Limited Liability Partnership?</div>
                     
                    </div>
                  </div>
                </div> </th> <th><div class=" d-flex flex-row align-items-center justify-content-between">
                  <span class=""> Condition&nbsp;2</span>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-800"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header text-gray-800">company less than 10 year old?</div>
                     
                    </div>
                  </div>
                </div></th> <th><div class=" d-flex flex-row align-items-center justify-content-between">
                  <span class=""> Condition&nbsp;3</span>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-800"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header text-gray-800">company tunover less than 100 crore?</div>
                     
                    </div>
                  </div>
                </div></th><th>Password</th> <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
				  @if($result)
                      @foreach($result as $index=>$res)
                    <tr><td>{{$index+1}}</td>
                      <td>{{$res->name}}</td>
                      <td>{{$res->email}}</td>
                      <td>{{$res->mobile}}</td>
                      <td>{{$res->brand}}</td>
                      <td>{{$res->website}}</td>
                      
                      <td>
                      {{$res->entity}}
                      
                </td><td>
                     {{$res->company}}
                      
                </td><td>
                     {{$res->turnover}}
                      
                </td>
				<td>
                   @if($res->password_val!='')  
                    <span toggle="#password-field" onclick="return showpass({{$res->id}})" class="fa fa-fw fa-eye field_icon toggle-password"></span>
<input type="password" id="pass_log_id{{$res->id}}" value="{{$res->password_val}}"/>  
@endif
                </td>
                      <td> @if($res->password_val=='')
					  <a href="{{route('create.password',$res->id)}}"  class="btn btn-primary btn-sm small bg-gradient-primary">Create&nbsp;Account</a>
					  @endif
</td>
                    </tr>
					
					@endforeach
					@endif
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
function showpass(id)
{
 var input = $("#pass_log_id"+id);
  
 if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
}
$(document).ready(function() {

 


    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "../server_side/scripts/server_processing.php"
    } );
} );
</script>
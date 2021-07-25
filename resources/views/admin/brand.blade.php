@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">All Brand</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Registered Brand</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered small" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>#</th>
                      <th>Brand Name</th>
                      <th>User Name</th>
                      <th>Date</th>
                       
                            
                    </tr>
                  </thead>
                  <tfoot>
                     <tr>
                        <th>#</th>
                      <th>Brand Name</th>
                      <th>User Name</th>
                      <th>Date</th>
                       
                            
                    </tr>
                  </tfoot>
                  <tbody>
				  @if($result)
                      @foreach($result as $index=>$res)
                    <tr><td>{{$index+1}}</td>
                      <td>{{$res->brand_name}}</td>
                      <td>{{$res->name}}</td>
                      <td>{{$res->created_at}}</td>
                      
                      
                      
				 
                      
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
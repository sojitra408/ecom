@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">All Features</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              @if(Auth::user()->can('features-master'))
              <a class="btn btn-primary btn-sm" href="{{route('features.create')}}" ><i class="fas fa-plus"></i> Add Feature</a>
              @endif
            </div>
            <div class="card-body">
              <div class="table-responsive">

                <table class="table table-bordered small" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>#</th>
                      <th>Name</th> 
                      <th>Action</th>
                       
                            
                    </tr>
                  </thead>
                  <tbody>

                    @php($count=0)
                      

                    @forelse($features as $feature)
                    @php($count++)

                    
                                                
                      <tr align="center">
                          <td>{{ $count }}</td>
                          <td>{{ $feature->name }}</td>                          
                          <td>
                            @if(Auth::user()->can('features-master'))
                            <a href="{{route('features.edit',$feature->id)}}" class="btn btn-success btn-sm mr-2">Edit</a> &nbsp; 
                            <a href="{{route('features.delete',$feature->id)}}" class="btn btn-danger btn-sm mr-2" onclick="return confirm('Are you sure Want Delete?')">Delete</a></td>
                            @endif
                      </tr>
                      
                      @empty
                      <tr align="center">
                          <td colspan="7">No entries found.</td>
                      </tr>
                      

                      

                    @endforelse
                    
                    
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
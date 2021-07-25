@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">All Seller</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              @if(Auth::user()->can('seller-add'))
              <a class="btn btn-primary btn-sm" href="{{route('seller.create')}}" ><i class="fas fa-plus"></i> Add New</a>
              @endif
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered small" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align="center">
                        <th>#</th>
                        <th>Seller Id</th>
                      <th>Seller Name</th>
                      <th>Action</th>
                      
                       
                            
                    </tr>
                  </thead>
                  <tfoot>
                     <tr align="center">
                        <th>#</th>
                        <th>Seller Id</th>
                      <th>Seller Name</th>
                      <th>Action </th>
                    
                       
                            
                    </tr>
                  </tfoot>
                  <tbody>
				  
                  @php($count=0)
                      

                    @forelse($sellers as $seller)
                    @php($count++)

                    
                                                
                      <tr align="center">
                          <td>{{ $count }}</td>
                          <td>{{ $seller->seller_id }}</td>
                          <td>{{ $seller->seller_name }}</td> 
                          <td>
                            @if(Auth::user()->can('seller-edit') || Auth::user()->can('seller-view'))
                            <a href="{{route('seller.edit',$seller->id)}}" class="btn btn-success btn-sm mr-2">Edit</a>
                            @endif
                            @if(Auth::user()->can('seller-delete'))
                            <form action="{{route('seller.delete',$seller->id)}}" method="POST"
                                style="display: inline"
                                onsubmit="return confirm('Are you sure?');">
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            @endif
                          </td>                         
                          
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
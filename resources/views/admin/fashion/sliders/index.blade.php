@extends('admin.layout')
@section('content')
        <div class="container-fluid">
<div class="row">

<div class="col-md-3">
@include('admin.homepage.menu')

</div>

<div class="col-md-9">

<!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">All Sliders</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a class="btn btn-primary btn-sm" href="{{route('sliders.create')}}" ><i class="fas fa-plus"></i> Add Slider</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                <table class="table table-bordered small"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>#</th>
                      <th>Image</th> 
                      <th>Action</th>
                       
                            
                    </tr>
                  </thead>
                  <tbody>

                    @php($count=0)
                      

                    @forelse($sliders as $feature)
                    @php($count++)

                    
                                                
                      <tr align="center">
                          <td>{{ $count }}</td>
                          <td><img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/slider/small/{{getSliderMediaById($feature->image)}}" width="75" /></td>                          
                          <td><a href="{{route('sliders.edit',$feature->id)}}" class="btn btn-success btn-sm mr-2">Edit</a> &nbsp; <a href="#" class="btn btn-danger btn-sm mr-2">Delete</a></td>
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
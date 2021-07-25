@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">All Reviews</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <!-- <a href="{{route('about.create')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add New About</a> -->
              <h6 class="m-0 font-weight-bold text-primary">Reviews</h6>
            </div>
            <div class="card-body">
              @include('includes.messages')
              <div class="table-responsive">


                <table class="table table-bordered small" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Product Name</th>
                        <th>Review Title</th>
                        <th>Review Description</th>
                        <th>Rating</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>
                                               
                    
                    <tbody>
                        <?php if(count($pages)>0){
                        
                        $i=1;
                        foreach ($pages as $page){?>
                          <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $page->product_name }}</td>
                            <td>{{ $page->review_title }}</td>
                            <td>{!!html_entity_decode($page->review_description)!!}</td>
                            <td>{{ $page->rating }}</td>
                            <td>
                             @foreach (explode('|', $page->image) as $img)
                            <img width="50" src="{{asset('public/images/'.$img)}}"></img>
                            @endforeach
                            </td>
                            <td>{{$page->status==1 ?'Active':'Deactive' }}</td>
                           
                           
                            <th><!--<a href="{{route('user.detail',$page->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i>--></a>
                              <a href="{{route('reviews.edit',$page->id)}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                              <!-- <a href="{{route('reviews.delete',$page->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> -->
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
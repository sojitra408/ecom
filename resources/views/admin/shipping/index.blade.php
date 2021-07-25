@extends('admin.layout')

@section('content')

        <div class="container-fluid">



          <!-- Page Heading -->

          <h1 class="h3 mb-2 text-gray-800">Shipping</h1>

         



          <!-- DataTales Example -->

          <div class="card shadow mb-4">

            <div class="card-header py-3">
              @if(Auth::user()->can('shipping-add'))
              <!--<a class="btn btn-primary btn-sm" href="{{route('shipping.create')}}" ><i class="fas fa-plus"></i> Add Shipping</a>-->
              @endif

            </div>

            <div class="card-body">

              <div class="table-responsive">

                <table class="table table-bordered small" id="dataTable" width="100%" cellspacing="0">

                  <thead>

                    <tr>

                        <th>#</th>

                      <th>Title</th>
                      <th>Type</th>

                      <th>Price</th>
                      <th>Cart Price</th>

                      <th>Description</th>

                      <th>Action</th>

                       

                            

                    </tr>

                  </thead>

                  <tbody>

                      @php($count=0)
                      

                    @forelse($shippings as $shipping)
                    @php($count++)

                    
                                                
                      <tr align="center">
                          <td>{{ $count }}</td>
                          <td>{{ $shipping->title }}</td>
                          <td>{{ $shipping->type }}</td>
                          <td>{{ $shipping->price }}</td>
                          <td>{{ $shipping->cart_price }}</td>
                           <td>{{ $shipping->description }}</td>
                          <td>
                            @if(Auth::user()->can('shipping-edit')||Auth::user()->can('shipping-view'))
                            <a href="{{route('shipping.edit',$shipping->id)}}" class="btn btn-success btn-sm">Edit</a>
                            @endif
                            @if(Auth::user()->can('shipping-delete'))
                            <!--<form action="{{route('shipping.delete',$shipping->id)}}" method="POST"
                                style="display: inline"
                                onsubmit="return confirm('Are you sure?');">
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>-->
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

              

              <div class="col-md-8">

                  

                  <!-- <form>

  <div class="form-group">

    <label for="title">Title</label>

    <input type="text" class="form-control" id="title" >

  </div>

  <div class="form-group">

    <label for="price">Price</label>

    <input type="number" class="form-control" id="price" >

  </div>

  

  <div class="form-group">

    <label for="description">Description</label>

    <textarea class="form-control" id="description" rows="3"></textarea>

  </div>

</form>
 -->
                  

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
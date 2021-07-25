@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">All Postal</h1>
         
	@include('includes.messages') 
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                @if(Auth::user()->can('postalcode-management-add'))
                <a class="btn btn-primary btn-sm" href="{{route('postal.create')}}" ><i class="fas fa-plus"></i> Add New</a>
                @endif
            </div>
            <div class="card-body">
              <div class="table-responsive">
                 <table class="table table-bordered" id="postal_list" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>#</th>
                      <th>Postal Code</th>
                      <th> Status</th>
                      <th>Date</th>
					  <th>Action</th>
                       
                            
                    </tr>
                  </thead>
                 
                  <tbody>
				  
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
@endsection
<script>
    
    function deletepostal(id)
    {
        
        if(confirm('Are you sure to delete?'))
        {
            window.location=id
            
        }
    }
</script>
 
 
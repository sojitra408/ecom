@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">All Attributes</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              @if(Auth::user()->can('attributes-add'))
                <a class="btn btn-primary btn-sm" href="{{route('attributes.create')}}" ><i class="fas fa-plus"></i> Add New</a>
                @endif
            </div>
            <div class="card-body">
              <div class="table-responsive">
                 <table class="table table-bordered" id="attributes_list" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>#</th>
                      <th>Attribute Name</th>
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
 
 
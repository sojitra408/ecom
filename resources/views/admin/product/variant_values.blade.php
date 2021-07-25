@extends('admin.layout')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">All Variant Values</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a href="{{route('variantvalue.create',$var_id)}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add New values</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" style="width:100%">
                    <thead> 
                    <th>Id</th>
                    <th>Variant Name</th>
                    
                    <th>Action</th>
                    </thead> 
					<tbody>

                    @php($count=0)
                      

                    @forelse($values as $var)
                    @php($count++)

                    
                                                
                      <tr align="center">
                          <td>{{ $count }}</td>
                          <td>@if(!empty($var->Attributes)){{ $var->Attributes->attributes_name }}@endif</td>                          
                         <td><!--<a href="#" class="btn btn-success btn-sm mr-2">Edit</a> &nbsp; <a href="#" class="btn btn-danger btn-sm mr-2">Delete</a>-->
						 <a href="{{url('/')}}/admin/variation-values/{{$var->id}}" class="btn btn-dark btn-sm mr-2">Variation Values</a>
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
 
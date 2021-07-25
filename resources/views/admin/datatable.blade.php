@extends('admin.layout')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
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
               <table class="table table-bordered" id="institute_table" style="width:100%">
                    <thead> 
                    <th>Id</th>
                    <th>Brand Name</th>
                    <th>Model Name</th> 
                    <th>Description</th> 
                    <th>Price</th>
                    <th>Action</th>
                    </thead> 
                    </table>
              </div>
            </div>
          </div>

        </div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

 
<script>
 
      $(document).ready(function(){
 
        // Data table for serverside
 
       $('#institute_table').DataTable({
 
            "processing": true,
 
            "serverSide": true,
 
            "ajax":{
 
                     "url": "{{ route('dataList') }}",
 
                     "dataType": "json",
 
                     "type": "POST",
 
                     "data":{ _token: "{{csrf_token()}}",route:'dataList'}
 
                   },
 
            "columns": [
 
                { "data": "id" },
 
                { "data": "brand_name" },
                { "data": "model_name" },
                { "data": "description" },
                { "data": "price" },
 
                { "data": "action" }
 
            ],
 
            aoColumnDefs: [
 
            {
 
               bSortable: false,
 
               aTargets: [ -1 ]
 
            }
 
          ]  
 
 
 
        });
});
</script>
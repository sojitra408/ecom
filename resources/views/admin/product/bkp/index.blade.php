@extends('admin.layout')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">All Products</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a href="{{route('product.create')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add New</a>
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
 
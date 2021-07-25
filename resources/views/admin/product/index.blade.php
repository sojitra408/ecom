@extends('admin.layout')
@section('content')

        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">All Products</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              @if(Auth::user()->can('products-add'))
              <a href="{{route('product.create','basic')}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add New</a>
              <a href="{{route('product.import')}}" class="btn btn-primary btn-sm"><i class="fas fa-upload"></i> Product Import</a>
              @endif
              
              <a href="{{route('product.export')}}" class="btn btn-success btn-sm"><i class="fas fa-download"></i> Product Export</a>
              <a href="{{route('product.export.guide')}}" class="btn btn-primary btn-sm"><i class="fas fa-file"></i> Product Import Guide Sheet</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="mainproduct_table" style="width:100%">
                    <thead> 
                    <th>Id</th>
                    <th>TSIN No</th>
                    <th>SKU</th>
                    <th>Product Name</th>
                    <th>Brand Name</th> 
                    <th>Img</th>
                    <th>Price</th> 
                    <th>Status</th> 
                    <th>Action</th>
                    </thead> 
                    </table>
              </div>
            </div>
          </div>

        </div>
@endsection
 
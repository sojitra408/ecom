@extends('admin.layout')
@section('content')
<style>.hide{display:none;}</style>
 <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Blog Category</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Category</h6>
            </div>
            <form role="form" action="{{ route('blogcategory.update',$project->id) }}" method="post">
			  <input type="hidden" class="form-control" id="id" name="id"  value="{{ $project->id }}">
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6 py-2">
	            	@include('includes.messages') 
	              <div class="form-group">
                  <label for="name">Brand Name</label>
                  <input type="text" class="form-control" id="category_name" name="category_name"  value="{{ $project->category_name }}">
                </div>

         

								
								<div class="form-group">
                  <label for="">Status</label>
                  <div class="checkbox">
                    <label ><input type="checkbox" name="status"   @if ($project->status == 1)
                      checked
                    @endif value="1"> Active</label>
                  </div>
                </div>

                 
                
	            <div class="form-group">
	              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	              <a href="{{ route('admin.blogctegory') }}" class="btn btn-warning btn-sm">Back</a>
	            </div>
	          
					
				</div>
	          </form>
            </div>
          </div>

        </div>
		
		
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Media</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	   <div class="row">
            <div class="col-md-12">
               
                <form method="post" action="{{route('brandimage.store')}}" enctype="multipart/form-data"
                            class="dropzone" id="dropzone" style="border:dashed 1px">
				<input type="hidden" class="form-control" id="brand_id" name="brand_id"  value="{{$project->id }}">	
                @csrf
                </form>
            </div>
		 
        </div>
        <table class="table table-bordered" id="meadia_list2" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>#</th>
                    <th>Img Name</th>
					  <th>Folder</th>
                      <th>Img</th>
                       <th>Action</th>
                      
                       
                            
                    </tr>
                  </thead>
                 
                  <tbody class="media-body leftmedia_body">
				  
                    
                  </tbody>
                </table>
      </div>
     
    </div>
  </div>
</div>



	<div class="modal fade" id="rightModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Media</h5>
        <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	   <div class="row">
            <div class="col-md-12">
               
                <form method="post" action="{{route('mediaslider.store')}}" enctype="multipart/form-data"
                            class="dropzone" id="dropzone" style="border:dashed 1px">
							
							<input type="hidden" class="form-control" id="brand_id1" name="brand_id"  value="{{$project->id }}">	
			
                @csrf
                </form>
            </div>
		 
        </div>
        <table class="table table-bordered" id="rightmedia_brand" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>#</th>
                      <th>Name</th>
                      <th>Image</th>
                       <th>Action</th>
                      
                       
                            
                    </tr>
                  </thead>
                 
                  <tbody class="media-body rightmedia_body">
				  
                    
                  </tbody>
                </table>
      </div>
     
    </div>
  </div>
</div>

	<div class="modal fade" id="homePicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Media</h5>
        <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	   <div class="row">
            <div class="col-md-12">
               
                <form method="post" action="{{route('mediaslider.store')}}" enctype="multipart/form-data"
                            class="dropzone" id="dropzone" style="border:dashed 1px">
							
							<input type="hidden" class="form-control" id="brand_id2" name="brand_id"  value="{{$project->id }}">	
			
                @csrf
                </form>
            </div>
		 
        </div>
        <table class="table table-bordered" id="homemedia_brand" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>#</th>
                      <th>Name</th>
                      <th>Image</th>
                       <th>Action</th>
                      
                       
                            
                    </tr>
                  </thead>
                 
                  <tbody class="homemedia_body">
				  
                    
                  </tbody>
                </table>
      </div>
     
    </div>
  </div>
</div>


@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
    
   

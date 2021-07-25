@extends('admin.layout')
@section('content')

        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Add New Collection</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Collection</h6>
            </div>
            <form role="form" action="{{ route('admin.save.collection') }}" enctype="multipart/form-data" method="post">
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6 py-2">
	            	@include('includes.messages') 
	              <div class="form-group">
                  <label for="name">Collection Name</label>
                  <input type="text" class="form-control" id="brand_name" name="name"  value="{{ old('name') }}">
                </div>

               <div class="form-group">
				    <label for="textarea">Description</label> 
				    <textarea id="textarea" name="description" cols="40" rows="5" class="form-control"></textarea>
			  </div>
			  <div class="form-group">
			    <label for="select">Collection Type</label> 
			    <div>
			      <select id="select" name="collection_type" class="custom-select" required="required">
			        <option value="products">Products</option>
			        <option value="tags">Tags</option>
			      </select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="text1">Expiry</label> 
			    <div class="input-group">
			      <div class="input-group-prepend">
			        <div class="input-group-text">Date</div>
			      </div> 
			      <input  name="expiry_date" type="date" class="form-control">
			    </div>
			  </div>
				<!--<div class="form-group">-->
				<!--<label for="">Status</label>-->
				<!--<div class="checkbox">-->
				<!--<label ><input type="checkbox" name="status"   @if (old('status') == 1)-->
				<!--checked-->
				<!--@endif value="1"> Active</label>-->
				<!--</div>-->
				<!--</div>-->

                
                
	            <div class="form-group">
	            	@if(Auth::user()->can('collections-add'))
	              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
	              @endif
	              <a href="{{ route('admin.manage.collection') }}" class="btn btn-warning btn-sm">Back</a>
	            </div>
	          
					
				</div>
	          </form>
            </div>
          </div>

        </div>
<!-- Modal -->

@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/tinymce.min.js"></script>


<script>
tinymce.init({
  selector: 'textarea#textarea',
  height: 300,
  menubar: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table paste code wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat ',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});
</script>
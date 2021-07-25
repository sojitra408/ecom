@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">All Collections</h1>
         
	@include('includes.messages') 
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            	@if(Auth::user()->can('collections-add'))
                <a class="btn btn-primary btn-sm" href="{{route('admin.add.collection')}}" ><i class="fas fa-plus"></i> Add New</a>
                @endif
            </div>
			
			<!--<div class="card-body">-->
			<!--	<div class="col-md-8">-->
			<!--	<form>-->
			<!--	  <div class="form-group">-->
			<!--	    <label for="text">Collection Title</label> -->
			<!--	    <input id="text" name="text" type="text" class="form-control">-->
			<!--	  </div>-->
			<!--	  <div class="form-group">-->
			<!--	    <label for="textarea">Description</label> -->
			<!--	    <textarea id="textarea" name="textarea" cols="40" rows="5" class="form-control"></textarea>-->
			<!--	  </div>-->
			<!--	  <div class="form-group">-->
			<!--	    <label for="select">Collection Type</label> -->
			<!--	    <div>-->
			<!--	      <select id="select" name="select" class="custom-select" required="required">-->
			<!--	        <option value="products">Products</option>-->
			<!--	        <option value="tags">Tags</option>-->
			<!--	      </select>-->
			<!--	    </div>-->
			<!--	  </div>-->
			<!--	  <div class="form-group">-->
			<!--	    <label for="text1">Expiry</label> -->
			<!--	    <div class="input-group">-->
			<!--	      <div class="input-group-prepend">-->
			<!--	        <div class="input-group-text">Date</div>-->
			<!--	      </div> -->
			<!--	      <input id="text1" name="text1" type="text" class="form-control">-->
			<!--	    </div>-->
			<!--	  </div> -->
			<!--	  <div class="form-group">-->
			<!--	    <button name="submit" type="submit" class="btn btn-primary">Save</button>-->
			<!--	  </div>-->
			<!--	</form>-->
			<!--</div>-->
			
			
			<!--</div>-->
			
			
			<!--<div class="card-body">-->
			<!--	<div class="col-md-8">-->
			<!--	<form>-->
			<!--	  <div class="form-group">-->
			<!--	    <label for="text">Collection Title</label> -->
			<!--	    <input id="text" name="text" type="text" class="form-control">-->
			<!--	  </div>-->
			<!--	  <div class="form-group">-->
			<!--	    <label for="textarea">Description</label> -->
			<!--	    <textarea id="textarea" name="textarea" cols="40" rows="5" class="form-control"></textarea>-->
			<!--	  </div>-->
			<!--	  <div class="form-group">-->
			<!--	    <label for="select">Collection Type - Products</label> -->
			<!--	    <div>-->
			<!--	     Bring table here-->
			<!--	    </div>-->
			<!--	  </div>-->
				  
			<!--	  <div class="form-group">-->
			<!--	    <label for="select">Gallery</label> -->
			<!--	    <div>-->
			<!--	     Bring Modal here-->
			<!--	    </div>-->
			<!--	  </div>-->
			<!--	  <div class="form-group">-->
			<!--	    <label for="text1">Expiry</label> -->
			<!--	    <div class="input-group">-->
			<!--	      <div class="input-group-prepend">-->
			<!--	        <div class="input-group-text">Date</div>-->
			<!--	      </div> -->
			<!--	      <input id="text1" name="text1" type="text" class="form-control">-->
			<!--	    </div>-->
			<!--	  </div> -->
			<!--	  <div class="form-group">-->
			<!--	    <button name="submit" type="submit" class="btn btn-primary">Save</button>-->
			<!--	  </div>-->
			<!--	</form>-->
			<!--</div>-->
			
			
			<!--</div>-->
			
			
            <div class="card-body">
              <div class="table-responsive">
                 <table class="table table-bordered" id="collection_list"  width="100%" cellspacing="0">
                  <thead>
                    <tr>
                        <th>#</th>
                      <th> Title</th>
                       <th> Collection Type</th>
                      <th> Status</th>
					   <th> Valid Till</th>
                      
					  <th>Action</th>
                       
                            
                    </tr>
                  </thead>
                 
                  <tbody>
                      @foreach($collections as $key=> $collection)
				  <tr>
				      <td>{{$key+1}}</td>
				      <td>{{$collection->name}}</td>
				      <td>{{$collection->collection_type}}</td>
				      <td>{{$collection->status==true?'enable':'disable'}}</td>
				      <td>{{$collection->expiry_date}}</td>
				    
				      <td>
				      	@if(Auth::user()->can('collections-edit')||Auth::user()->can('collections-view'))
                          <a href="{{route('admin.edit.collection',$collection->id)}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
                          @endif
                          @if(Auth::user()->can('collections-delete'))
                          <a href="{{route('admin.delete.collection',$collection->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                          @endif
                       </td>
				  </tr>
				  @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
@endsection
<script>
    

</script>
 
 
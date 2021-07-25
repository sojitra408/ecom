@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Help Center</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Help Center</h6>
            </div>
            <form role="form" action="{{route('help_center.update',$faq->id)}}" method="post">
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6">
	            	@include('includes.messages') 

                <div class="form-group">
                  <label for="name">Category</label>
                  <select name="category" id="category" class="form-control">
                    @foreach($all_category as $category )  
                    <option  value="{{$category->id}}" @if($category->id == $faq->category_id) 
    selected
    @endif>{{$category->name}}</option>
                    @endforeach
                  </select>
                  <!-- <input type="text" class="form-control" id="question" name="category" placeholder="Question" value="{{ old('question') }}"> -->
                </div>


	              <div class="form-group">
                  <label for="name">Question</label>
                  <input type="text" class="form-control" id="question" name="question" placeholder="Question" value="{{ $faq->question }}">
                </div>

                <div class="form-group">
                  <label for="name">Answer</label>
                  <textarea class="form-control" id="long_description" rows="3" name="answer" value="{{ $faq->answer }}">{{ $faq->answer }}</textarea>
                  <!-- <input type="text" class="form-control" id="answer" name="answer" placeholder="Answer" value="{{ $faq->answer }}"> -->
                </div>

               

                

               

                 
								
								<!-- <div class="form-group">
                  <label for="confirm_passowrd">Status</label>
                  <div class="checkbox">
                    <label ><input type="checkbox" name="status"   @if (old('status') == 1)
                      checked
                    @endif value="1">Status</label>
                  </div>
                </div> -->

                
                
	            <div class="form-group">
                @if(Auth::user()->can('help-center-edit'))
	              <button type="submit" class="btn btn-primary">Submit</button>
                @endif
	              <a href="{{route('admin.help_center')}}" class="btn btn-warning">Back</a>
	            </div>
	          
					
				</div>
	          </form>
            </div>
          </div>

        </div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/tinymce.min.js"></script>
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

<script>
    tinymce.init({
   
     selector: 'textarea#long_description',
   
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
   
     'removeformat | ' + 
     'link |',
   
     content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
   
   });
</script>
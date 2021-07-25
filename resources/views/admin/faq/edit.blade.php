@extends('admin.layout')
@section('content')
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Faq</h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Faq</h6>
            </div>
            <form role="form" action="{{route('faq.update',$faq->id)}}" method="post">
	          {{ csrf_field() }}
	              <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6">
	            	@include('includes.messages') 
	              <div class="form-group">
                  <label for="name">Question</label>
                  <input type="text" class="form-control" id="question" name="question" placeholder="Question" value="{{ $faq->question }}">
                </div>

                <div class="form-group">
                  <label for="name">Answer</label>
                  <textarea class="form-control" id="answer" rows="3" name="answer" value="{{ $faq->answer }}">{{ $faq->answer }}</textarea>
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
                @if(Auth::user()->can('faq-master'))
	              <button type="submit" class="btn btn-primary">Submit</button>
                @endif
	              <a href="{{route('admin.faq')}}" class="btn btn-warning">Back</a>
	            </div>
	          
					
				</div>
	          </form>
            </div>
          </div>

        </div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
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
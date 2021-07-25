@extends('admin.layout')
@section('content')

        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Add Page</h1>
         

          <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Enter Details Below</h6>
                </div>
                <form role="form" action="{{ route('setting.save') }}" method="post">
                    {{ csrf_field() }}
                    <div class="box-body p-3">
                    @include('includes.messages')  
                        <div class="row"> 
                            <div class="col-lg-offset-3 col-lg-6"> 
                            <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control form-control-sm" id="title" name="title"  value="{{old('title')}}">
                                </div>
                                </div>
                                <div class="col-lg-offset-3 col-lg-6"> 
								<div class="form-group">
                                    <label for="last_name">Description</label>
                                     <textarea name="description" class="form-control form-control-sm" id="description"  value="" labelcol="1" type="text"></textarea>
                                    <!-- <textarea class="form-control form-control-sm" id="description" name="description"></textarea> -->
                                    <!-- <input type="text" class="form-control form-control-sm" id="last_name" name="last_name" value="{{old('last_name')}}"> -->
                                </div> 
                                </div> 
								
								
                           
                            
								
							</div>
							
                            <div class="col-lg-offset-3 col-lg-12">
                                <div class="form-group">
                                    @if(Auth::user()->can('static-page'))
                                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
                                    @endif
                                    <a href="{{ route('admin.setting') }}" class="btn btn-warning  btn-sm">Back</a>
                                </div> 
                            </div>
                       
                    </div>
                </form>
            </div>
        </div> 
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> 


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/tinymce.min.js"></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/jquery.tinymce.min.js"></script>
<script>
  var adminUrl='<?php echo url('/admin')?>';
  </script>

<script>


tinymce.init({

  selector: 'textarea#description',

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

tinymce.init({

  selector: 'textarea#short_description',

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
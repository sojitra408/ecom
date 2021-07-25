@extends('admin.layout')
@section('content')
 <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
        
        <meta name="csrf-token" content="{{ csrf_token() }}">
     <div class="container-fluid">

          

                 
                
                <!-- Card Body -->
                <div class="card-body">
        <div class="row">
                 
        

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Upload Excel</h6>
                 
                </div>
                 
                <!-- Card Body -->
                <div class="card-body">
              <div class="container">
        <div class="row">
            <div class="col-md-12">
               
                <form action="{{ route('brand.excel.import') }}"  method="post" 'autocomplete'='off' enctype="multipart/form-data">
            {{ csrf_field() }}
                  @include('includes.messages')
              <div class="form-group">
                <label>Select Excel File</label>
                <input type="file" class="form-control" id="excel_import" name="excel_import" required='required'>
               </div>
               <div>
               <div class="clearfix"></div>
       
                <div class="text-left">
                  <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
              </form>
              </div>
     
        </div>
    </div>
            </div>
              </div>
            </div>
      </div>

           
         

</div>
</div>

        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
    
    <script type="text/javascript">
    Dropzone.options.dropzone =
     {
        maxFilesize: 10,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
           return time+file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 50000,
        removedfile: function(file)
        {
            var name = file.upload.filename;
            $.ajax({
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                type: 'POST',
                url: '{{ url("delete") }}',
                data: {filename: name},
                success: function (data){
                    console.log("File has been successfully removed!!");
          
                },
                error: function(e) {
                    console.log(e);
                }});
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },
        success: function(file, response)
        {
           var response = $.parseJSON(response);
      var rowCount = $('#meadia_list tr').length;     
          $('.media-body').append('<tr role="row" class="even"><td class="sorting_1">'+rowCount+'</td><td>'+response.media.filename+'</td><td>'+response.media.folder+'</td><td><img src="'+response.media.small+'" width="75"></td><td><a href="javascript:void(0)" class="select-image"> Select</a></td></tr>');
        },
        error: function(file, response)
        {
           return false;
        }
    };
  
  
    </script>

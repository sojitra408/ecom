@extends('admin.layout')
@section('content')

<style>
/*body{
  background-color:#f5f5f5;
}*/
.imagePreview {
  width: 100%;
  height: 180px;
  background-position: center center;

  @if(!empty($page->image))
    background:url("{{asset('public/images/'.$page->image)}}");
  @else
    background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
  @endif  

  background-color:#fff;
  background-size: cover;
  background-repeat:no-repeat;
  display: inline-block;
  box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
}
/*.btn-primary
{
  display:block;
  border-radius:0px;
  box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
  margin-top:-5px;
}*/
.imgUp
{
  margin-bottom:15px;
}
/*.del
{
  position:absolute;
  top:0px;
  right:15px;
  width:30px;
  height:30px;
  text-align:center;
  line-height:30px;
  background-color:rgba(255,255,255,0.6);
  cursor:pointer;
}*/
/*.imgAdd
{
  width:30px;
  height:30px;
  border-radius:50%;
  background-color:#4bd7ef;
  color:#fff;
  box-shadow:0px 0px 2px 1px rgba(0,0,0,0.2);
  text-align:center;
  line-height:30px;
  margin-top:0px;
  cursor:pointer;
  font-size:15px;
}*/

.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}       
 </style>

        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit Review</h1>
         

          <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Enter Details Below</h6>
                </div>
                <form role="form" action="{{ route('reviews.update',$page->id) }}" method="post" enctype= multipart/form-data>
                    {{ csrf_field() }}
                    <div class="box-body p-3">
                    @include('includes.messages')  
                        <div class="row"> 
                            <div class="col-lg-offset-3 col-lg-6"> 
                            <div class="form-group">
                                    <label for="title">Product Name</label>
                                    <input type="text" class="form-control form-control-sm" id="name" name="name"  value="{{$page->product_name}}" disabled="">
                                </div>
                                </div>
                                <div class="col-lg-offset-3 col-lg-6"> 
                                <div class="form-group">
                                    <label for="date">Review Title</label>
                                     
                                    <input type="text" class="form-control form-control-sm" id="title" name="title" value="{{$page->review_title}}" disabled="">
                                </div> 
                                </div> 

                                <div class="col-lg-offset-3 col-lg-6"> 
                                <div class="form-group">
                                    <label for="address">Review Description</label>
                                    <textarea name="description" class="form-control form-control-sm" id="description"  value="" labelcol="1" type="text">{{$page->review_description}}</textarea>
                                     
                                    <!-- <input type="text" class="form-control form-control-sm" id="address" name="address" value="{{old('address')}}"> -->
                                </div> 
                                </div> 

                                <div class="col-lg-offset-3 col-lg-6"> 
                                <div class="form-group">
                                    <label for="date">Rating</label>
                                     
                                    <input type="text" class="form-control form-control-sm" id="rating" name="rating" value="{{$page->rating}}" disabled="">
                                </div> 
                                </div>

                                
                                <div class="col-lg-offset-3 col-lg-6"> 
                                <div class="form-group">
                                    <label for="image">Image</label>
                                     
                                    <!-- <input type="file" class="form-control form-control-sm" id="image" name="image" value="{{$page->image}}"> -->
                                    <div class="col-sm-4 imgUp">
                      <div class="imagePreview"></div>
                        <label class="btn btn-primary" style="display:block;border-radius:0px;box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);margin-top:-5px;">
                              Upload<input type="file" class="uploadFile img" value="Upload Photo" name="image" style="width: 0px;height: 0px;overflow: hidden;" disabled="">
                        </label>
                    </div>
                                </div> 
                                </div> 

                                
                                <!-- <div class="col-lg-offset-3 col-lg-6"> 
                                <div class="form-group">
                                   <label for="">Status</label>
                                    <div class="checkbox">
                                    <label ><input type="checkbox" name="status"   @if ($page->status == 1)
                                    checked
                                    @endif value="1"> Active</label>
                                    </div>
                                </div> 
                                </div>  -->

                                <div class="form-group">
                                <label for="">Status</label>
                                <div class="checkbox">
                                <label class="switch"> 
                                  <input type="checkbox" name="status" @if ($page->status == 1)

                                    checked

                                  @endif value="1">
                                  <span class="slider round"></span>
                               </label>
                             </div>

                              </div>

                                
                            
                
                           </div>
              
                            <div class="col-lg-offset-3 col-lg-12">
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
                                    <a href="{{ route('admin.reviews') }}" class="btn btn-warning  btn-sm">Back</a>
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

  height: 100,

  menubar: false,

  readonly : 1,

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

<script>
//   $(".imgAdd").click(function(){
//   $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
// });
// $(document).on("click", "i.del" , function() {
// //  to remove card
//   $(this).parent().remove();
// // to clear image
//   // $(this).parent().find('.imagePreview').css("background-image","url('')");
// });
$(function() {
    $(document).on("change",".uploadFile", function()
    {
        var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
            }
        }
      
    });
});

</script>
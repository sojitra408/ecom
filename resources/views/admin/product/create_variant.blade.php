@extends('admin.layout')
@section('content')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.6.2/skins/content/default/content.min.css"/>
  <style>

    .multisteps-form__progress {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(0, 1fr));
    }

    .multisteps-form__progress-btn {
      transition-property: all;
      transition-duration: 0.15s;
      transition-timing-function: linear;
      transition-delay: 0s;
      position: relative;
      padding-top: 20px;
      color: rgba(108, 117, 125, 0.7);
      text-indent: -9999px;
      border: none;
      background-color: transparent;
      outline: none !important;
      cursor: pointer;
    }
    @media (min-width: 500px) {
      .multisteps-form__progress-btn {
        text-indent: 0;
      }
    }
    .multisteps-form__progress-btn:before {
      position: absolute;
      top: 0;
      left: 50%;
      display: block;
      width: 13px;
      height: 13px;
      content: '';
      -webkit-transform: translateX(-50%);
              transform: translateX(-50%);
      transition: all 0.15s linear 0s, -webkit-transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
      transition: all 0.15s linear 0s, transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
      transition: all 0.15s linear 0s, transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s, -webkit-transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
      border: 2px solid currentColor;
      border-radius: 50%;
      background-color: #fff;
      box-sizing: border-box;
      z-index: 3;
    }
    .multisteps-form__progress-btn:after {
      position: absolute;
      top: 5px;
      left: calc(-50% - 13px / 2);
      transition-property: all;
      transition-duration: 0.15s;
      transition-timing-function: linear;
      transition-delay: 0s;
      display: block;
      width: 100%;
      height: 2px;
      content: '';
      background-color: currentColor;
      z-index: 1;
    }
    .multisteps-form__progress-btn:first-child:after {
      display: none;
    }
    .multisteps-form__progress-btn.js-active {
      color: #007bff;
    }
    .multisteps-form__progress-btn.js-active:before {
      -webkit-transform: translateX(-50%) scale(1.2);
              transform: translateX(-50%) scale(1.2);
      background-color: currentColor;
    }

    .multisteps-form__form {
      position: relative;
    }

    .multisteps-form__panel {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 0;
      opacity: 0;
      visibility: hidden;
    }
    .multisteps-form__panel.js-active {
      height: auto;
      opacity: 1;
      visibility: visible;
    }
    .multisteps-form__panel[data-animation="scaleOut"] {
      -webkit-transform: scale(1.1);
              transform: scale(1.1);
    }
    .multisteps-form__panel[data-animation="scaleOut"].js-active {
      transition-property: all;
      transition-duration: 0.2s;
      transition-timing-function: linear;
      transition-delay: 0s;
      -webkit-transform: scale(1);
              transform: scale(1);
    }
    .multisteps-form__panel[data-animation="slideHorz"] {
      left: 50px;
    }
    .multisteps-form__panel[data-animation="slideHorz"].js-active {
      transition-property: all;
      transition-duration: 0.25s;
      transition-timing-function: cubic-bezier(0.2, 1.13, 0.38, 1.43);
      transition-delay: 0s;
      left: 0;
    }
    .multisteps-form__panel[data-animation="slideVert"] {
      top: 30px;
    }
    .multisteps-form__panel[data-animation="slideVert"].js-active {
      transition-property: all;
      transition-duration: 0.2s;
      transition-timing-function: linear;
      transition-delay: 0s;
      top: 0;
    }
    .multisteps-form__panel[data-animation="fadeIn"].js-active {
      transition-property: all;
      transition-duration: 0.3s;
      transition-timing-function: linear;
      transition-delay: 0s;
    }
    .multisteps-form__panel[data-animation="scaleIn"] {
      -webkit-transform: scale(0.9);
              transform: scale(0.9);
    }
    .multisteps-form__panel[data-animation="scaleIn"].js-active {
      transition-property: all;
      transition-duration: 0.2s;
      transition-timing-function: linear;
      transition-delay: 0s;
      -webkit-transform: scale(1);
              transform: scale(1);
    }
  </style>

  <div class="container-fluid"> 
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Add Product</h1> 
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <!-- <div class="card-header py-0 pt-2">
    
      </div>-->
      <div class="card-body"> 
        <!--multisteps-form-->
      
         
          <div class="row">
            <div class="col-12 col-lg-12 m-auto">
              <form  method="post" action="{{route('variant.store')}}">
              @csrf
             
               
                  <h3>Add Variant</h3>
                 
                    <div class="form-group row">
                      <label for="variant_id" class="col-md-2 control-label text-left">Select Variant<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <select class="form-control form-control-sm" name="variant_id" id="variant_id" required>
                          <option value="">Select Variant</option>
                          @if(!$variants->isEmpty())
                          @foreach($variants as $var )
                            <option value="{{$var->id}}">{{$var->attributes_name}}</option>
                          @endforeach
                          @endif
                        </select>                
                      </div> 
                      
                    </div>
                  
					<input type="hidden" value="{{$product_id}}" name="product_id" >
                   
                    <div class="button-row d-flex mt-4">
                      <button class="btn btn-primary ml-auto js-btn-next" type="submit" title="Add">Add</button>
                    </div>
                
             
              </form>
            </div>
          </div>
         
      </div>
    </div> 
  </div> 
@endsection
   </div>
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
  selector: 'textarea#long_description',
  height: 400,
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
  height: 400,
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

		$(document).ready(function() {
 $("#category").select2();	
 $("#seller").select2();	
 //$("#brand").select2();	
 
 //$("#brand").select2('data', {id: '1', text: 'my'});     

	$('#seller').change(function(){
		var seller_id=$(this).find('option:selected').val();
		$.ajax({
		   type:'POST',
		   url:adminUrl+'/product/getbrandbyseller',
		   data:{
			   _token:'<?php echo csrf_token();?>',
			   seller_id:seller_id
		   },
		   success:function(data){
			   console.log(data);
			  $('#brand').html('').select2({data: $.parseJSON(data)});
		   }
		});
	}); 
	
	$('#category').change(function(){
		var cate_id=$(this).find('option:selected').val();
		$.ajax({
		   type:'POST',
		   url:adminUrl+'/product/getsubcatebycategory',
		   data:{
			   _token:'<?php echo csrf_token();?>',
			   cate_id:cate_id
		   },
		   success:function(data){
			   console.log(data);
			  $('#sub_category').html('').select2({data: $.parseJSON(data)});
		   }
		});
	}); 
		}); 
		</script>
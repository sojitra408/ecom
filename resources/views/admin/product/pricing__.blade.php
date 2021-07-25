@extends('admin.layout')
@section('content')
  
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
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
	.hide{display:none;}
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
        <div class="multisteps-form">
          <!--progress bar-->
          <div class="row">
            <div class="col-12 col-lg-12 ml-auto mr-auto mb-4">
               <div class="multisteps-form__progress">
                 <a href="{{route('product.edit',$product->id)}}"  class="col" title="General">General</a>
                <a href="{{url('/admin/product-inventory-edit')}}/{{$product->id}}" class="col" title="Pricing">Variants & Pricing</a>
                <a href="javascript:void(0)"  class="col" title="Inventory">Packaging</a>
                <!--<a href="{{url('admin/product-create/images')}}" style="padding-left: 55px;" class="multisteps-form__progress-btn" title="Images">Images </a>-->
                <a href="javascript:void(0)" class="col"  title="SEO">SEO </a>
                <a href="javascript:void(0)" class="col" title="Other Options">Other Options </a>
                <a href="javascript:void(0)"  class="col" title="Related Products">Related Products </a>
              </div>
            </div>
          </div>
          <!--form panels-->
          <div class="row">
            <div class="col-12 col-lg-12 m-auto">
             
                <!--single form panel-->
                <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                  <h3 class="multisteps-form__title">Pricing</h3>
				  <?php //echo '<pre>';print_r(Session::get('product_id'));die; ?>
                  <div class="multisteps-form__content">
				  
				   <div class="sizes">

					<strong>Attribute Value</strong>

				
					<div class="size_section">
					<div class="table-responsive">
					<table class="table table-bordered">
   <tbody>
   @foreach($variants as $var)
    <tr>
      <form class="multisteps-form__form" method="post" action="{{route('update.pricing',$product->id)}}">
              @csrf
			<input type="hidden" name="variant_id" value="{{$var->id}}" > 
    @if(!$attributes->isEmpty())
					@foreach($attributes as $attr)
					  <td>
						<?php $values=getValuesByAttributeId($attr->id);
								$var_val=getVariantValuesByVariantId($var->id,$attr->id);
								//echo '<pre>';print_r($var_val);
						?>
						<label for="attr_value" class="control-label col-form-label">{{$attr->attributes_name}}<span class="required">*</span></label>
						<select class="form-control"  name="attribute_id[]" >
						@foreach($values as $val)
						<option <?php echo (!empty($var_val) && searchForId($val->id,$var_val))?'selected':''; ?> value="{{$val->id}}" >{{$val->value_name}}</option>
						@endforeach
						</select>
					</td>
					@endforeach
					@endif
      <td> <label for="stock" class="control-label text-left">Stock<span class="m-l-5 text-red">*</span></label>
                        <input name="stock" class="form-control form-control-sm" id="stock" value="{{$var->stock}}" labelcol="2" type="text"></td>
      <td><label for="mrp" class="control-label text-left">MRP<span class="m-l-5 text-red">*</span></label>
                        <input name="mrp" class="form-control form-control-sm" id="mrp" value="{{$var->mrp}}" labelcol="2" type="text"></td>
						<td> <label for="offer_price" class="control-label text-left">Offer Price<span class="m-l-5 text-red">*</span></label>
                        <input name="offer_price" class="form-control form-control-sm" id="offer_price" value="{{$var->offer_price}}" labelcol="2" type="text"></td>
						<td> <label for="name" >Thumbnail</label>
		 <div class="clearfix"></div>
			  
                                             <button type="button" data-toggle="modal" data-target="#exampleModal" class="image-picker btn btn-default" data-input-name="files[base_image]">
            <i class="fa fa-folder-open m-r-5"></i> Browse
        </button>
		
		<div class="selected-img">
		<img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/{{$product->Brand->brand_name}}/small/{{getSliderMediaById($var->featured_image)}}" width="75" height="75" />
		
		</div>
		<input type="hidden" id="featured_image" value="{{$var->featured_image}}" name="featured_image" >
		
		</td>
						<td><label for="name"> Gallery</label>
						<div class="clearfix"></div>
					  <button type="button" data-toggle="modal" data-target="#exampleModal" class="image-picker btn btn-default" data-input-name="files[base_image]">
						<i class="fa fa-folder-open m-r-5"></i> Browse
						</button>
						
						<a href="javascript:void(0)" id="test" class="btn btn-success btn-sm" data-toggle="popover" data-container="body" data-placement="bottom" data-html="true" data-popover-content="test"><i class="fa fa-eye" aria-hidden="true"></i>
</a>
<div id="popover-content-test" class="hide">
 Image Gallery
  <div  class="px-0 row">
    <div class="col-4"><img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/{{$product->Brand->brand_name}}/small/{{getSliderMediaById($var->featured_image)}}" width="75"  /></div>
     <div class="col-4"><img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/{{$product->Brand->brand_name}}/small/{{getSliderMediaById($var->featured_image)}}" width="75"  /></div>
    <div class="col-4"><img src="https://thisorthatstorage.s3.ap-south-1.amazonaws.com/{{$product->Brand->brand_name}}/small/{{getSliderMediaById($var->featured_image)}}" width="75"  /></div>
  </div>
</div>
		<script>
    $(function () {
  //  enable popovers everywhere
  $('[data-toggle="popover"]').popover()
})

moveButton = function() {
	$("#toggle").css('left', "100px")
}

var x
window.setInterval(function() {
	newx = $("#toggle").css('left')
  if (newx != x) {
     $("#toggle").popover('update')
     x = newx
  }
}, 100);



$("[data-toggle=popover][data-container=body]").each(function(i, obj) {

$(this).popover({
  html: true,
  //trigger: 'focus', //  close on click elsewhere
  //PROBLEM: clicking button again doesn't close.
  content: function() {
    var id = $(this).attr('data-popover-content')
    return $('#popover-content-' + id).html();
  }
});

});
</script>				
						
						</td>
						
						<td><a href="javascript:void(0)" class="btn btn-danger less_more_size" ><i class="fa fa-minus"></i></a> <button class="btn btn-success ml-auto js-btn-next" type="submit" title="Save">Save</button></td>
						 </form>
    </tr>
    @endforeach
	 <tr>
      <form class="multisteps-form__form" method="post" action="{{route('update.pricing',$product->id)}}">
              @csrf
			<input type="hidden" name="product_id" value="{{$product->id}}" > 
    @if(!$attributes->isEmpty())
					@foreach($attributes as $attr)
					  <td>
						<?php $values=getValuesByAttributeId($attr->id);
							
						?>
						<label for="attr_value" class="control-label col-form-label">{{$attr->attributes_name}}<span class="required">*</span></label>
						<select class="form-control"  name="attribute_id[]" >
						@foreach($values as $val)
						<option value="{{$val->id}}" >{{$val->value_name}}</option>
						@endforeach
						</select>
					</td>
					@endforeach
					@endif
      <td> <label for="stock" class="control-label text-left">Stock<span class="m-l-5 text-red">*</span></label>
                        <input name="stock" class="form-control form-control-sm" id="stock" value="" labelcol="2" type="text"></td>
      <td><label for="mrp" class="control-label text-left">MRP<span class="m-l-5 text-red">*</span></label>
                        <input name="mrp" class="form-control form-control-sm" id="mrp" value="" labelcol="2" type="text"></td>
						<td> <label for="offer_price" class="control-label text-left">Offer Price<span class="m-l-5 text-red">*</span></label>
                        <input name="offer_price" class="form-control form-control-sm" id="offer_price" value="" labelcol="2" type="text"></td>
						<td> <label for="name" >Thumbnail</label>
		 <div class="clearfix"></div>
			  
                                             <button type="button" data-toggle="modal" data-target="#exampleModal" class="image-picker btn btn-default" data-input-name="files[base_image]">
            <i class="fa fa-folder-open m-r-5"></i> Browse
        </button>
		
		<div class="selected-img">
		
		
		</div>
		<input type="hidden" id="featured_image" value="" name="featured_image" >
		</td>
						<td><label for="name"> Gallery</label>
						<div class="clearfix"></div>
					  <button type="button" data-toggle="modal" data-target="#exampleModal" class="image-picker btn btn-default" data-input-name="files[base_image]">
						<i class="fa fa-folder-open m-r-5"></i> Browse
						</button></td>
						<td><a href="" class="btn btn-success add_more_size" ><i class="fa fa-plus"></i></a>  <button class="btn btn-success ml-auto js-btn-next" type="submit" title="Save">Save</button></td>
						 </form>
    </tr>
  </tbody>
</table>
		</div>			
					
					
					</div>
					
					
					
					</div>
                  
                    <div class="button-row d-flex mt-4">
                      <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                      <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                    </div>
                  </div>
                </div>
               
             
            </div>
          </div>
        </div> 
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
				<input type="hidden" class="form-control" id="brand_id" name="brand_id"  value="{{getProductDetailsById($product->id)->brand_id}}">	
                @csrf
                </form>
            </div>
		 
        </div>
		<div class="row">
            <div class="col-md-12">
            <div class="table-responsive">
        <table class="table table-bordered" id="meadia_list2" cellspacing="0">
                  <thead>
                    <tr>
                        <th>#</th>
                      <th>Img Name</th>
					  <th>Folder</th>
                      <th>Img</th>
                      
                       <th>Action</th>
                      
                       
                            
                    </tr>
                  </thead>
                 
                  <tbody class="media-body">
				  
                    
                  </tbody>
                </table>
      </div>
      </div>
      </div>
      </div>
     
    </div>
  </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
			console.log(response);
           var response = $.parseJSON(response);
			var rowCount = $('#meadia_list2 tr').length;			
          $('.media-body').append('<tr role="row" class="even"><td class="sorting_1">'+rowCount+'</td><td><img src="'+response.media.small+'" width="75"></td><td><a href="javascript:void(0)" class="select-image"> Select</a></td></tr>');
        },
        error: function(file, response)
        {
           return false;
        }
    };
    </script>
 <script>
 $(document).on('click','.add_more_size',function(e){

	e.preventDefault();

	var size=$('#size').html();

	

	var html='<div class="table-responsive"><table class="table table-bordered"><tbody><tr>@if(!$attributes->isEmpty())	@foreach($attributes as $attr)<td><?php $values=getValuesByAttributeId($attr->id); ?><label for="attr_value" class="control-label col-form-label">{{$attr->attributes_name}}<span class="required">*</span></label><select class="form-control"  name="attribute_id[]" >@foreach($values as $val)	<option value="{{$val->id}}" >{{$val->value_name}}</option>@endforeach</select></td>@endforeach	@endif<td> <label for="stock" class="control-label text-left">Stock<span class="m-l-5 text-red">*</span></label><input name="stock" class="form-control form-control-sm" id="stock" value="" labelcol="2" type="text"></td><td><label for="mrp" class="control-label text-left">MRP<span class="m-l-5 text-red">*</span></label><input name="mrp" class="form-control form-control-sm" id="mrp" value="" labelcol="2" type="text"></td><td> <label for="offer_price" class="control-label text-left">Offer Price<span class="m-l-5 text-red">*</span></label><input name="offer_price" class="form-control form-control-sm" id="offer_price" value="" labelcol="2" type="text"></td><td> <label for="name" >Thumbnail</label><div class="clearfix"></div><button type="button" data-toggle="modal" data-target="#exampleModal" class="image-picker btn btn-default" data-input-name="files[base_image]"> <i class="fa fa-folder-open m-r-5"></i> Browse </button></td><td><label for="name"> Banner</label><div class="clearfix"></div>  <button type="button" data-toggle="modal" data-target="#exampleModal" class="image-picker btn btn-default" data-input-name="files[base_image]"><i class="fa fa-folder-open m-r-5"></i> Browse</button></td><td><a href="javascript:void(0)" class="btn btn-danger less_more_size" style="margin-top:34px;"><i class="fa fa-minus"></i></a></td></tr></tbody></table></div>';

	

	$('.size_section').append(html);

});



$(document).on('click','.less_more_size',function(e){

	e.preventDefault();

	$(this).parent().parent('tr').remove();

});
 
 
 $(document).on('click','.select-image',function(e){

	e.preventDefault();

	var id=$(this).attr('data-imageid');
	$('#featured_image').val(id);
	 $.ajax({
		
		type: 'POST',
		url: '{{ url("admin/getbrandimagebyid") }}',
		data: {id: id,_token:'{{ csrf_token() }}',brand_id:$('#brand_id').val()},
		success: function (data){
			$('.selected-img').html('');			
			$('.selected-img').html(data);
			$('.close-modal').trigger('click');
			$('body').removeClass('modal-open');        
			$('body').css('padding-right', '');
			$(".modal-backdrop").remove();
			$('#exampleModal').hide();
		}
	
	});
	
	
});
 </script>
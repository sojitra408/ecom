@extends('admin.layout')
@section('content')
  
  
  <style>

    .multisteps-form__progress {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(0, 1fr));
      font-size:14px; background:#fff; padding:10px;
    }
.multisteps-form__progress .col {border-left:solid 1px #000; border-bottom:solid 1px #000; text-align:center; border-right:solid 1px #000;border-top:solid 1px #000;}

    
  </style>

  <div class="container-fluid"> 
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Product</h1> 
    <!-- DataTales Example -->
              <!--progress bar-->
          <div class="row">
            <div class="col-12 col-lg-12 "> 
              <div class="multisteps-form__progress">
                <a href="{{route('product.edit',$product->id)}}"  class="col" title="General">General</a>
                <a href="javascript:void(0)" class="col" title="Pricing">Variants & Pricing</a>
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
            <div class="col-12 col-lg-12">
              <form class="multisteps-form__form" method="post" action="{{route('product.update',$product->id)}}">
              @csrf
              <input type="hidden" name="product_id" value="{{$product->id}}">
                <!--single form panel-->
                <div class="multisteps-form__panel p-3 bg-white js-active" data-animation="scaleIn">
                  <h3 class="multisteps-form__title">General Info</h3>
                  <div class="multisteps-form__content"> 
                    <div class="form-group row">
                      <label for="seller" class="col-md-2 control-label text-left">Seller Company<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <select class="form-control form-control-sm" name="seller" id="seller" required>
                          <option value="">Select Seller Name</option>
                          @if(!$seller->isEmpty())
                          @foreach($seller as $sel )
                            <option <?php echo ($sel->id==$product->company_id)?'selected':''; ?> value="{{$sel->id}}">{{$sel->seller_name}}</option>
                          @endforeach
                          @endif
                        </select>                
                      </div> 
                      <label for="brand" class="col-md-2 control-label text-left">Brand<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <select class="form-control form-control-sm" name="brand" id="brand" required>
                           <option value="">Select Brand Name</option>
                         <!-- @if(!$brands->isEmpty())
                            @foreach($brands as $brand )
                              <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                            @endforeach
                          @endif-->
                        </select>                 
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="brand" class="col-md-2 control-label text-left">Categories<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <select class="form-control form-control-sm" id="category"  name="category" required>
                           <option value="">Select Category Name</option>
                           @if(!$categories->isEmpty())
                            @foreach($categories as $cat )
								
									<option <?php echo ($cat->id==$product->category_id)?'selected':''; ?> value="{{$cat->id}}">{{$cat->name}}</option>
									
								
                            @endforeach
                          @endif
                        </select>                 
                      </div> 
                     <label for="sub_category" class="col-md-2 control-label text-left">Sub Categories<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                      <!--  <select class="form-control form-control-sm" multiple id="sub_category"  name="sub_category[]" required>
                           <option value="">Select Category Name</option>
                          <?php $cats=explode(',',$product->subcategory_id);
								if(!empty($cats)){
						   ?>						   
						   @foreach($cats as $ct)
						   <option selected value="{{$ct}}">{{getCateNameById($ct)}}</option>
						   @endforeach
						   
								<?php } ?>
								</select>-->
                      </div> 
                    </div> 
                     <div class="form-group row">
                         <div class="col-md-2">Categories</div>
                        <div class="col-md-10"> 
						
						<table class="table ">
                             <td>
							 <div class=" btn-group-toggle btn-group-vertical" data-toggle="buttons">
							  @if(!$categories->isEmpty())
								  <?php $c=0; ?>
                            @foreach($categories as $cat )
								<label class="btn btn-secondary <?php echo ($cat->id==$product->category_id)?'active':'disabled'; ?> ">
    <input type="radio" value="{{$cat->id}}" name="parent_cate" id="option{{$c}}" autocomplete="off" <?php echo ($cat->id==$product->category_id)?'checked disabled':' disabled'; ?> > {{$cat->name}}
  </label>
									
									
								<?php $c++; ?>
                            @endforeach
                          @endif
						  </div>
							 </td>
							 <td><div class="sub-category"> 
							 <?php $sub=explode(',',$product->subcategory_id); 
							// echo '<pre>';print_r($sub);
							 ?>
							 <ul style="list-style: none;">	  
 @foreach($subcategories as $sub_cat )
 <li><div class="form-check"> <input type="checkbox"  data-id="{{$sub_cat['id']}}" data-name="{{$sub_cat['text']}}" name="subcategory[]" value="{{$sub_cat['id']}}" id="option{{$sub_cat['id']}}" autocomplete="off" <?php echo (in_array($sub_cat['id'],$sub))?'checked':''; ?> > <label class="form-check-label" for="option{{$sub_cat['id']}}" >{{$sub_cat['text']}}</label></div> 
  <?php if(!empty($sub_cat['sub_cate'])){ ?>
   <ul style="list-style: none;">	
    @foreach($sub_cat['sub_cate'] as $cat )
	  <li><div class="form-check"> <input type="checkbox"  data-id="{{$cat['id']}}" data-name="{{$cat['text']}}" name="subcategory[]" value="{{$cat['id']}}" id="option{{$cat['id']}}" autocomplete="off" <?php echo (in_array($cat['id'],$sub))?'checked':''; ?> > <label class="form-check-label" for="option{{$cat['id']}}">{{$cat['text']}}</label></div> </li>
	@endforeach
  </ul>
  <?php } ?>
</li>
 @endforeach
 </ul>
							 
							 
							 </div></td>
							
                         </table>
						 
						 
						 
                         </div>
                     </div>
					 <div class="form-group row">
                      <label for="name" class="col-md-2 control-label text-left">Product Name<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <input name="name" class="form-control form-control-sm" id="name" value="{{$product->product_name}}" required labelcol="2" type="text">
                      </div> 
					   <label for="sku" class="col-md-2 control-label text-left">Product SKU<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <input name="sku" class="form-control form-control-sm" id="sku" value="{{$product->sku}}" labelcol="2" required type="text">
                      </div>
                      </div>
                    <div class="form-group row">
                      <label for="tsin" class="col-md-2 control-label text-left">Product TSIN<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <input name="tsin" class="form-control form-control-sm" id="tsin" required value="{{$product->tsin}}" labelcol="2" type="text">
                      </div> 
                      <label for="ean_code" class="col-md-2 control-label text-left">EAN Code<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <input name="ean_code" class="form-control form-control-sm" id="ean_code" value="{{$product->ean_code}}" required labelcol="2" type="text">
                      </div>
                    </div> 
                   
					   <div class="form-group row">
                      <label for="name" class="col-md-2 control-label text-left">Product Short Description<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-10">
                        <textarea name="short_description" class="form-control form-control-sm" id="short_description"  value="" labelcol="2" type="text">{{$product->short_description}}</textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="long_description" class="col-md-2 control-label text-left">Product Long Description<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-10">
                        <textarea name="long_description" class="form-control form-control-sm" id="long_description"  value="" labelcol="2" type="text">{{$product->long_description}}</textarea>
                      </div> 
					 
                     
                    </div> 
                    <div class="form-group row">
					 <label for="usp" class="col-md-2 control-label text-left">Product USP<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <input name="usp" class="form-control form-control-sm" id="usp" required value="{{$product->usp}}" labelcol="2" type="text">
                      </div>
                      <label for="hsn_code" class="col-md-2 control-label text-left">HSN Code<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <input name="hsn_code" class="form-control form-control-sm" required id="hsn_code" value="{{$product->hsn_code}}" labelcol="2" type="text">
                      </div>  
                     
                    </div>
                    <div class="form-group row">
					 <label for="place_origin" class="col-md-2 control-label text-left">Place of Origin<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <input name="place_origin" class="form-control form-control-sm" required id="place_origin" value="{{$product->place_origin}}" labelcol="2" type="text">
                      </div> 
                      <label for="manuf_address" class="col-md-2 control-label text-left">Manufacturing Address<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <input name="manuf_address" class="form-control form-control-sm" required id="manuf_address" value="{{$product->manuf_address}}" labelcol="2" type="text">
                      </div> 
                     
                    </div> 
                    <div class="form-group row">
					 <label for="cc_address" class="col-md-2 control-label text-left">CC Address<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <input name="cc_address" class="form-control form-control-sm" required id="cc_address" value="{{$product->cc_address}}" labelcol="2" type="text">
                      </div>
                      <label for="cc_contact" class="col-md-2 control-label text-left">CC Contact<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <input name="cc_contact" class="form-control form-control-sm" required id="cc_contact" value="{{$product->cc_contact}}" labelcol="2" type="text">
                      </div> 
                     
                    </div> 
                    <div class="form-group row">
					 <label for="cc_email" class="col-md-2 control-label text-left">CC Email<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <input name="cc_email" class="form-control form-control-sm" required id="cc_email" value="{{$product->cc_email}}" labelcol="2" type="text">
                      </div>
                      <label for="fssai" class="col-md-2 control-label text-left">FSSAI<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <input name="fssai" class="form-control form-control-sm" required id="fssai" value="{{$product->fssai}}" labelcol="2" type="text">
                      </div> 
                    
                    </div> 
                    <div class="form-group row">
					  <label for="ingredients" class="col-md-2 control-label text-left">Ingredients<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <textarea name="ingredients" class="form-control form-control-sm" required id="ingredients"  labelcol="2" type="text">{{$product->ingredients}}</textarea>
                      </div>
                      <label for="how_to_use" class="col-md-2 control-label text-left">How to Use<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <textarea name="how_to_use" class="form-control form-control-sm" required id="how_to_use"  labelcol="2" type="text">{{$product->how_to_use}}</textarea>
                      </div> 
                     
                    </div> 
                    <div class="form-group row">
					 <label for="nutrients" class="col-md-2 control-label text-left">Nutrients<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <textarea name="nutrients" class="form-control form-control-sm" required id="nutrients"  labelcol="2" type="text">{{$product->nutrients}}</textarea>
                      </div>
                      <label for="benefits" class="col-md-2 control-label text-left">Benefits<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <textarea name="benefits" class="form-control form-control-sm" required id="benefits"  labelcol="2" type="text">{{$product->benifits}}</textarea>
                      </div> 
                     
                    </div> 
                    <div class="form-group row">
					 <label for="desclaimer" class="col-md-2 control-label text-left">Disclaimer<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <textarea name="desclaimer" class="form-control form-control-sm" required id="desclaimer"  labelcol="2" type="text">{{$product->desclaimer}}</textarea>
                      </div> 
                      <label for="others" class="col-md-2 control-label text-left">Other Points<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <textarea name="others" class="form-control form-control-sm" required id="others" labelcol="2" type="text">{{$product->others}}</textarea>
                      </div>
                    </div>
                    <div class="button-row d-flex mt-4">
                      <button class="btn btn-primary ml-auto js-btn-next" type="submit" title="Next">Next</button>
                    </div>
                  </div>
                </div> 
              </form>
            </div>
         
        </div> 
   
  </div> 
@endsection
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.6.2/skins/content/default/content.min.css"/>
		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/tinymce.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/jquery.tinymce.min.js"></script>
<script>
  var adminUrl='<?php echo url('/admin')?>';
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

		$(document).ready(function() {
 $("#category").select2();	
 $("#seller").select2();	
 //$("#brand").select2();	
 
 //$("#brand").select2('data', {id: '1', text: 'my'});     
var seller_id='{{$product->company_id}}';
		$.ajax({
		   type:'POST',
		   url:adminUrl+'/product/getbrandbyseller',
		   data:{
			   _token:'<?php echo csrf_token();?>',
			   seller_id:seller_id
		   },
		   success:function(data){
			 
			  $('#brand').html('').select2({data: $.parseJSON(data)});
		   }
		});
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
			 
			  $('#brand').html('').select2({data: $.parseJSON(data)});
		   }
		});
	}); 
	var cate_id='{{$product->category_id}}';
		$.ajax({
		   type:'POST',
		   url:adminUrl+'/product/getsubcatebycategory',
		   data:{
			   _token:'<?php echo csrf_token();?>',
			   cate_id:cate_id
		   },
		   success:function(data){
			   console.log($.parseJSON(data));
			   var obj=$.parseJSON(data);
	var html='<ul style="list-style: none;">';		  
$.each(obj, function(key,value) {
 // html+='<label class="btn btn-secondary active"> <input type="checkbox" class="sub-cate-check" data-id="'+value.id+'" data-name="'+value.text+'" name="subcategory[]" value="'+value.id+'" id="option'+value.id+'" autocomplete="off" > '+value.text+' </label>';
 
 html+='<li><div class="form-check"><input type="checkbox" class="form-check-input" data-id="'+value.id+'" data-name="'+value.text+'" name="subcategory[]" value="'+value.id+'" id="option'+value.id+'" autocomplete="off"><label class="form-check-label" for="option'+value.id+'">'+value.text+'</label></div>';
 if(value.sub_cate.length>0){
 html+='<ul style="list-style: none;">';
 $.each(value.sub_cate, function(key1,value1) {
html+=' <li><div class="form-check">    <input type="checkbox" class="form-check-input" data-id="'+value1.id+'" data-name="'+value1.text+'" name="subcategory[]" value="'+value1.id+'" id="option'+value1.id+'" autocomplete="off"><label class="form-check-label" for="option'+value1.id+'">'+value1.text+'</label></div> </li>';
 });
html+='</ul>';
}

html+='</li>';

}); 
html+='</ul>';

			
			//$('.sub-category').html(html);
			
			  
		   }
		});
		//$('#sub_category').select2('data', {id: '7', text: 'my cate'});
		//$('#sub_category').val("7").trigger("change");;
	/*var $newOption = $("<option selected='selected'></option>").val("7").text("The text"); 
	$("#sub_category").append($newOption).trigger('change');*/
	
	$("input[name='parent_cate']").change(function(){
		//$("#sub_category").val('').trigger('change');
		//var cate_id=$(this).find('option:selected').val();
		var cate_id=$(this).val();
		$.ajax({
		   type:'POST',
		   url:adminUrl+'/product/getsubcatebycategory',
		   data:{
			   _token:'<?php echo csrf_token();?>',
			   cate_id:cate_id
		   },
		   success:function(data){
			console.log($.parseJSON(data));
			// $('#sub_category').select2({data: $.parseJSON(data)});
			$('.sub-category').html('');
			var obj=$.parseJSON(data);
	var html='<ul style="list-style: none;">';		  
$.each(obj, function(key,value) {
 // html+='<label class="btn btn-secondary active"> <input type="checkbox" class="sub-cate-check" data-id="'+value.id+'" data-name="'+value.text+'" name="subcategory[]" value="'+value.id+'" id="option'+value.id+'" autocomplete="off" > '+value.text+' </label>';
 
 html+='<li><div class="form-check"><input type="checkbox" class="form-check-input" data-id="'+value.id+'" data-name="'+value.text+'" name="subcategory[]" value="'+value.id+'" id="option'+value.id+'" autocomplete="off"><label class="form-check-label" for="option'+value.id+'">'+value.text+'</label></div>';
 if(value.sub_cate.length>0){
 html+='<ul style="list-style: none;">';
 $.each(value.sub_cate, function(key1,value1) {
html+=' <li><div class="form-check">    <input type="checkbox" class="form-check-input" data-id="'+value1.id+'" data-name="'+value1.text+'" name="subcategory[]" value="'+value1.id+'" id="option'+value1.id+'" autocomplete="off"><label class="form-check-label" for="exampleCheck1">'+value1.text+'</label></div> </li>';
 });
html+='</ul>';
}

html+='</li>';

}); 
html+='</ul>';

			
			$('.sub-category').html(html);
		   }
		});
	}); 
	
	
	/*$(document).on('change', "input[name='subcategory[]']", function () {
   
   
   
		var cate_id=$(this).attr('data-id');
		var nm=$(this).attr('data-name');
		

		$.ajax({
		   type:'POST',
		   url:adminUrl+'/product/getsubcatebycategory',
		   data:{
			   _token:'<?php echo csrf_token();?>',
			   cate_id:cate_id
		   },
		   success:function(data){
			console.log($.parseJSON(data));
			
			 var obj=$.parseJSON(data);
				var html='<p id="subcate-name">'+nm+'</p><div class=" btn-group-toggle btn-group-vertical" data-toggle="buttons">';		  
			$.each(obj, function(key,value) {
			  html+='<label class="btn btn-secondary "> <input type="checkbox" name="subsubcategory[]" id="suboption'+value.id+'" autocomplete="off" checked> '+value.text+' </label>';
			}); 
			html+='</div>';			
			
			//$('.sub-sub-cate').html(html);
			$('.sub-sub-cate').append(html);
		   }
		});
   
	}); */
		}); 
		</script>
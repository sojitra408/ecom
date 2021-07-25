
@extends('admin.layout')
@section('content')
 
  
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
       
          <!--progress bar-->
     
          <!--form panels-->
          <div class="row">
            <div class="col-12 col-lg-12">
              <form  method="post" action="{{url('admin/product-create/basic')}}">
              @csrf
              @include('includes.messages')
              <input type="hidden" name="product_id" value="">
                <!--single form panel-->
              
                  <h3 >General Info</h3>
                 
                    <div class="form-group row">
                      <label for="seller" class="col-md-2 control-label text-left">Seller Company<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <select class="form-control form-control-sm" name="seller" id="seller" required>
                          <option value="">Select Seller Name</option>
                          @if(!$seller->isEmpty())
                          @foreach($seller as $sel )
                            <option <?php echo ($sel->id==old('seller'))?'selected':''; ?> value="{{$sel->id}}">{{$sel->seller_name}}</option>
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
                      <label for="brand" class="col-md-2 ">Categories<span class="m-l-5 text-red">*</span></label>
					                          <div class="col-md-10"> 
					  <table class="table ">
                             <td>
							 <div class=" btn-group-toggle btn-group-vertical" data-toggle="buttons">
							  @if(!$categories->isEmpty())
								  <?php $c=0; ?>
                            @foreach($categories as $cat )
								<label class="btn btn-secondary  ">
    <input type="radio" value="{{$cat->id}}" <?php echo ($cat->id==old('category'))?'checked':''; ?> name="category" id="option{{$c}}" autocomplete="off" required  > {{$cat->name}}
  </label>
									
									
								<?php $c++; ?>
                            @endforeach
                          @endif
						  </div>
							 </td>
							  <td>
							 <select id="sub_cate" name="sub_cate" class="form-control">
							 <option value="">Select Sub Category</option>
							
							 </select>
							 </td>
							 <td>
							 <select id="sub_sub_cate" name="sub_sub_cate" class="form-control">
							 <option value="">Select Sub Sub Category</option>
							
							 </select>
							 </div>
							<!-- <td><div class="sub-category"> 
							 <?php 
							// echo '<pre>';print_r($sub);
							 ?>
							
							 
							 
							 </div></td>-->
							
                         </table>
						 </div>
                     <!-- <div class="col-md-4">
                        <select class="form-control form-control-sm" id="category"  name="category" required>
                           <option value="">Select Category Name</option>
                           @if(!$categories->isEmpty())
                            @foreach($categories as $cat )
								
									<option value="{{$cat->id}}">{{$cat->name}}</option>
									
								
                            @endforeach
                          @endif
                        </select>                 
                      </div> 
                     <label for="sub_category" class="col-md-2 control-label text-left">Sub Categories<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <select class="form-control form-control-sm" multiple="multiple" id="sub_category"  name="sub_category" required>
                           <option value="">Select Category Name</option>
                           
                        </select>                 
                      </div> -->
                    </div> 
					 <div class="form-group row">
                      <label for="name"  class="col-md-2 control-label text-left">Product Title<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <input name="name" class="form-control form-control-sm" id="name" value="{{old('name')}}" required labelcol="2" type="text">
                      </div> 
					   <label for="sku" class="col-md-2 control-label text-left">Product SKU<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <input name="sku" class="form-control form-control-sm" id="sku" value="{{old('sku')}}" labelcol="2" required type="text">
                      </div>
                      </div>
                    <div class="form-group row">
                      <!--<label for="tsin" class="col-md-2 control-label text-left">Product TSIN<span class="m-l-5 text-red">*</span></label>-->
                      <!--<div class="col-md-4">-->
                      <!--  <input name="tsin" class="form-control form-control-sm" id="tsin" required value="" labelcol="2" type="text">-->
                      <!--</div> -->
                      <label for="ean_code" class="col-md-2 control-label text-left">EAN Code<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <input name="ean_code" value="{{old('ean_code')}}" class="form-control form-control-sm" id="ean_code" value="" labelcol="2" type="text" maxlength="13">
                      </div>
                    </div> 
                    
                    <div class="form-group row">
                      <label for="name" class="col-md-2 control-label text-left">Product Id<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <input name="product_id" class="form-control form-control-sm" id="product_id" value="{{$product_id}}" required labelcol="2" type="text" readonly>
                      </div> 
					  
                      </div>
                   
					   <div class="form-group row">
                      <label for="name" class="col-md-2 control-label text-left">Product Short Description<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-10">
                        <textarea name="short_description" class="form-control form-control-sm" id="short_description"  value="" labelcol="2" type="text" maxlength="180">{{old('short_description')}}</textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="long_description" class="col-md-2 control-label text-left">Product Long Description<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-10">
                        <textarea name="long_description" class="form-control form-control-sm" id="long_description"  value="" labelcol="2" type="text" maxlength="2000">{{old('long_description')}}</textarea>
                      </div> 
					 
                     
                    </div> 
                    <div class="form-group row">
					 <label for="usp" class="col-md-2 control-label text-left">Product USP<span class="m-l-5 text-red">*</span></label>
                      <!--<div class="col-md-4">-->
                      <!--  <input name="usp" class="form-control form-control-sm" id="usp" required value="" labelcol="2" type="text">-->
                      <!--</div>-->
                      <div class="col-md-4">

                        <select class="form-control form-control-sm"  multiple name="usp[]" id="usp" required>

                          <option value="">Product USP</option>

                          @if(!$usp->isEmpty())

                          @foreach($usp as $sel )

                            <option <?php if(!empty(old('usp'))) { echo in_array($sel->id,old('usp'))?'selected':''; } ?> value="{{$sel->id}}">{{$sel->code}}</option>

                          @endforeach

                          @endif

                        </select>  

						

                      </div>
                      
                      <label for="hsn_code" class="col-md-2 control-label text-left">HSN Code<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                      <input name="hsn_code" class="form-control form-control-sm" required id="hsn_code" value="" labelcol="2" type="text">
                      </div>  
                      
                      <!--<div class="col-md-4">

                        <select class="form-control form-control-sm" name="hsn_code" id="seller" required>

                          <option value="">HSN Code</option>

                          @if(!$hsn->isEmpty())

                          @foreach($hsn as $sel )

                            <option <?php echo ($sel->id==old('hsn_code'))?'selected':''; ?> value="{{$sel->id}}">{{$sel->code}}</option>

                          @endforeach

                          @endif

                        </select>                

                      </div>-->
                     
                    </div>
					
					<div class="form-group row">
					 <label for="usp" class="col-md-2 control-label text-left">Inventory Type<span class="m-l-5 text-red">*</span></label>
                    
                      <div class="col-md-4">

                        <select class="form-control form-control-sm"  name="inventory_type" id="inventory_type" required>

                          <option value="">Inventory Type</option>


                            <option  value="Jit">Jit</option>
                            <option  value="Sor">Sor</option>


                        </select>  

						

                      </div>
                      
                      <label for="hsn_code" class="col-md-2 control-label text-left"></label>
                      <div class="col-md-4">
                      
                      </div>  
                      
                   
                     
                    </div>
					
					
					
					
      <!--              <div class="form-group row">-->
					 <!--<label for="place_origin" class="col-md-2 control-label text-left">Place of Origin<span class="m-l-5 text-red">*</span></label>-->
      <!--                <div class="col-md-4">-->
      <!--                  <input name="place_origin" class="form-control form-control-sm" required id="place_origin" value="" labelcol="2" type="text">-->
      <!--                </div> -->
      <!--                <label for="manuf_address" class="col-md-2 control-label text-left">Manufacturing Address<span class="m-l-5 text-red">*</span></label>-->
      <!--                <div class="col-md-4">-->
      <!--                  <input name="manuf_address" class="form-control form-control-sm" required id="manuf_address" value="" labelcol="2" type="text">-->
      <!--                </div> -->
                     
      <!--              </div> -->
      <!--              <div class="form-group row">-->
					 <!--<label for="cc_address" class="col-md-2 control-label text-left">CC Address<span class="m-l-5 text-red">*</span></label>-->
      <!--                <div class="col-md-4">-->
      <!--                  <input name="cc_address" class="form-control form-control-sm" required id="cc_address" value="" labelcol="2" type="text">-->
      <!--                </div>-->
      <!--                <label for="cc_contact" class="col-md-2 control-label text-left">CC Contact<span class="m-l-5 text-red">*</span></label>-->
      <!--                <div class="col-md-4">-->
      <!--                  <input name="cc_contact" class="form-control form-control-sm" required id="cc_contact" value="" labelcol="2" type="text">-->
      <!--                </div> -->
                     
      <!--              </div> -->
                    <div class="form-group row">
					 <!--<label for="cc_email" class="col-md-2 control-label text-left">CC Email<span class="m-l-5 text-red">*</span></label>-->
      <!--                <div class="col-md-4">-->
      <!--                  <input name="cc_email" class="form-control form-control-sm" required id="cc_email" value="" labelcol="2" type="text">-->
      <!--                </div>-->
                      <!--<label for="fssai" class="col-md-2 control-label text-left">FSSAI<span class="m-l-5 text-red">*</span></label>-->
                      <!--<div class="col-md-4">-->
                      <!--  <input name="fssai" class="form-control form-control-sm" required id="fssai" value="" labelcol="2" type="text">-->
                      <!--</div> -->
                    
                    </div> 
       <!--             <div class="form-group row">-->
					  <!--<label for="ingredients" class="col-md-2 control-label text-left">Ingredients<span class="m-l-5 text-red">*</span></label>-->
       <!--               <div class="col-md-4">-->
       <!--                 <textarea name="ingredients" class="form-control form-control-sm" required id="ingredients" value="" labelcol="2" type="text"></textarea>-->
       <!--               </div>-->
       <!--               <label for="how_to_use" class="col-md-2 control-label text-left">How to Use<span class="m-l-5 text-red">*</span></label>-->
       <!--               <div class="col-md-4">-->
       <!--                 <textarea name="how_to_use" class="form-control form-control-sm" required id="how_to_use" value="" labelcol="2" type="text"></textarea>-->
       <!--               </div> -->
                     
       <!--             </div> -->
      <!--              <div class="form-group row">-->
					 <!--<label for="nutrients" class="col-md-2 control-label text-left">Nutrients<span class="m-l-5 text-red">*</span></label>-->
      <!--                <div class="col-md-4">-->
      <!--                  <textarea name="nutrients" class="form-control form-control-sm" required id="nutrients" value="" labelcol="2" type="text"></textarea>-->
      <!--                </div>-->
      <!--                <label for="benefits" class="col-md-2 control-label text-left">Benefits<span class="m-l-5 text-red">*</span></label>-->
      <!--                <div class="col-md-4">-->
      <!--                  <textarea name="benefits" class="form-control form-control-sm" required id="benefits" value="" labelcol="2" type="text"></textarea>-->
      <!--                </div> -->
                     
      <!--              </div> -->
      <!--              <div class="form-group row">-->
					 <!--<label for="desclaimer" class="col-md-2 control-label text-left">Disclaimer<span class="m-l-5 text-red">*</span></label>-->
      <!--                <div class="col-md-4">-->
      <!--                  <textarea name="desclaimer" class="form-control form-control-sm" required id="desclaimer" value="" labelcol="2" type="text" maxlength="500"></textarea>-->
      <!--                </div> -->
      <!--                <label for="others" class="col-md-2 control-label text-left">Other Points<span class="m-l-5 text-red">*</span></label>-->
      <!--                <div class="col-md-4">-->
      <!--                  <textarea name="others" class="form-control form-control-sm" required id="others" value="" labelcol="2" type="text"></textarea>-->
      <!--                </div>-->
      <!--              </div>-->
					 <div class="form-group row">
                         
				
									
                    <label  for="brand" class="col-md-12 control-label text-left">Select Attributes<span class="m-l-5 text-red">*</span></label>
                    <div class="col-md-12"><div class="row">
                      @if(!$attributes->isEmpty())
                        @foreach($attributes as $attr )
                          <div class="col" style="margin-top:10px">
                            <input <?php if(!empty(old('attributes'))) { echo in_array($attr->id,old('attributes'))?'checked':''; } ?> value="{{$attr->id}}" id="attributes_{{$attr->id}}" name="attributes[]" type="checkbox">
                            {{$attr->attributes_name}}
                          </div>
                        @endforeach
                      @endif    
                    </div> 
                    </div>
                   
                    </div>
                    <div class="button-row d-flex mt-4">
                      @if(Auth::user()->can('products-add'))
                      <button class="btn btn-primary ml-auto js-btn-next" type="submit" title="Next">Add</button>
                      @endif
                    </div>
                
				<div style="clear:both"></div>
              </form>
			<div style="clear:both"></div>  
            </div>
          </div>
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

$(function () {
    $('input[name^="attributes"]').click(function () {
        if ($('input[name="attributes[]"]:checked').length === 3) {
            return false;
        }
    });
});
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
	
	/*$('#category').change(function(){
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
	}); */
	
		$("input[name='category']").change(function(){
		var cate_id=$(this).val();
		$.ajax({
		   type:'POST',
		   url:adminUrl+'/product/getsubcatebycategory',
		   data:{
			   _token:'<?php echo csrf_token();?>',
			   cate_id:cate_id
		   },
		   success:function(data){
			 
			 $('#sub_cate').html('');
			 var html='';
			 html+='<option >Select Sub Category</option>';
			 var obj=$.parseJSON(data);
			 
			 $.each(obj, function(key,value) {
				 html+='<option value="'+value.id+'">'+value.text+'</option>';
			 });
			 
			$('#sub_cate').html(html);
			
			  //$('#brand').html('').select2({data: $.parseJSON(data)});
		   }
		});
	});
	
		$('#sub_cate').change(function(){
		var cate_id=$(this).find('option:selected').val();
		$.ajax({
		   type:'POST',
		   url:adminUrl+'/product/getsubcatebycategory',
		   data:{
			   _token:'<?php echo csrf_token();?>',
			   cate_id:cate_id
		   },
		   success:function(data){
			 
			 $('#sub_sub_cate').html('');
			 
			 var obj=$.parseJSON(data);
			 var html='';
			 $.each(obj, function(key,value) {
				 html+='<option value="'+value.id+'">'+value.text+'</option>';
			 });
			 
			$('#sub_sub_cate').html(html);
			
			  //$('#brand').html('').select2({data: $.parseJSON(data)});
		   }
		});
	});
	/*$("input[name='category']").change(function(){
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
 
 html+='<li><div class="form-check"><input type="checkbox" class="form-check-input" data-id="'+value.id+'" data-name="'+value.text+'" name="subcategory[]" value="'+value.id+'" id="option'+value.id+'" autocomplete="off"  ><label class="form-check-label" for="option'+value.id+'">'+value.text+'</label></div>';
 if(value.sub_cate.length>0){
 html+='<ul style="list-style: none;">';
 $.each(value.sub_cate, function(key1,value1) {
html+=' <li><div class="form-check">    <input type="checkbox" class="form-check-input" data-id="'+value1.id+'" data-name="'+value1.text+'" name="subcategory[]" value="'+value1.id+'" id="option'+value1.id+'" autocomplete="off"  ><label class="form-check-label" for="exampleCheck1">'+value1.text+'</label></div> </li>';
 });
html+='</ul>';
}

html+='</li>';

}); 
html+='</ul>';

			
			$('.sub-category').html(html);
		   }
		});
	}); */
		}); 
		</script>
@extends('admin.layout')
@section('content')
  
  
  <style>

    .multisteps-form__progress {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(0, 1fr));
      font-size:14px; background:#fff; padding:10px;
    }
.multisteps-form__progress .col {border-left:solid 1px #000; border-bottom:solid 1px #000; text-align:center; border-right:solid 1px #000;border-top:solid 1px #000;}

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
    <h1 class="h3 mb-2 text-gray-800">Edit Product</h1> <a href="https://ecomnew.thisorthat.in/productdetails/{{$product->id}}" target="_blank">Preview This Product</a>
    <!-- DataTales Example -->
              <!--progress bar-->
          <div class="row">
              
              @include('admin.product.menu')
              
              
            <!--<div class="col-12 col-lg-12 "> -->
            <!--  <div class="multisteps-form__progress">-->
            <!--    <a href="{{route('product.edit',$product->id)}}"  class="col" title="General">General</a>-->
            <!--    <a href="javascript:void(0)" class="col" title="Pricing">Variants & Pricing</a>-->
            <!--    <a href="{{url('/admin/product-packaging',$product->id)}}"  class="col" title="Inventory">Packaging</a>-->
                <!--<a href="{{url('admin/product-create/images')}}" style="padding-left: 55px;" class="multisteps-form__progress-btn" title="Images">Images </a>-->
            <!--    <a href="javascript:void(0)" class="col"  title="SEO">SEO </a>-->
            <!--    <a href="{{url('/admin/product-additional',$product->id)}}" class="col" title="Other Options">Other Options </a>-->
            <!--    <a href="{{url('/admin/product-related',$product->id)}}"   class="col" title="Related Products">Related Products </a>-->
            <!--  </div>-->
            <!--</div>-->
       </div>
          <!--form panels-->
          <div class="row">
            <div class="col-12 col-lg-12">
              <form class="multisteps-form__form" onsubmit="return validateForm()" method="post" action="{{route('product.update',$product->id)}}">
              @csrf
              @include('includes.messages')
              
              <input type="hidden" name="product_id" value="{{$product->id}}">
                <!--single form panel-->
                <div class="multisteps-form__panel p-3 bg-white js-active" data-animation="scaleIn">
                  <h3 class="multisteps-form__title">General Info</h3>
                  <div class="multisteps-form__content"> 
                    <div class="form-group row">
                      <label for="seller" class="col-md-2 control-label text-left">Seller Company<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <select class="form-control form-control-sm" name="seller" id="seller" required readonly>
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
                        <select class="form-control form-control-sm" name="brand" id="brand" required readonly>
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
                         <div class="col-md-2">Categories</div>
                        <div class="col-md-10"> 
						
						<table class="table ">
                             <td>
							 <div class=" btn-group-toggle btn-group-vertical" data-toggle="buttons">
							  @if(!$categories->isEmpty())
								  <?php $c=0; ?>
                            @foreach($categories as $cat )
								<label class="btn btn-secondary <?php echo ($cat->id==$product->category_id)?'active':'disabled'; ?> ">
    <input type="radio" value="{{$cat->id}}" name="category" id="option{{$c}}" autocomplete="off" <?php echo ($cat->id==$product->category_id)?'checked disabled':' disabled'; ?> > {{$cat->name}}
  </label>
									
									
								<?php $c++; ?>
                            @endforeach
                          @endif
						  </div>
							 </td>
							 <td>
							 <select id="sub_cate" name="sub_cate" class="form-control">
							 <option value="">Select Sub Category</option>
							 @if(!$subcategories->isEmpty())
							  @foreach($subcategories as $sub_cat )
							 <option <?php echo ($product->sub_cate==$sub_cat->id)?'selected':''; ?> value="{{$sub_cat->id}}">{{$sub_cat->name}}</option>
							 @endforeach
							 @endif
							 </select>
							 </td>
							 <td>
							 <select id="sub_sub_cate" name="sub_sub_cate" class="form-control">
							 <option value="">Select Sub Sub Category</option>
							 @if(!$subsubcategories->isEmpty())
							  @foreach($subsubcategories as $sub_cat )
							 <option <?php echo ($product->sub_sub_cate==$sub_cat->id)?'selected':''; ?> value="{{$sub_cat->id}}">{{$sub_cat->name}}</option>
							 @endforeach
							 @endif
							 </select>
							 
							<!-- <div class="sub-category"> 
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
							 
							 
							 </div>--></td>
							
                         </table>
						 
						 
						 
                         </div>
                     </div>
					 <div class="form-group row">
                      <label for="name" class="col-md-2 control-label text-left">Product Title<span class="m-l-5 text-red">*</span></label>
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
                        <input name="tsin" class="form-control form-control-sm" id="tsin" required value="{{$product->product_id}}" labelcol="2" type="text" readonly>
                      </div> 
                      <label for="ean_code" class="col-md-2 control-label text-left">EAN Code<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <input name="ean_code" class="form-control form-control-sm" id="ean_code" value="{{$product->ean_code}}"  labelcol="2" type="text" maxlength="13">
                      </div>
                    </div> 
                    
                    <div class="form-group row">
                      <label for="name" class="col-md-2 control-label text-left">Product Id<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <input name="product_id" class="form-control form-control-sm" id="product_id" value="{{$product->product_id}}" required labelcol="2" type="text" readonly>
                      </div> 
					  
                      </div>
                   
					   <div class="form-group row">
                      <label for="name" class="col-md-2 control-label text-left">Product Short Description<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-10">
                        <textarea name="short_description" class="form-control form-control-sm" id="short_description"  value="" labelcol="2" type="text" maxlength="180">{{$product->short_description}}</textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="long_description" class="col-md-2 control-label text-left">Product Long Description<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-10">
                        <textarea name="long_description" class="form-control form-control-sm" id="long_description"  value="" labelcol="2" type="text" maxlength="2000">{{$product->long_description}}</textarea>
                      </div> 
					 
                     
                    </div> 
                    <div class="form-group row">
					 <label for="usp" class="col-md-2 control-label text-left">Product USP<span class="m-l-5 text-red">*</span></label>
                      <!--<div class="col-md-4">-->
                      <!--  <input name="usp" class="form-control form-control-sm" id="usp" required value="{{$product->usp}}" labelcol="2" type="text">-->
                      <!--</div>-->
                      
                     <?php
                        
                        $str_arr = explode (",", $product->usp);
                        // print_r($str_arr); 

                      ?>
                     
                      <div class="col-md-4">

                        <select class="form-control form-control-sm" name="usp[]" id="usp" multiple required>

                          <option value="">Select Product USP</option>
                            
                          @if(!$usp->isEmpty())
                          
                          
                          @foreach ($usp as $key => $sel)
                      <?php $select=""; if(count($str_arr)>0 && !empty($str_arr)){
                        foreach($str_arr as $strarr){
                          if($strarr == $sel->id){
                              $select="selected='selected'";
                          }
                      }}?>

                        <option <?php echo $select ?> value="{{$sel->id}}">{{ $sel->code }}</option>
                                                
                      @endforeach
                          
                          
                          
                          
                          

                          <!--@foreach($usp as $sel )-->

                          <!--  <option <?php echo ($sel->id==$product->usp)?'selected':'selected'; ?> value="{{$sel->id}}">{{$sel->code}}</option>-->
                            
                            

                          <!--@endforeach-->

                          @endif

                        </select>                

                      </div>
                      
                      <label for="hsn_code" class="col-md-2 control-label text-left">HSN Code<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                       <input name="hsn_code" class="form-control form-control-sm" required id="hsn_code" value="{{$product->hsn_code}}" labelcol="2" type="text">
                      </div>
                       <!-- <div class="col-md-4">

                        <select class="form-control form-control-sm" name="hsn_code" id="seller" required>

                          <option value="">Select HSN Code</option>

                          @if(!$hsn->isEmpty())

                          @foreach($hsn as $sel )

                            <option value="{{$sel->id}}" {{ $sel->id == $product->hsn_code ? 'selected="selected"' : '' }}>{{$sel->code}}</option>

                          @endforeach

                          @endif

                        </select>                

                      </div> -->
                     
                    </div>
					
					<div class="form-group row">
					 <label for="usp" class="col-md-2 control-label text-left">Inventory Type<span class="m-l-5 text-red">*</span></label>
                    
                      <div class="col-md-4">

                        <select class="form-control form-control-sm"  name="inventory_type" id="inventory_type" required>

                          <option value="">Inventory Type</option>


                            <option <?php echo $product->inventory_type=='Jit' ? 'selected' : '' ?> value="Jit">Jit</option>
                            <option <?php echo $product->inventory_type=='Sor' ? 'selected' : '' ?>  value="Sor">Sor</option>


                        </select>  

						

                      </div>
                      
                      <label for="hsn_code" class="col-md-2 control-label text-left"></label>
                      <div class="col-md-4">
                      
                      </div>  
                      
                   
                     
                    </div>
					
					
      <!--              <div class="form-group row">-->
					 <!--<label for="place_origin" class="col-md-2 control-label text-left">Place of Origin<span class="m-l-5 text-red">*</span></label>-->
      <!--                <div class="col-md-4">-->
      <!--                  <input name="place_origin" class="form-control form-control-sm" required id="place_origin" value="{{$product->place_origin}}" labelcol="2" type="text">-->
      <!--                </div> -->
      <!--                <label for="manuf_address" class="col-md-2 control-label text-left">Manufacturing Address<span class="m-l-5 text-red">*</span></label>-->
      <!--                <div class="col-md-4">-->
      <!--                  <input name="manuf_address" class="form-control form-control-sm" required id="manuf_address" value="{{$product->manuf_address}}" labelcol="2" type="text">-->
      <!--                </div> -->
                     
      <!--              </div> -->
      <!--              <div class="form-group row">-->
					 <!--<label for="cc_address" class="col-md-2 control-label text-left">CC Address<span class="m-l-5 text-red">*</span></label>-->
      <!--                <div class="col-md-4">-->
      <!--                  <input name="cc_address" class="form-control form-control-sm" required id="cc_address" value="{{$product->cc_address}}" labelcol="2" type="text">-->
      <!--                </div>-->
      <!--                <label for="cc_contact" class="col-md-2 control-label text-left">CC Contact<span class="m-l-5 text-red">*</span></label>-->
      <!--                <div class="col-md-4">-->
      <!--                  <input name="cc_contact" class="form-control form-control-sm" required id="cc_contact" value="{{$product->cc_contact}}" labelcol="2" type="text">-->
      <!--                </div> -->
                     
      <!--              </div> -->
                    <div class="form-group row">
					 <!--<label for="cc_email" class="col-md-2 control-label text-left">CC Email<span class="m-l-5 text-red">*</span></label>-->
      <!--                <div class="col-md-4">-->
      <!--                  <input name="cc_email" class="form-control form-control-sm" required id="cc_email" value="{{$product->cc_email}}" labelcol="2" type="text">-->
      <!--                </div>-->
                      <label for="fssai" class="col-md-2 control-label text-left">FSSAI<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <input name="fssai" class="form-control form-control-sm" required id="fssai" value="{{$fssai->fssai_licence_number}}" labelcol="2" type="text" readonly="">
                      </div> 
                      
                     
                      <label for="country_origin" class="col-md-2 control-label text-left">Country of Origin<span class="m-l-5 text-red">*</span></label>
                      
                     <div class="col-md-4">
                        <select class="form-control form-control-sm" name="country_origin" id="seller" required>
                           <option value="">Select Country of Origin</option>
                           @if(!$country_origin->isEmpty())
                           @foreach($country_origin as $sel )
                           <option value="{{$sel->id}}" {{ $sel->id == $product->country_origin ? 'selected="selected"' : '' }}>{{$sel->name}}</option>
                           @endforeach
                           @endif
                        </select>
                     </div>
                  
                    
                    </div> 
                    <div class="form-group row">
					  <!--<label for="ingredients" class="col-md-2 control-label text-left">Ingredients<span class="m-l-5 text-red">*</span></label>-->
       <!--               <div class="col-md-4">-->
       <!--                 <textarea name="ingredients" class="form-control form-control-sm" required id="ingredients"  labelcol="2" type="text">{{$product->ingredients}}</textarea>-->
       <!--               </div>-->
                      @if($product->category_id == 19)
                      <label for="how_to_use" class="col-md-2 control-label text-left">How to Use<span class="m-l-5 text-red">*</span></label>
                     <div class="col-md-4">
                        <textarea name="how_to_use" class="form-control form-control-sm" id="how_to_use"  labelcol="2" type="text">{{$product->how_to_use}}</textarea>
                     </div>
                     @endif
                     
                   <!--  @if($product->category_id == 3 || $product->category_id == 19)
                     <label for="manufacturing_date" class="col-md-2 control-label text-left">Manufacturing Date<span class="m-l-5 text-red">*</span></label>
                     <div class="col-md-4">
                        <input name="manufacturing_date" class="form-control form-control-sm" required id="manufacturing_date" value="{{$product->manufacturing_date}}" labelcol="2" type="date">
                     </div>
                     @endif
       -->
                        
                     
                    </div> 
                    <div class="form-group row">
                       <!--  @if($product->category_id == 19 || $product->category_id == 3)
                     <label for="expiration_date" class="col-md-2 control-label text-left">Expiration Date<span class="m-l-5 text-red">*</span></label>
                     <div class="col-md-4">
                        <input name="expiration_date" class="form-control form-control-sm" required id="expiration_date" value="{{$product->expiration_date}}" labelcol="2" type="date">
                     </div>
                     <label for="shelf_life" class="col-md-2 control-label text-left">Shelf Life (in days)<span class="m-l-5 text-red">*</span></label>
                     <div class="col-md-4">
                        <input name="shelf_life" class="form-control form-control-sm" required id="shelf_life" value="{{$product->shelf_life}}" labelcol="2" type="number">
                     </div>
                    @endif -->
					 <!--<label for="nutrients" class="col-md-2 control-label text-left">Nutrients<span class="m-l-5 text-red">*</span></label>-->
      <!--                <div class="col-md-4">-->
      <!--                  <textarea name="nutrients" class="form-control form-control-sm" required id="nutrients"  labelcol="2" type="text">{{$product->nutrients}}</textarea>-->
      <!--                </div>-->
      <!--                <label for="benefits" class="col-md-2 control-label text-left">Benefits<span class="m-l-5 text-red">*</span></label>-->
      <!--                <div class="col-md-4">-->
      <!--                  <textarea name="benefits" class="form-control form-control-sm" required id="benefits"  labelcol="2" type="text">{{$product->benifits}}</textarea>-->
      <!--                </div> -->
                     
                    </div> 
                    <div class="form-group row">
                        @if($product->category_id == 19 || $product->category_id == 3)
					 <label for="desclaimer" class="col-md-2 control-label text-left">Disclaimer</label>
                      <div class="col-md-4">
                        <textarea name="desclaimer" class="form-control form-control-sm" id="desclaimer"  labelcol="2" type="text" maxlength="500">{{$product->desclaimer}}</textarea>
                      </div>
                      @endif
                      
                      @if($product->category_id == 3 || $product->category_id == 19)
                      <label for="cuisine" class="col-md-2 control-label text-left">Item Form</label>
                      
                     <div class="col-md-4">
					 <input name="item_form" class="form-control form-control-sm" id="item_form"  value="{{$product->item_form}}" labelcol="2" type="text">
                        <!--<select class="form-control form-control-sm" name="item_form" id="seller" required>
                           <option value="">Select Item Form</option>
                           @if(!$item_form->isEmpty())
                           @foreach($item_form as $sel )
                           <option value="{{$sel->id}}" {{ $sel->id == $product->item_form ? 'selected="selected"' : '' }}>{{$sel->title}}</option>
                           @endforeach
                           @endif
                        </select>-->
                     </div>
                    @endif
      <!--                <label for="others" class="col-md-2 control-label text-left">Other Points<span class="m-l-5 text-red">*</span></label>-->
      <!--                <div class="col-md-4">-->
      <!--                  <textarea name="others" class="form-control form-control-sm" required id="others" labelcol="2" type="text">{{$product->others}}</textarea>-->
      <!--                </div>-->
                    </div>
                    
                    <div class="form-group row">

                      <label for="tsin" class="col-md-2 control-label text-left">Seller SKU<span class="m-l-5 text-red">*</span></label>

                      <div class="col-md-4">

                        <input name="seller_sku" class="form-control form-control-sm" id="seller_sku" required value="{{$product->seller_sku}}" labelcol="2" type="text">

                      </div> 

                      <label for="ean_code" class="col-md-2 control-label text-left">Product Keywords</label>

                      <div class="col-md-4">
                          
                          <textarea name="keywords" class="form-control form-control-sm" required id="keywords" labelcol="2" type="text">{{$product->keywords}}</textarea>

                        <!--<input name="keywords" class="form-control form-control-sm" id="keywords" value="{{$product->keywords}}" labelcol="2" type="text">-->

                      </div>

                    </div>
                    
                    <div class="form-group row">
                    @if($product->category_id == 19)
                      <label for="cuisine" class="col-md-2 control-label text-left">Cuisine</label>
                      
                     <div class="col-md-4">
                         <input name="cuisine" class="form-control form-control-sm" id="cuisine"  value="{{$product->cuisine}}" labelcol="2" type="text">
                        <!--<select class="form-control form-control-sm" name="cuisine" id="seller" required>-->
                        <!--   <option value="">Select Cuisine</option>-->
                        <!--   @if(!$cuisine->isEmpty())-->
                        <!--   @foreach($cuisine as $sel )-->
                        <!--   <option value="{{$sel->id}}" {{ $sel->id == $product->cuisine ? 'selected="selected"' : '' }}>{{$sel->title}}</option>-->
                        <!--   @endforeach-->
                        <!--   @endif-->
                        <!--</select>-->
                     </div>
                    @endif
                    
                    @if($product->category_id == 19)
                  <label for="cuisine" class="col-md-2 control-label text-left">Flavour</label>
                      
                     <div class="col-md-4">
                         <input name="flavour" class="form-control form-control-sm" id="flavour"  value="{{$product->flavour}}" labelcol="2" type="text">
                        <!--<select class="form-control form-control-sm" name="flavour" id="seller" required>-->
                        <!--   <option value="">Select Flavour</option>-->
                        <!--   @if(!$flavour->isEmpty())-->
                        <!--   @foreach($flavour as $sel )-->
                        <!--   <option value="{{$sel->id}}" {{ $sel->id == $product->flavour ? 'selected="selected"' : '' }}>{{$sel->title}}</option>-->
                        <!--   @endforeach-->
                        <!--   @endif-->
                        <!--</select>-->
                     </div>


                    @endif
                     
                  </div>
                  
                    
                  
                                    @if($product->category_id == 2)
                  <div class="form-group row">
                    
                      <label for="cuisine" class="col-md-2 control-label text-left">Pattern</label>
                      
                     <div class="col-md-4">
                        <select class="form-control form-control-sm" name="pattern" id="seller" >
                           <option value="">Select Pattern</option>
                           @if(!$pattern->isEmpty())
                           @foreach($pattern as $sel )
                           <option value="{{$sel->id}}" {{ $sel->id == $product->pattern ? 'selected="selected"' : '' }}>{{$sel->title}}</option>
                           @endforeach
                           @endif
                        </select>
                     </div>

                     <label for="cuisine" class="col-md-2 control-label text-left">Fit</label>
                      
                     <div class="col-md-4">
                        <select class="form-control form-control-sm" name="fit" id="seller" >
                           <option value="">Select Fit</option>
                           @if(!$fit->isEmpty())
                           @foreach($fit as $sel )
                           <option value="{{$sel->id}}" {{ $sel->id == $product->fit ? 'selected="selected"' : '' }}>{{$sel->title}}</option>
                           @endforeach
                           @endif
                        </select>
                     </div>

                  </div>
                  @endif

                  @if($product->category_id == 2)
                  <div class="form-group row">
                    
                      <label for="cuisine" class="col-md-2 control-label text-left">Length</label>
                      
                     <div class="col-md-4">
                        <select class="form-control form-control-sm" name="lengths" id="seller" >
                           <option value="">Select Length</option>
                           @if(!$lengths->isEmpty())
                           @foreach($lengths as $sel )
                           <option value="{{$sel->id}}" {{ $sel->id == $product->lengths ? 'selected="selected"' : '' }}>{{$sel->title}}</option>
                           @endforeach
                           @endif
                        </select>
                     </div>

                     <label for="cuisine" class="col-md-2 control-label text-left">Neck</label>
                      
                     <div class="col-md-4">
                        <select class="form-control form-control-sm" name="neck" id="seller" >
                           <option value="">Select Neck</option>
                           @if(!$neck->isEmpty())
                           @foreach($neck as $sel )
                           <option value="{{$sel->id}}" {{ $sel->id == $product->neck ? 'selected="selected"' : '' }}>{{$sel->title}}</option>
                           @endforeach
                           @endif
                        </select>
                     </div>

                  </div>
                  @endif

                  @if($product->category_id == 2)
                  <div class="form-group row">
                    
                      <label for="cuisine" class="col-md-2 control-label text-left">Sleeve</label>
                      
                     <div class="col-md-4">
                        <select class="form-control form-control-sm" name="sleeve" id="seller" >
                           <option value="">Select Sleeve</option>
                           @if(!$sleeve->isEmpty())
                           @foreach($sleeve as $sel )
                           <option value="{{$sel->id}}" {{ $sel->id == $product->sleeve ? 'selected="selected"' : '' }}>{{$sel->title}}</option>
                           @endforeach
                           @endif
                        </select>
                     </div>

                     <label for="cuisine" class="col-md-2 control-label text-left">Rise</label>
                      
                     <div class="col-md-4">
                        <select class="form-control form-control-sm" name="rise" id="seller" >
                           <option value="">Select Rise</option>
                           @if(!$rise->isEmpty())
                           @foreach($rise as $sel )
                           <option value="{{$sel->id}}" {{ $sel->id == $product->rise ? 'selected="selected"' : '' }}>{{$sel->title}}</option>
                           @endforeach
                           @endif
                        </select>
                     </div>

                  </div>
                  @endif

                  @if($product->category_id == 3)
                  <div class="form-group row">
                    
                      <label for="cuisine" class="col-md-2 control-label text-left">Hair Type</label>
                      
                     <div class="col-md-4">
                        <select class="form-control form-control-sm" name="hair_type" id="seller" >
                           <option value="">Select Hair Type</option>
                           @if(!$hair_type->isEmpty())
                           @foreach($hair_type as $sel )
                           <option  value="{{$sel->id}}" {{ $sel->id == $product->hair_type ? 'selected="selected"' : '' }}>{{$sel->title}}</option>
                           @endforeach
                           @endif
                        </select>
                     </div>

                     <label for="cuisine" class="col-md-2 control-label text-left">Skin Type</label>
                      
                     <div class="col-md-4">
                        <select class="form-control form-control-sm" name="skin_type" id="seller" >
                           <option value="">Select Skin Type</option>
                           @if(!$skin_type->isEmpty())
                           @foreach($skin_type as $sel )
                           <option value="{{$sel->id}}" {{ $sel->id == $product->skin_type ? 'selected="selected"' : '' }}>{{$sel->title}}</option>
                           @endforeach
                           @endif
                        </select>
                     </div>

                  </div>
                  @endif

                  @if($product->category_id == 3 || $product->category_id == 2)
                  <div class="form-group row">
                    
                      <label for="cuisine" class="col-md-2 control-label text-left">Material</label>
                      
                     <div class="col-md-4">
                         <input name="material" class="form-control form-control-sm" id="material" value="{{$product->material}}" labelcol="2" type="text">
                        <!--<select class="form-control form-control-sm" name="material" id="seller" required>-->
                        <!--   <option value="">Select Material</option>-->
                        <!--   @if(!$material->isEmpty())-->
                        <!--   @foreach($material as $sel )-->
                        <!--   <option  value="{{$sel->id}}" {{ $sel->id == $product->material ? 'selected="selected"' : '' }}>{{$sel->title}}</option>-->
                        <!--   @endforeach-->
                        <!--   @endif-->
                        <!--</select>-->
                     </div>

                     <label for="cuisine" class="col-md-2 control-label text-left">Scent</label>
                      
                     <div class="col-md-4">
                         <input name="scent" class="form-control form-control-sm" id="scent" value="{{$product->scent}}" labelcol="2" type="text">
                        <!--<select class="form-control form-control-sm" name="scent" id="seller" required>-->
                        <!--   <option value="">Select Scent</option>-->
                        <!--   @if(!$scent->isEmpty())-->
                        <!--   @foreach($scent as $sel )-->
                        <!--   <option value="{{$sel->id}}" {{ $sel->id == $product->scent ? 'selected="selected"' : '' }}>{{$sel->title}}</option>-->
                        <!--   @endforeach-->
                        <!--   @endif-->
                        <!--</select>-->
                     </div>

                  </div>
                  @endif
                @if($product->category_id == 2)
                  <div class="form-group row">
                    
                      <label for="cuisine" class="col-md-2 control-label text-left">Fabric</label>
                      
                     <div class="col-md-4">
                        <select class="form-control form-control-sm" name="fabric" id="seller" >
                           <option value="">Select Fabric</option>
                           @if(!$fabric->isEmpty())
                           @foreach($fabric as $sel )
                           <option  value="{{$sel->id}}" {{ $sel->id == $product->fabric ? 'selected="selected"' : '' }}>{{$sel->title}}</option>
                           @endforeach
                           @endif
                        </select>
                     </div>

                     

                  
                    
                      <label for="cuisine" class="col-md-2 control-label text-left">Sole Material</label>
                      
                     <div class="col-md-4">
                        <select class="form-control form-control-sm" name="solematerial" id="solematerial" >
                           <option value="">Select Sole Material</option>
                           @if(!$solematerial->isEmpty())
                           @foreach($solematerial as $sel )
                           <option  value="{{$sel->id}}" {{ $sel->id == $product->solematerial ? 'selected="selected"' : '' }}>{{$sel->title}}</option>
                           @endforeach
                           @endif
                        </select>
                     </div>
                     </div>
					 
<div class="form-group row">
                     <label for="cuisine" class="col-md-2 control-label text-left">Product Type<span class="m-l-5 text-red">*</span></label>
                      
                     <div class="col-md-4">
                        <select class="form-control form-control-sm" name="product_type" id="product_type" required >
                           <option value="">Select Product Type</option>
                           @if(!$product_type->isEmpty())
                           @foreach($product_type as $sel )
                           <option  value="{{$sel->id}}" {{ $sel->id == $product->product_type ? 'selected="selected"' : '' }}>{{$sel->title}}</option>
                           @endforeach
                           @endif
                        </select>
                     </div>

                  </div>
                  @endif
                  
                  
                    
                    <div class="form-group row">

                      <label for="ean_code" class="col-md-2 control-label text-left">Is a quick buy?</label>

                      <div class="col-md-4">

                        
                        
                        <div class="checkbox">

                  <label class="switch"> 

                    <input type="checkbox" name="quick_buy" @if ($product->quick_buy == 'yes')



                      checked



                    @endif value="no">

                    <span class="slider round"></span>

                 </label>

               </div>


                      </div> 

                      <label for="ean_code" class="col-md-2 control-label text-left">Is Bargain Available?</label>

                      <div class="checkbox">

                  <label class="switch"> 

                    <input type="checkbox" name="bargain_available" @if ($product->bargain_available == 'yes')



                      checked



                    @endif value="no">

                    <span class="slider round"></span>

                 </label>

               </div>
			   
			   <label for="ean_code" class="col-md-2 control-label text-left">Has Expiry Date?</label>

                      <div class="checkbox">

                  <label class="switch"> 

                    <input type="checkbox" id="has_expiry" name="has_expiry" <?php echo ($product->has_expiry == 'yes')?'    checked':''; ?>>

                    <span class="slider round"></span>

                 </label>

               </div>

                    
                    </div>
                    
                     @if($product->category_id == 19)
                      <div class="form-group row">
                     <label for="ean_code" class="col-md-2 control-label text-left">Vegan</label>
                     <div class="col-md-4">
                        <div class="checkbox">
                           <label class="switch"> 
                           <input type="checkbox" name="vegan" @if ($product->vegan == 'yes')
                           checked
                           @endif value="no">
                           <span class="slider round"></span>
                           </label>
                        </div>
                     </div>
                     <label for="ean_code" class="col-md-2 control-label text-left">Vegetarian</label>
                     <div class="checkbox">
                        <label class="switch"> 
                        <input type="checkbox" name="vegetarian" @if ($product->vegetarian == 'yes')
                        checked
                        @endif value="no">
                        <span class="slider round"></span>
                        </label>
                     </div>
                  </div>
                    @endif
                  
                  @if($product->category_id == 19)
                      <div class="form-group row">
                     <label for="allergens" class="col-md-2 control-label text-left">Allergens</label>
                     <div class="col-md-4">
					   <input name="allergens" class="form-control form-control-sm" id="allergens"  value="{{$product->allergens}}" labelcol="2" type="text">
                       <!-- <div class="checkbox">
                           <label class="switch"> 
                           <input type="checkbox" name="allergens" @if ($product->allergens == 'yes')
                           checked
                           @endif value="no">
                           <span class="slider round"></span>
                           </label>
                        </div>-->
                     </div>
                     
                    </div>
					
					 <div class="form-group row">
                     <label for="gross_weight" class="col-md-2 control-label text-left">Gross Weight</label>
                     <div class="col-md-4">
					   <input name="gross_weight" class="form-control form-control-sm" id="gross_weight"  value="{{$product->gross_weight}}" labelcol="2" type="text">
                      
                     </div>
                     
                    </div>
                  @endif
                  
                  <div class="form-group row">
                    
                      <label for="warranty" class="col-md-2 control-label text-left">Warranty</label>
                      
                     <div class="col-md-4">
                        <select class="form-control form-control-sm" name="warranty" id="warranty" >
                           <option value="">Select Warranty</option>
                           
                           <option  value="3 months" {{ $product->warranty=='3 months' ? 'selected="selected"' : '' }}>3 months</option>
                           <option  value="6 months" {{ $product->warranty=='6 months' ? 'selected="selected"' : '' }}>6 months</option>
                           <option  value="1 months" {{ $product->warranty=='1 months' ? 'selected="selected"' : '' }}>1 months</option>
                           <option  value="18 months" {{ $product->warranty=='18 months' ? 'selected="selected"' : '' }}>18 months</option>
                           <option  value="1 year" {{ $product->warranty=='1 year' ? 'selected="selected"' : '' }}>1 year</option>
                           <option  value="2 year" {{ $product->warranty=='2 year' ? 'selected="selected"' : '' }}>2 year</option>
                           <option  value="3 year" {{ $product->warranty=='3 year' ? 'selected="selected"' : '' }}>3 year</option>
                           <option  value="4 year" {{ $product->warranty=='4 year' ? 'selected="selected"' : '' }}>4 year</option>
                           <option  value="5 year" {{ $product->warranty=='5 year' ? 'selected="selected"' : '' }}>5 year</option>
                           <option  value="No warranty" {{ $product->warranty=='No warranty' ? 'selected="selected"' : '' }}>No warranty</option>
                           
                        </select>
                     </div>

                     

                  </div>
                  <div class="form-group row">
                      <label for="status" class="col-md-2 control-label text-left">Status</label>
                     <div class="col-md-4">
                        <div class="checkbox">
                           <label class="switch"> 
                           <input type="checkbox" name="status" @if ($product->status == 1)
                           checked
                           @endif value="1">
                           <span class="slider round"></span>
                           </label>
                        </div>
                     </div>
                      @if($product->status == 1)
                     <label for="allergens" class="col-md-2 control-label text-left">Live</label>
                     <div class="col-md-4">
                        <div class="checkbox">
                           <label class="switch"> 
                           <input type="checkbox" name="live" @if ($product->live == 'yes')
                           checked
                           @endif value="no">
                           <span class="slider round"></span>
                           </label>
                        </div>
                     </div>
                    @endif 
                    </div>
                    
                    
					<div class="form-group row">
                         
				
									
                    <label  for="brand" class="col-md-12 control-label text-left">Select Attributes<span class="m-l-5 text-red">*</span></label>
                    <div class="col-md-12"><div class="row">
					<?php $attrs=explode(',',$product->attributes);?>
                      @if(!$attributes->isEmpty())
                        @foreach($attributes as $attr )
                          <div class="col" style="margin-top:10px">
                            <input value="{{$attr->id}}" <?php echo (in_array($attr->id,$attrs))?'checked':''; ?> id="attributes_{{$attr->id}}" name="attributes[]" type="checkbox">
                            {{$attr->attributes_name}}
                          </div>
                        @endforeach
                      @endif    
                    </div> 
                    </div>
                   
                    </div>
                    <div class="button-row d-flex mt-4">
                      @if(Auth::user()->can('products-edit'))
                      <button class="btn btn-primary ml-auto js-btn-next" type="submit" title="Next">Next</button>
                      @endif
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

function validateForm() {
	var lfckv = document.getElementById("has_expiry").checked;
  

  if(lfckv==false) {
    var result = confirm("Are you sure you want to save without expiry date of the product.");
    if (result) {
      return true;
    }
    else {
      return false;
    }
  }
  else
  {
    return true;
  }
}
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
	
	$('#seller').prop('disabled', true);
	$('#brand').prop('disabled', true);
	
		}); 
		</script>
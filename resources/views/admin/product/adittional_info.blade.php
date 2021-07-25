@extends('admin.layout')
@section('content')
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
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
    <div class="card shadow mb-4">
      <!-- <div class="card-header py-0 pt-2">
    
      </div>-->
      <div class="card-body"> 
        <!--multisteps-form-->
        <div class="multisteps-form">
          <!--progress bar-->
          <div class="row">
              
               @include('admin.product.menu')
            <!--<div class="col-12 col-lg-12 ml-auto mr-auto mb-4">-->
            <!--   <div class="multisteps-form__progress">-->
            <!--    <a href="{{route('product.edit',$product->id)}}"  class="col" title="General">General</a>-->
            <!--    <a href="javascript:void(0)" class="col" title="Pricing">Variants & Pricing</a>-->
            <!--    <a href="{{url('/admin/product-packaging',$product->id)}}"  class="col" title="Inventory">Packaging</a>-->
                <!--<a href="{{url('admin/product-create/images')}}" style="padding-left: 55px;" class="multisteps-form__progress-btn" title="Images">Images </a>-->
            <!--    <a href="javascript:void(0)" class="col"  title="SEO">SEO </a>-->
            <!--    <a href="{{url('/admin/product-additional',$product->id)}}" class="col" title="Other Options">Other Options </a>-->
            <!--    <a href="{{url('/admin/product-related',$product->id)}}"  class="col" title="Related Products">Related Products </a>-->
            <!--  </div>-->
            <!--</div>-->
          </div>
          <!--form panels-->
          <div class="row">
            <div class="col-12 col-lg-12 m-auto">
              <form class="multisteps-form__form" method="post" action="{{route('additional.save',$product->id)}}">
              @csrf
                               <h3 class="multisteps-form__title">Additional Info</h3>

               <div class="row">

              
<input type="hidden" class="form-control" id="product_id" value="{{ $product->id }}">




					<div class="col-md-6"><div class="form-row">
					 <label for="terms" class="control-label text-left">Search Terms (Enter with comma)<span class="m-l-5 text-red">*</span></label>
                      <textarea class="multisteps-form__textarea form-control" name="terms" placeholder="Search Terms">{{$keywords->keywords}}</textarea>
                    </div> </div>
                    <div class="col-md-6">
                        	<div class="form-row mt-4">
					 <label for="terms" class="col-md-2 control-label text-left">Taxes<span class="m-l-5 text-red">*</span></label>
					 <select class="form-control form-control-sm" name="taxes" id="taxes" >
                          <option value="">Select Tex</option>
                     @if(!$taxes->isEmpty())
                        @foreach($taxes as $attr )
						 <option <?php echo ($attr->percentage==$product->igst)?'selected':''; ?> value="{{$attr->percentage}}">{{$attr->name}}</option>
                          
                        @endforeach
                      @endif  
						</select>
                    </div>
                    </div>
                     <div class="col-md-12">
                        
                        	<div class="form-row">	
                        	<p class="mt-3 w-100">Features</p>
						 @if(!$features->isEmpty())
                        @foreach($features as $k=>$attr )
						<?php $bAmenities=explode(',',$product->features);?>
						  <?php //echo ($product->return_allowed==1)?'checked':''; ?>
						   @if(($attr->id==3 || $attr->id==6) && ($product->category_id == 3 || $product->category_id == 2))
                          <div class="col-md-3">
						   @if(!empty($bAmenities) && in_array($attr->id,$bAmenities))
                      <input  class="searchType" data-fea-id="{{$attr->id}}" type="checkbox"  id="features{{$k}}" name="features[]" value="{{$attr->id}}" checked>
                    @else
                      <input class="searchType" data-fea-id="{{$attr->id}}" type="checkbox"  id="features{{$k}}" name="features[]" value="{{$attr->id}}">
					  @endif
                            
                           {{$attr->name}}
						     <?php $f_values=FeatureValue($attr->id); ?>
						   <div  class="form-row feature_val_{{$attr->id}}">
						    @if(!$f_values->isEmpty())
						   <div class="col-md-12">
						   <select class="form-control form-control-sm" name="feature_values[]" id="feature_values{{$attr->id}}" multiple>
						
						    @foreach($f_values as $pf )
							  @if(!empty($product_features) && in_array($pf->id,$product_features))
							<option selected value="{{$pf->id}}">{{$pf->value_name}}</option>
							@else
							<option value="{{$pf->id}}">{{$pf->value_name}}</option>
							@endif
							
							@endforeach
							
						   </select>
						   
						   </div>
						   @endif
						   </div>
                          </div>
						  @endif
						  @if($attr->id==7 )
                          <div class="col-md-3">
						   @if(!empty($bAmenities) && in_array($attr->id,$bAmenities))
                      <input  class="searchType" data-fea-id="{{$attr->id}}" type="checkbox"  id="features{{$k}}" name="features[]" value="{{$attr->id}}" checked>
                    @else
                      <input class="searchType" data-fea-id="{{$attr->id}}" type="checkbox"  id="features{{$k}}" name="features[]" value="{{$attr->id}}">
					  @endif
                            
                           {{$attr->name}}
						     <?php $f_values=FeatureValue($attr->id); ?>
						   <div  class="form-row feature_val_{{$attr->id}}">
						    @if(!$f_values->isEmpty())
						   <div class="col-md-12">
						   <select class="form-control form-control-sm" name="feature_values[]" id="feature_values{{$attr->id}}" multiple>
						
						    @foreach($f_values as $pf )
							  @if(!empty($product_features) && in_array($pf->id,$product_features))
							<option selected value="{{$pf->id}}">{{$pf->value_name}}</option>
							@else
							<option value="{{$pf->id}}">{{$pf->value_name}}</option>
							@endif
							
							@endforeach
							
						   </select>
						   
						   </div>
						   @endif
						   </div>
                          </div>
						  @endif
                        @endforeach
                      @endif  	
						
					
                   
					
                    </div>
                        
                    </div>
                    <div class="col-md-6">
                        
                        	<div class="form-row">	
                        	<p class="mt-3 w-100">Product Return and exchange</p>
						<div class="col-md-6">
                            <input value="1" <?php echo ($product->return_allowed==1)?'checked':''; ?> id="return_allowed" name="return_allowed" type="checkbox">
                            Return Allowed
                          </div>
					
                   
						<div class="col-md-6" >
                            <input value="1" <?php echo ($product->exchange_allowed==1)?'checked':''; ?> id="exchange_allowed" name="exchange_allowed" type="checkbox">
                            Exchange Allowed
                          </div>
					
                    </div>
                        
                    </div>
                    
                    <div class="col-md-6">
                           <div class="form-row">
                              <label for="ean_code" class="control-label text-left">Specifications<span class="m-l-5 text-red">*</span></label>
                              <textarea name="specifications" class="form-control form-control-sm" id="specifications" labelcol="2" type="text">{{$product->specifications}}</textarea>
                           </div>
                        </div>
						 @if($product->category_id == 3 || $product->category_id == 2)
                        <div class="col-md-6">
                           <div class="form-row">
                              <label for="material_care" class="control-label text-left">Material & care<span class="m-l-5 text-red">*</span></label>
                              <?php
                                 $str_arr = explode (",", $product->material_care);
                                 
                                 // print_r($str_arr); 
                                 
                                 
                                 
                                 ?>
                              <select class="form-control form-control-sm" name="material_care[]" id="material_care" multiple>
                                 <option value="">Material & Care</option>
                                 @if(!$material_care->isEmpty())
                                 @foreach ($material_care as $key => $sel)
                                 <?php $select=""; if(count($str_arr)>0 && !empty($str_arr)){
                                    foreach($str_arr as $strarr){
                                    
                                      if($strarr == $sel->id){
                                    
                                          $select="selected='selected'";
                                    
                                      }
                                    
                                    }}?>
                                 <option <?php echo $select ?> value="{{$sel->id}}">{{ $sel->name }}</option>
                                 @endforeach
                                 @endif
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-row">
                              <label for="size_fit" class="col-md-2 control-label text-left">Size & Fit<span class="m-l-5 text-red">*</span></label>
                              <?php
                                 $str_arr = explode (",", $product->size_fit);
                                 
                                 // print_r($str_arr); 
                                 
                                 
                                 
                                 ?>
                              <select class="form-control form-control-sm" name="size_fit[]" id="size_fit" multiple>
                                 <option value="">Size & Fit</option>
                                 @if(!$size_fit->isEmpty())
                                 @foreach ($size_fit as $key => $sel)
                                 <?php $select=""; if(count($str_arr)>0 && !empty($str_arr)){
                                    foreach($str_arr as $strarr){
                                    
                                      if($strarr == $sel->id){
                                    
                                          $select="selected='selected'";
                                    
                                      }
                                    
                                    }}?>
                                 <option <?php echo $select ?> value="{{$sel->id}}">{{ $sel->name }}</option>
                                 @endforeach
                                 @endif
                              </select>
                           </div>
                        </div>
						@endif
                    
                    <div class="col-md-6">
                         
				<div class="row mt-3">
									
                   
                    </div>
                    </div>
                    <hr class="w-100">
                    <div class="col-12 mt-3">
                   <p>Select Size Guide</p>  
                   
                   <div class="w-100">
                       
                         <div class="form-check-inline">
  <label class="form-check-label">
    <input value="0" type="radio" <?php echo ($product->size_guid==0)?'checked':''; ?> class="form-check-input" name="optradio">Sorry! Size Guide Not needed.
  </label>
</div>
@if(!$sizes->isEmpty())
                        @foreach($sizes as $size )
                       
                       <div class="form-check-inline">
  <label class="form-check-label">
    <input value="{{$size->id}}" <?php echo ($product->size_guid==$size->id)?'checked':''; ?> type="radio" onClick="checkboxSelectGuide(this.value)" class="form-check-input" name="optradio">{{$size->name}}
	<!--<img src="{{url('public/images/')}}/{{$size->image}}" width="300" class="img-thumbnail">-->
  </label>
</div>
@endforeach
@endif


                   
                    </div>
                    </div>
					
					   <div class="col-12 mt-3">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tags</h6>
            </div>
            
          
                <div class="box-body">
              <div class=" col-lg-12 py-2">
          <!--      <div class="alert alert-success" style="display:none;"><p class="add-message"></p></div>-->
          <!--<div class="alert alert-danger" style="display:none;"><p class="remove-message"></p></div>-->
        <label>Select tags</label>   
        <div class="table-responsive">
                <table class="table table-bordered" id="product_tag_table" style="width:100%">
                    <thead> 
                    <th>Id </th>
                    <th>Tag Name</th>
                    
                    </thead> 
                    </table>
              </div>
            
        </div>
        </div>
          
            </div>
            <div class="col-12 mt-3">
                           <div class="card-header py-3">
                              <h6 class="m-0 font-weight-bold text-primary">Size</h6>
                           </div>
                           <div class="box-body">
                              <div class=" col-lg-12 py-2">
                                 <!--      <div class="alert alert-success" style="display:none;"><p class="add-message"></p></div>-->
                                 <!--<div class="alert alert-danger" style="display:none;"><p class="remove-message"></p></div>-->
                                 <label>Select size</label>

                                 <div class="table-responsive">
                                   
                                    <table class="table table-bordered" id="users_list" width="100%" cellspacing="0">
                                        <thead align="center"> 
                                         
                                         
                                          
                                         </thead> 
                                          <tbody align="" class="size_section" id="bodyData" >
										 @if(!$productsizeguide->isEmpty())
											@php $ix='';
										$iz=0;
											$iy=0; @endphp
                        @foreach($productsizeguide as $size )
						@if($ix!=$size->size_name)
							@if($ix!='')
										<td><a href="javascript:void(0)" class="btn btn-danger less_more_size" style="margin-top:34px;"><i class="fa fa-minus"></i></a></td>	
							</tr>	
							@php $iy=1; @endphp
							@endif
							<tr>
							@php $iz=0; $ix=$size->size_name;   @endphp
					@endif
					
					<input type="hidden" name="label_count" value="{{count($productsizeguide_count)}}">
					@if($iz==0)
					<td><label>Size</label><input type="text" name="size_name[]" class="form-control" value="{{$size->size_name}}" ></td>
				 @php $iz=1; @endphp 
				
				@endif
					
		 <td><label>{{$size->All_Size_Master_Value->value_name}}</label><input type="hidden" name="master_label[]" class="form-control" value="{{$size->master_label}}" ><input type="text" name="value_name[]" class="form-control" value="{{$size->value_name}}" ></td>
		
		
					@endforeach
						<td><a href="javascript:void(0)" class="btn btn-danger less_more_size" style="margin-top:34px;"><i class="fa fa-minus"></i></a></td></tr>
						<tr>
						<td><label>Size</label><input type="text" name="size_name[]" class="form-control" value="" ></td>
						@foreach($productsizeguide_count as $psize)
						<td><label>{{$psize->All_Size_Master_Value->value_name}}</label><input type="hidden" name="master_label[]" class="form-control" value="{{$psize->master_label}}" ><input type="text" name="value_name[]" class="form-control" value="" ></td>
						@endforeach
						
						<td><a href="javascript:void(0)" class="btn btn-success add_more_size" style="margin-top:34px;"><i class="fa fa-plus"></i></a></td>
						</tr>
					@endif
                                    
                                    

                                  </tbody>
                                        </table>
                                  </div>


                                 
                              </div>
                           </div>
                        </div>
                    <div class="col-md-12"> <div class="button-row d-flex mt-4">
                      <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                      @if(Auth::user()->can('products-edit'))
                      <button class="btn btn-success ml-auto" type="submit" title="Send">Submit</button>
                      @endif
                    </div></div>
                    </div>
               
              </form>
            </div>
          </div>
        </div> 
      </div>
    </div> 
  </div> 
@endsection
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
 $(document).ready(function(){
 $('.searchType').click(function() {
      //-->this will alert id of checked checkbox.
       if(this.checked){
		  var atr_id=$(this).attr('data-fea-id');
		    $.ajax({
				url:"{{ url('/admin/getFeaturesValueById') }}",
			   data:{
				 _token:'<?php echo csrf_token();?>',
				 id:atr_id,			 
			   },
                type: "POST",
                
                success: function(data) {
                    //alert('it worked');
                    
				   $('.feature_val_'+atr_id).html('');
				   var html='';
				   var obj = jQuery.parseJSON(data);
                    html+='<div class="col-md-12"><select class="form-control form-control-sm" name="feature_values[]" id="feature_values'+atr_id+'" multiple>'
					$.each( obj, function( key, value ) {
					  //alert( key + ": " + value );
					 // html+=value.value_name;
					html+='<option value="'+value.id+'">'+value.value_name+'</option>';
					});
					html+='</select></div>';
					
                             					//alert(html);
					$('.feature_val_'+atr_id).html(html);
                },
                 error: function() {
                   
                }
            });
	   }
 });
 });
</script>
 <script>

 function checkboxSelectTag(id) {
//  alert()

  $("#overlay").fadeIn(300);
$collection_id=$("#product_id").val();
     // console.log($collection_id);
    $.ajax({
       type:'GET',
       url:"{{ route('save.product.tag') }}",
       data:{
         _token:'<?php echo csrf_token();?>',
         id:id,
         collection_id:$collection_id,
         
       },
       success:function(data){
         //alert('updated')
         var obj = jQuery.parseJSON(data);
         //console.log(obj);
         if(obj.status==true){
           $('.alert-success').show();
            $('.add-message').html(obj.message);
          
          setTimeout(function() {
            $('.alert-success').fadeOut('slow');
          }, 2000);
         }
         if(obj.status==false){
           $('.alert-danger').show();
            $('.remove-message').html(obj.message);
          
          setTimeout(function() {
            $('.alert-danger').fadeOut('slow');
          }, 2000);
         }
       
        
       }
    }).done(function() {
      setTimeout(function(){
        $("#overlay").fadeOut(300);
      },500);
    });

   
}
 
 </script>
 
<script>
   function checkboxSelectGuide(id) {
   
    $("#overlay").fadeIn(300);	 
   
   $collection_id=$("input[name='optradio']:checked").val();
   // $collection_id=$("#optradio").val();
   
       // console.log($collection_id);
   // $("#bodyData").remove();
      $.ajax({
   
         type:'GET',
   
         url:"{{ route('list.product.size') }}",
   
         data:{
   
           _token:'<?php echo csrf_token();?>',
   
           id:id,
   
           collection_id:$collection_id,
   
           
   
         },
         dataType: 'json',
         cache: false,
         async: true,

         // beforeSend:function(xhr){
         //  $("#bodyData").append("<tr>"+"<td>"+"</td>"+"</tr>");
         // },
   
         success:function(response){
            $("#bodyData").html('');
         console.log(response.data);
        // var datas= jQuery.parseJSON(response.data);
		 var html='<tr><input type="hidden" name="label_count" value="'+response.data.length+'"><td><label>Size</label><input type="text" name="size_name[]" class="form-control" ></td>';
		 $.each(response.data, function(k, v) {
			html+='<td><label>'+v.value_name+'</label><input type="hidden" name="master_label[]" class="form-control" value="'+v.id+'" ><input type="text" name="value_name[]" class="form-control" ></td>';
		});
		html+='<td><a href="javascript:void(0)" class="btn btn-success add_more_size" style="margin-top:34px;"><i class="fa fa-plus"></i></a></td></tr>';
		$("#bodyData").append(html);

        /* for(var i=0; i<(response.data).length; i++){

                var id = response['data'][i].id;
                var size1 = response['data'][i].value_name;
                var size2 = response['data'][i].value_name2;
                var size3 = response['data'][i].value_name3;
                var size4 = response['data'][i].value_name4;
                var size5 = response['data'][i].value_name5;
                var size6 = response['data'][i].value_name6;
                
                  var size_1 = size1.replace(" ", "_");
                  var size_2 = size2.replace(" ", "_");
                  var size_3 = size3.replace(" ", "_");
                  var size_4 = size4.replace(" ", "_");
                  //var size_5 = size5.replace(" ", "-");
                  if(size6 == '' || size6 == null)
                  {

                  }
                  else
                  {

                  var size_6 = size6.replace(" ", "-");
                  }

                if(!size2 && !size3 && !size4 && !size5 && !size6){
                  var tr_str = "<tr>" +
                  "<td>"+'<input type="hidden" name="master_id[]" class="form-control" value="'+id+'" style="width:23%;display: inline;">'+" "+size1+" "+'<input type="text" name="'+size_1+'[]" class="form-control" style="width:23%;display: inline;">'+"</td>"+

                    "</tr>";
                  $("#bodyData").append(tr_str);
                 }
                 else if(!size5 && !size6){

                  var tr_str = "<tr>" +
                  "<td>"+'<input type="hidden" name="master_id[]" class="form-control" value="'+id+'" style="width:23%;display: inline;">'+" "+ size1+" "+size2+" "+'<input type="text" class="form-control" name="'+size_2+'[]" style="width:23%;display: inline;">'+" "+size3+" "+'<input type="text" class="form-control" name="'+size_3+'[]" style="width:23%;display: inline;">'+" "+ size4+" "+'<input type="text" name="'+size_4+'[]" class="form-control" style="width:23%;display: inline;">'+"</td>"+

                    "</tr>";
                  $("#bodyData").append(tr_str);
                 }
                 else if(!size6){
                  var tr_str = "<tr>" +
                  "<td>"+'<input type="hidden" name="master_id[]" class="form-control" value="'+id+'" style="width:23%;display: inline;">'+" "+size1+" " +size2+" "+'<input type="text" class="form-control" name="'+size_2+'[]" style="width:23%;display: inline;">'+" "+size3+" "+'<input type="text" class="form-control" name="'+size_3+'[]" style="width:23%;display: inline;">'+" "+ size4+" "+'<input type="text" name="'+size_4+'[]" class="form-control" style="width:23%;display: inline;">'+" "+ size5+" "+'<input type="text" name="'+size_5+'[]" class="form-control" style="width:23%;display: inline;">'+"</td>"+

                    "</tr>";
                  $("#bodyData").append(tr_str);
                 }
                 else{
                  var tr_str = "<tr>" +
                  "<td>"+'<input type="hidden" name="master_id[]" class="form-control" value="'+id+'" style="width:23%;display: inline;">'+" "+size1+" "+size2+" "+'<input type="text" class="form-control" name="'+size_2+'[]" style="width:23%;display: inline;">'+" "+size3+" "+'<input type="text" class="form-control" name="'+size_3+'[]" style="width:23%;display: inline;">'+" "+ size4+" "+'<input type="text" name="'+size_4+'[]" class="form-control" style="width:23%;display: inline;">'+" "+ size5+" "+'<input type="text" name="'+size_5+'[]" class="form-control" style="width:23%;display: inline;">'+" "+ size6+" "+'<input type="text" name="'+size_6+'[]" class="form-control" style="width:23%;display: inline;">'+"</td>"+

                    "</tr>";
                  $("#bodyData").append(tr_str);
                 }

                 


         }*/

       

       }
   
      }).done(function() {
      setTimeout(function(){
        $("#overlay").fadeOut(300);
      },500);
    });
   
   }
   
   $(document).on('click','.add_more_size',function(e){

	e.preventDefault();

	var size=$('#size').html();

	
$collection_id=$("input[name='optradio']:checked").val();
  
      $.ajax({
   
         type:'GET',
   
         url:"{{ route('list.product.size') }}",
   
         data:{
   
           _token:'<?php echo csrf_token();?>',
   
           id:$("input[name='optradio']:checked").val(),
   
           collection_id:$collection_id,
   
           
   
         },
         dataType: 'json',
         cache: false,
         async: true,

         success:function(response){
          
		 var html='<tr><td><label>Size</label><input type="text" name="size_name[]" class="form-control" ></td>';
		 $.each(response.data, function(k, v) {
			html+='<td><label>'+v.value_name+'</label><input type="hidden" name="master_label[]" class="form-control" value="'+v.id+'" ><input type="text" name="value_name[]" class="form-control" ></td>';
		});
		html+='<td><a href="javascript:void(0)" class="btn btn-danger less_more_size" style="margin-top:34px;"><i class="fa fa-minus"></i></a></td></tr>';
		$(".size_section").append(html);
		 }
	  });
	

});



$(document).on('click','.less_more_size',function(e){

	e.preventDefault();

	$(this).parent().parent('tr').remove();

});
</script>
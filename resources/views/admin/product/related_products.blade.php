@extends('admin.layout')
@section('content')
  <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>-->
  <style>
  
  .multisteps-form__progress {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(0, 1fr));
      font-size:14px; background:#fff; padding:10px;
    }
.multisteps-form__progress .col {border-left:solid 1px #000; border-bottom:solid 1px #000; text-align:center; border-right:solid 1px #000;border-top:solid 1px #000;}

    /*.multisteps-form__progress {*/
    /*  display: grid;*/
    /*  grid-template-columns: repeat(auto-fit, minmax(0, 1fr));*/
    /*}*/

    /*.multisteps-form__progress-btn {*/
    /*  transition-property: all;*/
    /*  transition-duration: 0.15s;*/
    /*  transition-timing-function: linear;*/
    /*  transition-delay: 0s;*/
    /*  position: relative;*/
    /*  padding-top: 20px;*/
    /*  color: rgba(108, 117, 125, 0.7);*/
    /*  text-indent: -9999px;*/
    /*  border: none;*/
    /*  background-color: transparent;*/
    /*  outline: none !important;*/
    /*  cursor: pointer;*/
    /*}*/
    /*@media (min-width: 500px) {*/
    /*  .multisteps-form__progress-btn {*/
    /*    text-indent: 0;*/
    /*  }*/
    /*}*/
    /*.multisteps-form__progress-btn:before {*/
    /*  position: absolute;*/
    /*  top: 0;*/
    /*  left: 50%;*/
    /*  display: block;*/
    /*  width: 13px;*/
    /*  height: 13px;*/
    /*  content: '';*/
    /*  -webkit-transform: translateX(-50%);*/
    /*          transform: translateX(-50%);*/
    /*  transition: all 0.15s linear 0s, -webkit-transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;*/
    /*  transition: all 0.15s linear 0s, transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;*/
    /*  transition: all 0.15s linear 0s, transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s, -webkit-transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;*/
    /*  border: 2px solid currentColor;*/
    /*  border-radius: 50%;*/
    /*  background-color: #fff;*/
    /*  box-sizing: border-box;*/
    /*  z-index: 3;*/
    /*}*/
    /*.multisteps-form__progress-btn:after {*/
    /*  position: absolute;*/
    /*  top: 5px;*/
    /*  left: calc(-50% - 13px / 2);*/
    /*  transition-property: all;*/
    /*  transition-duration: 0.15s;*/
    /*  transition-timing-function: linear;*/
    /*  transition-delay: 0s;*/
    /*  display: block;*/
    /*  width: 100%;*/
    /*  height: 2px;*/
    /*  content: '';*/
    /*  background-color: currentColor;*/
    /*  z-index: 1;*/
    /*}*/
    /*.multisteps-form__progress-btn:first-child:after {*/
    /*  display: none;*/
    /*}*/
    /*.multisteps-form__progress-btn.js-active {*/
    /*  color: #007bff;*/
    /*}*/
    /*.multisteps-form__progress-btn.js-active:before {*/
    /*  -webkit-transform: translateX(-50%) scale(1.2);*/
    /*          transform: translateX(-50%) scale(1.2);*/
    /*  background-color: currentColor;*/
    /*}*/

    /*.multisteps-form__form {*/
    /*  position: relative;*/
    /*}*/

    /*.multisteps-form__panel {*/
    /*  position: absolute;*/
    /*  top: 0;*/
    /*  left: 0;*/
    /*  width: 100%;*/
    /*  height: 0;*/
    /*  opacity: 0;*/
    /*  visibility: hidden;*/
    /*}*/
    /*.multisteps-form__panel.js-active {*/
    /*  height: auto;*/
    /*  opacity: 1;*/
    /*  visibility: visible;*/
    /*}*/
    /*.multisteps-form__panel[data-animation="scaleOut"] {*/
    /*  -webkit-transform: scale(1.1);*/
    /*          transform: scale(1.1);*/
    /*}*/
    /*.multisteps-form__panel[data-animation="scaleOut"].js-active {*/
    /*  transition-property: all;*/
    /*  transition-duration: 0.2s;*/
    /*  transition-timing-function: linear;*/
    /*  transition-delay: 0s;*/
    /*  -webkit-transform: scale(1);*/
    /*          transform: scale(1);*/
    /*}*/
    /*.multisteps-form__panel[data-animation="slideHorz"] {*/
    /*  left: 50px;*/
    /*}*/
    /*.multisteps-form__panel[data-animation="slideHorz"].js-active {*/
    /*  transition-property: all;*/
    /*  transition-duration: 0.25s;*/
    /*  transition-timing-function: cubic-bezier(0.2, 1.13, 0.38, 1.43);*/
    /*  transition-delay: 0s;*/
    /*  left: 0;*/
    /*}*/
    /*.multisteps-form__panel[data-animation="slideVert"] {*/
    /*  top: 30px;*/
    /*}*/
    /*.multisteps-form__panel[data-animation="slideVert"].js-active {*/
    /*  transition-property: all;*/
    /*  transition-duration: 0.2s;*/
    /*  transition-timing-function: linear;*/
    /*  transition-delay: 0s;*/
    /*  top: 0;*/
    /*}*/
    /*.multisteps-form__panel[data-animation="fadeIn"].js-active {*/
    /*  transition-property: all;*/
    /*  transition-duration: 0.3s;*/
    /*  transition-timing-function: linear;*/
    /*  transition-delay: 0s;*/
    /*}*/
    /*.multisteps-form__panel[data-animation="scaleIn"] {*/
    /*  -webkit-transform: scale(0.9);*/
    /*          transform: scale(0.9);*/
    /*}*/
    /*.multisteps-form__panel[data-animation="scaleIn"].js-active {*/
    /*  transition-property: all;*/
    /*  transition-duration: 0.2s;*/
    /*  transition-timing-function: linear;*/
    /*  transition-delay: 0s;*/
    /*  -webkit-transform: scale(1);*/
    /*          transform: scale(1);*/
    }
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
            <!--    <a href="{{url('admin/product-create/basic')}}" style="padding-left: 55px;" class="multisteps-form__progress-btn" title="General">General</a>-->
            <!--    <a href="{{url('admin/product-create/pricing')}}" style="padding-left: 55px;" class="multisteps-form__progress-btn" title="Pricing">Pricing</a>-->
            <!--    <a href="{{url('/admin/product-packaging',$product->id)}}" style="padding-left: 55px;" class="multisteps-form__progress-btn" title="Inventory">Packaging</a>-->
            <!--    <a href="{{url('admin/product-create/images')}}" style="padding-left: 55px;" class="multisteps-form__progress-btn" title="Images">Images </a>-->
            <!--    <a href="{{url('admin/product-create/seo')}}" style="padding-left: 55px;" class="multisteps-form__progress-btn"  title="SEO">SEO </a>-->
            <!--    <a href="{{url('admin/product-create/aditionalInfo')}}" style="padding-left: 55px;" class="multisteps-form__progress-btn" title="Other Options">Other Options </a>-->
            <!--    <a href="{{url('admin/product-create/relatedProducts')}}" style="padding-left: 55px;" class="multisteps-form__progress-btn js-active" title="Related Products">Related Products </a>-->
            <!--  </div>-->
            <!--</div>-->
          </div>
          <!--form panels-->
          <div class="row">
            <div class="col-12 col-lg-12 m-auto">
              <form class="multisteps-form__form" method="post" action="{{url('admin/product-create/relatedProducts')}}">
              @csrf
                 
                <!--single form panel-->
                <div class="" data-animation="scaleIn">
                  <h3 class="multisteps-form__title">Related Products</h3>
                  <div class="multisteps-form__content"> 
                    <div class="alert alert-success" style="display:none;"><p class="add-message"></p></div>
          <div class="alert alert-danger" style="display:none;"><p class="remove-message"></p></div>
                    <div class="card-body">
                      
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" style="width:100%">
                            <thead> 
                            <th>Id</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <!--<th>Price</th>-->
                                                        
                            </thead>

                            <tbody>

                    @php($count=0)
                      
<input type="text" name="product_id" id="product_id" value="{{$product->id}}" style="display: none;">
                    @forelse($related_products as $taxes)
                      <?php
                        $check=\App\Related_products::where('related_products_id',$taxes->id)->where('product_id',$product->id)->first();
                      ?>
                    @php($count++)

                    
                                                
                      <tr align="center">
                        @if(Auth::user()->can('products-edit'))
                        @if($check) 
                            <td><input class="product-id-checked" type="checkbox" name="brand_id[]" checked="checked"onClick="checkboxSelect(this.value)" value="{{$taxes->id}}"></td>
                        @else 
                            <td><input class="product-id-checked" type="checkbox" name="brand_id[]" onClick="checkboxSelect(this.value)" value="{{$taxes->id}}"></td>
                        @endif
                        @endif
                          
                          <td>{{ $taxes->product_name }}</td>
						  <?php $variant=getProductSingleVariantById($taxes->id); ?>
						  @if(!empty($variant))
                          <td><img src="{{$variant->img}}" width="100" height="100"></td>
                          <!--<td>{{$variant->offer_price}}</td>-->
                          @else
                            <td><img src="https://www.riobeauty.co.uk/images/product_image_not_found.gif" width="100" height="100"></td>
						  @endif
                      </tr>
                      
                      @empty
                      <tr align="center">
                          <td colspan="2">No entries found.</td>
                      </tr>
                      

                      

                    @endforelse
                    
                  </tbody>

                            </table>
                      </div>
                    </div>   
                    <div class="row">
                      <div class="button-row d-flex mt-4 col-12">
                        <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                        @if(Auth::user()->can('products-edit'))
                        <button class="btn btn-primary ml-auto js-btn-next" type="submit" title="Next">Next</button>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div> 
      </div>
    </div> 
  </div> 
@endsection
 
 <script type="text/javascript">
   function checkboxSelect(id) {
    var product_id = Number($('#product_id').val());
    $.ajax({
       type:'GET',
       url:"{{ route('relatedproduct') }}",
       data:{
         _token:'<?php echo csrf_token();?>',
         id:id,
         product_id:product_id

         
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
    });
   

   
}
 </script>
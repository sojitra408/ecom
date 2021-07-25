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
    /*}*/
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
            <!--    <a href="{{url('admin/product-create/packaging')}}" style="padding-left: 55px;" class="multisteps-form__progress-btn js-active" title="Inventory">Packaging</a>-->
            <!--    <a href="{{url('admin/product-create/images')}}" style="padding-left: 55px;" class="multisteps-form__progress-btn" title="Images">Images </a>-->
            <!--    <a href="{{url('admin/product-create/seo')}}" style="padding-left: 55px;" class="multisteps-form__progress-btn"  title="SEO">SEO </a>-->
            <!--    <a href="{{url('admin/product-create/aditionalInfo')}}" style="padding-left: 55px;" class="multisteps-form__progress-btn" title="Other Options">Other Options </a>-->
            <!--    <a href="{{url('admin/product-create/relatedProducts')}}" style="padding-left: 55px;" class="multisteps-form__progress-btn" title="Related Products">Related Products </a>-->
            <!--  </div>-->
            <!--</div>-->
          </div>
          <!--form panels-->
          <div class="row">
            <div class="col-12 col-lg-12">
              <form class="multisteps-form__form" method="post" action="{{route('packaging.save',$product->id)}}">
              @csrf
                <!--single form panel-->
                <div class="" data-animation="scaleIn">
                  <h3 class="multisteps-form__title">Packaging</h3>
                  <span class="multisteps-form__title">Dimensions-(cms)</span>
                  <div class="multisteps-form__content">
                    <div class="form-group row">
                      <!--<label for="pack_type" class="col-md-2 control-label text-left">Pack Type<span class="m-l-5 text-red">*</span></label>-->
                      <!--<div class="col-md-4">-->
                      <!--  <input name="pack_type" class="form-control form-control-sm" id="pack_type" value="" labelcol="2" type="text">-->
                      <!--</div>-->
                      <!--<label for="weight" class="col-md-2 control-label text-left">Weight<span class="m-l-5 text-red">*</span></label>-->
                      <!--<div class="col-md-4">-->
                      <!--  <input name="weight" class="form-control form-control-sm" id="weight" value="" labelcol="2" type="text">-->
                      <!--</div>-->
                      <!--<label for="dimensions" class="col-md-2 control-label text-left">Dimensions(cms)<span class="m-l-5 text-red">*</span></label>-->
                      <!--<div class="col-md-4">-->
                      <!--  <input name="dimensions" class="form-control form-control-sm" id="dimensions" value="{{$product->dimensions}}" labelcol="2" type="text">-->
                      <!--</div>-->
                      <label for="breadth" class="col-md-2 control-label text-left">Breadth<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <input name="breadth" class="form-control form-control-sm" id="breadth" value="{{$product->breadth}}" labelcol="2" type="number">
                      </div>
                      <label for="width" class="col-md-2 control-label text-left">Width<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <input name="width" class="form-control form-control-sm" id="width" value="{{$product->width}}" labelcol="2" type="number">
                      </div>
                    </div> 
          
                    <!--<div class="form-group row">-->
                    <!--  <label for="base_unit" class="col-md-2 control-label text-left">Base Unit<span class="m-l-5 text-red">*</span></label>-->
                    <!--  <div class="col-md-4">-->
                    <!--    <input name="base_unit" class="form-control form-control-sm" id="base_unit" value="" labelcol="2" type="text">-->
                    <!--  </div> -->
                    <!--  <label for="gross_weight" class="col-md-2 control-label text-left">Gross Weight<span class="m-l-5 text-red">*</span></label>-->
                    <!--  <div class="col-md-4">-->
                    <!--    <input name="ross_weight" class="form-control form-control-sm" id="gross_weight" value="" labelcol="2" type="text">-->
                    <!--  </div>-->
                    <!--</div> -->
                    <div class="form-group row">
                      <!--<label for="length" class="col-md-2 control-label text-left">Length<span class="m-l-5 text-red">*</span></label>-->
                      <!--<div class="col-md-4">-->
                      <!--  <input name="length" class="form-control form-control-sm" id="length" value="" labelcol="2" type="text">-->
                      <!--</div> -->
                      
                      <label for="height" class="col-md-2 control-label text-left">Height<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <input name="height" class="form-control form-control-sm" id="height" value="{{$product->height}}" labelcol="2" type="number">
                      </div>
                    </div> 
                    <!--<div class="form-group row">-->
                    <!--  <label for="height" class="col-md-2 control-label text-left">Height<span class="m-l-5 text-red">*</span></label>-->
                    <!--  <div class="col-md-4">-->
                    <!--    <input name="height" class="form-control form-control-sm" id="height" value="" labelcol="2" type="text">-->
                    <!--  </div>-->
                    
                    <!--  <label for="master_carton" class="col-md-2 control-label text-left">Master Carton<span class="m-l-5 text-red">*</span></label>-->
                    <!--  <div class="col-md-4">-->
                    <!--    <input name="master_carton" class="form-control form-control-sm" id="master_carton" value="" labelcol="2" type="text">-->
                    <!--  </div>-->
                    <!--</div> -->
                    <!--<div class="form-group row">-->
                    <!--  <label for="master_cartonL" class="col-md-2 control-label text-left">Master Carton Length<span class="m-l-5 text-red">*</span></label>-->
                    <!--  <div class="col-md-4">-->
                    <!--    <input name="master_cartonL" class="form-control form-control-sm" id="master_cartonL" value="" labelcol="2" type="text">-->
                    <!--  </div> -->
                    <!--  <label for="master_cartonB" class="col-md-2 control-label text-left">Master Carton Breadth<span class="m-l-5 text-red">*</span></label>-->
                    <!--  <div class="col-md-4">-->
                    <!--    <input name="master_cartonB" class="form-control form-control-sm" id="master_cartonB" value="" labelcol="2" type="text">-->
                    <!--  </div>-->
                    <!--</div> -->
                    <!--<div class="form-group row">-->
                    <!--  <label for="master_cartonH" class="col-md-2 control-label text-left">Master Carton Height<span class="m-l-5 text-red">*</span></label>-->
                    <!--  <div class="col-md-4">-->
                    <!--    <input name="master_cartonH" class="form-control form-control-sm" id="master_cartonH" value="" labelcol="2" type="text">-->
                    <!--  </div>-->
                    <!--  <label for="net_weight" class="col-md-2 control-label text-left">Net Weight<span class="m-l-5 text-red">*</span></label>-->
                    <!--  <div class="col-md-4">-->
                    <!--    <input name="net_weight" class="form-control form-control-sm" id="net_weight" value="" labelcol="2" type="text">-->
                    <!--  </div>-->
                    <!--</div>  -->
                    <span>Carton Size</span>
                    <div class="form-group row">
                        <label for="carton" class="col-md-2 control-label text-left">Carton Units(number)<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <input name="carton" class="form-control form-control-sm" id="carton" value="{{$product->carton}}" labelcol="2" type="number">
                      </div>
                    </div>
                    <span>Package size</span>
                    <div class="form-group row">
                        <label for="package_width" class="col-md-2 control-label text-left">Width<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <input name="package_width" class="form-control form-control-sm" id="package_width" value="{{$product->package_width}}" labelcol="2" type="number">
                      </div>
                      <label for="package_breadth" class="col-md-2 control-label text-left">Breadth<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <input name="package_breadth" class="form-control form-control-sm" id="package_breadth" value="{{$product->package_breadth}}" labelcol="2" type="number">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="package_height" class="col-md-2 control-label text-left">Height<span class="m-l-5 text-red">*</span></label>
                      <div class="col-md-4">
                        <input name="package_height" class="form-control form-control-sm" id="package_height" value="{{$product->package_height}}" labelcol="2" type="number">
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
 
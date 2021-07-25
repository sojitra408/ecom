@extends('admin.layout')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
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
      <div class="multisteps-form">
        <!--progress bar-->
        <div class="row">
          <div class="col-12 col-lg-12 ml-auto mr-auto mb-4">
            <div class="multisteps-form__progress">
              <button class="multisteps-form__progress-btn js-active" type="button" title="General">General</button>
              <button class="multisteps-form__progress-btn" type="button" title="Pricing">Pricing</button>
              <button class="multisteps-form__progress-btn" type="button" title="Inventory">Packaging</button>
              <button class="multisteps-form__progress-btn" type="button" title="Images">Images </button>
              <button class="multisteps-form__progress-btn" type="button" title="SEO">SEO </button>
              <button class="multisteps-form__progress-btn" type="button" title="Other Options">Other Options </button>
             <button class="multisteps-form__progress-btn" type="button" title="Related Products">Related Products </button>
            </div>
          </div>
        </div>
        <!--form panels-->
        <div class="row">
          <div class="col-12 col-lg-12 m-auto">
            <form class="multisteps-form__form">
              <!--single form panel-->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                <h3 class="multisteps-form__title">General Info</h3>
                <div class="multisteps-form__content">
             
             
              
              <div class="form-group row">
                <label for="seller" class="col-md-2 control-label text-left">Seller Company<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4"><select class="form-control form-control-sm" id="seller">
     @if(!$seller->isEmpty())
		@foreach($seller as $sel )
      <option value="{{$sel->id}}">{{$sel->seller_name}}</option>
	  @endforeach
     @endif
    </select>                </div>
              <!--</div>
              
    <div class="form-group row">-->
                <label for="brand" class="col-md-2 control-label text-left">Brand<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
<select class="form-control form-control-sm" id="brand">
	@if(!$brands->isEmpty())
		@foreach($brands as $brand )
      <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
	  @endforeach
     @endif
    </select>                 
    </div>
              </div>
    <div class="form-group row">
                <label for="brand" class="col-md-2 control-label text-left">Categories<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
<select class="form-control form-control-sm" id="brand">
      @if(!$categories->isEmpty())
		@foreach($categories as $cat )
      <option value="{{$cat->id}}">{{$cat->name}}</option>
	  @endforeach
     @endif
    </select>                 
    </div>
              
                <label for="sku" class="col-md-2 control-label text-left">Product SKU<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <input name="sku" class="form-control form-control-sm" id="sku" value="" labelcol="2" type="text">
                </div>
              </div> 
			   <div class="form-group row">
                <label for="tsin" class="col-md-2 control-label text-left">Product TSIN<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <input name="tsin" class="form-control form-control-sm" id="tsin" value="" labelcol="2" type="text">
                </div>
              
                <label for="ean_code" class="col-md-2 control-label text-left">EAN Code<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <input name="ean_code" class="form-control form-control-sm" id="ean_code" value="" labelcol="2" type="text">
                </div>
              </div> 
			
			    <div class="form-group row">
                <label for="name" class="col-md-2 control-label text-left">Product Name<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-8">
                <input name="name" class="form-control form-control-sm" id="name" value="" labelcol="2" type="text">
                </div>
              </div>
              
			    <div class="form-group row">
                <label for="name" class="col-md-2 control-label text-left">Product Short Description<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-8">
                <textarea name="short_description" class="form-control form-control-sm" id="short_description" value="" labelcol="2" type="text"></textarea>
                </div>
              </div>
			   <div class="form-group row">
                <label for="long_description" class="col-md-2 control-label text-left">Product Long Description<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-8">
                <textarea name="long_description" class="form-control form-control-sm" id="long_description" value="" labelcol="2" type="text"></textarea>
                </div>
              </div>
                <div class="form-group row">
                <label for="usp" class="col-md-2 control-label text-left">Product USP<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <input name="usp" class="form-control form-control-sm" id="usp" value="" labelcol="2" type="text">
                </div>
              
                <label for="brand" class="col-md-2 control-label text-left">Tags<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
<select class="form-control form-control-sm" id="brand">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>                 
    </div>
              </div>
			  
              
              
			   <div class="form-group row">
                <label for="mrp" class="col-md-2 control-label text-left">mrp<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <input name="mrp" class="form-control form-control-sm" id="mrp" value="" labelcol="2" type="text">
                </div>
              
                <label for="hsn_code" class="col-md-2 control-label text-left">HSN Code<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <input name="hsn_code" class="form-control form-control-sm" id="hsn_code" value="" labelcol="2" type="text">
                </div>
              </div> 
			  
			  <div class="form-group row">
                <label for="igst" class="col-md-2 control-label text-left">IGST<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-2">
                <input name="igst" class="form-control form-control-sm" id="igst" value="" labelcol="2" type="text">
                </div>
             
                <label for="sgst" class="col-md-2 control-label text-left">SGST<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-2">
                <input name="sgst" class="form-control form-control-sm" id="sgst" value="" labelcol="2" type="text">
                </div>
            
                <label for="cgst" class="col-md-2 control-label text-left">CGST<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-2">
                <input name="cgst" class="form-control form-control-sm" id="cgst" value="" labelcol="2" type="text">
                </div>
              </div> 
			  <div class="form-group row">
                <label for="place_origin" class="col-md-2 control-label text-left">Place of Origin<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <input name="place_origin" class="form-control form-control-sm" id="place_origin" value="" labelcol="2" type="text">
                </div>
             
                <label for="manuf_address" class="col-md-2 control-label text-left">Manufacturing Address<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <input name="manuf_address" class="form-control form-control-sm" id="manuf_address" value="" labelcol="2" type="text">
                </div>
              </div> 
			   <div class="form-group row">
                <label for="cc_address" class="col-md-2 control-label text-left">CC Address<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <input name="cc_address" class="form-control form-control-sm" id="cc_address" value="" labelcol="2" type="text">
                </div>
                <label for="cc_contact" class="col-md-2 control-label text-left">CC Contact<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <input name="cc_contact" class="form-control form-control-sm" id="cc_contact" value="" labelcol="2" type="text">
                </div>
              </div> 
			  <div class="form-group row">
                <label for="cc_email" class="col-md-2 control-label text-left">CC Email<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <input name="cc_email" class="form-control form-control-sm" id="cc_email" value="" labelcol="2" type="text">
                </div>
                <label for="fssai" class="col-md-2 control-label text-left">FSSAI<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <input name="fssai" class="form-control form-control-sm" id="fssai" value="" labelcol="2" type="text">
                </div>
              </div> 
			   <div class="form-group row">
                <label for="ingredients" class="col-md-2 control-label text-left">Ingredients<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <textarea name="ingredients" class="form-control form-control-sm" id="ingredients" value="" labelcol="2" type="text"></textarea>
                </div>
                <label for="how_to_use" class="col-md-2 control-label text-left">How to Use<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <textarea name="how_to_use" class="form-control form-control-sm" id="how_to_use" value="" labelcol="2" type="text"></textarea>
                </div>
              </div>
                <div class="form-group row">
                <label for="nutrients" class="col-md-2 control-label text-left">Nutrients<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <textarea name="nutrients" class="form-control form-control-sm" id="nutrients" value="" labelcol="2" type="text"></textarea>
                </div>
                <label for="benefits" class="col-md-2 control-label text-left">Benefits<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <textarea name="benefits" class="form-control form-control-sm" id="benefits" value="" labelcol="2" type="text"></textarea>
                </div>
              </div>
                <div class="form-group row">
                <label for="kewwords" class="col-md-2 control-label text-left">Keywords<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <textarea name="kewwords" class="form-control form-control-sm" id="kewwords" value="" labelcol="2" type="text"></textarea>
                </div>
              
                <label for="desclaimer" class="col-md-2 control-label text-left">Disclaimer<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <textarea name="desclaimer" class="form-control form-control-sm" id="desclaimer" value="" labelcol="2" type="text"></textarea>
                </div>
              </div>
                <div class="form-group row">
                <label for="meta_desc" class="col-md-2 control-label text-left">Meta Description<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <textarea name="meta_desc" class="form-control form-control-sm" id="meta_desc" value="" labelcol="2" type="text"></textarea>
                </div>
                <label for="others" class="col-md-2 control-label text-left">Other Points<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <textarea name="others" class="form-control form-control-sm" id="others" value="" labelcol="2" type="text"></textarea>
                </div>
              </div>
                  <div class="button-row d-flex mt-4">
                    <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                  </div>
                </div>
              </div>
              <!--single form panel-->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Pricing</h3>
                <div class="multisteps-form__content">
                  <div class="form-row mt-4">
                    <div class="col">
                      <input class="multisteps-form__input form-control" type="text" placeholder="Address 1"/>
                    </div>
                  </div>
                  <div class="form-row mt-4">
                    <div class="col">
                      <input class="multisteps-form__input form-control" type="text" placeholder="Address 2"/>
                    </div>
                  </div>
                  <div class="form-row mt-4">
                    <div class="col-12 col-sm-6">
                      <input class="multisteps-form__input form-control" type="text" placeholder="City"/>
                    </div>
                    <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                      <select class="multisteps-form__select form-control">
                        <option selected="selected">State...</option>
                        <option>...</option>
                      </select>
                    </div>
                    <div class="col-6 col-sm-3 mt-4 mt-sm-0">
                      <input class="multisteps-form__input form-control" type="text" placeholder="Zip"/>
                    </div>
                  </div>
                  <div class="button-row d-flex mt-4">
                    <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                  </div>
                </div>
              </div>
              <!--single form panel-->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Packaging</h3>
                <div class="multisteps-form__content">
				     <div class="form-group row">
                <label for="pack_type" class="col-md-2 control-label text-left">Pack Type<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <input name="pack_type" class="form-control form-control-sm" id="pack_type" value="" labelcol="2" type="text">
                </div>
                <label for="weight" class="col-md-2 control-label text-left">Weight<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <input name="weight" class="form-control form-control-sm" id="weight" value="" labelcol="2" type="text">
                </div>
              </div> 
			  
                   <div class="form-group row">
                <label for="base_unit" class="col-md-2 control-label text-left">Base Unit<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <input name="base_unit" class="form-control form-control-sm" id="base_unit" value="" labelcol="2" type="text">
                </div>
          
                <label for="gross_weight" class="col-md-2 control-label text-left">Gross Weight<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <input name="ross_weight" class="form-control form-control-sm" id="gross_weight" value="" labelcol="2" type="text">
                </div>
              </div> 
			       <div class="form-group row">
                <label for="length" class="col-md-2 control-label text-left">Length<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <input name="length" class="form-control form-control-sm" id="length" value="" labelcol="2" type="text">
                </div>
            
                <label for="breadth" class="col-md-2 control-label text-left">Breadth<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <input name="breadth" class="form-control form-control-sm" id="breadth" value="" labelcol="2" type="text">
                </div>
              </div> 
			       <div class="form-group row">
                <label for="height" class="col-md-2 control-label text-left">Height<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <input name="height" class="form-control form-control-sm" id="height" value="" labelcol="2" type="text">
                </div>
              
                <label for="master_carton" class="col-md-2 control-label text-left">Master Carton<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <input name="master_carton" class="form-control form-control-sm" id="master_carton" value="" labelcol="2" type="text">
                </div>
              </div> 
			  <div class="form-group row">
                <label for="master_cartonL" class="col-md-2 control-label text-left">Master Carton Length<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <input name="master_cartonL" class="form-control form-control-sm" id="master_cartonL" value="" labelcol="2" type="text">
                </div>
           
                <label for="master_cartonB" class="col-md-2 control-label text-left">Master Carton Breadth<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <input name="master_cartonB" class="form-control form-control-sm" id="master_cartonB" value="" labelcol="2" type="text">
                </div>
              </div> 
			   <div class="form-group row">
                <label for="master_cartonH" class="col-md-2 control-label text-left">Master Carton Height<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <input name="master_cartonH" class="form-control form-control-sm" id="master_cartonH" value="" labelcol="2" type="text">
                </div>
                <label for="net_weight" class="col-md-2 control-label text-left">Net Weight<span class="m-l-5 text-red">*</span></label>
                <div class="col-md-4">
                <input name="net_weight" class="form-control form-control-sm" id="net_weight" value="" labelcol="2" type="text">
                </div>
              </div> 
                <!--  <div class="row">
                    <div class="col-12 col-md-6 mt-4">
                      <div class="card shadow-sm">
                        <div class="card-body">
                          <h5 class="card-title">Item Title</h5>
                          <p class="card-text">Small and nice item description</p><a class="btn btn-primary" href="#" title="Item Link">Item Link</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-6 mt-4">
                      <div class="card shadow-sm">
                        <div class="card-body">
                          <h5 class="card-title">Item Title</h5>
                          <p class="card-text">Small and nice item description</p><a class="btn btn-primary" href="#" title="Item Link">Item Link</a>
                        </div>
                      </div>
                    </div>
                  </div>-->
                  <div class="row">
                    <div class="button-row d-flex mt-4 col-12">
                      <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                      <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                    </div>
                  </div>
                </div>
              </div>
			  <!--single form panel-->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Images</h3>
                <div class="multisteps-form__content">
                  <div class="row">
                    <div class="col-12 col-md-6 mt-4">
                      <div class="card shadow-sm">
                        <div class="card-body">
                          <h5 class="card-title">Item Title</h5>
                          <p class="card-text">Small and nice item description</p><a class="btn btn-primary" href="#" title="Item Link">Item Link</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-6 mt-4">
                      <div class="card shadow-sm">
                        <div class="card-body">
                          <h5 class="card-title">Item Title</h5>
                          <p class="card-text">Small and nice item description</p><a class="btn btn-primary" href="#" title="Item Link">Item Link</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="button-row d-flex mt-4 col-12">
                      <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                      <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                    </div>
                  </div>
                </div>
              </div>
			  <!--single form panel-->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">SEO</h3>
                <div class="multisteps-form__content">
                  <div class="row">
                    <div class="col-12 col-md-6 mt-4">
                      <div class="card shadow-sm">
                        <div class="card-body">
                          <h5 class="card-title">Item Title</h5>
                          <p class="card-text">Small and nice item description</p><a class="btn btn-primary" href="#" title="Item Link">Item Link</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-6 mt-4">
                      <div class="card shadow-sm">
                        <div class="card-body">
                          <h5 class="card-title">Item Title</h5>
                          <p class="card-text">Small and nice item description</p><a class="btn btn-primary" href="#" title="Item Link">Item Link</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="button-row d-flex mt-4 col-12">
                      <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                      <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                    </div>
                  </div>
                </div>
              </div>
			                <!--single form panel-->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Additional Info</h3>
                <div class="multisteps-form__content">
                  <div class="form-row mt-4">
                    <textarea class="multisteps-form__textarea form-control" placeholder="Additional Comments and Requirements"></textarea>
                  </div>
                  <div class="button-row d-flex mt-4">
                    <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="btn btn-success ml-auto" type="button" title="Send">Submit</button>
                  </div>
                </div>
              </div>

			  <!--single form panel-->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Related Products</h3>
                <div class="multisteps-form__content">
                  <div class="row">
                    <div class="col-12 col-md-6 mt-4">
                      <div class="card shadow-sm">
                        <div class="card-body">
                          <h5 class="card-title">Item Title</h5>
                          <p class="card-text">Small and nice item description</p><a class="btn btn-primary" href="#" title="Item Link">Item Link</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-6 mt-4">
                      <div class="card shadow-sm">
                        <div class="card-body">
                          <h5 class="card-title">Item Title</h5>
                          <p class="card-text">Small and nice item description</p><a class="btn btn-primary" href="#" title="Item Link">Item Link</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="button-row d-flex mt-4 col-12">
                      <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                      <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
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
		<script>
		
		//DOM elements
const DOMstrings = {
  stepsBtnClass: 'multisteps-form__progress-btn',
  stepsBtns: document.querySelectorAll(`.multisteps-form__progress-btn`),
  stepsBar: document.querySelector('.multisteps-form__progress'),
  stepsForm: document.querySelector('.multisteps-form__form'),
  stepsFormTextareas: document.querySelectorAll('.multisteps-form__textarea'),
  stepFormPanelClass: 'multisteps-form__panel',
  stepFormPanels: document.querySelectorAll('.multisteps-form__panel'),
  stepPrevBtnClass: 'js-btn-prev',
  stepNextBtnClass: 'js-btn-next' };


//remove class from a set of items
const removeClasses = (elemSet, className) => {

  elemSet.forEach(elem => {

    elem.classList.remove(className);

  });

};

//return exect parent node of the element
const findParent = (elem, parentClass) => {

  let currentNode = elem;

  while (!currentNode.classList.contains(parentClass)) {
    currentNode = currentNode.parentNode;
  }

  return currentNode;

};

//get active button step number
const getActiveStep = elem => {
  return Array.from(DOMstrings.stepsBtns).indexOf(elem);
};

//set all steps before clicked (and clicked too) to active
const setActiveStep = activeStepNum => {

  //remove active state from all the state
  removeClasses(DOMstrings.stepsBtns, 'js-active');

  //set picked items to active
  DOMstrings.stepsBtns.forEach((elem, index) => {

    if (index <= activeStepNum) {
      elem.classList.add('js-active');
    }

  });
};

//get active panel
const getActivePanel = () => {

  let activePanel;

  DOMstrings.stepFormPanels.forEach(elem => {

    if (elem.classList.contains('js-active')) {

      activePanel = elem;

    }

  });

  return activePanel;

};

//open active panel (and close unactive panels)
const setActivePanel = activePanelNum => {

  //remove active class from all the panels
  removeClasses(DOMstrings.stepFormPanels, 'js-active');

  //show active panel
  DOMstrings.stepFormPanels.forEach((elem, index) => {
    if (index === activePanelNum) {

      elem.classList.add('js-active');

      setFormHeight(elem);

    }
  });

};

//set form height equal to current panel height
const formHeight = activePanel => {

  const activePanelHeight = activePanel.offsetHeight;

  DOMstrings.stepsForm.style.height = `${activePanelHeight}px`;

};

const setFormHeight = () => {
  const activePanel = getActivePanel();

  formHeight(activePanel);
};

//STEPS BAR CLICK FUNCTION
DOMstrings.stepsBar.addEventListener('click', e => {

  //check if click target is a step button
  const eventTarget = e.target;

  if (!eventTarget.classList.contains(`${DOMstrings.stepsBtnClass}`)) {
    return;
  }

  //get active button step number
  const activeStep = getActiveStep(eventTarget);

  //set all steps before clicked (and clicked too) to active
  setActiveStep(activeStep);

  //open active panel
  setActivePanel(activeStep);
});

//PREV/NEXT BTNS CLICK
DOMstrings.stepsForm.addEventListener('click', e => {

  const eventTarget = e.target;

  //check if we clicked on `PREV` or NEXT` buttons
  if (!(eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`) || eventTarget.classList.contains(`${DOMstrings.stepNextBtnClass}`)))
  {
    return;
  }

  //find active panel
  const activePanel = findParent(eventTarget, `${DOMstrings.stepFormPanelClass}`);

  let activePanelNum = Array.from(DOMstrings.stepFormPanels).indexOf(activePanel);

  //set active step and active panel onclick
  if (eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`)) {
    activePanelNum--;

  } else {

    activePanelNum++;

  }

  setActiveStep(activePanelNum);
  setActivePanel(activePanelNum);

});

//SETTING PROPER FORM HEIGHT ONLOAD
window.addEventListener('load', setFormHeight, false);

//SETTING PROPER FORM HEIGHT ONRESIZE
window.addEventListener('resize', setFormHeight, false);

//changing animation via animation select !!!YOU DON'T NEED THIS CODE (if you want to change animation type, just change form panels data-attr)

const setAnimationType = newType => {
  DOMstrings.stepFormPanels.forEach(elem => {
    elem.dataset.animation = newType;
  });
};

//selector onchange - changing animation
const animationSelect = document.querySelector('.pick-animation__select');

animationSelect.addEventListener('change', () => {
  const newAnimationType = animationSelect.value;

  setAnimationType(newAnimationType);
});
		
		</script>
@endsection
 
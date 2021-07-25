
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


<div class="col-12 col-lg-12 "> 
              <div class="multisteps-form__progress">
                <a href="{{route('product.edit',$product->id)}}"  class="col" title="General">General</a>
                <a href="javascript:void(0)" class="col" title="Pricing">Variants & Pricing</a>
                <a href="{{url('/admin/product-packaging',$product->id)}}"  class="col" title="Inventory">Packaging</a>
                <!--<a href="{{url('admin/product-create/images')}}" style="padding-left: 55px;" class="multisteps-form__progress-btn" title="Images">Images </a>-->
                <a href="javascript:void(0)" class="col"  title="SEO">SEO </a>
                <a href="{{url('/admin/product-additional',$product->id)}}" class="col" title="Other Options">Other Options </a>
                <a href="{{url('/admin/product-related',$product->id)}}"   class="col" title="Related Products">Related Products </a>
              </div>
            </div>
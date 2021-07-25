@extends('layouts.appInner')

 
 



@section('content')
 <script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
 	<style>
	.error {
    color:#CC0000;
  }
	</style>
    
  
<section class="mt-5 mb-0 pb-0" style="padding-top:120px">
     <div class="container" data-aos="fade-up">
           <div class="section-title">
          <h2>My Account</h2>
        </div>

</div>
</section>
   
 
<section class=" mt-0 pt-0">
    <div class="container">
        <div class="row">
           <div class="col-lg-8 offset-lg-2">
               
               
               <div id="accordion" role="tablist" aria-multiselectable="true">

          <!-- Accordion Item 1 -->
          <div class="card">
            <div class="card-header" role="tab" id="accordionHeadingOne">
              <div class="mb-0 row">
                <div class="col-12 no-padding accordion-head">
                  <a data-toggle="collapse" data-parent="#accordion" href="#accordionBodyOne" aria-expanded="false" aria-controls="accordionBodyOne"
                    class="collapsed ">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                    <h3>Company Details</h3>
                  </a>
                </div>
              </div>
            </div>

            <div id="accordionBodyOne" class="collapse" role="tabpanel" aria-labelledby="accordionHeadingOne" aria-expanded="false" data-parent="accordion">
              <div class="card-block col-12 pt-2">
                <form>
  <div class="form-group row">
    <label for="Type of Entity" class="col-4 col-form-label">Type of Entity</label> 
    <div class="col-8">
      <select id="Type of Entity" name="Type of Entity" class="custom-select">
        <option value="Sole Proprietorship">Sole Proprietorship</option>
        <option value="Partnerships-General and Limited">Partnerships-General and Limited</option>
        <option value="Limited Liability Company ">Limited Liability Company</option>
        <option value="Corporation">Corporation</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="Name of the company" class="col-4 col-form-label">Name of the company</label> 
    <div class="col-8">
      <input id="Name of the company" name="Name of the company" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="CIN or LLP-IN" class="col-4 col-form-label">CIN or LLP-IN</label> 
    <div class="col-8">
      <input id="CIN or LLP-IN" name="CIN or LLP-IN" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="Date of Incorporation" class="col-4 col-form-label">Date of Incorporation</label> 
    <div class="col-8">
      <input id="Date of Incorporation" name="Date of Incorporation" type="date" class="form-control" required="required">
    </div>
  </div>
  
  
  <div class="form-group row">
    <label for="Turnover Details" class="col-12 col-form-label">Address Details</label> 
    <div class="col-12">
        <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Line 1</label> 
    <div class="col-8">
      <input id="text" name="text" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Line 2</label> 
    <div class="col-8">
      <input id="text1" name="text1" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Line 3</label> 
    <div class="col-8">
      <input id="text2" name="text2" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label">Landmark</label> 
    <div class="col-8">
      <input id="text3" name="text3" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text4" class="col-4 col-form-label">City</label> 
    <div class="col-8">
      <input id="text4" name="text4" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text5" class="col-4 col-form-label">District</label> 
    <div class="col-8">
      <input id="text5" name="text5" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">State</label> 
    <div class="col-8">
      <select id="select" name="select" class="custom-select">
        <option value="maharashtra">Maharashtra</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="text6" class="col-4 col-form-label">PIN</label> 
    <div class="col-8">
      <input id="text6" name="text6" type="text" class="form-control">
    </div>
  </div> 
        
    </div></div>
  
  <div class="form-group row">
    <label for="Turnover Details" class="col-12 col-form-label">Turnover Details</label> 
    <div class="col-12">
      <table class="table small">
  
  <tbody>
    <tr>
    
      <td>FY 2019-20
</td>
      <td>      <input type="number" class="form-control" required="required">
</td>
      <td>    <input type="file" class="form-control-file small" id="exampleFormControlFile1">
</td>
    </tr>
    <tr>
     
      <td>FY 2018-19
</td>
      <td><input type="number" class="form-control" required="required"></td>
      <td><input type="file" class="form-control-file small" id="exampleFormControlFile1"></td>
    </tr>
    <tr>
      
      <td>FY 2017-18
</td>
      <td><input type="number" class="form-control" required="required"></td>
      <td><input type="file" class="form-control-file small"  id="exampleFormControlFile1"></td>
    </tr>
  </tbody>
</table>
    </div>
  </div> 
  
  
   <div class="form-group row">
    <label for="Turnover Details" class="col-12 col-form-label">PAN</label> 
    <div class="col-12">
      <table class="table small">
  
  <tbody>
    <tr>
    
    
      <td>      <input type="number" class="form-control" required="required">
</td>
      <td>    <input type="file" class="form-control-file small" id="exampleFormControlFile1">
</td>
    </tr>
    
  </tbody>
</table>
    </div>
  </div> 
  
  
  
   <div class="form-group row">
    <label for="Turnover Details" class="col-12 col-form-label">TAN</label> 
    <div class="col-12">
     <table class="table small">
  
  <tbody>
    <tr>
    
    
      <td>      <input type="number" class="form-control" required="required">
</td>
      <td>    <input type="file" class="form-control-file small" id="exampleFormControlFile1">
</td>
    </tr>
    
  </tbody>
</table>
    </div>
  </div> 
  
    <div class="form-group row">
    <label for="Turnover Details" class="col-12 col-form-label">Udyog Aadhaar</label> 
    <div class="col-12">
     <table class="table small">
  
  <tbody>
    <tr>
    
    
      <td>      <input type="number" class="form-control" required="required">
</td>
      <td>    <input type="file" class="form-control-file small" id="exampleFormControlFile1">
</td>
    </tr>
    
  </tbody>
</table>
    </div>
  </div> 
  
    <div class="form-group row">
    <label for="Turnover Details" class="col-12 col-form-label">Start-up India Registration number</label> 
    <div class="col-12">
     <table class="table small">
  
  <tbody>
    <tr>
    
    
      <td>      <input type="number" class="form-control" required="required">
</td>
      <td>    <input type="file" class="form-control-file small" id="exampleFormControlFile1">
</td>
    </tr>
    
  </tbody>
</table>
    </div>
  </div> 
  
   <div class="form-group row">
    <label for="CIN or LLP-IN" class="col-4 col-form-label">Company LinkedIn Page</label> 
    <div class="col-8">
      <input id="" name="" type="text" class="form-control" required="required">
    </div>
  </div>
  
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary small" style="padding:10px;">Next Step</button>
    </div>
  </div>
</form>
              </div>
            </div>
          </div>

          <!-- Accordion Item 2 -->
          <div class="card">
            <div class="card-header" role="tab" id="accordionHeadingTwo">
              <div class="mb-0 row">
                <div class="col-12 no-padding accordion-head">
                  <a data-toggle="collapse" data-parent="#accordion" href="#accordionBodyTwo" aria-expanded="false" aria-controls="accordionBodyTwo"
                    class="collapsed ">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                    <h3>Bank Details </h3>
                  </a>
                </div>
              </div>
            </div>

            <div id="accordionBodyTwo" class="collapse" role="tabpanel" aria-labelledby="accordionHeadingTwo" aria-expanded="false" data-parent="accordion">
              <div class="card-block col-12">
                <form class="pt-2"><div class="form-group row">
    <label for="Name of the company" class="col-4 col-form-label">Upload copy of cheque</label> 
    <div class="col-8">
     <input type="file" class="form-control-file small"  id="exampleFormControlFile1">
    </div>
  </div>
  <div class="form-group row">
    <label for="CIN or LLP-IN" class="col-4 col-form-label">Name in bank account</label> 
    <div class="col-8">
      <input id="CIN or LLP-IN" name="CIN or LLP-IN" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="Date of Incorporation" class="col-4 col-form-label">Name of bank</label> 
    <div class="col-8">
      <input id="Date of Incorporation" name="Date of Incorporation" type="text" class="form-control" required="required">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="Date of Incorporation" class="col-4 col-form-label">Type of account</label> 
    <div class="col-8">
       <select id="select" name="select" class="custom-select">
        <option value="Current">Current</option>
        <option value="Current">Savings</option>
      </select>
    </div>
  </div>
  
  <div class="form-group row">
    <label for="Date of Incorporation" class="col-4 col-form-label">Branch Address</label> 
    <div class="col-8">
      <textarea id="Date of Incorporation" name="Date of Incorporation" type="text" class="form-control" required="required"></textarea>
    </div>
  </div>
  
  <div class="form-group row">
    <label for="Date of Incorporation" class="col-4 col-form-label">IFSC</label> 
    <div class="col-8">
      <input id="Date of Incorporation" name="Date of Incorporation" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary small" style="padding:10px;">Next Step</button>
    </div>
  </div>
  </form>
              </div>
            </div>
          </div>

          <!-- Accordion Item 3 -->
          <div class="card">
            <div class="card-header" role="tab" id="accordionHeadingThree">
              <div class="mb-0 row">
                <div class="col-12 no-padding accordion-head">
                  <a data-toggle="collapse" data-parent="#accordion" href="#accordionBodyThree" aria-expanded="false" aria-controls="accordionBodyThree"
                    class="collapsed ">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                    <h3>Primary GST Details</h3>
                  </a>
                </div>
              </div>
            </div>

            <div id="accordionBodyThree" class="collapse" role="tabpanel" aria-labelledby="accordionHeadingThree" aria-expanded="false" data-parent="accordion">
              <div class="card-block col-12">
              <form class="pt-2">
                  
                  
  <div class="form-group row">
    <label for="Turnover Details" class="col-12 col-form-label">Address Details</label> 
    <div class="col-12">
        <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Line 1</label> 
    <div class="col-8">
      <input id="text" name="text" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Line 2</label> 
    <div class="col-8">
      <input id="text1" name="text1" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Line 3</label> 
    <div class="col-8">
      <input id="text2" name="text2" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label">Landmark</label> 
    <div class="col-8">
      <input id="text3" name="text3" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text4" class="col-4 col-form-label">City</label> 
    <div class="col-8">
      <input id="text4" name="text4" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text5" class="col-4 col-form-label">District</label> 
    <div class="col-8">
      <input id="text5" name="text5" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">State</label> 
    <div class="col-8">
      <select id="select" name="select" class="custom-select">
        <option value="maharashtra">Maharashtra</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="text6" class="col-4 col-form-label">PIN</label> 
    <div class="col-8">
      <input id="text6" name="text6" type="text" class="form-control">
    </div>
  </div> 
        <div class="form-group row">
    <label for="text6" class="col-12 col-form-label">GST Details </label> 
    <div class="col-12">
        
        <table class="table"><tr><td> <input id="text6" name="text6" type="text" class="form-control"></td><td><input type="file" class="form-control-file small"  id="exampleFormControlFile1"></td> </tr></table>
     
    </div>
  </div> 
  
   <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary small" style="padding:10px;">Next Step</button>
    </div>
  </div>
  
  
    </div></div>
    
    
                  
              </form>
              </div>
            </div>
          </div>
          
          
          
          <!-- Accordion Item 3 -->
          <div class="card">
            <div class="card-header" role="tab" id="accordionHeadingfour">
              <div class="mb-0 row">
                <div class="col-12 no-padding accordion-head">
                  <a data-toggle="collapse" data-parent="#accordion" href="#accordionBodyfour" aria-expanded="false" aria-controls="accordionBodyfour"
                    class="collapsed ">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                    <h3>Founder Details</h3>
                  </a>
                </div>
              </div>
            </div>

            <div id="accordionBodyfour" class="collapse" role="tabpanel" aria-labelledby="accordionHeadingfour" aria-expanded="false" data-parent="accordion">
              <div class="card-block col-12">
              <form class="pt-2">
                  
                  
  <div class="form-group row">
    <label for="Turnover Details" class="col-12 col-form-label">Address Details</label> 
    <div class="col-12">
        <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Line 1</label> 
    <div class="col-8">
      <input id="text" name="text" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Line 2</label> 
    <div class="col-8">
      <input id="text1" name="text1" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Line 3</label> 
    <div class="col-8">
      <input id="text2" name="text2" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label">Landmark</label> 
    <div class="col-8">
      <input id="text3" name="text3" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text4" class="col-4 col-form-label">City</label> 
    <div class="col-8">
      <input id="text4" name="text4" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text5" class="col-4 col-form-label">District</label> 
    <div class="col-8">
      <input id="text5" name="text5" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">State</label> 
    <div class="col-8">
      <select id="select" name="select" class="custom-select">
        <option value="maharashtra">Maharashtra</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="text6" class="col-4 col-form-label">PIN</label> 
    <div class="col-8">
      <input id="text6" name="text6" type="text" class="form-control">
    </div>
  </div> 
        <div class="form-group row">
    <label for="text6" class="col-12 col-form-label">GST Details </label> 
    <div class="col-12">
        
        <table class="table"><tr><td> <input id="text6" name="text6" type="text" class="form-control"></td><td><input type="file" class="form-control-file small"  id="exampleFormControlFile1"></td> </tr></table>
     
    </div>
  </div> 
  
   <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary small" style="padding:10px;">Next Step</button>
    </div>
  </div>
  
  
    </div></div>
    
    
                  
              </form>
              </div>
            </div>
          </div>
          
          
          
          
          


        </div>

           </div>
       

  

 
 
 
  
   
  
  
    
  


    </div>
    </div>
</section>
 
	  
	  

	  
	   @endsection
	  
	  @section('footer')
	   @include('layouts/footerInner')
      @endsection
	   
@extends('layouts.appInner')

 
 



@section('content')
 <script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
 	<style>
	.error {
    color:#CC0000;
  }
	</style>
  <script>
  $(document).ready(function () {
  
  
  

    $('#frmmain').validate({ // initialize the plugin
        rules: {
            name: {
                required: true,
                
            },
			
			brand: {
                required: true,
                
            },
			email: {
                required: true,
                email: true
            }
			,
			mobile: {
                required: true,
                minlength: 10,
				maxlength: 10
            },
           
			 
			 
			
			messages: {
       name: "Please enter your name",
       
      
    },
        }
    });

});
 
  </script> 
  
<section class="mt-5" style="padding-top:120px">
     <div class="container" data-aos="fade-up">
           <div class="section-title">
          <h2>Registration</h2>
        </div>
<div class="intro">Hello Brand,<br>
We will like to know more about you.</div></div>
</section>
<form method="post" action="{{route('post.register')}}"  name="frmmain" id="frmmain" enctype="multipart/form-data">
<input type="hidden" id="emailverify" value="0">
<section class="registerblock">
    <div class="container">
        <div class="row">
           
          <div class="col-lg-12 ">
		  @include('includes.messages') 


  <div class="form-group row">
    <label class="col-12 ">Is your entity registered as a Limited, Private Limited, One Person Company or Limited Liability Partnership?</label> 
    <div class="col-12">
         <div class="radiobuttons">
    <div class="rdio rdio-primary radio-inline d-inline"> <input   value="1" id="entity" name="entity" type="radio" checked>
      <label for="radio1">Yes</label>
    </div>
    <div class="rdio rdio-primary radio-inline d-inline">
      <input name="entity" value="2" id="entity"   type="radio">
      <label for="radio2">No</label>
    </div>
  </div>
    <!-- <div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-secondary active">
    <input type="radio" name="entity" id="option1" autocomplete="off" value="Yes" checked> Yes
  </label>
  <label class="btn btn-secondary">
    <input type="radio" name="entity" id="option2" value="No" autocomplete="off"> No
  </label>
 
</div>-->
    </div>
  </div>
  <div class="form-group row">
    <label class="col-12">Is your company less than 10 year old?</label> 
    <div class="col-12">
         <div class="radiobuttons">
    <div class="rdio rdio-primary radio-inline d-inline"> <input name="company" value="1" id="company" type="radio" checked>
      <label for="radio1">Yes</label>
    </div>
    <div class="rdio rdio-primary radio-inline d-inline">
      <input name="company" value="2" id="company" type="radio">
      <label for="radio2">No</label>
    </div>
  </div>
       <!--<div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-secondary active">
    <input type="radio" name="company" id="company_old" autocomplete="off" value="Yes" checked> Yes
  </label>
  <label class="btn btn-secondary">
    <input type="radio" name="company" id="option2" autocomplete="off" value="No"> No
  </label>
 
</div>-->
    </div>
  </div>
  <div class="form-group row">
    <label class="col-12">Is the Turnover of your company less than 100 crore?</label> 
    <div class="col-12">
    <div class="radiobuttons">
    <div class="rdio rdio-primary radio-inline d-inline"> <input name="turnover" value="1" id="turnover" type="radio" checked>
      <label for="radio1">Yes</label>
    </div>
    <div class="rdio rdio-primary radio-inline d-inline">
      <input name="turnover" value="2" id="turnover" type="radio">
      <label for="radio2">No</label>
    </div>
  </div>

 
    </div>
  </div> 
   
 </div>
 </div></div></section>
 
<section class="databinfo">
    <div class="container">
        <div class="row">
           
          
 
  {{ csrf_field() }}
  <div class="col-lg-6">
   <div class="form-group row" >
     <label class="col-4">Name*</label> 
    <div class="col-8">
      <input id="name" name="name" type="text" class="form-control" value="{{old('name')}}" >
    </div>
  </div>
  
          
</div>

 <div class="col-lg-6">
  <div class="form-group row">
   <label class="col-4">Company Name*</label>
    <div class="col-8">
      <input id="website" name="website" type="text" value="{{old('website')}}" class="form-control"   aria-describedby="passwordHelpBlock" placeholder=""> 
  
    </div>
  </div></div>

<div class="col-lg-6">
  <div class="form-group row">
     <label class="col-4">Email*</label>
    <div class="col-8">
      
      
      <div class="input-group mb-0">
  <input  id="email" name="email" type="text" class="form-control" value="{{old('email')}}" required="required">
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2"><a class="checkEmail" href="javscript:void(0)" onClick="checkEmail()">Submit</a></span>
  </div>
 
</div>
 <span class="emailerror"></span>
   <div class="input-group mt-1">
  <input  id="emailOTP" name="emailOTP" disabled="disabled" type="number" class="form-control"   placeholder="verify email code">
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2"><a style="display:none" class="emailVerify" href="javscript:void(0)" onClick="emailVerify()" >Verify</a></span>
  </div>
</div>
    </div>
  </div></div>
 
 
  
  <div class="col-lg-6">
  <div class="form-group row">
  <label class="col-4">Mobile*</label>
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">+91</div>
        </div> 
        <input id="mobile" name="mobile" type="text"  value="{{old('mobile')}}"class="form-control" aria-describedby="mobile-noHelpBlock" required="required">
        
       <!-- <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2"><a  href="javscript:void(0)" onClick="checkMobile()">Submit</a></span>
  </div>-->
      </div> 
      
       <!--<div class="input-group mt-1">
  <input  id="mobileOtp" name="mobileOtp" type="number" class="form-control"   required="required" placeholder="verify OTP code">
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2"><a >Verify</a></span>
  </div>
   <span class="mobileerror"></span>
</div>-->
    
    </div>
  </div></div>
  
  
  <div class="col-lg-6">
  <div class="form-group row">
     <label class="col-4">Brand Name*</label>
    <div class="col-8">
      <input id="brand" name="brand" value="{{old('brand')}}" type="text" class="form-control" required="required" >
    </div>
  </div></div><div class="col-lg-6">
  
  <div class="form-group row">
    <div class=" col-12">
      <button name="submit" type="submit" class="btn btn-primary register-btn btn-block" disabled="disabled">Submit</button>
    </div>
  </div></div>
  


    </div>
    
</section>
 </form>
	  
	  

	  
	   @endsection
	  
	  @section('footer')
	   @include('layouts/footerInner')
      @endsection
	  <script>
	  
	   function checkEmail()
{
 	var formData = $('#frmmain').serialize();
	 $.ajax({
	 		url: '{{ URL::to("/postCheckEmail")}}',
	 		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

	 		type: "GET",
	 		data:formData,
			beforeSend: function() {
       	    $('#cover-spin').show(0);
       	 
    },

	 		success: function (res) { 
			 if(res.status==1)
			 {
			   $('.emailerror').html('Email already exist!') 
			    $('#email').removeAttr('readonly')
				  $('#emailOTP').attr('disabled','disabled')
				 $('.checkEmail').show()  
				 $('.emailVerify').hide()  
			 }else{
			 $('.emailerror').html('Please verify otp sent to your email!') 
			   
			    $('#email').attr('readonly','readonly')
				  $('#emailOTP').removeAttr('disabled')
				$('.checkEmail').hide()  
				
				$('.emailVerify').show() 
				 
			   $('#emailOTP').focus() 
			 }
			},
	 	});
			 

 

}

function checkMobile()
{
 	var formData = $('#frmmain').serialize();
	 $.ajax({
	 		url: '{{ URL::to("/postCheckMobile")}}',
	 		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

	 		type: "GET",
	 		data:formData,
			beforeSend: function() {
       	    $('#cover-spin').show(0);
       	 
    },

	 		success: function (res) { 
			 if(res.status==1)
			 {
			$('.mobileerror').html('Mobile No already exist!') 
			 }else{
			 $('.mobileerror').html('Please verify otp sent to your mobile!') 
			  $('#mobileOTP').focus() 
			 }
			},
	 	});
			 

 

}

function emailVerify()
{
 	var otp = $('#emailOTP').val();
	 $.ajax({
	 		url: '{{ URL::to("/otpVerify")}}',
	 		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

	 		type: "GET",
	 		data:{'otp':otp},
			beforeSend: function() {
       	    $('#cover-spin').show(0);
       	 
    },

	 		success: function (res) { 
			 
			 
			 if(res.status==1)
			 {
			  $('.emailVerify').html('Verified') 
			  $('#emailverify').val(1) 
			 }else{
			  $('#emailverify').val(0)
			 }
			 
			 if( $('#emailverify').val()==1)
			 {
			  $('.btn').removeAttr('disabled')
			 
			 }
			 
			},
	 	});
			 

 

}
	  function formNext()
{
 var formData = $('#frmFirst').serialize();
	
	 $.ajax({
	 		url: '{{ URL::to("/formNext")}}',
	 		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

	 		type: "GET",
	 		data: formData,
			beforeSend: function() {
       	 $('#cover-spin').show(0);
       	 
    },

	 		success: function (res) { 
			 $('#frmFirst').hide();
			 $('#frmnxt').show();
			 location.reload()
			},
	 	});
			 

 

}
	  </script>
@extends('layouts.appInner')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 <script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
 	<style>
	.error {
    color:#CC0000;
  }
  label.error {font-size:70%;}
	</style>
	<style>
  
#cover-spin {
    position:fixed;
    width:100%;
    left:0;right:0;top:0;bottom:0;
    background-color: rgba(255,255,255,0.7);
    z-index:9999;
    display:none;
}

@-webkit-keyframes spin {
	from {-webkit-transform:rotate(0deg);}
	to {-webkit-transform:rotate(360deg);}
}

@keyframes spin {
	from {transform:rotate(0deg);}
	to {transform:rotate(360deg);}
}

#cover-spin::after {
    content:'';
    display:block;
    position:absolute;
    left:48%;top:40%;
    width:40px;height:40px;
    border-style:solid;
    border-color:black;
    border-top-color:transparent;
    border-width: 4px;
    border-radius:50%;
    -webkit-animation: spin .8s linear infinite;
    animation: spin .8s linear infinite;
}
 </style>
  <script>
  $(document).ready(function () {
  
   
$.validator.addMethod("password", function(value, element) {
  return /[A-Z]+/.test(value) && /[a-z]+/.test(value) && 
    /[\d]+/.test(value) && 
    /[\W]+/.test(value)&&
	 /\S{6,}/.test(value);
}, "Please enter valid format password as mention below");
  

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
			website: {
                required: true,
                
            },
			mobile: {
                required: true,
                minlength: 10,
				maxlength: 10
            },
			 password : {
                    minlength : 6,
					 required: true,
                },
                password_confirm : {
                    minlength : 6,
					 required: true,
                    equalTo : "#password"
                },
				
				 mobileverify : {
                    
                    equalTo : "1"
                },
				 emailverify : {
                    
                    equalTo : "1"
                },
           
			 
			 
			
			messages: {
        mobileverify: "Please verify mobile number.",
	    name: "Please enter your name",
		emailverify: "Please verify email ID.",
		 password: {
                required: "Please enter your password!",
                
            }
		 
      
    },
        }
    });

});
 
  </script> 
  <div id="cover-spin"></div>
<section class="mt-5" style="padding-top:120px">
     <div class="container" data-aos="fade-up">
           <div class="section-title">
          <h2>Registration</h2>
        </div>
<div class="intro text-center">Hello Brand,<br>
We will like to know more about you.</div></div>
</section>
<form method="post" action="{{route('post.register')}}"  name="frmmain" id="frmmain" enctype="multipart/form-data">
<input type="hidden" id="emailverify" value="0">
<input type="hidden" id="mobileverify" value="0">

<section class="registerblock d-none">
    <div class="container">
        <div class="row">
           
          <div class="col-lg-12 ">


  <div class="form-group row">
    <label class="col-12 ">Is your entity registered as a Limited, Private Limited, One Person Company or Limited Liability Partnership?</label> 
    <div class="col-12">
         <div class="radiobuttons">
    <div class=" rdio-primary radio-inline d-inline"> <input   value="Yes"   name="entity" type="radio" checked="checked"  >
      <label for="radio1">Yes</label>
    </div>
    <div class=" rdio-primary radio-inline d-inline">
      <input name="entity" value="No"     type="radio">
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
    <div class=" rdio-primary radio-inline d-inline"> <input name="company" value="Yes"   type="radio" checked="checked" >
      <label for="radio1">Yes</label>
    </div>
    <div class=" rdio-primary radio-inline d-inline">
      <input name="company" value="No"   type="radio">
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
    <div class=" rdio-primary radio-inline d-inline"> <input name="turnover" value="Yes"   type="radio" checked="checked" >
      <label for="radio1">Yes</label>
    </div>
    <div class=" rdio-primary radio-inline d-inline">
      <input name="turnover" value="No"   type="radio">
      <label for="radio2">No</label>
    </div>
  </div>

 
    </div>
  </div> 
   
 </div>
 </div></div></section>
 <div class="row"><div class="col-12">		  @include('includes.messages') 
</div></div>
<section class="databinfo">
    <div class="container">
	 <div class="errormsg " style="color:green"></div>    
        <div class="row">
        
          
 
  {{ csrf_field() }}
  <div class="col-lg-6"><div class="row"> 
  <div class="col-lg-12">
   <div class="form-group row" >
     <label class="col-4">Name*</label> 
    <div class="col-8">
      <input id="name" name="name" type="text" class="form-control" value="{{session('name')}}" >
    </div>
  </div>
  
          
</div>

 <div class="col-lg-12 d-none">
  <div class="form-group row">
   <label class="col-4">Company Name*</label>
    <div class="col-8">
      <input id="website" name="website" type="text" value="{{session('company')}}" class="form-control" required="required"   aria-describedby="passwordHelpBlock" placeholder=""> 
  
    </div>
  </div></div>
  
  
  <div class="col-lg-12">
    <div class="form-group row">
     <label class="col-4">Brand Name*</label>
    <div class="col-8">
      <input id="brand" name="brand" value="{{session('brand')}}" type="text" class="form-control" required="required" <?php echo(session('mobileVerified')==1 && session('emailVerified')==1)?'readonly="readonly"':''?> <?php echo( session('emailotp')!='')?' readonly=readonly"':''?>>
    </div>
  </div>
  
  
  </div>

<div class="col-lg-12">
  <div class="form-group row">
     <label class="col-4">Email*</label>
    <div class="col-8">
      
      
      <div class="input-group mb-0">
  <input  id="email" name="email" type="text"  <?php echo(session('emailVerified')==1)?'readonly="readonly"':''?> class="form-control" value="{{session('email')}}" required="required">
   
 <div class="input-group-append">
    <button class="btn btn-secondary" type="button" onClick="sendEmailOTP()" id="vemailbtn" <?php echo( session('emailotp')!='')?' disabled=disabled"':''?>><span class="small" id="vemail"  <?php echo( session('emailVerified')==1)?'style="display:none"':'style="display:block"'?>  >Verify</span> <i class="bx bxs-check-circle text-white" id="bxemail"   <?php echo( session('emailVerified')==1)?'style="display:block"':'style="display:none"'?>></i>  </button>
  </div>
</div>
  <div class="input-group mt-1" id="emailOTPDiv"  <?php echo( session('emailVerified')==1)?'style="display:none"':''?> <?php echo( session('emailotp')!='')?'style="display:block"':'style="display:none"'?>>
  <input  id="emailOTP" name="emailOTP"   type="number" class="form-control"   placeholder="verify email code">
   <div class="input-group-append">
    <button class="btn btn-secondary" type="button" onClick="emailVerify()" ><span class="small">Submit </span>   </button>
  </div>
</div> 
 <div class="emailerror"></div>
  <label for="email" generated="true" class="error"></label>
    </div>
	
  </div>
   
  </div>
 
 
  
  
  
  <div class="col-lg-12">
  <div class="form-group row">
  <label class="col-4">Mobile*</label>
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">+91</div>
        </div> 
        <input id="mobile" name="mobile" type="text" <?php echo(session('mobileVerified')==1 )?'readonly="readonly"':''?>  value="{{session('mobile')}}"class="form-control " aria-describedby="mobile-noHelpBlock" required="required">
        <div class="input-group-append">
    <button class="btn btn-secondary" type="button" onClick="sendMobileOTP()" id="vmobilebtn" <?php echo( session('mobileotp')!='')?' disabled=disabled"':''?>><span class="small" id="vmobile" <?php echo(session('mobileVerified')==1 )?'style="display:none"':'style="display:block"'?>>Verify </span> <i class="bx bxs-check-circle text-white" id="bxmobile"   <?php echo( session('mobileVerified')==1)?'style="display:block"':'style="display:none"'?>></i> </button>
  </div>
      <div class="input-group-append" <?php echo(session('mobileVerified')==1 )?'style="display:none"':'style="display:block"'?>>
   
  </div>
 
      </div> 
	   <label for="mobile" generated="true" class="error"></label>
	 <?php /*?><a  href="javscript:void(0)" class="checkMobile btn btn-primary register-btn btn-block mt-2" onClick="checkEmail()" <?php echo(session('mobileVerified')==1 && session('emailVerified')==1)?'style="display:none"':'style="display:block"'?>>Verify Email and Mobile</a><?php */?>
      
      <div class="input-group mt-1" id="mobileOTPDiv"<?php echo( session('mobileVerified')==1)?'style="display:none"':''?> <?php echo( session('mobileotp')!='')?'style="display:block"':'style="display:none"'?>>
     <input  id="mobileOTP" name="mobileOTP" type="number"   class="form-control"     placeholder="verify OTP code">
  
   <div class="input-group-append">
    <button class="btn btn-secondary" type="button" onClick="mobileVerify()" ><span class="small">Submit </span>   </button>
  </div>
</div>
   
	 
	 
    </div>
	
  </div>
  
    </div>
  <div class="col-lg-12" id="password_sec" <?php echo(session('mobileVerified')==1 && session('emailVerified')==1)?'style="display:block"':'style="display:none"'?>  >
      
      <div class="row">
          
          <div class="col-lg-12">
              
               <div class="form-group row">
     <label class="col-4">Password</label>
    <div class="col-8">
      <input id="password" name="password" value="{{old('password')}}" type="password" class="form-control" required="required"  placeholder="Password">
      <small id="passwordHelpBlock" class="form-text text-muted">
  Your password must be 6 characters long, contain Capital letter and numbers, special characters and must not contain spaces, or emoji.
</small>
    </div>
	
  </div>
  
  
          </div>
          
           <div class="col-lg-12">
               
                <div class="form-group row">
     <label class="col-4">Confirm Password</label>
    <div class="col-8">
      <input id="password_confirm" name="password_confirm" value="{{old('password_confirm')}}" type="password" class="form-control" required="required"  placeholder="Retype Password">
    </div>
  </div>
           </div>
          
      </div>
      
   
 
  </div>
   <div class="col-8 offset-4 mb-3"> <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked disabled>
  <label class="form-check-label" for="defaultCheck1">
 Terms & Conditions
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="1" onchange="Areyousure(this)" id="whtsapp" name="whtsapp" checked >
  <label class="form-check-label" for="defaultCheck2">
    Whats app opt in
  </label>
</div> </div>
 
   
  <div class="col-lg-8 offset-4"   > 
  
  <div class="form-group row">
    <div class=" col-12 ">
      <button name="submit" type="submit" <?php echo(session('mobileVerified')==1 && session('emailVerified')==1)?'style="display:block"':'style="display:none"'?> class="btn btn-primary register-btn btn-block">Submit</button>
	   <a href="{{route('reset.button')}}"  class="mt-2">Reset</a>
	   <button id="regenerateOTP" class="btn btn-warning btn_shadow" style="border-radius: 0; display:none;" ><span id="timer"></span>  </button> 
 
    </div>
  </div>
  
  </div> </div></div>  <div class="col-lg-6"> <img src="{{asset('public/assets/img/reg-creatives.svg')}}" class="img-fluid w-100">
</div>
 
 
    
</section>
 </form>
	  
	  
 
	  
	   @endsection
	  
	  @section('footer')
	   @include('layouts/footerInner')
      @endsection
	  <script>
	  var minutes = 0;
  var seconds = 0;
  function startTimer(duration, display) {
    var timer = duration,
        minutes, seconds;
    setInterval(function() {
      minutes = parseInt(timer / 60, 10);
      seconds = parseInt(timer % 60, 10);

      minutes = minutes < 10 ? "0" + minutes : minutes;
      seconds = seconds < 10 ? "0" + seconds : seconds;

     document.getElementById('timer').innerHTML  = minutes + ":" + seconds;

      setCookie("minutes", minutes.toString(), 1);
      setCookie("seconds", seconds.toString(), 1);

      if (--timer < 0) {
        timer = 0;
      }
    }, 1000);
  }


  window.onload = function() {
     var minutes_data = getCookie("minutes");
     var seconds_data = getCookie("seconds");
     var timer_amount = (60*3); //default
      if (!minutes_data || !seconds_data){
        //no cookie found use default
      }
      else{
        timer_amount = parseInt(minutes_data*60)+parseInt(seconds_data)
      }

        var fiveMinutes = timer_amount,
          display = document.querySelector('#timer');
          startTimer(fiveMinutes, display); //`enter code here`
  };

   function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
   } 

   function getCookie(cname) {
   var name = cname + "=";
   var ca = document.cookie.split(';');
   for(var i=0; i<ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0)==' ') c = c.substring(1);
      if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
   }
   return "";
  } 

  </script>

  

	  <script>
	   
	 function Areyousure(element) {
    // If it is checked now, let it be
    if (element.checked) {
        return false;
    // Otherwise prompt the user
    } else {
        // Prompt the user to make sure
        if (confirm("Please check the consent box if you want to receive WhatsApp updates.")){
            // The user confirmed it, so uncheck it
            return true;
        }else{
            // Otherwise, keep it checked
            element.checked = true;
        } 
    }
} 
function checkEmail()
{
  	 var formData = $('#frmmain').serialize();
	 var brand = $('#brand').val();
	 	if(!$("#frmmain").valid())
		{
		return false;
		}
		 
	 
	 $.ajax({
	 		url: '{{ URL::to("/postCheckEmail")}}',
	 		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

	 		type: "GET",
	 		data:formData,
			beforeSend: function() {
       	    $('#cover-spin').show(0);
       	 
    },

	 		success: function (res) {
			 
			 if(res.status==2)
			 {
			    $('.errormsg').html('This email address is already registered with us!') 
			    $('#email').removeAttr('readonly')
				$('#emailOTP').attr('disabled','disabled')
				$('.checkEmail').show()  
				$('.emailVerify').hide() 
			    $('#cover-spin').hide(0); 
			 }
			 if(res.status==1)
			 {
			   
				$('.errormsg').html('This number is already registered with us!') 
			    $('#mobile').removeAttr('readonly')
				$('#mobileOTP').attr('disabled','disabled')
				 $('.checkMobile').show()  
				 $('#cover-spin').hide(0); 
			 }
			  if(res.status==4)
			 {
			   $('.errormsg').html('This brand name is already registered with us!') 
			  $('.checkMobile').show() 
			   $('#cover-spin').hide(0); 
			 }
			 if(res.status==3)
			 {
			   $('.errormsg').html('This Brand name, Email and Mobile no. already registered with us!') 
			    
			    $('#email').removeAttr('readonly')
			   $('.checkMobile').show() 
			   $('#cover-spin').hide(0); 
			 }
			 if(res.status==0){
			 $('.errormsg').html('Please verify otp sent to your email and Mobile!') 
			   
			    $('#email').attr('readonly','readonly')
				$('#emailOTP').removeAttr('disabled')
				$('#facheck').show() 
			    $('.mobileVerify').show()  
			     $('#mobile').attr('readonly','readonly')
			    $('#mobileOTP').removeAttr('disabled')
				$('#mobileOTPDiv').show()  
			    $('.checkMobile').hide()  
				$('.checkEmail').hide() 
				$('#emailOTPDiv').show()  
				
				$('.emailVerify').show() 
				 $('#cover-spin').hide(0); 
				 
			   $('#emailOTP').focus() 
			 }
			},
	 	});
			 
			 
 

}

function sendEmailOTP()
{
 	 var formData = $('#frmmain').serialize();
	 var brand = $('#brand').val();
	 	if(!$("#frmmain").valid())
		{
		return false;
		}

	 $.ajax({
	 		url: '{{ URL::to("/sendEmailOTP")}}',
	 		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

	 		type: "GET",
	 		data:formData,
			beforeSend: function() {
       	    $('#cover-spin').show(0);
       	 
    },

	 		success: function (res) { 
		 
			 if(res.status==2)
			 {
			   $('.errormsg').html('This email address is already registered with us!') 
			   $('.checkEmail').show() 
			   $('#email').removeAttr('readonly')
			   $('#cover-spin').hide(0); 
			 }else if(res.status==4){
			   $('.errormsg').html('This Brand is already registered with us!') 
			   $('.checkEmail').show() 
			   $('#cover-spin').hide(0); 
			 }else{
			 $('.errormsg').html('Please verify otp sent to your email!') 
			  $('#facheck').show() 
			   $('.emailVerify').show()  
			    $('#emailOTPDiv').show()  
			     $('#email').attr('readonly','readonly')
			    $('#emailOTP').removeAttr('disabled')
			    $('.checkEmail').hide()  
			  $('#emailOTP').focus() 
			   $('#cover-spin').hide(0); 
  $('#vemailbtn').attr("disabled", true);
			    disableResend();
 			    timer(180);
			   
			 }
			},
	 	});
			 

 

}

function sendMobileOTP()
{
 	 var formData = $('#frmmain').serialize();
	 var brand = $('#brand').val();
	 	if(!$("#frmmain").valid())
		{
		return false;
		}
 	 $.ajax({
	 		url: '{{ URL::to("/sendMobileOTP")}}',
	 		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

	 		type: "GET",
	 		data:formData,
			beforeSend: function() {
       	    $('#cover-spin').show(0);
       	 
    },

	 		success: function (res) { 
		  
			 if(res.status==1)
			 {
			   $('.errormsg').html('This Mobile No. is already registered with us!') 
			   $('.checkMobile').show() 
			   $('#mobile').removeAttr('readonly')
			   $('#cover-spin').hide(0); 
			 }else if(res.status==2){
			   $('.errormsg').html('This Brand is  already registered with us!') 
			   $('.checkMobile').show() 
			   $('#cover-spin').hide(0); 
			 }else{
			 $('.errormsg').html('Please verify otp sent to your Mobile!') 
			  $('#facheck').show() 
			   $('.mobileVerify').show()  
			     $('#mobile').attr('readonly','readonly')
			    $('#mobileOTP').removeAttr('disabled')
				 $('#mobileOTPDiv').show()
			    $('.checkMobile').hide()  
			  $('#mobileOTP').focus() 
			   $('#cover-spin').hide(0); 
			   			     $('#vmobilebtn').attr("disabled", true);

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
			   $('.checkMobile').show() 
			   $('#mobile').removeAttr('readonly')
			   $('#cover-spin').hide(0); 
			 }else if(res.status==2){
			   $('.mobileerror').html('Brand name already exist!') 
			   $('.checkMobile').show() 
			   $('#cover-spin').hide(0); 
			 }else{
			 $('.mobileerror').html('Please verify otp sent to your mobile!') 
			  $('#facheck').show() 
			   $('.mobileVerify').show()  
			     $('#mobile').attr('readonly','readonly')
			    $('#mobileOTP').removeAttr('disabled')
			    $('.checkMobile').hide()  
			  $('#mobileOTP').focus() 
			   $('#cover-spin').hide(0); 
			 }
			},
	 	});
			 

 

}

function mobileVerify()
{
 
 	var otp = $('#mobileOTP').val();
	 $.ajax({
	 		url: '{{ URL::to("/otpVerifyMobile")}}',
	 		headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

	 		type: "GET",
	 		data:{'otp':otp},
			beforeSend: function() {
       	    $('#cover-spin').show(0);
       	 
    },

	 		success: function (res) { 
			 
			 
			 if(res.status==1)
			 {
			  $('.mobileVerify').html('Verified') 
			   $('.mobileerror').hide() 
			   $('#vmobile').hide()
			    $('#bxmobile').show() 
			  $('#mobileverify').val(1) 
			   $('#mobileOTPDiv').hide() 
			    $('#cover-spin').hide(0);
				  $('#brand').attr('readonly','readonly')
			 }else{
			  $('#mobileverify').val(0)
			   $('#cover-spin').hide(0);
			   $('.errormsg').html('Wrong OTP!') 
			 }
			 
			  if( res.verify==1)
			 {
			  $('.btn').show()
			    $('#regenerateOTP').hide();
				 $('#password_sec').show()
				  $('#cover-spin').hide(0);
				  $('.errormsg').hide();
			 
			 }
			 
			},
	 	});
			 

 

}


 

function emailVerify()
{
 
 	var otp = $('#emailOTP').val();
	 
	 $.ajax({
	 		url: '{{ URL::to("/otpVerifyEmail")}}',
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
			   $('.emailerror').hide() 
			   $('#vemail').hide() 
			  $('#emailverify').val(1) 
			   $('#emailOTPDiv').hide() 
			    $('#cover-spin').hide(0);
				 $('#bxemail').show() 
				  $('#brand').attr('readonly','readonly')
			 }else{
			  $('#emailverify').val(0)
			   $('#cover-spin').hide(0);
			   $('.errormsg').html('Wrong OTP!') ;
			 }
			 
			 if( res.verify==1)
			 {
			  $('.btn').show()
			  $('#regenerateOTP').hide();
			   $('#password_sec').show()
			    $('#cover-spin').hide(0);
				 $('.errormsg').hide();
			 }
			 
			},
	 	});
			 

 

}
	 
	
	function disableResend()
{
 
 timer(180);
 
   $('#regenerateOTP').show();
  setTimeout(function() {
    // enable click after 1 second
  $('#vmobilebtn').removeAttr("disabled");
  $('#vemailbtn').removeAttr("disabled");
   $('#vmobile').html("Resend");
  $('#vemail').html("Resend");
    //$('.disable-btn').prop('disabled', false);
  }, 180000); // 1 second delay
}
let timerOn = true;

function timer(remaining) {
  var m = Math.floor(remaining / 60);
  var s = remaining % 60;
  
  m = m < 10 ? '0' + m : m;
  s = s < 10 ? '0' + s : s;
  document.getElementById('timer').innerHTML = m + ':' + s;
  remaining -= 1;
  
  if(remaining >= 0 && timerOn) {
    setTimeout(function() {
        timer(remaining);
    }, 1000);
    return;
  }

  if(!timerOn) {
    // Do validate stuff here
    return;
  }
  
  // Do timeout stuff here
 // alert('Timeout for otp');
}
	  </script>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
   <link href="{{asset('public/assets/img/favicon.png') }}" rel="icon">
  <link href="{{asset('public/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<title>Vendor</title>

   
    

   
     

    <!-- Styles -->
	 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('public/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{asset('public/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{asset('public/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{asset('public/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{asset('public/assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{asset('public/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{asset('public/assets/vendor/aos/aos.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('public/assets/css/style.css') }}" rel="stylesheet">
	
     
	  
</head>
<body class="innerheader">
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo col-lg-3 animated"><a href="/"><img src="{{asset('public/assets/img/logo-inner.png')}}"></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none ml-auto mr-auto d-lg-block">
        <ul>
         
          <li><a href="#">Shop</a></li>
          <li><a href="#">Startup Marketplace </a></li>
         
          <li><a href="#">Resource Center</a></li>
         <!-- <li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Deep Drop Down</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>-->
         

        </ul>
      </nav><!-- .nav-menu -->
<div class="col-lg-3">
      <a href="#" class="get-started-btn scrollto float-right">Login</a></div>

    </div>
  </header>




  
  
<section class="mt-5" style="padding-top:120px">
     <div class="container" data-aos="fade-up">
           <div class="section-title">
          <h2>Registration</h2>
        </div>
<div class="intro">Hello Brand,<br>
We will like to know more about you.</div></div>
</section>
<form method="post" action="{{route('post.register')}}"  name="frmmain" id="frmmain" enctype="multipart/form-data">
<section class="registerblock">
    <div class="container">
        <div class="row">
           
          <div class="col-lg-12 ">
		  @include('includes.messages') 


  <div class="form-group row">
    <label class="col-12 ">Is your entity registered as a Limited, Private Limited, One Person Company or Limited Liability Partnership?</label> 
    <div class="col-12">
         <div class="radiobuttons">
    <div class="rdio rdio-primary radio-inline d-inline"> <input name="radio" value="1" id="radio1" type="radio" checked>
      <label for="radio1">Yes</label>
    </div>
    <div class="rdio rdio-primary radio-inline d-inline">
      <input name="radio" value="2" id="radio2" type="radio">
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
    <div class="rdio rdio-primary radio-inline d-inline"> <input name="radio" value="1" id="radio1" type="radio" checked>
      <label for="radio1">Yes</label>
    </div>
    <div class="rdio rdio-primary radio-inline d-inline">
      <input name="radio" value="2" id="radio2" type="radio">
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
    <div class="rdio rdio-primary radio-inline d-inline"> <input name="radio" value="1" id="radio1" type="radio" checked>
      <label for="radio1">Yes</label>
    </div>
    <div class="rdio rdio-primary radio-inline d-inline">
      <input name="radio" value="2" id="radio2" type="radio">
      <label for="radio2">No</label>
    </div>
  </div>

<!--<div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-secondary active">
    <input type="radio" name="turnover" id="turnover1" autocomplete="off" value="Yes" checked> Yes
  </label>
  <label class="btn btn-secondary">
    <input type="radio" name="turnover" id="turnover2" autocomplete="off" value="No"> No
  </label>
 
</div>-->
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
      <input id="name" name="name" type="text" class="form-control" value="{{old('name')}}" required="required">
    </div>
  </div>
  
          
</div>

 <div class="col-lg-6">
  <div class="form-group row">
   <label class="col-4">Company Name*</label>
    <div class="col-8">
      <input id="brand" name="brand" type="text" value="{{old('brand')}}" class="form-control" required="required" aria-describedby="passwordHelpBlock" placeholder=""> 
  
    </div>
  </div></div>

<div class="col-lg-6">
  <div class="form-group row">
     <label class="col-4">Email*</label>
    <div class="col-8">
      
      
      <div class="input-group mb-0">
  <input  id="email" name="email" type="text" class="form-control" value="{{old('email')}}" required="required">
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2"><a href="#">Submit</a></span>
  </div>
</div>
   <div class="input-group mt-1">
  <input  id="email" name="email" type="text" class="form-control" value="{{old('email')}}" required="required" placeholder="verify email code">
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2"><a href="#">Verify</a></span>
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
        
        <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2"><a href="#">Submit</a></span>
  </div>
      </div> 
      
       <div class="input-group mt-1">
  <input  id="email" name="email" type="text" class="form-control" value="{{old('email')}}" required="required" placeholder="verify OTP code">
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2"><a href="#">Verify</a></span>
  </div>
</div>
    
    </div>
  </div></div>
  
  
  <div class="col-lg-6">
  <div class="form-group row">
     <label class="col-4">Brand Name*</label>
    <div class="col-8">
      <input id="website" name="website" value="{{old('website')}}" type="text" class="form-control" required="required" >
    </div>
  </div></div><div class="col-lg-6">
  
  <div class="form-group row">
    <div class=" col-12">
      <button name="submit" type="submit" class="btn btn-primary register-btn btn-block">Submit</button>
    </div>
  </div></div>
  


    </div>
    
</section>
 </form>
	  
	  
	   <footer id="footer">

   

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact offset-1">
             <img src="{{asset('public/assets/img/logofooter.jpg')}}" class="img-fluid animated" alt="">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.


            </p>
          </div>
<div class="col-lg-6 offset-1 pt-3"><div class="row">
    <div class="col-lg-4 col-md-6 footer-links">
            <h4>More from Us</h4>
            <ul>
              <li><a href="#">Soch Group</a></li>
              <li><a href="#">Beyond Ideas</a></li>
              <li><a href="#">MunchiliciousIN</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Know Us</h4>
            <ul>
              <li><a href="#">About</a></li>
              <li> <a href="#">Contact Us </a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Terms & Policies</h4>
            <ul>
              <li><a href="#">Privacy Policy </a></li>
              <li> <a href="#">FAQ</a></li>
            </ul>
          
          </div>
          
          <div class="col-lg-12 col-md-12 footer-links">  <div class="social-links mt-3"> <strong>Follow Us On:</strong>
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div></div>
          </div></div>
         

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class=" text-center">
        Copyright  &copy; 2020 TOTStore. All Rights Reserved
      </div>
     
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('public/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('public/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('public/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('public/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('public/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('public/assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('public/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('public/assets/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('public/assets/js/main.js')}}"></script>
  <script>jQuery("#carousel").owlCarousel({
  autoplay: true,
  lazyLoad: true,
  loop: true,
  margin: 20,
   /*
  animateOut: 'fadeOut',
  animateIn: 'fadeIn',
  */
  responsiveClass: true,
  autoHeight: true,
  autoplayTimeout: 7000,
  smartSpeed: 800,
  nav: true,
  responsive: {
    0: {
      items: 2
    },

    600: {
      items: 3
    },

    1024: {
      items: 3
    },

    1366: {
      items: 3
    }
  }
});

jQuery("#carousel1").owlCarousel({
  autoplay: true,
  lazyLoad: true,
  loop: true,
  margin: 20,
  padding:10,
   /*
  animateOut: 'fadeOut',
  animateIn: 'fadeIn',
  */
  responsiveClass: true,
  autoHeight: true,
  autoplayTimeout: 7000,
  smartSpeed: 800,
  nav: true,
  responsive: {
    0: {
      items: 2
    },

    600: {
      items: 3
    },

    1024: {
      items: 3
    },

    1366: {
      items: 3
    }
  }
});
</script>

</body>

</html>
	  
	  </body>
	  
	  </html>
	  <script>
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
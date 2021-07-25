<!DOCTYPE html>

    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>Tot</title>
		 <!-- Styles -->
        <link type="text/css" href="{{ asset('/css/app.css') }}" rel="stylesheet" />
      <!-- <link type="text/css" href="{{ asset('/assets/css/style.css') }}" rel="stylesheet" />-->
      
		<link type="text/css" rel="stylesheet" href="{{ asset('/front/assets/css/bootstrap.min.css') }}" />
		 <link href="{{ asset('/front/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/front/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/front/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/front/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('/front/assets/css/slick.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('/front/assets/css/slick-theme.css') }}" />   
   
    <link type="text/css" rel="stylesheet" href="{{ asset('/front/assets/css/font-awesome.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('/front/assets/css/font-awesome.min.css') }}" />      
    <link type="text/css" rel="stylesheet" href="{{ asset('/front/assets/css/style.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('/front/assets/css/responsive.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('/front/assets/css/bootstrap-select.min.css') }}" />
	
    </head>
    <body>
	<a href="#" id="scroll" style="display: none;"><i class="fa fa-angle-up"></i></a>
    <div class="dark_body"></div>
    <div id="app">
			
		      
         <app></app> 
	
			
		</div>   
 <script  src="{{ asset('/js/app.js') }}" ></script>
 
 <script src="{{ asset('/front/assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('/front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/front/assets/js/popper.js') }}"></script>
 
  <script src="{{ asset('/front/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('/front/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('/front/assets/vendor/counterup/counterup.min.js') }}"></script> 
  
  <script src="{{ asset('/front/assets/vendor/aos/aos.js') }}"></script>

  <script src="{{ asset('/front/assets/js/slick.min.js') }}"></script>
  <script src="{{ asset('/front/assets/js/custom.js') }}"></script> 

  <!-- Template Main JS File -->
  <script src="{{ asset('/front/assets/js/main.js') }}"></script>

  <script src="{{ asset('/front/assets/js/bootstrap-select.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>


   
</body>

</html>
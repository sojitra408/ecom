<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="title" content="Welcome to This or That seller central">
    <meta name="description" content="The best online shopping experience for millennials. This or That the eCommerce marketplace exclusive to startups in India to sell products online by Soch Group.">
    <meta name="keywords" content="best online shopping experience, This or That, eCommerce marketplace, startups in India, sell products online">
    <meta name="author" content="">
    <link href="{{asset('public/assets/img/favicon.jpg') }}" rel="icon">
  <link href="{{asset('public/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<title>Welcome to This or That seller central</title>
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
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-170990915-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-170990915-1');
</script>	  
</head>
<body class="innerheader">
    
          @include('layouts/headerInner')

        <main role="main">
            @yield('content')
        </main>
   
	   @yield('footer')
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Front End</title>

    <!-- Scripts -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{asset('public/dist/css/bootstrap.min.css') }}" rel="stylesheet">
	  <link href="{{asset('public/album.css') }}" rel="stylesheet">  
	  
</head>
<body>
    <div id="app">
          @include('auth/layouts/header')

        <main role="main">
            @yield('content')
        </main>
    </div>
	   @yield('footer')
</body>
</html>

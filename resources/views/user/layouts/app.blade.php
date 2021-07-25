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
         <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">Selected Companies</h4>
              <p class="text-muted">Medi World</p>
               <h4 class="text-white">Selected Rates</h4>
              <p class="text-muted">Wholesale</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Personal Section</h4>
              <ul class="list-unstyled">
                <li><a href="#" class="text-white">Mukesh Chache</a></li>
                <li><a href="#" class="text-white">View Your Challans</a></li>
                <li><a href="#" class="text-white">Log Out</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
          
            <strong>Stock Panel</strong>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

        <main role="main">
            @yield('content')
        </main>
    </div>
	   @yield('footer')
</body>
</html>

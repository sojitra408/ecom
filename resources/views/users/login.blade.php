<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="robots" content="noindex, nofollow">
 <link href="{{asset('public/assets/img/favicon.jpg') }}" rel="icon">

  <title>Partner  |  Login </title>

  
  <link href="{!! asset('public/users/vendor/fontawesome-free/css/all.min.css')!!}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
       
  <link href="{!! asset('public/users/css/sb-admin-2.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    
    <script type="text/javascript">
      window.csrf_token = "{{ csrf_token() }}"
    </script>
	<script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
 	<style>
	.error {
    color:#CC0000;
  }
	</style>

</head>
<body class="bg-gradient-primary">


<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">User Login!</h1>
                  </div>
    	 
    

     @include('includes.messages')
  <form method="post" action="{{route('post.login')}}"  name="frmmain" id="frmmain" enctype="multipart/form-data">

 
	  {{ csrf_field() }}

       <div class="form-group has-feedback">
	   <input type="email" name="email" class="form-control form-control-user email-validate"  id="email"  value="{{old('email')}}" placeholder="Username/Email"/>
     
      </div>
      <div class="form-group has-feedback">
       <input type="password" name='password' class='form-control  form-control-user field-validate' placeholder="Password">
      
      </div>
  	 
		  <input type="submit" name="login" value="{{trans('labels.login')}}" id="login"  class="btn btn-primary btn-user btn-block" />
        
   </form>

 <hr>
 </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
 <!-- Bootstrap core JavaScript-->
  <script src="{!! asset('public/users/vendor/jquery/jquery.min.js') !!}"></script>
  <script src="{!! asset('public/users/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{!! asset('public/users/vendor/jquery-easing/jquery.easing.min.js') !!}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{!! asset('public/users/js/sb-admin-2.min.js') !!}"></script>
  </body>

</html>
 
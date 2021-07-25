<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Admin Panel |  Password </title>
<!--secure_asset-->
  
  <link href="{!! asset('public/admin/vendor/fontawesome-free/css/all.min.css')!!}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
       
  <link href="{!! asset('public/admin/css/sb-admin-2.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    
    <script type="text/javascript">
      window.csrf_token = "{{ csrf_token() }}"
    </script>

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
              
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">{{ __('Create Password') }}</h1>
                  </div>
    	 
    

      @if(session('status'))
                      <div class="">
                          <div class="alert alert-{{ session('status') }} alert-bordered">
                              <button type="button" class="close" data-dismiss="alert"></button>
                              {!! session('msg') !!}
                          </div>
                      </div>
                      @endif
   <form method="POST" action="{{ route('admin.password.save') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Create Password') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="password" class="form-control" name="password_confirmation" required>

                              
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn  btn-primary btn-sm" style="font-size:80%; padding:10px 7px">
                                    {{ __('Save') }}
                                </button>
                                | 
                            <a href="{{route('admin.login')}}">  Login</a>  
                            </div>
                        </div>
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
  <script src="{!! asset('public/admin/vendor/jquery/jquery.min.js') !!}"></script>
  <script src="{!! asset('public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{!! asset('public/admin/vendor/jquery-easing/jquery.easing.min.js') !!}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{!! asset('public/admin/js/sb-admin-2.min.js') !!}"></script>
  </body>

</html>
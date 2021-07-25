<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Admin Panel |  {{ $pageTitle }} </title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="Themescoder" content="">
  <!-- Bootstrap 3.3.6 -->
  <link href="{!! secure_asset('public/admin/bootstrap/css/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
  <link href="{!! secure_asset('public/admin/bootstrap/css/styles.css') !!}" media="all" rel="stylesheet" type="text/css" />
  <link href="{!! secure_asset('public/admin/css/dropzone.css') !!}" media="all" rel="stylesheet" type="text/css" />
  <link href="{!! secure_asset('public/admin/css/custom.ilyas.css') !!}" media="all" rel="stylesheet" type="text/css" />
  {{--fancybox--}}

  <link href="{!! secure_asset('public/admin/vendor/fontawesome-free/css/all.min.css')!!}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="{!! secure_asset('public/admin/css/sb-admin-2.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
 
  
  
    <script type="text/javascript">
      window.csrf_token = "{{ csrf_token() }}"
    </script>

  <!-- Ionicons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" media="all" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="../../assets/js/jquery-2.2.4.min"><\/script>')</script>

  <![endif]-->
</head>
<style>
.dragable-box-cursor img{
  cursor: move;
}

</style>

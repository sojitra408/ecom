<!DOCTYPE html>
<html>

<!-- meta contains meta taga, css and fontawesome icons etc -->
@include('users.common.meta')
<!-- ./end of meta -->

<body id="page-top">
<!-- wrapper -->
 <div id="wrapper">

   

    <!-- left sidebar -->
@include('users.common.sidebar')
<!-- ./end of left sidebar -->
 <div id="content-wrapper" class="d-flex flex-column">
  <div id="content">
 <!-- header contains top navbar -->
@include('users.common.header')
<!-- ./end of header -->

    <!-- dynamic content -->
@yield('content')
<!-- ./end of dynamic content -->
  </div>
    <!-- right sidebar -->
 
<!-- ./right sidebar -->
    @include('users.common.footer')
</div>
</div>
<!-- ./wrapper -->

<!-- all js scripts including custom js -->
@include('users.common.scripts')
<!-- ./end of js scripts -->

</body>
</html>

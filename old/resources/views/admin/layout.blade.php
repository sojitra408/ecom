<!DOCTYPE html>
<html>

<!-- meta contains meta taga, css and fontawesome icons etc -->
@include('admin.common.meta')
<!-- ./end of meta -->

<body id="page-top">
<!-- wrapper -->
 <div id="wrapper">

   

    <!-- left sidebar -->
@include('admin.common.sidebar')
<!-- ./end of left sidebar -->
 <div id="content-wrapper" class="d-flex flex-column">
  <div id="content">
 <!-- header contains top navbar -->
@include('admin.common.header')
<!-- ./end of header -->

    <!-- dynamic content -->
@yield('content')
<!-- ./end of dynamic content -->
  </div>
    <!-- right sidebar -->
 
<!-- ./right sidebar -->
    @include('admin.common.footer')
</div>
</div>
<!-- ./wrapper -->

<!-- all js scripts including custom js -->
@include('admin.common.scripts')
<!-- ./end of js scripts -->

</body>
</html>

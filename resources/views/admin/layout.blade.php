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

 <style>.cv-spinner {
  height: 50%;
  display: flex;
  justify-content: center;
  align-items: center;  
}
.spinner {
  width: 40px;
  height: 40px;
  border: 4px #ddd solid;
  border-top: 4px #2e93e6 solid;
  border-radius: 50%;
  animation: sp-anime 0.8s infinite linear;
}
@keyframes sp-anime {
  100% { 
    transform: rotate(360deg); 
  }
}
.is-hide{
  display:none;
}</style>
<div id="overlay" style="display:none;">
  <div class="cv-spinner">
    <span class="spinner"></span>
  </div>
</div>
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

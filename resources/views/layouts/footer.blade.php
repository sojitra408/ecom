 <footer id="footer">

   

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-12 text-center  footer-contact mb-0">
             <img src="{{asset('public/assets/img/logofooter.jpg')}}" class="img-fluid animated" alt="">
            <p class="col-6 mx-auto">
              WORLD'S FIRST OMNICHANNEL RETAIL<br>
PLATFORM EXCLUSIVELY FOR START-UP PRODUCTS

            </p>
          </div>
<div class="col-12 text-center pt-0">
  <hr class="col-4 mx-auto">
      <h3> Contact Us</h3> partner.support@thisorthat.in</div>
         <div class="col-6 text-center mx-auto">

           <div class="social-links mt-3"> <strong class="mb-2">Follow Us On:</strong> <br><br>
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              
            </div></div>

        </div>
      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class=" text-center">
        Copyright  &copy; 2020 TOTStore. All Rights Reserved
      </div>
     
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('public/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('public/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('public/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('public/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('public/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('public/assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('public/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('public/assets/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('public/assets/js/main.js')}}"></script>
  <script>jQuery("#carousel").owlCarousel({
  autoplay: true,
  lazyLoad: true,
  loop: true,
  margin: 20,
   /*
  animateOut: 'fadeOut',
  animateIn: 'fadeIn',
  */
  responsiveClass: true,
  autoHeight: true,
  autoplayTimeout: 7000,
  smartSpeed: 800,
  nav: true,
  responsive: {
    0: {
      items: 2
    },

    600: {
      items: 3
    },

    1024: {
      items: 3
    },

    1366: {
      items: 3
    }
  }
});

jQuery("#carousel1").owlCarousel({
  autoplay: true,
  lazyLoad: true,
  loop: true,
  margin: 20,
  padding:10,
   /*
  animateOut: 'fadeOut',
  animateIn: 'fadeIn',
  */
  responsiveClass: true,
  autoHeight: true,
  autoplayTimeout: 7000,
  smartSpeed: 800,
  nav: true,
  responsive: {
    0: {
      items: 2
    },

    600: {
      items: 3
    },

    1024: {
      items: 3
    },

    1366: {
      items: 3
    }
  }
});
</script>

</body>

</html>
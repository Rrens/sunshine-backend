<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>SunShine Cafe</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="{{ asset('index/img/icon/favicon.ico') }}" rel="icon" />
    <link href="{{ asset('index/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('index/vendor/animate.css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('index/vendor/aos/aos.css') }}" rel="stylesheet" />
    <link
      href="{{ asset('index/vendor/bootstrap/css/bootstrap.min.css') }}"
      rel="stylesheet"
    />
    <link
      href="{{ asset('index/vendor/bootstrap-icons/bootstrap-icons.css') }}"
      rel="stylesheet"
    />
    <link href="{{ asset('index/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
    <link
      href="index/vendor/glightbox/css/glightbox.min.css"
      rel="stylesheet"
    />
    <link href="{{ asset('index/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('index/css/style.css') }}" rel="stylesheet" />

    <!-- =======================================================
  * Template Name: Restaurantly - v3.9.1
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  </head>

  <body>

@include('components.navbar')

@include('components.hero')

    <main id="main">
@include('components.about')
@include('components.why')
@include('components.menu')
@include('components.special')
@include('components.event')
@include('components.testimony')
@include('components.galery')
@include('components.barista')















@include('components.contact')
    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
@include('components.footer')

    <div id="preloader"></div>
    <a
      href="#"
      class="back-to-top d-flex align-items-center justify-content-center"
      ><i class="bi bi-arrow-up-short"></i
    ></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('index/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('index/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('index/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('index/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('index/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('index/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('index/js/main.js') }}"></script>
  </body>
</html>

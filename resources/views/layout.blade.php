<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pengundian - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="{{ asset('pages/assets/css/style.css') }}" rel="stylesheet">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- Favicons -->
  <link href="{{ asset('pages/assets/img/favicon.png')}}" rel ="icon">
  <link href="{{ asset('pages/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('pages/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('pages/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  {{-- <link href="{{ asset('pages/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet"> --}}
  {{-- <link href="{{ asset('pages/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet"> --}}
  {{-- <link href="{{ asset('pages/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet"> --}}
  {{-- <link href="{{ asset('pages/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet"> --}}
  {{-- <link href="{{ asset('pages/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet"> --}}

  <!-- Template Main CSS File -->

  <!-- =======================================================
  * Template Name: Arsha
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <div id="preloader"></div>

  @include('pages.partials.navbar')
  @yield('content')
  {{-- @include('admin.partials.footer') --}}
  @include('sweetalert::alert')


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('pages/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('pages/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('pages/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  {{-- <script src="{{ asset('pages/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script> --}}
  <script src="{{ asset('pages/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  {{-- <script src="{{ asset('pages/assets/vendor/waypoints/noframework.waypoints.js') }}"></script> --}}
  {{-- <script src="{{ asset('pages/assets/vendor/php-email-form/validate.js') }}"></script> --}}

  <!-- Template Main JS File -->
  <script src="{{ asset('pages/assets/js/main.js') }}"></script>

</body>

</html>
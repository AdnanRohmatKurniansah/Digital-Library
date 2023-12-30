<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Digital Library - {{ $title }}</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="/assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="/assets/modules/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="/assets/modules/weather-icon/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="/assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="/assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
  <link rel="stylesheet" href="/assets/modules/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="/assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="/assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="/assets/modules/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="/assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">


  <!-- Template CSS -->
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/css/components.css">
<!-- Start GA -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      @include('components.alert')
      @include('components.navbar')
      @include('components.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      @include('components.footer')
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="/assets/modules/jquery.min.js"></script>
  <script src="/assets/modules/popper.js"></script>
  <script src="/assets/modules/tooltip.js"></script>
  <script src="/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="/assets/modules/moment.min.js"></script>
  <script src="/assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="/assets/modules/datatables/datatables.min.js"></script>
  <script src="/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="/assets/modules/jquery-ui/jquery-ui.min.js"></script>

  <script src="/assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
  <script src="/assets/modules/chart.min.js"></script>
  <script src="/assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="/assets/modules/summernote/summernote-bs4.js"></script>
  <script src="/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="/assets/modules/cleave-js/dist/cleave.min.js"></script>
  <script src="/assets/modules/cleave-js/dist/addons/cleave-phone.us.js"></script>
  <script src="/assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="/assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="/assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="/assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="/assets/modules/select2/dist/js/select2.full.min.js"></script>
  <script src="/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
  
  
  <!-- Page Specific JS File -->
  <script src="/assets/js/page/bootstrap-modal.js"></script>
  <script src="/assets/js/page/modules-datatables.js"></script>
  <script src="/assets/js/page/index-0.js"></script>
  <script src="/assets/js/page/forms-advanced-forms.js"></script>
  
  <!-- Template JS File -->
  <script src="/assets/js/scripts.js"></script>
  <script src="/assets/js/custom.js"></script>
</body>
</html>
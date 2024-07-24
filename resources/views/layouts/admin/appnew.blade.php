<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title', 'Dashboard E-DOKIN')</title>
  {{-- &mdash; --}}

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('style/dist/assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('style/dist/assets/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('style/dist/assets/modules/jqvmap/dist/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{asset('style/dist/assets/modules/weather-icon/css/weather-icons.min.css')}}">
  <link rel="stylesheet" href="{{asset('style/dist/assets/modules/weather-icon/css/weather-icons-wind.min.css')}}">
  <link rel="stylesheet" href="{{asset('style/dist/assets/modules/summernote/summernote-bs4.css')}}">

      <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('style/dist/assets/modules/datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{asset('style/dist/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('style/dist/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('style/dist/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('style/dist/assets/css/components.css')}}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>

{{-- <style>
    .active {
      color: #6777ef; /* Warna teks ketika aktif */
    }
  </style>
<!-- /END GA --></head> --}}

<body>

  <body>
    <div id="app">
      <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        
        @include('layouts.admin.navbar')
        @include('layouts.admin.sidebar')
        
        <div class="main-content">
          @yield('content')
        </div>
  
        @include('layouts.admin.footer')
      </div>
    </div>
  </body>
  </html>

     <!-- General JS Scripts -->
  <script src="{{asset('style/dist/assets/modules/jquery.min.js')}}"></script>
  <script src="{{asset('style/dist/assets/modules/popper.js')}}"></script>
  <script src="{{asset('style/dist/assets/modules/tooltip.js')}}"></script>
  <script src="{{asset('style/dist/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('style/dist/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('style/dist/assets/modules/moment.min.js')}}"></script>
  <script src="{{asset('style/dist/assets/js/stisla.js')}}"></script>
  
  <!-- JS Libraies -->
  <script src="{{asset('style/dist/assets/modules/simple-weather/jquery.simpleWeather.min.js')}}"></script>
  <script src="{{asset('style/dist/assets/modules/chart.min.js')}}"></script>
  <script src="{{asset('style/dist/assets/modules/jqvmap/dist/jquery.vmap.min.js')}}"></script>
  <script src="{{asset('style/dist/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
  <script src="{{asset('style/dist/assets/modules/summernote/summernote-bs4.js')}}"></script>
  <script src="{{asset('style/dist/assets/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{asset('style/dist/assets/js/page/index-0.js')}}"></script>
  
  <!-- Template JS File -->
  <script src="{{asset('style/dist/assets/js/scripts.js')}}"></script>
  <script src="{{asset('style/dist/assets/js/custom.js')}}"></script>
<!-- JS Libraies -->
<script src="{{asset('style/dist/assets/modules/datatables/datatables.min.js')}}"></script>
<script src="{{asset('style/dist/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('style/dist/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('style/dist/assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>

<!-- Page Specific JS File -->
<script src="{{asset('style/dist/assets/js/page/modules-datatables.js')}}"></script>

 

  {{-- <script>
    // Mendapatkan semua elemen dengan kelas "nav-link"
    const navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach(link => {
      link.addEventListener('click', function(event) {
        // Menghapus kelas "active" dari semua elemen
        navLinks.forEach(link => link.classList.remove('active'));
        // Menambahkan kelas "active" pada elemen yang diklik
        this.classList.add('active');
      });
    });
  </script> --}}
</body>
</html>
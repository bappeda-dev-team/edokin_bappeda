<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard E-DOKIN</title>
  {{-- &mdash; --}}

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('style/dist/assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('style/dist/assets/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('style/dist/assets/modules/jqvmap/dist/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{asset('style/dist/assets/modules/weather-icon/css/weather-icons.min.css')}}">
  <link rel="stylesheet" href="{{asset('style/dist/assets/modules/weather-icon/css/weather-icons-wind.min.css')}}">
  <link rel="stylesheet" href="{{asset('style/dist/assets/modules/summernote/summernote-bs4.css')}}">

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



</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">E-DOKIN</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">ED</a>
          </div>
          
          <ul class="sidebar-menu">
            <li><a class="nav-link" href="/home-dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            {{-- <li class="dropdown active">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              <ul class="dropdown-menu">
                <li class=active><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
              </ul>
            </li> --}}
            {{-- <li class="menu-header">Starter</li> --}}
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i> <span>Master Data</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="/home-dashboard">Perangkat Daerah</a></li>
                <li><a class="nav-link" href="layout-transparent.html">Pegawai</a></li>
              </ul>
            </li>
            {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Renstra</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="bootstrap-alert.html">Kata Pengantar</a></li>
                <li><a class="nav-link" href="bootstrap-badge.html">Daftar Isi</a></li>
                <li><a class="nav-link" href="bootstrap-breadcrumb.html">BAB 1</a></li>
                <li><a class="nav-link" href="bootstrap-buttons.html">BAB 2</a></li>
            </li>
           

                 </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
            <h5>Ini Halaman Dashboard</h5>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2024 <div class="bullet"></div> Design By <a href="https://nauval.in/">BAPPEDA Kota Madiun</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

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

  
</body>
</html>
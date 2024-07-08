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


<style>
.sidebar-menu .active > a {
    background-color: #007bff;
    color: white;
}

.sidebar-menu .dropdown-menu .active > a {
    background-color: #007bff;
    color: white;
}
</style>


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

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        var menuItems = document.querySelectorAll('.sidebar-menu li');

        menuItems.forEach(function(item) {
            item.addEventListener('click', function() {
                // Remove active class from all menu items
                menuItems.forEach(function(item) {
                    item.classList.remove('active');
                });

                // Add active class to the clicked menu item
                item.classList.add('active');
            });
        });

        // Highlight the active menu item based on the current URL path
        var path = window.location.pathname;

        // Define a mapping between paths and menu items
        var menuMapping = {
            '/dashboard': 'menu-dashboard',
            '/dashboard/perangkat': 'menu-perangkat',
            '/dashboard/pegawai': 'menu-pegawai',
            '/dashboard/kata-pengantar': 'menu-kata-pengantar',
            '/dashboard/daftar-isi': 'menu-daftar-isi',
            '/dashboard/bab1': 'menu-bab1',
            '/dashboard/bab2': 'menu-bab2',
            '/dashboard/bab3': 'menu-bab3',
            '/dashboard/bab4': 'menu-bab4',
            '/dashboard/bab5': 'menu-bab5',
            '/dashboard/bab6': 'menu-bab6',
            '/dashboard/bab7': 'menu-bab7',
            '/dashboard/bab8': 'menu-bab8'
        };

        var activeMenuItem = menuMapping[path];
        if (activeMenuItem) {
            var element = document.getElementById(activeMenuItem);
            if (element) {
                element.classList.add('active');

                // If it's a dropdown item, ensure the parent dropdown is also highlighted
                if (element.closest('.dropdown-menu')) {
                    element.closest('.dropdown').classList.add('active');
                }
            }
        }
    });
</script>

</body>
</html>
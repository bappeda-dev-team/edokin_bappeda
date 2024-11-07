<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title', 'Dashboard E-DOKIN')</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('style/dist/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style/dist/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- Summernote CSS -->
    <link rel="stylesheet" href="{{ asset('style/dist/assets/modules/summernote/summernote-bs4.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('style/dist/assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('style/dist/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('style/dist/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('style/dist/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('style/dist/assets/css/components.css') }}">

</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            @include('layouts.opd.navbar')
            @include('layouts.opd.sidebar')

            <div class="main-content">
                @yield('content')
            </div>

            @include('layouts.opd.footer')
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('style/dist/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('style/dist/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('style/dist/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('style/dist/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('style/dist/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('style/dist/assets/js/stisla.js') }}"></script>
    <!-- Summernote JS -->
    <script src="{{ asset('style/dist/assets/modules/summernote/summernote-bs4.js') }}"></script>


    <!-- JS Libraies -->
    <script src="{{ asset('style/dist/assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('style/dist/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('style/dist/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('style/dist/assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Template JS File -->
    <script src="{{ asset('style/dist/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('style/dist/assets/js/custom.js') }}"></script>

    @yield('scripts')

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
                '/opd/dashboard': 'menu-dashboard',
                '/opd/dashboard/perangkat': 'menu-perangkat',
                '/opd/dashboard/pegawai': 'menu-pegawai',
                '/opd/dashboard/kata-pengantar': 'menu-kata-pengantar',
                '/opd/dashboard/daftar-isi': 'menu-daftar-isi',
                '/opd/dashboard/bab1': 'menu-bab1',
                '/opd/dashboard/create-bab1': 'menu-bab1',
                '/opd/dashboard/bab2': 'menu-bab2',
                '/opd/dashboard/bab3': 'menu-bab3',
                '/opd/dashboard/bab4': 'menu-bab4',
                '/opd/dashboard/bab5': 'menu-bab5',
                '/opd/dashboard/bab6': 'menu-bab6',
                '/opd/dashboard/bab7': 'menu-bab7',
                '/opd/dashboard/bab8': 'menu-bab8'
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

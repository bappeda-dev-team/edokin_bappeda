<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">E-DOKIN</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">ED</a>
        </div>
        
        <ul class="sidebar-menu">
            <li id="menu-dashboard"><a class="nav-link" href="/admin/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="dropdown" id="menu-master-data">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i> <span>Master Data</span></a>
                <ul class="dropdown-menu">
                    <li id="menu-perangkat"><a class="nav-link" href="/admin/dashboard/perangkat">Perangkat Daerah</a></li>
                    <li id="menu-pegawai"><a class="nav-link" href="/admin/dashboard/pegawai">Pegawai</a></li>
                </ul>
            </li>
            <li class="menu-header" style="font-size: 14px;">Dokumen</li>
            <li class="dropdown" id="menu-renstra">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-th"></i> <span>Renstra</span></a>
                <ul class="dropdown-menu">
                    <!-- Untuk Admin -->
                    @if(Auth::user()->role == 'admin')
                        <li id="menu-kata-pengantar"><a class="nav-link" href="/admin/dashboard/kata-pengantar">Kata Pengantar</a></li>
                        <li id="menu-daftar-isi"><a class="nav-link" href="/admin/dashboard/daftar-isi">Daftar Isi</a></li>
                        <li id="menu-bab1"><a class="nav-link" href="/admin/dashboard/bab1">BAB 1</a></li>
                        <li id="menu-bab2"><a class="nav-link" href="/admin/dashboard/bab2">BAB 2</a></li>
                        <li id="menu-bab3"><a class="nav-link" href="/admin/dashboard/bab3">BAB 3</a></li>
                        <li id="menu-bab4"><a class="nav-link" href="/admin/dashboard/bab4">BAB 4</a></li>
                        <li id="menu-bab5"><a class="nav-link" href="/admin/dashboard/bab5">BAB 5</a></li>
                        <li id="menu-bab6"><a class="nav-link" href="/admin/dashboard/bab6">BAB 6</a></li>
                        <li id="menu-bab7"><a class="nav-link" href="/admin/dashboard/bab7">BAB 7</a></li>
                        <li id="menu-bab8"><a class="nav-link" href="/admin/dashboard/bab8">BAB 8</a></li>
                    @elseif(Auth::user()->role == 'opd')
                        <!-- Untuk OPD -->
                        <li id="menu-kata-pengantar"><a class="nav-link" href="/opd/dashboard/kata-pengantar">Kata Pengantar</a></li>
                    <li id="menu-daftar-isi"><a class="nav-link" href="/opd/dashboard/daftar-isi">Daftar Isi</a></li>
                    <li id="menu-bab1"><a class="nav-link" href="/opd/dashboard/bab1">BAB 1</a></li>
                    <li id="menu-bab2"><a class="nav-link" href="/opd/dashboard/bab2">BAB 2</a></li>
                    <li id="menu-bab3"><a class="nav-link" href="/opd/dashboard/bab3">BAB 3</a></li>
                    <li id="menu-bab4"><a class="nav-link" href="/opd/dashboard/bab4">BAB 4</a></li>
                    <li id="menu-bab5"><a class="nav-link" href="/opd/dashboard/bab5">BAB 5</a></li>
                    <li id="menu-bab6"><a class="nav-link" href="/opd/dashboard/bab6">BAB 6</a></li>
                    <li id="menu-bab7"><a class="nav-link" href="/opd/dashboard/bab7">BAB 7</a></li>
                    <li id="menu-bab8"><a class="nav-link" href="/opd/dashboard/bab8">BAB 8</a></li>
                        <!-- Anda bisa menambahkan menu lain yang relevan untuk OPD -->
                    @else
                        <!-- Untuk pengguna dengan role lain -->
                        <li><a href="#">Akses tidak diizinkan</a></li>
                    @endif
                </ul>
                
            </li>
            <li class="dropdown" id="menu-renstra">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-th"></i> <span>Renja</span></a>
                {{-- <ul class="dropdown-menu">
                    
                    <li id="menu-kata-pengantar"><a class="nav-link" href="/admin/dashboard/kata-pengantar">Kata Pengantar</a></li>
                    <li id="menu-daftar-isi"><a class="nav-link" href="/admin/dashboard/daftar-isi">Daftar Isi</a></li>
                    <li id="menu-bab1"><a class="nav-link" href="/admin/dashboard/bab1">BAB 1</a></li>
                    <li id="menu-bab2"><a class="nav-link" href="/admin/dashboard/bab2">BAB 2</a></li>
                    <li id="menu-bab3"><a class="nav-link" href="/admin/dashboard/bab3">BAB 3</a></li>
                    <li id="menu-bab4"><a class="nav-link" href="/admin/dashboard/bab4">BAB 4</a></li>
                    <li id="menu-bab5"><a class="nav-link" href="/admin/dashboard/bab5">BAB 5</a></li>
                    <li id="menu-bab6"><a class="nav-link" href="/admin/dashboard/bab6">BAB 6</a></li>
                    <li id="menu-bab7"><a class="nav-link" href="/admin/dashboard/bab7">BAB 7</a></li>
                    <li id="menu-bab8"><a class="nav-link" href="/admin/dashboard/bab8">BAB 8</a></li>
                </ul> --}}
            </li>
            {{-- <li class="dropdown" id="menu-renstra">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-th"></i> <span>2025-2029</span></a>
                <ul class="dropdown-menu">
                    
                    <li id="menu-kata-pengantar"><a class="nav-link" href="/admin/dashboard/kata-pengantar">Kata Pengantar</a></li>
                    <li id="menu-daftar-isi"><a class="nav-link" href="/admin/dashboard/daftar-isi">Daftar Isi</a></li>
                    <li id="menu-bab1"><a class="nav-link" href="/admin/dashboard/bab1">BAB 1</a></li>
                    <li id="menu-bab2"><a class="nav-link" href="/admin/dashboard/bab2">BAB 2</a></li>
                    <li id="menu-bab3"><a class="nav-link" href="/admin/dashboard/bab3">BAB 3</a></li>
                    <li id="menu-bab4"><a class="nav-link" href="/admin/dashboard/bab4">BAB 4</a></li>
                    <li id="menu-bab5"><a class="nav-link" href="/admin/dashboard/bab5">BAB 5</a></li>
                    <li id="menu-bab6"><a class="nav-link" href="/admin/dashboard/bab6">BAB 6</a></li>
                    <li id="menu-bab7"><a class="nav-link" href="/admin/dashboard/bab7">BAB 7</a></li>
                    <li id="menu-bab8"><a class="nav-link" href="/admin/dashboard/bab8">BAB 8</a></li>
                </ul>
            </li> --}}
        </ul>
    </aside>
</div>

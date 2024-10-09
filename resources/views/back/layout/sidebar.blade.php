<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/admin') }}" class="brand-link">
        <span class="brand-text font-weight-light">Salimah</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">
                <a class="far fa-user nav-icon" href="{{ route('profile.edit', Auth::user()->id) }}" class="d-block">
                    {{ Auth::user()->name }}</a>
                <p class="d-block cabang-name">{{ Auth::user()->cabang ? Auth::user()->cabang->nama : 'Admin Pusat' }}
                </p>
            </div>
        </div>
        <style>
            .cabang-name {
                color: rgb(166, 163, 163);
                font-size: 12px;
                max-width: 200px;
            }
        </style>

        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ url('/Dashboardadmin') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Halaman
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/Dashboardadmin') }}" class="nav-link">
                                <i class="fa fa-home nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/kategoriadmin') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/artikeladmin') }}" class="nav-link">
                                <i class="fa fa-newspaper nav-icon"></i>
                                <p>Artikel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/galeriadmin') }}" class="nav-link">
                                <i class="far fa-image nav-icon"></i>
                                <p>Galeri</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/laporan') }}" class="nav-link">
                                <i class="far fa-file"></i>
                                <p>Kegiatan</p>
                                {{-- <span class="badge badge-info right">{{ $laporanCount }}</span> --}}
                            </a>
                        </li>


                    </ul>
                </li>



                @auth
                    @if (auth()->user()->admin_Pusat())
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Edit Tampilan
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/berandaadmin" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tampilan Beranda</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/editabout" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tampilan About</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/programadmin" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Program</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/editmediasocial" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Media Social</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/cabang" class="nav-link">
                                <i class="fas fa-map-marker-alt"></i>
                                <p>Cabang</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/pengguna" class="nav-link">
                                <i class="far fa-user nav-icon"></i>
                                <p>Pengguna</p>
                            </a>
                        </li>
                    @endif
                @endauth
                <li class="nav-item">
                    <a href="{{ url('/logout') }}" class="nav-link">
                        <i class="fas fa-sign-out-alt red"></i>
                        <p>LogOut</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?= $title; ?></title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="favicon.ico"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["{{ asset('assets/css/fonts.min.css') }}"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <img
                src="assets/img/siad-logo-light.png"
                alt="navbar brand"
                class="navbar-brand"
                height="30"
                />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
            </div>
            <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <ul class="nav nav-secondary">
                    <li class="nav-item">
                        <a
                            data-bs-toggle="collapse"
                            href="#"
                            class="collapsed"
                            aria-expanded="false"
                        >
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Data</h4>
                    </li>

                    {{-- Siswa --}}
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#siswa">
                            <i class="fas fa-layer-group"></i>
                            <p>Siswa</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="siswa">
                            <ul class="nav nav-collapse">
                            <li>
                                <a href="/siswa">
                                <span class="sub-item">Data Siswa</span>
                                </a>
                            </li>
                            <li>
                                <a href="/siswa/tambah">
                                <span class="sub-item">Input Siswa</span>
                                </a>
                            </li>
                            <li>
                                <a href="/siswa/absensi">
                                <span class="sub-item">Absen Siswa</span>
                                </a>
                            </li>
                        </div>
                    </li>

                    {{-- Guru --}}
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#guru">
                            <i class="fas fa-layer-group"></i>
                            <p>Guru</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="guru">
                            <ul class="nav nav-collapse">
                            <li>
                                <a href="components/avatars.html">
                                <span class="sub-item">Data Guru</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/buttons.html">
                                <span class="sub-item">Input Guru</span>
                                </a>
                            </li>
                        </div>
                    </li>

                    {{-- Mata Pelajaran --}}
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#mapel">
                            <i class="fas fa-layer-group"></i>
                            <p>Mata Pelajaran</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="mapel">
                            <ul class="nav nav-collapse">
                            <li>
                                <a href="components/avatars.html">
                                <span class="sub-item">Data Mata Pelajaran</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/buttons.html">
                                <span class="sub-item">Input Mata Pelajaran </span>
                                </a>
                            </li>
                        </div>
                    </li>

                    {{-- Nilai --}}
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#nilai">
                            <i class="fas fa-layer-group"></i>
                            <p>Nilai</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="nilai">
                            <ul class="nav nav-collapse">
                            <li>
                                <a href="components/avatars.html">
                                <span class="sub-item">Data Nilai Ujian</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/buttons.html">
                                <span class="sub-item">Input Nilai Ujian</span>
                                </a>
                            </li>
                        </div>
                    </li>

                    {{-- Kelas --}}
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#kelas">
                            <i class="fas fa-layer-group"></i>
                            <p>Kelas</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="kelas">
                            <ul class="nav nav-collapse">
                            <li>
                                <a href="components/avatars.html">
                                <span class="sub-item">Data Kelas</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/buttons.html">
                                <span class="sub-item">Input Kelas</span>
                                </a>
                            </li>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="index.html" class="logo">
                <img
                  src="assets/img/siad-logo.png"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
            <nav
                class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
                >
                <div class="container-fluid">
                    <h3>SD IT Arofatul Ulum</h3>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary rounded">Logout</button>
                </form>
            </nav>

          <!-- End Navbar -->
        </div>

        <div class="container">
          <div class="page-inner">
            @yield('content')
          </div>
        </div>

        <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">
            <nav class="pull-left">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="#"> Bantuan </a>
                </li>
              </ul>
            </nav>
            <div class="copyright">
              2025, dibuat oleh <a href="http://www.themekita.com">Kelompok D</a>
            </div>
          </div>
        </footer>
      </div>

    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jsvectormap/world.js') }}"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('assets/js/kaiadmin.min.js') }}"></script>

  </body>
</html>

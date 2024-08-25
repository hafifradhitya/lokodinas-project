<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Welcome Administrator-</title>
  <link rel="icon" href="{{ asset('foto_identitas/Website DPPKB Karawang 2_JUgtyyIC4x6eZLRfKWazW.png')}}" type="image/x-icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="{{ url('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ url('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ url('assets/css/argon.css') }}" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

  <!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


</head>

<body>
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header d-flex align-items-center">
                <a class="navbar-brand" href="{{ url('administrator/dashboard') }}">
                    Administrator
                </a>
                <div class="ml-auto">
                    <!-- Sidenav toggler -->
                    <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin"
                        data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('dashboard') }}">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#menu-utama" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="menu-utama">
                                <i class="ni ni-ungroup text-orange"></i>
                                <span class="nav-link-text">Menu Utama</span>
                            </a>
                            <div class="collapse" id="menu-utama">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('administrator.identitaswebsite.edit') }}"
                                            class="nav-link">Identitas Website</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/menuwebsite') }}"
                                            class="nav-link">Menu Website</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/halamanbaru') }}"
                                            class="nav-link">Halaman Baru</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#modul-berita" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="modul-berita">
                                <i class="ni ni-ungroup text-orange"></i>
                                <span class="nav-link-text">Modul Berita</span>
                            </a>
                            <div class="collapse" id="modul-berita">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/berita') }}"
                                            class="nav-link">Berita</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/kategoriberita') }}"
                                            class="nav-link">Kategori Berita</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/tagberita') }}"
                                            class="nav-link">Tag Berita</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#modul-video" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="modul-video">
                                <i class="ni ni-ui-04 text-info"></i>
                                <span class="nav-link-text">Modul Video</span>
                            </a>
                            <div class="collapse" id="modul-video">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/playlistvideo') }}"
                                            class="nav-link">Playlist Video</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/video') }}"
                                            class="nav-link">Video</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/tagvideo') }}"
                                            class="nav-link">Tag Video</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#modul-banner" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="modul-banner">
                                <i class="ni ni-single-copy-04 text-pink"></i>
                                <span class="nav-link-text">Modul Banner</span>
                            </a>
                            <div class="collapse" id="modul-banner">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/bannerslider') }}"
                                            class="nav-link">Banner Slider</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/modul-banner/bannerhome') }}"
                                            class="nav-link">Banner Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/iklansidebar') }}"
                                            class="nav-link">Iklan Sidebar</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#modul-web" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="modul-web">
                                <i class="ni ni-align-left-2 text-default"></i>
                                <span class="nav-link-text">Modul Web</span>
                            </a>
                            <div class="collapse" id="modul-web">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/logowebsite') }}"
                                            class="nav-link">Logo Website</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/templatewebsite') }}"
                                            class="nav-link">Template Website</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/backgroundwebsite') }}"
                                            class="nav-link">Background Website</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#modul-interaksi" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="modul-interaksi">
                                <i class="ni ni-map-big text-primary"></i>
                                <span class="nav-link-text">Modul Interaksi</span>
                            </a>
                            <div class="collapse" id="modul-interaksi">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/agenda') }}"
                                            class="nav-link">Agenda</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/sekilasinfo') }}"
                                            class="nav-link">Sekilas Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/jejakpendapat') }}"
                                            class="nav-link">Jejak Pendapat</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/downloadarea') }}"
                                            class="nav-link">Download Area</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/alamatkontak') }}"
                                            class="nav-link">Alamat Kontak</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/pesanmasuk') }}"
                                            class="nav-link">Pesan Masuk</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#modul-users" data-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="modul-users">
                                <i class="ni ni-map-big text-primary"></i>
                                <span class="nav-link-text">Modul Users</span>
                            </a>
                            <div class="collapse" id="modul-users">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/manajemenuser') }}"
                                            class="nav-link">Manajemen User</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('administrator/manajemenmodul') }}"
                                            class="nav-link">Manajemen Modul</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>



    <div class="main-content" id="panel">
        <nav class="navbar navbar-top navbar-expand navbar-light bg-secondary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="navbar-search navbar-search-dark form-inline mr-sm-3" id="navbar-search-main">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" placeholder="Search" type="text">
                            </div>
                        </div>
                        <button type="button" class="close" data-action="search-close"
                            data-target="#navbar-search-main" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </form>
                    <ul class="navbar-nav align-items-center ml-md-auto">
                        <li class="nav-item d-xl-none">
                            <div class="pr-3 sidenav-toggler sidenav-toggler-light" data-action="sidenav-pin"
                                data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item d-sm-none">
                            <a class="nav-link" href="#" data-action="search-show"
                                data-target="#navbar-search-main">
                                <i class="ni ni-zoom-split-in"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="ni ni-bell-55"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                                <div class="px-3 py-3">
                                    <h6 class="text-sm text-muted m-0">You have <strong
                                            class="text-primary">13</strong> notifications.</h6>
                                </div>
                                <div class="list-group list-group-flush">
                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <img alt="Image placeholder" src="../../assets/img/theme/team-1.jpg"
                                                    class="avatar rounded-circle">
                                            </div>
                                            <div class="col ml--2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                                    </div>
                                                    <div class="text-right text-muted">
                                                        <small>2 hrs ago</small>
                                                    </div>
                                                </div>
                                                <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <img alt="Image placeholder" src="../../assets/img/theme/team-2.jpg"
                                                    class="avatar rounded-circle">
                                            </div>
                                            <div class="col ml--2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                                    </div>
                                                    <div class="text-right text-muted">
                                                        <small>3 hrs ago</small>
                                                    </div>
                                                </div>
                                                <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <img alt="Image placeholder" src="../../assets/img/theme/team-3.jpg"
                                                    class="avatar rounded-circle">
                                            </div>
                                            <div class="col ml--2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                                    </div>
                                                    <div class="text-right text-muted">
                                                        <small>5 hrs ago</small>
                                                    </div>
                                                </div>
                                                <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <img alt="Image placeholder" src="../../assets/img/theme/team-4.jpg"
                                                    class="avatar rounded-circle">
                                            </div>
                                            <div class="col ml--2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                                    </div>
                                                    <div class="text-right text-muted">
                                                        <small>2 hrs ago</small>
                                                    </div>
                                                </div>
                                                <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <img alt="Image placeholder" src="../../assets/img/theme/team-5.jpg"
                                                    class="avatar rounded-circle">
                                            </div>
                                            <div class="col ml--2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                                    </div>
                                                    <div class="text-right text-muted">
                                                        <small>3 hrs ago</small>
                                                    </div>
                                                </div>
                                                <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <a href="#!"
                                    class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="ni ni-ungroup"></i>
                            </a>
                            <div
                                class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default dropdown-menu-right">
                                <div class="row shortcuts px-4">
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                                            <i class="ni ni-calendar-grid-58"></i>
                                        </span>
                                        <small>Calendar</small>
                                    </a>
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                                            <i class="ni ni-email-83"></i>
                                        </span>
                                        <small>Email</small>
                                    </a>
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                                            <i class="ni ni-credit-card"></i>
                                        </span>
                                        <small>Payments</small>
                                    </a>
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                                            <i class="ni ni-books"></i>
                                        </span>
                                        <small>Reports</small>
                                    </a>
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                                            <i class="ni ni-pin-3"></i>
                                        </span>
                                        <small>Maps</small>
                                    </a>
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                                            <i class="ni ni-basket"></i>
                                        </span>
                                        <small>Shop</small>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder"
                                            src="{{ asset('assets/img/theme/team-4.jpg') }}">
                                    </span>
                                    <div class="media-body ml-2 d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">
                                            @if(Auth::check())
                                            {{ Auth::user()->username }}
                                            @else
                                            Pengguna belum login
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>Edit Profile</span>
                                </a>
                                {{-- <div class="dropdown-divider"></div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div> --}}
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        <i class="ni ni-user-run"></i>
                                        <span>Logout</span>
                                    </a>
                                </form>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="header pb-6">
            <div class="container-fluid">
                @yield('submenu')
            </div>
        </div>
        <div class="container-fluid mt--6">
            @if (session()->has('pesan'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('pesan') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            @yield('content')
        </div>

      @yield('footer')
    <footer class="footer pt-0">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-12">
          <div class="copyright-text text-center">
            <strong>Copyright &copy; 2016 - <?php echo date('Y'); ?> <a target='_BLANK' href="http://www.lokomedia.web.id"> Lokomedia.web.id</a>.</strong> All rights reserved.
          </div>
        </div>
      </div>
    </footer>
  </div>

  <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
  {{-- <script src="{{ url('assets/js/ckeditor.js') }}"></script> --}}
  {{-- <script src="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.js"></script> --}}

    <script src="{{ url('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ url('assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ url('assets/js/argon.js') }}"></script>

    <script src="{{ url('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ url('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    {{-- <!-- Optional JS -->
  <script src="{{ url('assets/vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="{{ url('assets/js/demo.min.js') }}"></script>
  <script src="{{ url('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ url('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ url('assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ url('assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ url('assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
  <script src="{{ url('assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ url('assets/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script> --}}


     <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ url('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ url('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ url('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Optional JS -->
    <script src="{{ url('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ url('assets/js/components/charts/chart-bar.js') }}"></script>
    <script src="{{ url('assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
    {{-- <script src="{{ url('assets/vendor/jvectormap-next/jquery-jvectormap.min.js') }}"></script>
  <script src="{{ url('assets/js/vendor/jvectormap/jquery-jvectormap-world-mill.js') }}"></script> --}}
    <!-- Argon JS -->
    {{-- <script src="{{ url('assets/js/argon.js?v=1.1.0') }}"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="{{ url('assets/js/demo.min.js') }}"></script> --}}
      <script>
          CKEDITOR.replace('isi_halaman');
      </script>
      <script>
          CKEDITOR.replace('isi_berita');
      </script>
      <script>
        CKEDITOR.replace('keterangan');
    </script>
  <script>
    CKEDITOR.replace('deskripsi');
  </script>
  <script>
    CKEDITOR.replace('alamat');
  </script>
  <script>
    CKEDITOR.replace('isi_agenda');
  </script>



  {{-- <script>
    $(function() {
      $('input[name="datefilter"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
          cancelLabel: 'Bersihkan',
          applyLabel: 'Terapkan',
          format: 'DD/MM/YYYY'
        }
      });

      $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
      });

      $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
      });
    });
  </script> --}}
</body>

</html>

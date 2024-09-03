<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Description">
    <meta name="author" content="Author">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
    <meta property="og:site_name" content="" /> <!-- website name -->
    <meta property="og:site" content="" /> <!-- website link -->
    <meta property="og:title" content="" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>{{ $identitas->nama_website }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link href="{{ url('template/revo/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('template/revo/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('template/revo/css/swiper.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('template/revo/css/magnific-popup.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('template/revo/css/styles.css') }}" rel="stylesheet" type="text/css">
    <!-- <link href="{{ url('assets/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css"> -->

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('foto_identitas/' . $identitas->favicon)}}" type="image/x-icon">
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark"> <!-- Menambahkan padding untuk memperbesar ukuran navbar -->
        <div class="container">

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Revo</a> -->

            <!-- Image Logo -->
            <a href="#" class="navbar-brand logo-image"><img src="{{ asset('logo/' . $logo->gambar) }}" class="d-flex" style="margin: auto; display: block;" /></a>

            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse text-center" id="navbarsExampleDefault">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#header">
                            <span class="fa fa-home" style="font-size: 1.5rem;"></span>
                        </a>
                    <li class="nav-item dropdown dropdown-mega position-relative d-flex">
                        @foreach($menus as $menu)
                        <a class="nav-link dropdown-toggle" href="{{ $menu->link }}" id="navbarDropdown{{ $menu->id_menu }}" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 1.0rem;">
                            {{ $menu->nama_menu }}
                        </a>
                        @if($menu->children->count() > 0)
                        <ul class="dropdown-menu" id="dropdown{{ $menu->id_menu }}">
                            <li>
                                <div class="dropdown-mega-content container">
                                    <div class="row">
                                        @foreach($menu->children as $child)
                                        <div class="col-md-3">
                                            <h4>{{ $child->nama_menu }}</h4>
                                            @if($child->children->count() > 0)
                                            <ul class="dropdown-mega-sub-nav" style="width:auto;">
                                                @foreach($child->children as $subChild)
                                                <li class="justify-content-end">
                                                    <a href="{{ $subChild->link }}">
                                                        <i class="fa fa-chevron-right justify-content-end"></i> {{ $subChild->nama_menu }}
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                        </ul>
                        @endif
                        @endforeach
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" style="font-size: 1.0rem;" href="#hubungi">Hubungi Kami</a>
                    </li>
                    </li>
                </ul>
                <span class="nav-item social-icons">
                    <span class="fa-stack">
                        <a href="#your-link">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-facebook-f fa-stack-1x"></i>
                        </a>
                    </span>
                    <span class="fa-stack">
                        <a href="#your-link">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-twitter fa-stack-1x"></i>
                        </a>
                    </span>
                </span>
            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->

    @yield('content')

    <!-- Footer -->
    <div class="footer ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-col first">
                        <h6>Location</h6>
                        <iframe width="100%" height="305" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="{{ $identitas->maps }}"></iframe>
                    </div> <!-- end of footer-col -->
                    <div class="footer-col second">
                        <h6>Links</h6>
                        <div class="fb-page" data-href="https://www.facebook.com/dppkbkarawang/" data-tabs="timeline" data-width="300" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/dppkbkarawang/" class="fb-xfbml-parse-ignore">
                                <a href="https://www.facebook.com/dppkbkarawang/">DPPKB Karawang</a>
                            </blockquote>
                        </div>
                    </div> <!-- end of footer-col -->
                    <div class="footer-col third">
                        <h6 class="text-left">Links</h6>
                        <span class="phone">{{ $identitas->no_telp }}</span>
                        <div class="text-white">
                            {!! $alamat->alamat !!}
                        </div>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-youtube fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                    </div>
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->

    <div class="copyright ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © {{ date('Y') }} Powered GMT Company</p>
                </div>
                <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div>


    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const gambar = document.querySelector('meta[name="gambar"]').getAttribute('content');
            fetch(`/background-color?gambar=${gambar}`)
                .then(response => response.json())
                .then(data => {
                    document.documentElement.style.setProperty('--dynamic-bg-color', data.color);
                })
        });
    </script>

    <script src="{{ url('template/revo/js/jquery.min.js') }}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="{{ url('template/revo/js/bootstrap.min.js') }}"></script> <!-- Bootstrap framework -->
    <script src="{{ url('template/revo/js/jquery.easing.min.js') }}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="{{ url('template/revo/js/swiper.min.js') }}"></script> <!-- Swiper for image and text sliders -->
    <script src="{{ url('template/revo/js/jquery.magnific-popup.js') }}"></script> <!-- Magnific Popup for lightboxes -->
    <script src="{{ url('template/revo/js/scripts.js') }}"></script> <!-- Custom scripts -->
</body>

</html>
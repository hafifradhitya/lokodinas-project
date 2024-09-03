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

<body data-spy="scroll" data-target=".fixed-top">

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
                        <a class="nav-link page-scroll" style="font-size: 1.0rem;" href="{{ url('hubungi/') }}">Hubungi Kami</a>
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
    <!-- end of navigation -->
    <!-- Header -->
    <header id="header" class="header" style="padding-bottom: 10px;"> <!-- Mengurangi padding atas untuk mengangkat header -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider-container">
                        <div class="swiper-container text-slider">
                            <div class="swiper-wrapper">
                                @foreach($banners as $banner) <!-- Mengambil data banner -->
                                <div class="swiper-slide">
                                    <div class="row">
                                        <div class="col-lg-6 col-xl-7">
                                            <div class="image-container">
                                                <img class="img-fluid" src="{{ url('foto_banner/' . $banner->gambar) }}" alt="alternative"> <!-- Ganti dengan data banner -->
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-5">
                                            <div class="text-container">
                                                <h1 class="h1-large">{{ $banner->judul }}</h1> <!-- Ganti dengan data banner -->
                                                <p class="p-large">{{ $banner->deskripsi }}</p> <!-- Ganti dengan data banner -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach <!-- Akhir loop banner -->
                            </div>

                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="container" style="margin-top: 100px;"> <!-- Tambahkan jarak dari container pertama -->
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-5">
                        <h2 class="text-center mb-4">Link Terkait</h2>
                        <div class="slider-container">
                            <div class="swiper-container card-slider">
                                <div class="swiper-wrapper">
                                    @foreach($links as $link)
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <img src="{{ asset('foto_bannerhome/' . $link->gambar) }}">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </header>

    <div class="slide-1 bg-dark-blue">
        <div class="slider-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="text-center mb-4">Berita <strong>Terbaru</strong></h2> <!-- Tambahkan judul -->
                        <div class="slider-container">
                            <div class="swiper-container card-slider">
                                <div class="swiper-wrapper">
                                    @foreach ($beritas as $index => $berita)
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <img class="card-image" src="{{ asset('foto_berita/' . $berita->gambar) }}" alt="alternative">
                                            <div class="card-body">
                                                <p class="testimonial-text">"{{ $berita->judul }}"</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tabs" style="margin-top: -50px; width: 100%;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-xl-7">
                    <div class="tabs-container">

                        <ul class="nav nav-tabs" id="revoTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="nav-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">ANNOUNCEMENT</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="nav-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">ACTIVITY AGENDA</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="revoTabsContent">


                            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                                <h4>Pengumuman</h4>
                                @foreach ($infos as $h)
                                <div class="recent-posts">
                                    <article class="post">
                                        <p><span><i class="fa fa-volume-up"></i></span> &nbsp;{{ $h->info }}</p>
                                    </article>
                                </div>
                                @endforeach
                            </div>



                            <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
                                <h4>Ageda Kegiatan</h4>
                                @foreach ($agendas as $h)
                                <div class="recent-posts">
                                    <div class="post-meta">
                                        <span><i class="fa fa-calendar"></i> {{ $h->tgl_posting }} {{ $h->jam}}</span>
                                        <h5><a href="{{ url('agenda/detail/' . $h->tema_seo) }}" class="text-red">{{ $h->tema }}</a></h5>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="purchase" class="basic-3 bg-dark-blue">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h2 class="h2-heading text-left">Berita <strong>OPD</strong></h2>
                    @foreach($beritao as $berita)
                    <div class="card bg-transparent" style="margin-bottom: 20px; margin-right: 50px;">
                        <img class="card-img-top" src="{{ asset('foto_berita/' . $berita->gambar)}}" alt="Card image cap">
                        <div class="card-body">
                            <p><i class="fa fa-calendar"> </i> {{ $berita->tanggal }} , {{ $berita->jam }}</p>
                            <p class="card-title">{{ $berita->judul }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-4">
                    <h2 class="h2-heading text-left">Berita <strong>DAERAH</strong></h2>
                    @foreach($beritad as $berita)
                    <div class="card bg-transparent" style="margin-bottom: 20px; margin-right: 50px;">
                        <img class="card-img-top" src="{{ asset('foto_berita/' . $berita->gambar)}}" alt="Card image cap">
                        <div class="card-body">
                            <p><i class="fa fa-calendar"> </i> {{ $berita->tanggal }} , {{ $berita->jam }}</p>
                            <p class="card-title">{{ $berita->judul }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-4">
                    <h2 class="h2-heading text-left">Berita <strong>UMUM</strong></h2>
                    @foreach($beritau as $berita)
                    <div class="card bg-transparent" style="margin-bottom: 20px; margin-right: 50px;">
                        <img class="card-img-top" src="{{ asset('foto_berita/' . $berita->gambar)}}" alt="Card image cap">
                        <div class="card-body">
                            <p><i class="fa fa-calendar"> </i> {{ $berita->tanggal }} , {{ $berita->jam }}</p>
                            <p class="card-title">{{ $berita->judul }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div id="details" class="basic-1 bg-dark-blue">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-7">
                    <div class="image-container">
                        <img class="img-fluid" src="images/details-1.jpg" alt="alternative">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <div class="text-container">
                        <h2>Prototype With Revo</h2>
                        <p>Our experienced designers and developers have implemented cutting edge tools that will help you sketch your ideas in record time and prepare the design</p>
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body"><strong>Use a single app</strong> to get from sketch to actual code</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body"><strong>Bundled templates</strong> to help you get inspired faster</div>
                            </li>
                        </ul>
                        <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox">LIGHTBOX</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="details-lightbox" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="row">
            <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
            <div class="col-lg-8">
                <div class="image-container">
                    <img class="img-fluid" src="images/details-lightbox.jpg" alt="alternative">
                </div>
            </div>
            <div class="col-lg-4">
                <h3>Goals Setting</h3>
                <hr>
                <p>The app can easily help you track your personal development evolution if you take the time to set it up.</p>
                <h4>User Feedback</h4>
                <p>This is a great app which can help you save time and make your live easier. And it will help improve your productivity.</p>
                <ul class="list-unstyled li-space-lg">
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">Splash screen panel</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">Statistics graph report</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">Events calendar layout</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">Location details screen</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">Onboarding steps interface</div>
                    </li>
                </ul>
                <a class="btn-solid-reg mfp-close page-scroll" href="#registration">FREE TRIAL</a> <button class="btn-outline-reg mfp-close as-button" type="button">BACK</button>
            </div>
        </div>
    </div>
    
    <div class="basic-2 bg-dark-blue">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">Video Presentation</h2>
                    <p class="p-heading">Check out our video presentation for Revo desktop app. It will take you through an entire design project from the initial sketch to the final code</p>


                    <div class="image-container">
                        <div class="video-wrapper">
                            <a class="popup-youtube" href="https://www.youtube.com/watch?v=fLCjQJCekTs" data-effect="fadeIn">
                                <img class="img-fluid" src="images/video-preview.jpg" alt="alternative">
                                <span class="video-play-button">
                                    <span></span>
                                </span>
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
  
    <div class="basic-4 bg-dark-blue">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="resource-container">
                        <img class="img-fluid" src="images/resources-1.jpg" alt="alternative">
                        <div class="text-container">
                            <h4>User Showcases</h4>
                            <p>Check out these awesome customer showcases to convince you to give Revo and try right away</p>
                        </div>
                    </div>
                    <div class="resource-container">
                        <img class="img-fluid" src="images/resources-2.jpg" alt="alternative">
                        <div class="text-container">
                            <h4>Knowledge Center</h4>
                            <p>We've gathered some great resources to help you learn how to use Revo and overcome issues</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    <!-- end of footer -->


    <!-- Copyright -->
    <div class="copyright ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © {{ date('Y') }} Powered GMT Company</p>
                </div>
                <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright -->
    <!-- end of copyright -->


    <!-- Scripts -->
    <script src="{{ url('template/revo/js/jquery.min.js') }}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="{{ url('template/revo/js/bootstrap.min.js') }}"></script> <!-- Bootstrap framework -->
    <script src="{{ url('template/revo/js/jquery.easing.min.js') }}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="{{ url('template/revo/js/swiper.min.js') }}"></script> <!-- Swiper for image and text sliders -->
    <script src="{{ url('template/revo/js/jquery.magnific-popup.js') }}"></script> <!-- Magnific Popup for lightboxes -->
    <script src="{{ url('template/revo/js/scripts.js') }}"></script> <!-- Custom scripts -->
</body>

</html>
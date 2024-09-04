@extends('dinas-3.layout')

@section('content')

<header id="header" class="slide-1 header" style="padding-bottom: 10px;"> <!-- Mengurangi padding atas untuk mengangkat header -->
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

    <div class="slide-1">
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

    <div id="purchase" class="basic-3 ">
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

    <div id="hubungi" class="basic-1 bg-dark-blue">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-xl-5">
                    <div class="text-container text-center">
                        <h2>Contact</h2>
                        <p>{!! $alamat->alamat !!}</p>
                        <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox">Send message</a>
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
                    <iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="{{ $identitas->maps }}"></iframe>
                </div>
            </div>
            <div class="col-lg-4">
                <h3>Send us a message!</h3>
                <hr>
                <div class="input">
                    <input type="text" required="" autocomplete="off">
                    <label for="name">Username</label>
                </div>
                <div class="input">
                    <input type="email" required="" autocomplete="off">
                    <label for="email">Email</label>
                    <p style="font-size: smaller;"> You have entered an incorrect email address</p>
                </div>
                <div class="input1">
                    <textarea required autocomplete="off"></textarea>
                    <label for="message">Message</label>
                </div>
                <a class="btn-solid-reg mfp-close page-scroll" type="submit">FREE TRIAL</a>
                <button class="btn-outline-reg mfp-close as-button" type="button">BACK</button>
            </div>
        </div>
    </div>

    <div class="basic-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @foreach($videos as $video)
                    <div class="resource-container">
                        <iframe class="img-fluid" src="{{ $video->embed_url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="polling">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form>
                        <h2>Polling</h2>
                        @foreach($pilihan as $p)
                        <p>{{ $p->pilihan }}</p>
                        @endforeach
                        @foreach($jawaban as $j)
                        <label>
                            <input type="radio" name="radio" checked="">
                            <span>{{ $j->jawaban }}</span>
                        </label>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

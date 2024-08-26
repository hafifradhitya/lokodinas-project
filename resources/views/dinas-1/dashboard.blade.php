@extends('dinas-1.layout')

@section('content')
<div style="margin-bottom:80px">
    <div id="carousel-example-generic" class="carousel-slide">
        @foreach($banners as $banner)
        <div class="carousel-inner" role="listbox">
            <img src="{{ asset('foto_banner/' . $banner->gambar)}}" class="img-responsive" style="width:100%;height:auto;">
            <div class="carousel-caption animated fadeInLeft">
                <h2 class="slide-text-heading" data-animation="animated bounceInLeft">{{ $banner->judul}}</h2>
                <h4 class="slide-text-desc" data-animation="animated bounceInUp">
                    <h4 style="text-align: left;"><span style="color: #ffffff;">{{ $banner->deskripsi }}</span></h4>
                </h4>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- <script>
    let currentIndex = 0;
    const slides = document.querySelectorAll('.slide');
    const totalSlides = slides.length;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.display = (i === index) ? 'block' : 'none';
        });
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalSlides;
        showSlide(currentIndex);
    }

    showSlide(currentIndex);
    setInterval(nextSlide, 4000); // Ganti slide setiap 3 detik
</script> -->
<div class="container">
	<div class="row">
		<div class="col-md-12 center">
			<div class="heading heading-border heading-middle-border heading-middle-border-center">
				<h2 class="mb-lg">LINK <strong>TERKAIT</strong></h2>
			</div>
			<iframe src="sliderlogo/" width="100%" height="400" frameBorder="0" style="max-width: 100%;"></iframe>
		</div>
	</div>
</div>
@endsection
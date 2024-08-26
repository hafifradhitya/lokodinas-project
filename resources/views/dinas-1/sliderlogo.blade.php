<div class="container">
    <section class="customer-logos slider">
        @foreach($links as $link)
        <div class="slide">
            <a href="{{ $link->url }}">
                <img src="{{ asset('foto_bannerhome/' . $link->gambar) }}" class="custom-logo">
            </a>
        </div>
        @endforeach
    </section>
</div>

<script>
    $(document).ready(function() {
        $('.customer-logos').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 4
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 3
                }
            }]
        });
    });
</script>
<style>
    .custom-logo {
    width: 100%; /* Memanjang ke samping */
    height: auto; /* Menjaga rasio aspek */
    max-width: 150px; /* Ukuran maksimum gambar */
}
</style>

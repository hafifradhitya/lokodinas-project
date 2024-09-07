@extends('dinas-3.layout')

@section('content')
{{-- <div class="ecommerce-gallery vertical" data-mdb-ecommerce-gallery-init>
  <div class="row">
    <div class="col-4 col-sm-3">
      <div class="multi-carousel vertical" data-mdb-multi-carousel-init data-mdb-items="3">
        <div class="multi-carousel-inner">
          @foreach($gallery as $item)
          <div class="multi-carousel-item {{ $loop->first ? 'active' : '' }}">
            <img
              src="{{ asset('img_gallery/' . $item->gbr_gallery) }}"
              data-mdb-img="{{ asset('img_gallery/' . $item->gbr_gallery) }}"
              alt="{{ $item->jdl_gallery }}"
              class="{{ $loop->first ? 'active' : '' }} w-100"
            />
          </div>
          @endforeach
        </div>
        <button
          class="carousel-control-prev"
          tabindex="0"
          type="button"
          data-mdb-slide="prev"
        >
          <span
            class="carousel-control-prev-icon"
            aria-hidden="true"
          ></span>
        </button>
        <button
          class="carousel-control-next"
          tabindex="0"
          type="button"
          data-mdb-slide="next"
        >
          <span
            class="carousel-control-next-icon"
            aria-hidden="true"
          ></span>
        </button>
      </div>
    </div>
    <div class="col-8 col-sm-9">
      <div class="lightbox" data-mdb-lightbox-init>
        <img
          src="{{ asset('img_gallery/' . $gallery->first()->gbr_album) }}"
          alt="{{ $gallery->first()->jdl_gallery }}"
          class="ecommerce-gallery-main-img active w-100"
        />
        <div class="mt-3">
          <h3>{{ $gallery->first()->jdl_gallery }}</h3>
          <p>{{ $gallery->first()->keterangan }}</p>
        </div>
      </div>
    </div>
  </div>
</div> --}}
@endsection
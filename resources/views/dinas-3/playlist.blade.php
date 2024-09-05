@extends('dinas-3.layout')


@section('content')
<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <img src="{{ asset('path/to/your/image1.jpg') }}" class="card-img-top" alt="Gambar 1">
                <div class="card-body">
                    <a href="{{ route('detail', ['id' => 1]) }}" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mb-4">
                <img src="{{ asset('path/to/your/image2.jpg') }}" class="card-img-top" alt="Gambar 2">
                <div class="card-body">
                    <a href="{{ route('detail', ['id' => 2]) }}" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
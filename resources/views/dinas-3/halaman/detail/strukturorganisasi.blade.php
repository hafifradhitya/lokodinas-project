@extends('dinas-3.layout')



@section('content')
<hr>
<br>
<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h1 class="text-center"></h1>
                    <div class="content">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Berita Terbaru</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <h6><a href="" class="text-dark"></a></h6>
                            <small class="text-muted"></small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <style>
        body {
            padding-top: 60px
        }
        @media (max-width: 768px) {
            body {
                padding-top: 80px;
            }
        }
    </style>
@endpush
@extends('administrator.layout')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Tambah Album Berita Foto</h2>
        </div>
        <div class="container-fluid">
            <form action="{{ route('administrator.album.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="judul">Judul Album</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Album">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" rows="5" placeholder="Masukkan Keterangan"></textarea>
                </div>
                <div class="form-group">
                    <label for="cover">Cover</label>
                    <input type="file" class="form-control-file" id="cover" name="cover">
                </div>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </form>
        </div>
    </div>
</div>
@endsection
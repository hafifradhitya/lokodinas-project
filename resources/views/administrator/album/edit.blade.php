@extends('administrator.layout')

@section('content')
<style>
    .table td {
        word-wrap: break-word;
        white-space: normal;
    }
</style>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Edit Album Berita Foto</h2>
        </div>
        <form action="{{ route('administrator.album.update', $album->id_album) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="judul">Judul Album</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $album->jdl_album }}" placeholder="Masukkan Judul Album">
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" rows="5" placeholder="Masukkan Keterangan">{{ $album->keterangan }}</textarea>
            </div>
            <div class="form-group">
                <label for="cover">Cover</label>
                <input type="file" class="form-control-file" id="cover" name="cover">
                <label>Cover Saat Ini:{{ $album->gbr_album}}</label>
            </div>
            <div class="form-group">
                <label>Status</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="aktif" value="Y" {{ $album->aktif == 'Y' ? 'checked' : '' }}>
                    <label class="form-check-label" for="aktif">Aktif</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="tidak_aktif" value="N" {{ $album->aktif == 'N' ? 'checked' : '' }}>
                    <label class="form-check-label" for="tidak_aktif">Tidak Aktif</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Perbarui</button>
        </form>
    </div>
</div>
@endsection
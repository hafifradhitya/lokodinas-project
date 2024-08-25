@extends('administrator.layout')
  
@section('content')
<?php
$gambar = "profile.png";
if($halamanbaru->gambar != NULL){
    $gambar = $halamanbaru->gambar;
}
?>

<div class="card card-shadow">
    <div class="card-body">
        <form action="{{ route('administrator.halamanbaru.update', $halamanbaru->id_halaman) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                <tbody>
                    <tr>
                        <th style="padding: 5px; border: 1px solid #ddd;">Judul</th>
                        <td style="padding: 5px; border: 1px solid #ddd;">
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ $halamanbaru->judul }}">
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px; border: 1px solid #ddd;">Isi Halaman</th>
                        <td style="padding: 5px; border: 1px solid #ddd;">
                            <textarea class="form-control" id="isi_halaman" name="isi_halaman" rows="10">{{ $halamanbaru->isi_halaman }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px; border: 1px solid #ddd;">Gambar</th>
                        <td style="padding: 5px; border: 1px solid #ddd;">
                            <div>
                                <p class="mb-0 mt-n2">Cover saat ini:</p>
                                <div class="d-flex align-items-center">
                                    <img id="preview" src="{{ asset('foto_halaman/'.$halamanbaru->gambar) }}" alt="Preview" style="max-width: 100px; margin-top: 5px;" class="mr-3">
                                    <div class="flex-grow-1">
                                        <input type="file" class="form-control" onchange="previewImage(event)" name="gambar" id="gambar">
                                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah cover.</small>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-4 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('administrator.halamanbaru.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImage(event) {
        var preview = document.getElementById('preview');
        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function(){
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection

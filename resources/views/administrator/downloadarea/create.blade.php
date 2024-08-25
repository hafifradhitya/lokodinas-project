@extends('administrator.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Tambah File Download</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('administrator.downloadarea.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="form-group">
                <label for="file">Cari File</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="nama_file" name="nama_file" required onchange="updateFileName(this)">
                    <label class="custom-file-label" for="file" id="fileLabel">Pilih file</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambahkan</button>
            <a href="" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
<script>
    // Script untuk menampilkan nama file yang dipilih
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    function updateFileName(input) {
        var fileName = input.files[0].name;
        document.getElementById('fileLabel').innerHTML = fileName;
    }
</script>
@endsection
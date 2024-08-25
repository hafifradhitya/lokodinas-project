@extends('administrator.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit File Download</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('administrator.downloadarea.update' , $download->id_download )}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="{{ $download->judul }}" required>
                        </div>
                        <div class="form-group">
                            <label for="file">Ganti File</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="file" required onchange="updateFileName(this)">
                                <label class="custom-file-label" for="file">Pilih file</label>
                            </div>
                            <small class="form-text text-muted">File saat ini: {{ $download->nama_file }}</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    function updateFileName(input) {
        var fileName = input.files[0].name;
        document.getElementById('fileLabel').innerHTML = fileName;
    }
</script>
@endpush
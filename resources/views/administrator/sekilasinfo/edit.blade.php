@extends('administrator.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">edit Info</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('administrator.sekilasinfo.update', $infot->id_sekilas ) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="info">Tulis Info</label>
                <textarea class="form-control" id="info" name="info" rows="6">{{ $infot->info }}</textarea>
            </div>
            <div>
                <p class="mb-0 mt-n2">Cover saat ini:</p>
                <div class="d-flex align-items-center">
                    <img id="preview" src="{{ url('foto_info/'.$infot->gambar) }}" alt="Preview" style="max-width: 100px; margin-top: 5px;" class="mr-3">
                    <div class="flex-grow-1">
                        <input type="file" class="form-control" onchange="previewImage(event)" name="gambar" id="gambar">
                        <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah cover.</small>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
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
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
        <form action="{{ route('administrator.halamanbaru.update', $halamanbaru->id_halaman) }}" method="POST" enctype="multipart/form-data" class="form-ajax">
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
                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('administrator.halamanbaru.index') }}" class="btn btn-danger">Batal</a>
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


@section('script')
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click', '.btn-delete', function() {
            let btn =$(this);
            Swal.fire({
               icon:'warning',
               text:'Data yang sudah di hapus tidak dapat dikembalikan!',
               title:'Apakah Anda yakin ingin menghapus data ini?',
               showCancelButton: true,
               confirmButtonColor:'#D33',
               confirmButtonText:'Yakin hapus?',
               cancelButtonText:'Batal'
            }).then((result)=>{
                if (result.isConfirmed){
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                    document.location = btn.data('url');
                }
            });
        });
        $('.form-ajax').each(function() {
                $(this).bind('submit', function(e) {
                    e.preventDefault();

                    for (instance in CKEDITOR.instances) {
                        CKEDITOR.instances[instance].updateElement();
                    }

                    let form = $(this);
                    $.ajax({
                        url: form.prop('action'),
                        data: new FormData(this),
                        cache: false,
                        async: false,
                        type: 'post',
                        contentType: false,
                        processData: false,
                        success: function(data) {
                        if (data.success === false) {
                            Swal.fire({
                                icon: 'error',
                                html: data.message,
                                timer: 1500,
                                showConfirmButton: false
                            });
                        } else {
                            Swal.fire({
                                    position: "center",
                                    icon: "success",
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then((result)=>{
                                    console.log(result);
                                    document.location = data.url;
                                });


                        }
                    }
                });
            });
        });
    });
</script>

{{-- <script>
    CKEDITOR.replace('deskripsi');
</script> --}}
@endsection

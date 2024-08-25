@extends('administrator.layout')

@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="mb-0">Tambah Gallery</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('administrator.gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="table" style="border: none; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <th style="padding: 5px">Judul Foto</th>
                                <td style="padding: 5px">
                                    <input type="text" class="form-control" id="jdl_gallery" name="jdl_gallery" placeholder="Masukkan judul gallery" required>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px">Album</th>
                                <td style="padding: 5px">
                                    <select class="form-control" name="id_album" id="id_album" required>
                                        <option value="">-- Pilih Album --</option>
                                        @foreach ($album as $album)
                                        <option value="{{ $album->id_album }}">
                                            {{ $album->jdl_album }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px">Keterangan</th>
                                <td style="padding: 5px">
                                    <textarea class="form-control" name="keterangan" id="keterangan" rows="5" placeholder="Masukkan Keterangan" required></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px">Cover</th>
                                <td style="padding: 5px">
                                    <input type="file" class="form-control" id="gbr_gallery" name="gbr_gallery">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('administrator.gallery.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    CKEDITOR.replace('keterangan');
</script>
@endpush
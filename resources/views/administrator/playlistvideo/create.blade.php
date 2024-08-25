@extends('administrator.layout')

@section('content')

<div class="row">
    <div class="col">
        <div class="card card-shadow">
            <div class="card-header">
                <h3 class="mb-0">Tambah Playlistvideo Baru</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('administrator.playlistvideo.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <th style="padding: 5px;">Playlist</th>
                                <td style="padding: 5px;">
                                    <input type="text" class="form-control" id="jdl_playlist" name="jdl_playlist" placeholder="Masukkan Playlistvideo" required>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Cover</th>
                                <td style="padding: 5px;">
                                    <input type="file" class="form-control" id="gbr_playlist" name="gbr_playlist" accept="image/*">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('administrator.playlistvideo.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
<script>
    CKEDITOR.replace('isi_berita');
</script>
@endpush

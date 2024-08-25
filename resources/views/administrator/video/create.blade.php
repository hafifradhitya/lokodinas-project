@extends('administrator.layout')

@section('content')
  
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="mb-0">Tambah Video</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('administrator.video.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="table" style="border: none; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <th style="padding: 5px;">Judul Video</th>
                                <td style="padding: 5px;">
                                    <input type="text" class="form-control" id="jdl_video" name="jdl_video" placeholder="Masukkan judul video" required>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Playlist</th>
                                <td style="padding: 5px;">
                                    <select class="form-control" id="id_playlist" name="id_playlist" required>
                                        <option value="">-- Pilih Playlist --
                                        @foreach($playlistvideos as $playvid)
                                        <option value="{{ $playvid->id_playlist }}">
                                            {{ $playvid->jdl_playlist }}
                                        </option>
                                        @endforeach
                                        </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Keterangan</th>
                                <td style="padding: 5px;">
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="5" placeholder="Masukkan isi berita" required></textarea>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Gambar</th>
                                <td style="padding: 5px;">
                                    <input type="file" class="form-control" id="gbr_video" name="gbr_video">
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Video Youtube</th>
                                <td style="padding: 5px;">
                                    <input type="text" class="form-control" id="youtube" name="youtube" placeholder="Contoh link: http://www.youtube.com/embed/xbuEmoRWQHU">
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Tag</th>
                                <td style="padding: 5px; border: 1px solid #ddd;">
                                    <div style="max-height: 200px; overflow-y: auto;">
                                        @foreach($tagvids as $tagvid)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $tagvid->tag_seo }}" id="tagvid" name="tagvid[]">
                                                <label class="form-check-label" for="tagvid">
                                                    {{ $tagvid->nama_tag }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('administrator.video.index') }}" class="btn btn-danger">Cancel</a>
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

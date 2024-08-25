@extends('administrator.layout')

@section('content')

<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="mb-0">Edit Video</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('administrator.video.update', $videos->id_video) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <table class="table" style="border: none; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <th style="padding: 5px;">Judul Video</th>
                                <td style="padding: 5px;">
                                    <input type="text" class="form-control" id="jdl_video" name="jdl_video" value="{{ old('jdl_video', $videos->jdl_video) }}" placeholder="Masukkan judul video" required>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Playlist</th>
                                <td style="padding: 5px;">
                                    <select class="form-control" id="id_playlist" name="id_playlist">
                                        @foreach($playlistvideos as $playvid)
                                        <option value="{{ $playvid->id_playlist }}" {{ $videos->id_playlist == $playvid->id_playlist ? 'selected' : '' }}>
                                            {{ $playvid->jdl_playlist }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Keterangan</th>
                                <td style="padding: 5px;">
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="5" placeholder="Masukkan isi berita" required>{{ old('keterangan', $videos->keterangan) }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                {{-- <th style="padding: 5px;">Gambar</th>
                                <td style="padding: 5px;">
                                    <input type="file" class="form-control" id="gbr_video" name="gbr_video">
                                    @if($videos->gbr_video)
                                        <img src="{{ asset('storage/' . $videos->gbr_video) }}" alt="Current Image" class="img-thumbnail mt-2" style="max-width: 150px;">
                                    @endif
                                </td> --}}
                                <th style="padding: 5px;">Gambar saat ini:</th>
                                <td style="padding: 5px;">
                                    <div class="d-flex align-items-center">
                                        <img id="preview" src="{{ url('foto_video/'.$videos->gbr_video) }}" alt="Preview" style="max-width: 100px; margin-top: 5px;" class="mr-3">
                                        <div class="flex-grow-1">
                                            <input type="file" class="form-control" onchange="previewImage(event)" name="gbr_video" id="gbr_video">
                                            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Video Youtube</th>
                                <td style="padding: 5px;">
                                    <input type="text" class="form-control" id="youtube" name="youtube" value="{{ old('youtube', $videos->youtube) }}" placeholder="Contoh link: http://www.youtube.com/embed/xbuEmoRWQHU">
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Tag</th>
                                <td style="padding: 5px; border: 1px solid #ddd;">
                                    <div style="max-height: 200px; overflow-y: auto;">
                                        {{-- @foreach($tagvids as $tagvid)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $tagvid->id_tag }}" id="tagvid{{ $tagvid->id_tag }}" name="tagvids[]" {{ in_array($tagvid->id_tag, $videos->tagvids->pluck('id_tag')->toArray()) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="tag{{ $tagvid->id_tag }}">
                                                    {{ $tagvid->nama_tag }}
                                                </label>
                                            </div>
                                        @endforeach --}}
                                        @foreach($tagvids as $tagvid)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $tagvid->tag_seo }}" id="tagvid{{ $tagvid->id_tag }}" name="tagvid[]"{{ in_array($tagvid->tag_seo, explode(',', $videos->tagvid)) ? ' checked' : ''; }}>
                                            <label class="form-check-label" for="tagvid{{ $tagvid->id_tag }}">
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
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('administrator.video.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
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

@push('script')
<script>
    CKEDITOR.replace('keterangan');
</script>
@endpush

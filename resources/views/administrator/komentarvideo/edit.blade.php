@extends('administrator.layout')


@section('content')

<div class="row">
    <div class="col">
        <div class="card card-shadow">
            <div class="card-header">
                <h3 class="mb-0">Edit Komentar Video</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('administrator.komentarvideo.update', $komentarvideo->id_komentar) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <table class="table" style="border: none; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <th style="padding: 5px">Nama Komentar</th>
                                <td style="padding: 5px">
                                    <input type="text" class="form-control" id="nama_komentar" name="nama_komentar" value="{{ $komentarvideo->nama_komentar }}">
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px">Website</th>
                                <td style="padding: 5px">
                                    <input type="text" class="form-control" id="url" name="url" value="{{ $komentarvideo->url }}">
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px">Isi Komentar</th>
                                <td style="padding: 5px">
                                    <input type="text" class="form-control" id="isi_komentar" name="isi_komentar" value="{{ $komentarvideo->isi_komentar }}">
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px">Aktif</th>
                                <td style="padding: 5px">
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="aktif" id="aktif_y" value="Y" {{ $komentarvideo->aktif == 'Y' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="aktif_y">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="aktif" id="aktif_n" value="N" {{ $komentarvideo->aktif == 'N' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="aktif_y">Tidak</label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('administrator.komentarvideo.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

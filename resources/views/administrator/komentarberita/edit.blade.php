@extends('administrator.layout')


@section('content')

<div class="row">
    <div class="col">
        <div class="card card-shadow">
            <div class="card-header">
                <h3 class="mb-0">Edit Komentar Berita</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('administrator.komentarberita.update', $komentarberita->id_komentar) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <table class="table" style="border: none; border-collapse: collapse: collapse;">
                        <tbody>
                            <tr>
                                <th style="padding: 5px">Nama Komentar</th>
                                <td style="padding: 5px">
                                    <input type="text" class="form-control" id="nama_komentar" name="nama_komentar" value="{{ $komentarberita->nama_komentar }}">
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px">Website</th>
                                <td style="padding: 5px">
                                    <input type="text" class="form-control" id="url" name="url" value="{{ $komentarberita->url }}">
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px">Email</th>
                                <td style="padding: 5px">
                                    <input type="text" class="form-control" id="email" name="email" value="{{ $komentarberita->email }}">
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px">Isi Komentar</th>
                                <td style="padding: 5px">
                                    <input type="text" class="form-control" id="isi_komentar" name="isi_komentar" value="{{ $komentarberita->isi_komentar }}">
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px">Aktif</th>
                                <td style="padding: 5px">
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="aktif" id="aktif_y" value="Y" {{ $komentarberita->aktif == 'Y' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="aktif_y">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="aktif" id="aktif_n" value="N" {{ $komentarberita->aktif == 'N' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="aktif_y">Tidak</label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('administrator.komentarberita.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

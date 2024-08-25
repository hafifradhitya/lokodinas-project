@extends('administrator.layout')

@section('content')

<div class="row">
    <div class="col">
        <div class="card card-shadow">
            <div class="card-header">
                <h3 class="mb-0">Tambah Kategori Baru</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('administrator.kategoriberita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <th style="padding: 5px;">Nama Kategori</th>
                                <td style="padding: 5px;">
                                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan nama kategori" required>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Aktif</th>
                                <td style="padding: 5px;">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="aktif" id="aktif" value="Y" checked>
                                        <label class="form-check-label" for="aktif">
                                            Aktif
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="aktif" id="tidak_aktif" value="N">
                                        <label class="form-check-label" for="tidak_aktif">
                                            Tidak Aktif
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Posisi</th>
                                <td style="padding: 5px;">
                                    <input type="number" class="form-control" id="sidebar" name="sidebar" placeholder="Masukkan posisi" required>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('administrator.kategoriberita.index') }}" class="btn btn-danger">Cancel</a>
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

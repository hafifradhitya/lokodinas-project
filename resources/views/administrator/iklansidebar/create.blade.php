@extends('administrator.layout')

@section('content')
  
<div class="row">
    <div class="col">
        <div class="card card-shadow">
            <div class="card-header">
                <h3 class="mb-0">Tambah Iklan Sidebar Baru</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('administrator.iklansidebar.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <th style="padding: 5px;">Judul</th>
                                <td style="padding: 5px;">
                                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul" required>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">URL</th>
                                <td style="padding: 5px;">
                                    <input type="url" class="form-control" id="url" name="url" placeholder="Masukkan URL" required>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Gambar</th>
                                <td style="padding: 5px;">
                                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('administrator.iklansidebar.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

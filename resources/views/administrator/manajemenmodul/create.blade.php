@extends('administrator.layout')

@section('content')

<div class="row">
    <div class="col">
        <div class="card card-shadow">
            <div class="card-header">
                <h3 class="mb-0">Tambah Manajemen Modul Baru</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('administrator.manajemenmodul.store') }}" method="POST">
                    @csrf
                    <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <th style="padding: 5px;">Nama Modul</th>
                                <td style="padding: 5px;">
                                    <input type="text" class="form-control" id="nama_modul" name="nama_modul" placeholder="Masukkan Nama Modul" required>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Link</th>
                                <td style="padding: 5px;">
                                    <input type="text" class="form-control" id="link" name="link" placeholder="Masukkan Link" required>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Publish</th>
                                <td style="padding: 5px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="publish" id="publish_ya" value="Ya" required checked>
                                        <label class="form-check-label" for="publish_ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="publish" id="publish_tidak" value="Tidak" required>
                                        <label class="form-check-label" for="publish_tidak">Tidak</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Aktif</th>
                                <td style="padding: 5px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="aktif" id="aktif_ya" value="Ya" required checked>
                                        <label class="form-check-label" for="aktif_ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="aktif" id="aktif_tidak" value="Tidak" required>
                                        <label class="form-check-label" for="aktif_tidak">Tidak</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Status</th>
                                <td style="padding: 5px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status_admin" value="admin" required checked>
                                        <label class="form-check-label" for="status_admin">Admin</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status_user" value="user" required>
                                        <label class="form-check-label" for="status_user">User</label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('administrator.manajemenmodul.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

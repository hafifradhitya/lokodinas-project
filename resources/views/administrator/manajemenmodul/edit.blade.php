@extends('administrator.layout')

@section('content')

<div class="row">
    <div class="col">
        <div class="card card-shadow">
            <div class="card-header">
                <h3 class="mb-0">Edit Manajemen Modul</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('administrator.manajemenmodul.update', $manajemenmodul->id_modul) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <th style="padding: 5px;">Nama Modul</th>
                                <td style="padding: 5px;">
                                    <input type="text" class="form-control" id="nama_modul" name="nama_modul" placeholder="Masukkan Nama Modul" required value="{{ $manajemenmodul->nama_modul }}">
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Link</th>
                                <td style="padding: 5px;">
                                    <input type="text" class="form-control" id="link" name="link" placeholder="Masukkan Link" required value="{{ $manajemenmodul->link }}">
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Publish</th>
                                <td style="padding: 5px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="publish" id="publish_ya" value="Y" required @checked($manajemenmodul->publish == 'Y')>
                                        <label class="form-check-label" for="publish_ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="publish" id="publish_tidak" value="N" required @checked($manajemenmodul->publish == 'N')>
                                        <label class="form-check-label" for="publish_tidak">Tidak</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Aktif</th>
                                <td style="padding: 5px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="aktif" id="aktif_ya" value="Y" required @checked($manajemenmodul->aktif == 'Y')>
                                        <label class="form-check-label" for="aktif_ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="aktif" id="aktif_tidak" value="N" required @checked($manajemenmodul->aktif == 'N')>
                                        <label class="form-check-label" for="aktif_tidak">Tidak</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Status</th>
                                <td style="padding: 5px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status_admin" value="admin" required @checked($manajemenmodul->status == 'admin')>
                                        <label class="form-check-label" for="status_admin">Admin</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status_user" value="user" required @checked($manajemenmodul->status == 'user')>
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

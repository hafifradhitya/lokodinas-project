@extends('administrator.layout')

@section('content')
<div class="row">
    <div class="col">
        <div class="card card-shadow">
            <div class="card-header">
                <h3 class="mb-0">Tambah User Baru</h3>
              </div>
            <div class="card-body">
                <form action="{{ route('administrator.manajemenuser.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-bordered" id="datatable-buttons">
                        <tbody>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Username</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Password</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Nama Lengkap</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Alamat Email</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="email" class="form-control" id="email" name="email" placeholder="Masukkan alamat email"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">No Telepon</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="tel" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan nomor telepon"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Upload Foto</th>
                                <td style="padding: 5px; border: 1px solid #ddd;"><input type="file" class="form-control" id="foto" name="foto" accept="image/*"></td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Level</th>
                                <td style="padding: 5px; border: 1px solid #ddd;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="level" id="kontributor" value="kontributor">
                                        <label class="form-check-label" for="kontributor">Kontributor</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="level" id="admin" value="admin" checked>
                                        <label class="form-check-label" for="administrator">Administrator</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="level" id="user" value="user">
                                        <label class="form-check-label" for="user_biasa">User Biasa</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px; border: 1px solid #ddd;">Akses Modul</th>
                                <td style="padding: 5px; border: 1px solid #ddd;">
                                    <div style="max-height: 200px; overflow-y: auto;">
                                        @foreach($moduls as $modul)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $modul->id_modul }}" id="modul" name="modul[]">
                                            <label class="form-check-label" for="modul">
                                                {{ $modul->nama_modul }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </td>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('administrator.manajemenuser.index') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

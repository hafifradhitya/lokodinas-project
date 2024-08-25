@extends('administrator.layout')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Tambah Yahoo Messanger
        </div>
        <div class="card-body">
            <form action="{{ route('administrator.ym.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_pengguna">Nama Pengguna</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="ym_icon">Ym Icon</label>
                    <input type="number" class="form-control" id="ym_icon" name="ym_icon" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
                <a href="{{ route('administrator.ym.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection

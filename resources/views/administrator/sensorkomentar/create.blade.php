@extends('administrator.layout')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Tambah Sensor Komentar Berita
        </div>
        <div class="card-body">
            <form action="{{ route('administrator.sensorkomentar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="kata_jelek">Kata Jelek</label>
                    <input type="text" class="form-control" id="kata" name="kata" required>
                </div>
                <div class="form-group">
                    <label for="ganti_jadi">Ganti Jadi</label>
                    <input type="text" class="form-control" id="ganti" name="ganti" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
                <a href="{{ route('administrator.sensorkomentar.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection

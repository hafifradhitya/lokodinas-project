@extends('administrator.layout')

@section('content')

<div class="card card-shadow">
    <div class="card-header">
        <h3>Tambah Tag Video</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('administrator.tagvideo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                <tbody>
                    <tr>
                        <th style="padding: 5px">Nama Tag</th>
                        <td style="padding: 5px">
                            <input type="text" class="form-control" id="nama_tag" name="nama_tag" placeholder="Masukkan Nama Tag" required>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-4 d-flex justify-content-beetwen">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('administrator.tagvideo.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection

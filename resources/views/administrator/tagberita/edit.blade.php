@extends('administrator.layout')

@section('content')

<div class="card card-shadow">
    <div class="card-header">
        <h3 class="mb-0">Edit Tag Berita</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('administrator.tagberita.update', $tag->id_tag) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                <tbody>
                    <tr>
                        <th style="padding: 5px">Nama Tag</th>
                        <td style="padding: 5px">
                            <input type="text" class="form-control" id="nama_tag" name="nama_tag" value="{{ $tag->nama_tag }}">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-4 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('administrator.tagberita.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection

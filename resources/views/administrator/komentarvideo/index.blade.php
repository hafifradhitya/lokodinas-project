@extends('administrator.layout')

@section('content')

<style>
    .table td {
        word-wrap: break-word;
        white-space: normal;
    }
</style>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Semua Komen Video</h3>
            </div>

            <div class="card-body">
                <form action="{{ route('administrator.komentarvideo.index') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari kategori..." name="search" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">Cari</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="table-responsive py-4"> 
                <table class="table table-bordered" id="datatable-basic">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Komentar</th>
                            <th>Isi Komentar</th>
                            <th>Aktif</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($komentarvideo as $index => $komenvideo)
                            <tr>
                                <td>{{ $index + $komentarvideo->firstItem() }}</td>
                                <td>{{ $komenvideo->nama_komentar }}</td>
                                <td>{{ $komenvideo->isi_komentar }}</td>
                                <td>{{ $komenvideo->aktif }}</td>
                                <td class="text-center">
                                    <div class="d-flex flex-column justify-content-center">
                                        <a href="{{ route('administrator.komentarvideo.edit', $komenvideo->id_komentar) }}" class="btn btn-success btn-sm d-flex align-items-center justify-content-center mb-1" style="width: 32px; height: 32px;">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('administrator.komentarvideo.destroy', $komenvideo->id_komentar) }}" method="POST" class="mt-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" onclick="return confirm('Yakin hapus {{ $komenvideo->nama_komentar }}?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $komentarvideo->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

@endsection
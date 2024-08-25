@extends('administrator.dashboard')

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
            <!-- Card header -->
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Kategori Berita</h3>
                    <a href="{{ route('administrator.kategoriberita.create') }}" class="btn btn-primary btn-sm">Tambahkan Data</a>
                </div>
            </div>

            <!-- Tambahkan form pencarian -->
            <div class="card-body">
                <form action="{{ route('administrator.kategoriberita.index') }}" method="GET" class="mb-1">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari kategori..." name="search" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">Cari</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="table-responsive py-4">
                <table class="table table-flush" id="datatable-basic">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Link</th>
                            <th>Posisi</th>
                            <th>Aktif</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $index => $kat)
                        <tr>
                            <td>{{ $kategori->firstItem() + $index }}</td>
                            <td>{{ $kat->nama_kategori }}</td>
                            <td><a href="#">berita/kategori/{{ $kat->kategori_seo }}</a></td>
                            <td>{{ $kat->sidebar }}</td>
                            <td>{{ $kat->aktif }}</td>
                            <td class="text-center">
                                <a href="{{ route('administrator.kategoriberita.edit', $kat->id_kategori) }}" class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('administrator.kategoriberita.destroy', $kat->id_kategori) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" onclick="return confirm('Yakin hapus {{ $kat->nama_kategori }}?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $kategori->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection

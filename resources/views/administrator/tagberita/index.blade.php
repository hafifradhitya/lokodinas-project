@extends('administrator.layout')


@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Tag Berita</h3>
                    <a href="{{ route('administrator.tagberita.create') }}" class="btn btn-primary btn-sm">Tambahkan Data</a>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('administrator.tagberita.index') }}" method="GET" class="mb-1">
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
                            <th>Nama Tag</th>
                            <th>Link</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $index => $tag)
                        <tr>
                            <td>{{ $tags->firstItem() + $index }}</td>
                            <td>{{ $tag->nama_tag }}</td>
                            <td><a href="#">berita/tag/{{ $tag->tag_seo }}</a></td>
                            <td class="text-center">
                                <a href="{{ route('administrator.tagberita.edit', $tag->id_tag) }}" class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('administrator.tagberita.destroy', $tag->id_tag) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" onclick="return confirm('Yakin hapus {{ $tag->nama_tag }}?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $tags->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</div>


@endsection

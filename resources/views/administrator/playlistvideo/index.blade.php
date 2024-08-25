@extends('administrator.layout')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Playlist Video</h3>
                <a href="{{ route('administrator.playlistvideo.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
            </div>

            <!-- Tambahkan form pencarian -->
            <div class="card-body">
                <form action="{{ route('administrator.playlistvideo.index') }}" method="GET" class="mb-1">
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
                            <th class="text-center">No</th>
                            <th class="text-center">Cover</th>
                            <th class="text-center">Judul Playlist</th>
                            <th class="text-center">Aktif</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($playlistvideos as $index => $playvid)
                        <tr>
                            <td>{{ $playlistvideos->firstItem() + $index }}</td>
                            <td>
                                <?php
                                    if($playvid->gbr_playlist != NULL) {
                                        $gbr_playlist = $playvid->gbr_playlist;
                                    }
                                ?>
                                <img style="width: 80px" src="{{ url('img_playlist/'.$playvid->gbr_playlist) }}">
                            </td>
                            <td>{{ $playvid->jdl_playlist }}</td>
                            <td>{{ $playvid->aktif }}</td>
                            <td class="text-center">
                                <a href="{{ route('administrator.playlistvideo.edit', $playvid->id_playlist) }}" class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('administrator.playlistvideo.destroy', $playvid->id_playlist) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" onclick="return confirm('Yakin hapus {{ $playvid->jdl_playlist }}?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $playlistvideos->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

@endsection

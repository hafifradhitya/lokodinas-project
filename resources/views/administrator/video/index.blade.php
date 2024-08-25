@extends('administrator.layout')


@section('content')
<div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
          <div class="card-header d-flex justify-content-between align-items-center">
              <h3 class="mb-0">Semua Video</h3>
              <a href="{{ route('administrator.video.create') }}" class="btn btn-primary btn-sm">Tambahkan Data</a>
          </div>

          <!-- Tambahkan form pencarian -->
          <div class="card-body">
              <form action="{{ route('administrator.video.index') }}" method="GET" class="mb-3">
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
                <th>Judul Video</th>
                <th>Tanggal Video</th>
                <th>Playlist</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($videos as $index => $vid)
                  <tr>  
                      {{-- <td>{{ $no }}</td> --}}
                        <td>{{ $index + $videos->firstItem() }}</td>
                        <td>{{ $vid->jdl_video }}</td>
                        <td>{{ \Carbon\Carbon::parse($vid->tanggal)->format('d M Y') }}</td>
                        <td>{{ $vid->playlist->jdl_playlist ?? 'Tidak ada playlist' }}</td>
                        <td class="text-center">
                            <a href="{{ route('administrator.video.edit', $vid->id_video) }}" class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('administrator.video.destroy', $vid->id_video) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" onclick="return confirm('Yakin hapus {{ $vid->jdl_video }}?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                  </tr>  
              @endforeach
            </tbody>
          </table>
          <br>
          {{ $videos->links('vendor.pagination.bootstrap-4') }}
        </div>
      </div>
    </div>
</div>
@endsection

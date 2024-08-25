@extends('administrator.layout')

@section('content')  
    <!-- Table -->
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Semua Berita</h3>
                <a href="{{ route('administrator.berita.create') }}" class="btn btn-primary btn-sm">Tambahkan Data</a>
            </div>

            <!-- Tambahkan form pencarian -->
            <div class="card-body">
                <form action="{{ route('administrator.kategoriberita.index') }}" method="GET" class="mb-3">
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
                  <th>Judul Berita</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th class="text-center">Action</th>
                </tr>  
              </thead>
              <tbody>        
                @foreach ($berita as $index => $news)
                    <tr>
                        {{-- <td>{{ $no }}</td> --}}
                        <td>{{ $index + $berita->firstItem() }}</td>
                        <td>{{ $news->judul }}</td>
                        <td>{{ \Carbon\Carbon::parse($news->tanggal)->format('d M Y') }}</td>
                        <td>
                            @if ($news->status === 'Y')
                            <span style="color:green">Published</span>
                            @else
                            <span style="color:red">Unpublished</span>
                            @endif
                        </td>  
                        <td class="text-center">
                            <a href="{{ route('administrator.berita.publish', $news->id_berita) }}" class="btn btn-info btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                <i class="fa fa-check"></i>
                            </a>
                            <a href="{{ route('administrator.berita.edit', $news->id_berita) }}" class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                              <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('administrator.berita.destroy', $news->id_berita) }}" method="POST" class="d-inline-block">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" onclick="return confirm('Yakin hapus {{ $news->judul }}?')">
                                <i class="fa fa-trash"></i>
                              </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
            <br>
            {{ $berita->links('vendor.pagination.bootstrap-4') }}
          </div>
        </div>
      </div>
    </div>
@endsection

@extends('administrator.dashboard')

@section('content')

<div class="card">
    <!-- Card header -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Download File</h3>
        <a href="{{ route('administrator.downloadarea.create')}}" class="btn btn-primary btn-sm">Tambah Data</a>
    </div>
    <div class="table-responsive py-4">
        <table class="table table-flush" id="datatable-basic">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Link</th>
                    <th>Hits</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no=1;
                @endphp
                @foreach ($downloads as $download)
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $download->judul }}</td>
                    <td><a href="{{ route('administrator.downloadarea.show', ['downloadarea' => $download->id_download, 'download' => true]) }}">Unduh</a></td>
                    <td>{{ $download->hits }}</td>
                    <td>{{ \Carbon\Carbon::parse($download->tgl_posting)->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('administrator.downloadarea.edit', $download->id_download) }}" class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('administrator.downloadarea.destroy', $download->id_download) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" onclick="return confirm('Yakin hapus {{ $download->judul }}?')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @php
                $no++;
                @endphp
                @endforeach
            </tbody>
        </table>
        <br>
        {{ $downloads->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>

@endsection
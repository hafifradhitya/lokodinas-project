@extends('administrator.layout')

@section('content')

<div class="row">
    <div class="col">
        <div class="card card-shadow">
            <!-- Card header -->
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Manajemen Modul</h3>
                <a href="{{ route('administrator.manajemenmodul.create') }}" class="btn btn-primary btn-sm">Tambahkan Data</a>
            </div>

            <div class="card-body">
                <form action="{{ route('administrator.manajemenmodul.index') }}" method="GET" class="mb-1">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari modul..." name="search" value="{{ request('search') }}">
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
                            <th>Nama Modul</th>
                            <th>URL</th>
                            <th>Publish</th>
                            <th>Aktif</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                        @endphp
                        @foreach ($manajemenmodul as $index => $modul)
                        <tr>
                            <td>{{ $index + $manajemenmodul->firstItem() }}</td>
                            <td>{{ $modul->nama_modul }}</td>
                            <td><a href="{{ $modul->link }}" target="_blank">	http://localhost/lokodinas/administrator/ {{ $modul->link }}</a></td>
                            <td>{{ $modul->publish }}</td>
                            <td>{{ $modul->aktif }}</td>
                            <td>{{ $modul->status }}</td>
                            <td class="text-center">
                                <a href="{{ route('administrator.manajemenmodul.edit', $modul->id_modul) }}" class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('administrator.manajemenmodul.destroy', $modul->id_modul) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" onclick="return confirm('Yakin hapus {{ $modul->nama_modul }}?')">
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
                {{ $manajemenmodul->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

@endsection

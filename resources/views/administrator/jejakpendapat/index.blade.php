@extends('administrator.dashboard')

@section('content')

<div class="card">
    <!-- Card header -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2 class="mb-0">poling / Jajak Pendapat</h2>
        <a href="{{ route('administrator.jejakpendapat.create')}}" class="btn btn-primary btn-sm">Tambah Data</a>
    </div>

    <div class="card-body">
        <form action="{{ route('administrator.sekilasinfo.index') }}" method="GET" class="mb-1">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari Polling..." name="search" value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                </div>
            </div>
        </form>

        <div class="table-responsive py-4">
            <table class="table table-bordered" id="datatable-basic">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Pilihan</th>
                        <th>Status</th>
                        <th>Rating</th>
                        <th>Aktif</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach ( $polings as $poling )
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $poling->pilihan }}</td>
                        <td>{{ $poling->status }}</td>
                        <td>{{ $poling->rating }}</td>
                        <td>{{ $poling->aktif }}</td>
                        <td>
                            <a href="{{ route('administrator.jejakpendapat.edit', $poling->id_poling) }}" class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('administrator.jejakpendapat.destroy', $poling->id_poling) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" onclick="return confirm('Yakin hapus {{ $poling->pilihan }}?')">
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
            {{ $polings->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</div>

@endsection
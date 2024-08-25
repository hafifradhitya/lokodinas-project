@extends('administrator.layout')

@section('content')

<div class="row">
    <div class="col">
        <div class="card card-shadow">
            <!-- Card header -->
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Manajemen Users</h3>
                <a href="{{ route('administrator.manajemenuser.create') }}" class="btn btn-primary btn-sm">Tambahkan Data</a>
            </div>

            <div class="card-body">
                <form action="{{ route('administrator.manajemenuser.index') }}" method="GET" class="mb-1">
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
                            <th>Username</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Foto</th>
                            <th>Blokir</th>
                            <th>Level</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                        @endphp
                        @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ $index + $users->firstItem() }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->nama_lengkap }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <?php
                                if ($user->foto != NULL) {
                                    $foto = $user->foto;
                                }
                                ?>
                                <img style='width:32px; height:32px' src="{{ url('foto_user/'.$user->foto )}}">

                            </td>
                            <td>{{ $user->blokir }}</td>
                            <td>{{ $user->level }}</td>
                            <td class="text-center">
                                <a href="{{ route('administrator.manajemenuser.edit', $user->id) }}" class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('administrator.manajemenuser.destroy', $user->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" onclick="return confirm('Yakin hapus {{ $user->username }}?')">
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
                {{ $users->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

@endsection

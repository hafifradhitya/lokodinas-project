@extends('administrator.layout')

@section('content')
<div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
          <div class="card-header d-flex justify-content-between align-items-center">
              <h3 class="mb-0">Menu Website</h3>
              <a href="{{ route('administrator.menuwebsite.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
          </div>

          <!-- Tambahkan form pencarian -->
          <div class="card-body">
              <form action="{{ route('administrator.menuwebsite.index') }}" method="GET" class="mb-3">
                  <div class="input-group">
                      <input type="text" class="form-control" placeholder="Cari menu..." name="search" value="{{ request('search') }}">
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
                <th>Menu</th>
                <th>Level Menu</th>
                <th>Link</th>
                <th>Aktif</th>
                <th>Position</th>
                <th>Urutan</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($menuwebs as $index => $menu)
                  <tr>
                        <td>{{ $index + $menuwebs->firstItem() }}</td>
                        <td>{{ $menu->nama_menu }}</td>
                        <td>{{ $menu->parent ? $menu->parent->nama_menu : 'Menu Utama' }}</td>
                        <td>{{ $menu->link }}</td>
                        <td>{{ $menu->aktif }}</td>
                        <td>{{ $menu->position }}</td>
                        <td>{{ $menu->urutan }}</td>
                        <td class="text-center">
                            <a href="{{ route('administrator.menuwebsite.edit', $menu->id_menu) }}" class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('administrator.menuwebsite.destroy', $menu->id_menu) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" onclick="return confirm('Yakin hapus {{ $menu->nama_menu }}?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
          <br>
          {{ $menuwebs->links('vendor.pagination.bootstrap-4') }}
        </div>
      </div>
    </div>
</div>
@endsection

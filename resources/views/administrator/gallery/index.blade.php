@extends('administrator.layout')


@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Semua Gallery</h3>
                <a href="{{ route('administrator.gallery.create') }}" class="btn btn-primary btn-sm">Tambahkan Data</a>
            </div>

            <div class="card-body">
                <form action="{{ route('administrator.gallery.index') }}" method="GET" class="mb-3">
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
                            <th>Foto</th>
                            <th>Judul Foto</th>
                            <th>Nama Album</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gallery as $index => $galleria)
                            <tr>
                                <td>{{ $index + $gallery->firstItem() }}</td>
                                <td>
                                    <?php
                                        if ($galleria->gbr_gallery != NULL) {
                                            $gbr_gallery = $galleria->gbr_gallery;
                                        }
                                    ?>
                                    <img style='width: 75px; height:75px' src="{{ url('img_gallery/'.$galleria->gbr_gallery )}}">
                                </td>
                                <td>{{ $galleria->jdl_gallery }}</td>
                                <td>{{ $galleria->album->jdl_album ?? 'Tidak ada Judul Album' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('administrator.gallery.edit', $galleria->id_gallery) }}" class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{ route('administrator.gallery.destroy', $galleria->id_gallery) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" onclick="return confirm('Yakin hapus {{ $galleria->jdl_gallery }}?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $gallery->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</div>



@endsection
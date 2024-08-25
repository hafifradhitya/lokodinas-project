@extends('administrator.dashboard')

@section('content')

<div class="card">
    <!-- Card header -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2 class="mb-0">Album Berita Foto</h2>
        <a href="{{ route('administrator.album.create')}}" class="btn btn-primary btn-sm">Tambah Data</a>
    </div>
    <div class="table-responsive py-4">
        <table class="table table-bordered" id="datatable-basic">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Cover</th>
                    <th>Judul Berita Foto</th>
                    <th>Url</th>
                    <th>Aktif</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no=1;
                @endphp
                @foreach ( $albums as $album )
                <tr>
                    <td>{{ $no }}</td>
                    <td>
                    <?php
                        if ($album->gbr_album != NULL) {
                            $gbr_album = $album->gbr_album;
                        }
                        ?>
                        <img style='width: 75px; height:75px' src="{{ url('img_album/'.$album->gbr_album )}}">
                    </td>
                    <td>{{ $album->jdl_album }}</td>
                    <td><a href="{{ url('album/detail/' . $album->album_seo) }}">album/detail/{{ $album->album_seo }}</a></td>
                    <td>{{ $album->aktif }}</td>
                    <td>
                        <a href="{{ route('administrator.album.edit', $album->id_album) }}" class="btn btn-success btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('administrator.album.destroy', $album->id_album) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;" onclick="return confirm('Yakin hapus {{ $album->jdl_album }}?')">
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
        {{ $albums->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>

@endsection
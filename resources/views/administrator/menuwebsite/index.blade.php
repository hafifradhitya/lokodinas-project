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
                <div class="d-flex justify-content-between">
                    <div class="input-group" style="max-width: 300px;">
                        <select class="form-control" name="urutan">
                            <option value="">Pilih Urutan</option>
                            @foreach ($urutans as $urutan)
                                <option value="{{ $urutan->urutan }}" {{ request('urutan') == $urutan->urutan ? 'selected' : '' }}>
                                    {{ $urutan->urutan }}
                                </option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">Filter</button>
                        </div>
                    </div>
                    <div class="input-group" style="max-width: 300px;">
                        <input type="text" class="form-control" placeholder="Cari Menuwebsite..." name="search" value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">Cari</button>
                        </div>
                    </div>
                </div>
                @if(request('search') || request('urutan'))
                <div class="mt-2 d-flex justify-content-center">
                    <a href="{{ route('administrator.menuwebsite.index') }}" class="btn btn-primary text-white shadow">Seluruh Data</a>
                </div>
                @endif
              </form>

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
</div>

<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click', '.btn-delete', function() {
            let btn =$(this);
            Swal.fire({
               icon:'warning',
               text:'Data yang sudah di hapus tidak dapat dikembalikan!',
               title:'Apakah Anda yakin ingin menghapus data ini?',
               showCancelButton: true,
               confirmButtonColor:'#D33',
               confirmButtonText:'Yakin hapus?',
               cancelButtonText:'Batal'
            }).then((result)=>{
                if (result.isConfirmed){
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                    document.location = btn.data('url');
                }
            });
        });
        $('.form-ajax').each(function() {
                $(this).bind('submit', function(e) {
                    e.preventDefault();
                    let form = $(this);
                    $.ajax({
                        url: form.prop('action'),
                        data: new FormData(this),
                        cache: false,
                        async: false,
                        type: 'post',
                        contentType: false,
                        processData: false,
                        success: function(data) {
                        if (data.success = false) {
                            Swal.fire({
                                icon: 'error',
                                //html: data.message,
                                timer: 1500,
                                showConfirmButton: false
                            });
                        } else {
                            Swal.fire({
                                    position: "center",
                                    icon: "success",
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then((result)=>{
                                    console.log(result);
                                    document.location = data.url;
                                });


                        }
                    }
                });
            });
        });
    });
</script>
@endsection

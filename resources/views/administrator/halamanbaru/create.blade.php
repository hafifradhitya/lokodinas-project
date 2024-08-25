@extends('administrator.layout')

@section('content')
<div class="row">
    <div class="col">
      <div class="card card-shadow">
        <div class="card-header">
          <h3 class="mb-0">Tambah Halaman Baru</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('administrator.halamanbaru.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                <tbody>
                    <tr>
                        <th style="padding: 5px;">Judul:</th>
                        <td style="padding: 5px;">
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">Isi Halaman:</th>
                        <td style="padding: 5px;">
                            <textarea class="form-control" id="isi_halaman" name="isi_halaman" rows="10"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">Gambar:</th>
                        <td style="padding: 5px;">
                            <input type="file" class="form-control-file" id="gambar" name="gambar">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-4 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('administrator.halamanbaru.index') }}" class="btn btn-danger">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>
  CKEDITOR.replace('isi_halaman');
</script>
@endpush

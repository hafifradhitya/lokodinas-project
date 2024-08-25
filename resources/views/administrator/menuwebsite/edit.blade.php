@extends('administrator.layout')

@section('content')
<div class="row">
    <div class="col">
        <div class="card card-shadow">
            <div class="card-header">
                <h3 class="mb-0">Edit Menu Website</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('administrator.menuwebsite.update', $menu->id_menu) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <table class="table" id="datatable-buttons" style="border: none; border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <th style="padding: 5px;">Link Menu</th>
                                <td style="padding: 5px;">
                                    <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" value="{{ old('link', $menu->link) }}" placeholder="Masukkan Link Menu Website" required>
                                    @error('link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Level Menu</th>
                                <td style="padding: 5px;">
                                    <select class="form-control @error('id_parent') is-invalid @enderror" id="id_parent" name="id_parent">
                                        <option value="">-- Pilih Level Menu --</option>
                                        @foreach ($menuwebs as $menuw)
                                            <option value="{{ $menuw->id_menu }}" {{ old('id_parent', $menu->id_parent) == $menuw->id_menu ? 'selected' : '' }}>
                                                {{ $menuw->nama_menu }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_parent')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Nama Menu</th>
                                <td style="padding: 5px;">
                                    <input type="text" class="form-control @error('nama_menu') is-invalid @enderror" id="nama_menu" name="nama_menu" value="{{ old('nama_menu', $menu->nama_menu) }}" placeholder="Masukkan Nama Menu" required>
                                    @error('nama_menu')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Deskripsi</th>
                                <td style="padding: 5px;">
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3" placeholder="Masukkan Deskripsi Menu">{{ old('deskripsi', $menu->deskripsi) }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Position</th>
                                <td style="padding: 5px;">
                                    <div class="d-flex align-items-center">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="position" id="position_bottom" value="Bottom" {{ old('position', $menu->position) == 'Bottom' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="position_bottom">Bottom</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="position" id="position_top" value="Top" {{ old('position', $menu->position) == 'Top' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="position_top">Top</label>
                                        </div>
                                    </div>
                                    @error('position')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th style="padding: 5px;">Urutan</th>
                                <td style="padding: 5px;">
                                    <input type="number" class="form-control @error('urutan') is-invalid @enderror" id="urutan" name="urutan" value="{{ old('urutan', $menu->urutan) }}" placeholder="Urutan Menu" required style="width: 100px;">
                                    @error('urutan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                {{-- <th style="padding: 5px;">Status</th>
                                <td style="padding: 5px;">
                                    <select class="form-control @error('aktif') is-invalid @enderror" id="aktif" name="aktif" required>
                                        <option value="Y" {{ old('aktif', $menu->aktif) == 'Y' ? 'selected' : '' }}>Aktif</option>
                                        <option value="N" {{ old('aktif', $menu->aktif) == 'N' ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
                                    @error('aktif')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td> --}}
                                <th style="padding: 5px;">Aktif</th>
                                <td style="padding: 5px;">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="aktif" id="aktif_y" value="Ya" {{ old('aktif', $menu->aktif) == 'Ya' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="aktif_y">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="aktif" id="aktif_n" value="Tidak" {{ old('aktif', $menu->aktif) == 'Tidak' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="aktif_n">Tidak</label>
                                    </div>
                                    @error('aktif')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-4 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                        <a href="{{ route('administrator.menuwebsite.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('administrator.layout')

@section('content')
<div class="card shadow">
    <div class="card-header">
        <h3 class="mb-0">Tambah Agenda</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('administrator.agenda.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <table class="table" style="border: none; border-collapse: collapse;">
                <tbody>
                    <tr>
                        <th style="padding: 5px;">Tema</th>
                        <td style="padding: 5px;">
                            <input type="text" class="form-control" id="tema" name="tema" placeholder="Masukkan tema" required>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">Isi Agenda</th>
                        <td style="padding: 5px;">
                            <textarea class="form-control" id="isi_agenda" name="isi_agenda" rows="4"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">Gambar</th>
                        <td style="padding: 5px;">
                            <input type="file" class="form-control" id="gambar" name="gambar">
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">Tempat</th>
                        <td style="padding: 5px;">
                            <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Masukkan tempat">
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">Jam</th>
                        <td style="padding: 5px;">
                            <input type="text" class="form-control" id="jam" name="jam" placeholder="Masukkan Jam 00:00 - 00:00 WIB" required>
                        </td>
                    </tr>
                    {{-- <tr>
                        <th style="padding: 5px;">Tgl s/d Selesai</th>
                        <td style="padding: 5px;">
                            <input type="text" class="form-control" id="date_range" name="tgl_selesai" placeholder="Tgl s/d Selesai">
                        </td>
                    </tr> --}}
                    <tr>
                        <th style="padding: 5px;">Tgl s/d Selesai</th>
                        <td style="padding: 5px;">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="tgl_mulai" name="tgl_mulai" placeholder="Tanggal Mulai">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="tgl_selesai" name="tgl_selesai" placeholder="Tanggal Selesai">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">Pengirim</th>
                        <td style="padding: 5px;">
                            <input type="text" class="form-control" id="pengirim" name="pengirim" placeholder="Masukkan pengirim">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-4 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Tambahkan</button>
                <a href="{{ route('administrator.agenda.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    flatpickr("#tgl_mulai", {
        dateFormat: "Y-m-d",
        locale: {
            firstDayOfWeek: 1
        }
    });

    flatpickr("#tgl_selesai", {
        dateFormat: "Y-m-d",
        locale: {
            firstDayOfWeek: 1
        }
    });

    document.querySelector('form').addEventListener('submit', function(e) {
        var jamInput = document.getElementById('jam').value;
        var jamPattern = /^([01]\d|2[0-3]):([0-5]\d) - ([01]\d|2[0-3]):([0-5]\d) WIB$/;
        if (!jamPattern.test(jamInput)) {
            e.preventDefault();
            alert('Format jam tidak valid. Harus dalam format HH:MM - HH:MM WIB');
        }
    });
});
</script>

@endsection

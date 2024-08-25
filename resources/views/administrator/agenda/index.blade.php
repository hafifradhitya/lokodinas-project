@extends('administrator.dashboard')

@section('content')

<div class="card">
    <!-- Card header -->
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Semua Agenda</h3>
        <a href="{{ route('administrator.agenda.create')}}" class="btn btn-primary btn-sm">Tambah Data</a>
    </div>   
    <div class="table-responsive py-4">
        <table class="table table-flush" id="datatable-basic">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Tema</th>
                    <th>Tgl Mulai</th>
                    <th>Tgl Selesai</th>
                    <th>Jam</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($agendas as $agenda)
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $agenda->tema }}</td>
                    <td>{{ \Carbon\Carbon::parse($agenda->tgl_mulai)->format('d M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($agenda->tgl_selesai)->format('d M Y') }}</td>
                    <td>{{ $agenda->jam }}</td>
                    <td class="text-center">
                        <a href="{{ route('administrator.agenda.edit', $agenda->id_agenda) }}" class="btn btn-success btn-sm" title="Edit Data">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('administrator.agenda.destroy', $agenda->id_agenda) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Data" onclick="return confirm('Yakin hapus {{ $agenda->tema }}?')">
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
        {{ $agendas->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>

@endsection
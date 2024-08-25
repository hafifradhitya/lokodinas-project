@extends('administrator.layout')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit Poling / Jajak Pendapat</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('administrator.jejakpendapat.update', $poll->id_poling) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="pilihan" class="form-label">Pertanyaan</label>
                <input type="text" class="form-control" id="pertanyaan" name="pilihan" value="{{ $poll->pilihan }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="jawaban" value="jawaban" {{ $poll->status == "jawaban" ? "checked" : "" }}>
                        <label class="form-check-label" for="jawaban">Jawaban</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="pertanyaan" value="pertanyaan" {{ $poll->status == "pertanyaan" ? "checked" : "" }}>
                        <label class="form-check-label" for="pertanyaan">Pertanyaan</label>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Aktif</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="aktif" id="ya" value="Y" {{ $poll->aktif == "Y" ? "checked" : "" }}>
                        <label class="form-check-label" for="Y">Ya</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="aktif" id="tidak" value="N" {{ $poll->aktif == "N" ? "checked" : "" }}>
                        <label class="form-check-label" for="N">Tidak</label>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
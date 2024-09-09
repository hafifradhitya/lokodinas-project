<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Trainer;
use App\Models\Trainerprogramgroup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->search;
        $nama_trainer = $request->nama_trainer;

        $query = Trainer::query();

        if (!empty($search)) {
            $query->where('nama_trainer', 'like', "%$search%");
        }  

        if (!empty($nama_trainer)) {
            $query->where('nama_trainer', $nama_trainer);   
        }

        $trainers = $query->paginate(10);

        $nama_trainers = Trainer::select('nama_trainer')
                    ->groupBy('nama_trainer')
                    ->get();

        return view('administrator.trainer.index', compact(['trainers', 'nama_trainers']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $programs = Program::all();
        return view('administrator.trainer.create', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $nama_trainer = $request->nama_trainer;

        if ($request->nama_trainer !=''){
            $link = $request->nama_kategori;
            $nama_trainer=implode(',',$link);
        }else{
            $nama_trainer = '';
        }

        $gambarName = null;

        if ($request->hasFile('foto')) {
            $gambar = $request->file("foto");
            $gambarName = $gambar->getClientOriginalName(); // Menggunakan nama file asli
            $gambar->move("./foto_trainer/", $gambarName);
        }

        Trainer::create([
            'nama_trainer' => $nama_trainer,
            'foto' => $gambarName,
            "tanggal" => now(),
        ]);

        return response()->json([
            'url' => route('administrator.trainer.index'),
            'success' => true,
            'message' => 'Data Trainer Berhasil Ditambah'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $trainers = Trainer::findOrFail($id);
        $traineran = DB::table('trainer')
        ->join('trainer_program_group', 'trainer.id_trainer', '=', 'trainer_program_group.id_trainer')
        ->join('kategori_program', 'trainer_program_group.id_kategori', '=', 'kategori_program.id_kategori')
        ->where('trainer.id_trainer', $id)
        ->orderBy('trainer_program-group.id_tgroup', 'DESC')
        ->get();

        return view('administrator.trainer.edit', compact('trainers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $trainers = Trainer::findOrFail($id);

        $nama_trainer = $request->nama_trainer;

        if ($request->hasFile('foto')) {
            $gambar = $request->file("foto");
            $gambarName = $gambar->getClientOriginalName();
            $gambar->move("./foto_trainer/", $gambarName);
            $updateData['gambar'] = $gambarName;
        }


        $trainers->update([
            "nama_trainer" => $nama_trainer,
            "tanggal" => now(),
        ]);

        if ($request->has('nama_trainer')) {
            $existingPTraineran = Trainerprogramgroup::where('id_trainer', $trainers->id_program)->pluck('id_tgroup')->toArray();
            $newTraineran = array_diff($request->nama_program, $existingPTraineran);

            foreach ($newTraineran as $trainerId) {
                Trainerprogramgroup::create([
                    'id_trainer' => $trainers->id_trainer,
                    'id_tgroup' => $trainerId
                ]);
            }
        }

        return response()->json([
            'url' => route('administrator.trainer.index'),
            'success' => true,
            'message' => 'Data Trainer Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $trainers = Trainer::findOrFail($id);
        $trainers->delete();

        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}

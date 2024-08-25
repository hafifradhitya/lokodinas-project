<?php

namespace App\Http\Controllers;

use App\Models\Sekilasinfo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SekilasinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {
        //
        $search = $request->search;
        if (!empty($search)) {
            $infos = Sekilasinfo::latest()
                ->where('id_sekilas', 'like', "%$search%")
                ->orWhere('info', 'like', "%$search%")
                ->paginate(10);
        } else {
            $infos = Sekilasinfo::orderBy('id_sekilas', 'desc')->paginate(10);
        }

        return view('administrator.sekilasinfo.index', compact('infos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
        return view('administrator.sekilasinfo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        //
        $validated = $request->validate([
            'info' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $info = $request->info;
        $gambarName = null;

        if ($request->hasFile('foto')) {
            $gambar = $request->file("foto");
            $gambarName = $info . "_" . Str::random(25) . "." . $gambar->getClientOriginalExtension();
            $gambar->move("./foto_info/", $gambarName);
        }

        Sekilasinfo::create([
            "info" => $info,
            "aktif" => $request->aktif ?? 'Y',
            "tgl_posting" => now(),
            "gambar" => $gambarName
        ]);

        session()->flash("pesan", "Info sekilas berhasil Ditambah");
        return redirect()->route('administrator.sekilasinfo.index')->with(['success' => 'Info sekilas berhasil Ditambah']);
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
    public function edit(Request $request, string $id_sekilas):View
    {
        //
        $infot = Sekilasinfo::where('id_sekilas', $id_sekilas)->firstOrFail();
        return view('administrator.sekilasinfo.edit', compact('infot'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_sekilas)
    {
        //
        $validated = $request->validate([
            'info' => 'required|string',
            'aktif' => 'nullable|boolean',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $sekilasinfo = Sekilasinfo::findOrFail($id_sekilas);

        $info = $request->info;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $info . "_" . Str::random(25) . "." . $gambar->getClientOriginalExtension();
            $gambar->move("./foto_info/", $gambarName);
            $sekilasinfo->gambar = $gambarName;
        }

        $sekilasinfo->update([
            "info" => $info,
            "aktif" => $request->aktif ?? 'Y',
            "tgl_posting" => now()
        ]);

        session()->flash("pesan", "Info sekilas berhasil Diubah");
        return redirect()->route('administrator.sekilasinfo.index')->with(['success' => 'Info sekilas berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_sekilas):RedirectResponse
    {
        //
        $info = Sekilasinfo::findOrFail($id_sekilas);

        // Hapus gambar terkait jika ada
        if ($info->gambar && file_exists("./foto_info/" . $info->gambar)) {
            unlink("./foto_info/" . $info->gambar);
        }

        // Hap

        $info->delete();

        session()->flash("pesan", "info berhasil Dihapus");
        return redirect()->route('administrator.sekilasinfo.index')->with(['success' => 'info berhasil Dihapus']);
    }
}

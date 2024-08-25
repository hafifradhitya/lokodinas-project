<?php

namespace App\Http\Controllers;

use App\Models\Halamanbaru;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class HalamanbaruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {
        $search = $request->search;
        if (!empty($search)) {
            $halamanbaru = Halamanbaru::latest()
                ->where('judul', 'like', "%$search%")
                ->orWhere('isi_halaman', 'like', "%$search%")
                ->paginate(10);
        } else {
            $halamanbaru = Halamanbaru::orderBy('tgl_posting', 'desc')->paginate(10);
        }

        return view('administrator.halamanbaru.index', compact(['halamanbaru']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
        return view('administrator.halamanbaru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        //

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi_halaman' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $judul = $request->judul;
        $gambarName = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $judul."_".Str::random(25).".".$gambar->getClientOriginalExtension();
            $gambar->move("./foto_halaman/", $gambarName);
        }

        $username = $request->username ?: 'admin';

        Halamanbaru::create([
            "judul" => $judul,
            "isi_halaman" => $request->isi_halaman,
            "judul_seo" => Str::slug($validated['judul']),
            "tgl_posting" => now(),
            "jam" => now(),
            "hari" => now()->format('l'),
            "username" => $username,
            "gambar" => $gambarName
        ]);

        session()->flash("pesan", "Data berhasil Ditambah");
        return redirect()->route('administrator.halamanbaru.index')->with(['succes'=>'Data berhasil Ditambah']);
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
    public function edit(string $id_halaman):View
    {
        //
        $halamanbaru = Halamanbaru::findOrFail($id_halaman);
        return view('administrator.halamanbaru.edit', compact('halamanbaru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_halaman)
    {
        //
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi_halaman' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $halamanbaru = Halamanbaru::findOrFail($id_halaman);

        $judul = $request->judul;
        $username = $request->username ?: 'admin';

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $judul."_".Str::random(25).".".$gambar->getClientOriginalExtension();
            $gambar->move("./foto_halaman/", $gambarName);
            $halamanbaru->gambar = $gambarName;
        }

        $halamanbaru->update([
            "judul" => $judul,
            "isi_halaman" => $request->isi_halaman,
            "judul_seo" => Str::slug($validated['judul']),
            "tgl_posting" => now(),
            "jam" => now(),
            "hari" => now()->format('l'),
            "username" => $username
        ]);

        session()->flash("pesan", "Data berhasil Diperbarui");
        return redirect()->route('administrator.halamanbaru.index')->with(['success' => 'Data berhasil Diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_halaman):RedirectResponse
    {
        //
        $halamanbaru = Halamanbaru::findOrFail($id_halaman);
        $halamanbaru->delete();

        session()->flash("pesan", "Data berhasil Dihapus");
        return redirect()->route('administrator.halamanbaru.index')->with(['success'=>'Data berhasil Dihapus']);
    }
}

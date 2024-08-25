<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str; // Tambahkan baris ini
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        //
        $search = $request->search;
        if (!empty($search)) {
            $albums = Album::latest()
                ->where('id_album', 'like', "%$search%")
                ->orWhere('jdl_album', 'like', "%$search%")
                ->paginate(10);
        } else {
            $albums = Album::orderBy('id_album', 'DESC')->paginate(10);
        }

        return view('administrator.album.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('administrator.album.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $judul = $request->judul;
        $gambarName = null;

        if ($request->hasFile('cover')) {
            $gambar = $request->file("cover");
            $gambarName = $judul . "_" . Str::random(25) . "." . $gambar->getClientOriginalExtension();
            $gambar->move("./img_album/", $gambarName);
        }

        Album::create([
            "jdl_album" => $judul,
            "keterangan" => $validated['keterangan'],
            "aktif" => $request->aktif ?? 'Y',
            "gbr_album" => $gambarName,
            "album_seo" => Str::slug($judul),
            "tgl_posting" => now(),
            "jam" => now()->format('H:i:s'),
            "hari" => now()->format('l'),
            "username" => 'admin',
        ]);

        session()->flash("pesan", "album berhasil Ditambah");
        return redirect()->route('administrator.album.index')->with(['success' => 'album berhasil Ditambah']);
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
    public function edit(string $id_album):View
    {
        //
        $album = Album::where('id_album', $id_album)->firstOrFail();

        return view('administrator.album.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_album)
    {
        //
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        $album = Album::findOrFail($id_album); // Temukan record yang ingin diperbarui
        
        $judul = $request->judul;
        $gambarName = $album->gbr_album;
        
        if ($request->hasFile('cover')) {
            $gambar = $request->file("cover");
            $gambarName = $judul . "_" . Str::random(25) . "." . $gambar->getClientOriginalExtension();
            $gambar->move("./img_album/", $gambarName);
        }
        
        $album->update([
            "jdl_album" => $judul,
            "keterangan" => $validated['keterangan'],
            "gbr_album" => $gambarName,
            "aktif" => $request->aktif ?? 'Y', 
        ]);
        
        session()->flash("pesan", "Album berhasil diperbarui");
        return redirect()->route('administrator.album.index')->with(['success' => 'Album berhasil diperbarui']);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_album)
    {
        //
        $album = Album::findOrFail($id_album);
        $album->delete();

        session()->flash("pesan", "album berhasil Dihapus");
        return redirect()->route('administrator.album.index')->with(['success' => 'info berhasil Dihapus']);
    }
}

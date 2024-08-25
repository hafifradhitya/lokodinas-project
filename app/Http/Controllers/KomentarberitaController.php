<?php

namespace App\Http\Controllers;

use App\Models\Komentarberita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class KomentarberitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {
        //  
        $search = $request->search;
        if(!empty($search)) {
            $komentarberita = Komentarberita::latest()
            ->where('nama_komentar', 'like', "%$search%")
            ->paginate(10);
        }else {
            $komentarberita = Komentarberita::paginate(10);
        }

        return view('administrator.komentarberita.index', compact(['komentarberita']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id_komentar):View
    {
        //
        $komentarberita = Komentarberita::findOrFail($id_komentar);
        return view('administrator.komentarberita.edit', compact(['komentarberita']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_komentar)
    {
        //
        $validated = $request->validate([
            'aktif' => 'required|in:Y,N'
        ]);

        $nama_komentar = $request->nama_komentar;
        $url = $request->url;
        $isi_komentar = $request->isi_komentar;
        $email = $request->email;

        $komentarberita = Komentarberita::findOrFail($id_komentar);

        $komentarberita->update([
            "nama_komentar" => $nama_komentar,
            "url" => $url,
            "isi_komentar" => $isi_komentar,
            "email" => $email,
            "aktif" => $validated['aktif'],
            "tgl" => now(),
            "jam_komentar" => now()
        ]);

        session()->flash("pesan", "Komentar Berita berhasil Diperbarui");
        return redirect()->route('administrator.komentarberita.index')->with(['success' => 'Komentar Berita berhasil Diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_komentar):RedirectResponse
    {
        //  
        $komentarberita = Komentarberita::findOrFail($id_komentar);
        $komentarberita->delete();

        session()->flash("pesan", "Komentar Berita Berhasil Dihapus");
        return redirect()->route('administrator.komentarberita.index')->with(['success'=>'Komentar Berita berhasil Dihapus']);
    }
}

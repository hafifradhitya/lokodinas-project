<?php

namespace App\Http\Controllers;

use App\Models\Iklanatas;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str; 
use Illuminate\Http\Request;

class IklanatasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        //
        $search = $request->search;
        if (!empty($search)) {
            $iklanatas = Iklanatas::latest()
                ->orWhere('judul', 'like', "%$search%")
                ->paginate(10);
        } else {
            $iklanatas = Iklanatas::orderBy('id_iklanatas', 'desc')->paginate(10);
        }

        return view('administrator.iklanatas.index', compact(['iklanatas']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
        return view('administrator.iklanatas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        //
        $validated = $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'url' => 'required'
        ]);

        $judul = $request->judul;
        $gambarName = null;
        $username = $request->username ?: 'admin';

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $judul . "_" . Str::random(25) . "." . $gambar->getClientOriginalExtension();
            $gambar->move("./foto_iklansidebar/", $gambarName);
        }

        Iklanatas::create([
            'judul' => $validated['judul'],
            'gambar' => $gambarName,
            'url' => $validated['url'],
            'tgl_posting' => now(),
            'username' => $username
        ]);

        session()->flash("pesan", "Data berhasil Ditambah");
        return redirect()->route('administrator.iklanatas.index')->with('success', 'Banner slider berhasil ditambahkan');
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
    public function edit(string $id_iklanatas):View
    {
        //
        $iklanatas = Iklanatas::findOrFail($id_iklanatas);
        return view('administrator.iklanatas.edit', compact('iklanatas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_iklanatas)
    {
        //
        $iklanatas = Iklanatas::findOrFail($id_iklanatas);

        $judul = $request->judul;
        $url = $request->url;

        $updateData = [
            'judul' => $judul,
            'url' => $url
        ];

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $judul."_".Str::random(25).".".$gambar->getClientOriginalExtension();
            $gambar->move("./foto_iklanatas/", $gambarName);
            $updateData['gambar'] = $gambarName;
        }

        $iklanatas->update($updateData);

        session()->flash("pesan", "Data berhasil Diperbarui");
        return redirect()->route('administrator.iklanatas.index')->with('success', 'Banner slider berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_iklanatas)
    {
        //
        $iklanatas = Iklanatas::findOrFail($id_iklanatas);
        $iklanatas->delete();

        session()->flash("pesan", "Data berhasil Dihapus");
        return redirect()->route('administrator.iklanatas.index')->with('success', 'Banner slider berhasil dihapus');
    }
}

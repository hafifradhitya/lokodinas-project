<?php

namespace App\Http\Controllers;

use App\Models\Bannerhome;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class BannerhomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {
        //
        $search = $request->search;
        if(!empty($search)) {
            $bannerhomes = Bannerhome::latest()
            ->where('judul', 'like', "%$search%")
            ->paginate(10);
        } else {
            $bannerhomes = Bannerhome::orderBy('id_iklantengah', 'desc')->orderBy('tgl_posting')->paginate(10);
        }

        return view('administrator.bannerhome.index', compact(['bannerhomes']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
        return view('administrator.bannerhome.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $judul = $request->judul;
        $url = $request->url;
        $tgl_posting = now(); // Menggunakan waktu saat ini
        $username = $request->username ?: 'admin';

        $gambarName = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $judul."_".Str::random(25).".".$gambar->getClientOriginalExtension();
            $gambar->move("./foto_bannerhome/", $gambarName);
        }

        Bannerhome::create([
            "judul" => $judul,
            "url" => $url,
            "tgl_posting" => $tgl_posting,
            "gambar" => $gambarName,
            "username" => $username
        ]);

        session()->flash("pesan", "Data berhasil Ditambah");
        return redirect()->route('administrator.bannerhome.index')->with('success', 'Banner home berhasil ditambahkan');
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
    public function edit(string $id):View
    {
        //
        $bannerhomes = Bannerhome::findOrFail($id);
        return view('administrator.bannerhome.edit', compact('bannerhomes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $bannerhomes = Bannerhome::findOrFail($id);

        $judul = $request->judul;
        $url = $request->url;
        $tgl_posting = now(); // Menggunakan waktu saat ini
        $username = $request->username ?: 'admin';

        $updateData = [
            'judul' => $judul,
            'url' => $url,
            'tgl_posting' => $tgl_posting,
            'username' => $username
        ];

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $judul."_".Str::random(25).".".$gambar->getClientOriginalExtension();
            $gambar->move("./foto_bannerhome/", $gambarName);
            $updateData['gambar'] = $gambarName;
        }

        $bannerhomes->update($updateData);

        session()->flash("pesan", "Data berhasil Diperbarui");
        return redirect()->route('administrator.bannerhome.index')->with('success', 'Banner slider berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        //

        $bannerhomes = Bannerhome::findOrFail($id);

        $bannerhomes->delete();

        session()->flash("pesan", "Data berhasil Dihapus");
        return redirect()->route('administrator.bannerhome.index')->with('success', 'Banner slider berhasil dihapus');
    }
}

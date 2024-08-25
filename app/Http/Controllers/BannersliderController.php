<?php

namespace App\Http\Controllers;

use App\Models\Bannerslider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class BannersliderController extends Controller
{
    /**
     * Menampilkan daftar banner slider.
     */
    public function index(Request $request): View
    {
        $search = $request->search;
        if (!empty($search)) {
            $bannersliders = Bannerslider::latest()
            ->orWhere('judul', 'like', "%$search%")
            ->paginate(10);
        } else {
            $bannersliders = Bannerslider::orderBy('id_banner', 'desc')->paginate(10);
        }

        return view('administrator.bannerslider.index', compact('bannersliders'));
    }

    /**
     * Menampilkan form untuk membuat banner slider baru.
     */
    public function create(): View
    {
        return view('administrator.bannerslider.create');
    }

    /**
     * Menyimpan banner slider baru ke dalam penyimpanan.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required'
        ]);

        $judul = $request->judul;
        $gambarName = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $judul."_".Str::random(25).".".$gambar->getClientOriginalExtension();
            $gambar->move("./foto_banner/", $gambarName);
        }

        Bannerslider::create([
            'judul' => $validated['judul'],
            'gambar' => $gambarName,
            'tgl_posting' => now(),
            'deskripsi' => $request->deskripsi
        ]);

        session()->flash("pesan", "Data berhasil Ditambah");
        return redirect()->route('administrator.bannerslider.index')->with('success', 'Banner slider berhasil ditambahkan');
    }

    /**
     * Menampilkan banner slider tertentu.
     */
    public function show(string $id): View
    {
        $bannerslider = Bannerslider::findOrFail($id);
        return view('administrator.bannerslider.show', compact('bannerslider'));
    }

    /**
     * Menampilkan form untuk mengedit banner slider.
     */
    public function edit(string $id): View
    {
        $bannerslider = Bannerslider::findOrFail($id);
        return view('administrator.bannerslider.edit', compact('bannerslider'));
    }

    /**
     * Memperbarui banner slider tertentu dalam penyimpanan.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // $validated = $request->validate([
        //     'judul' => 'required|string|max:255',
        //     'deskripsi' => 'required|string'
        // ]);

        $bannerslider = Bannerslider::findOrFail($id);

        $judul = $request->judul;
        $deskripsi = $request->deskripsi;

        $updateData = [
            'judul' => $judul,
            'deskripsi' => $deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            $gambar = $request->file("gambar");
            $gambarName = $judul."_".Str::random(25).".".$gambar->getClientOriginalExtension();
            $gambar->move("./foto_banner/", $gambarName);
            $updateData['gambar'] = $gambarName;
        }

        $bannerslider->update($updateData);

        session()->flash("pesan", "Data berhasil Diperbarui");
        return redirect()->route('administrator.bannerslider.index')->with('success', 'Banner slider berhasil diperbarui');
    }

    /**
     * Menghapus banner slider tertentu dari penyimpanan.
     */
    public function destroy(string $id): RedirectResponse
    {
        $bannerslider = Bannerslider::findOrFail($id);
        $bannerslider->delete();

        session()->flash("pesan", "Data berhasil Dihapus");
        return redirect()->route('administrator.bannerslider.index')->with('success', 'Banner slider berhasil dihapus');
    }
}

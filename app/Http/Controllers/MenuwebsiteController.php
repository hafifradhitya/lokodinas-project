<?php

namespace App\Http\Controllers;

use App\Models\Menuwebsite;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class MenuwebsiteController extends Controller
{
    // ... kode yang ada sebelumnya ...

    public function index():View
    {
        $menuwebs = Menuwebsite::with('parent')
                            ->orderBy('position', 'DESC')
                            ->orderBy('urutan', 'DESC')
                            ->paginate(10);
        return view('administrator.menuwebsite.index', compact('menuwebs'));
    }

    public function create(): View
    {
        $menuwebs = Menuwebsite::where('position', 'Bottom')->orderBy('id_menu', 'DESC')->get();
        return view('administrator.menuwebsite.create', compact('menuwebs'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'id_parent' => 'nullable|exists:menu,id_menu',
            'nama_menu' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'position' => 'required|in:Top,Bottom',
            'urutan' => 'required|integer',
            'deskripsi' => 'required|string',
        ]);

        Menuwebsite::create($validated);

        session()->flash("pesan", "MenuWebsite berhasil Ditambah");
        return redirect()->route('administrator.menuwebsite.index')->with(['success'=>'Berita berhasil Ditambah']);
    }

    public function edit(string $id_menu): View
    {
        $menuwebs = Menuwebsite::where('position', 'Bottom')
        ->orWhere('aktif', 'Ya')->orderBy('id_menu', 'DESC')->get();
        $menu = Menuwebsite::findOrFail($id_menu);
        // Pastikan nilai 'aktif' diambil dari database
        $menu->aktif = $menu->aktif ?? 'Ya'; // Nilai default 'T' jika null
        return view('administrator.menuwebsite.edit', compact('menuwebs', 'menu'));
    }

    public function update(Request $request, string $id_menu)
    {
        $validated = $request->validate([
            'id_parent' => 'nullable|exists:menu,id_menu',
            'nama_menu' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'position' => 'required|in:Top,Bottom',
            'urutan' => 'required|integer',
            'deskripsi' => 'required|string',
            'aktif' => 'required|in:Ya,Tidak', // Tambahkan validasi untuk 'aktif'
        ]);

        $menu = Menuwebsite::findOrFail($id_menu);

        $menu->update($validated); // Gunakan $validated langsung

        session()->flash("pesan", "MenuWebsite berhasil Diperbarui");
        return redirect()->route('administrator.menuwebsite.index')->with('success', 'Menu berhasil diperbarui');
    }

    public function destroy(string $id_menu):RedirectResponse
    {
        $menuwebs = Menuwebsite::findOrFail($id_menu);
        $menuwebs->delete();

        session()->flash("pesan", "Data berhasil Dihapus");
        return redirect()->route('administrator.menuwebsite.index')->with(['success'=>'Data berhasil Dihapus']);
    }

    // ... kode destroy yang ada sebelumnya ...
}

<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {
        // 
        $search = $request->search;
        if(!empty($search)) {
            $gallery = Gallery::with('album')
            ->where('jdl_gallery', 'like', "%$search%")
            ->paginate(10);
        } else {
            $gallery = Gallery::with('album')->orderBy('id_album', 'desc')->paginate(10);
        }  

        return view('administrator.gallery.index', compact(['gallery']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
        $gallery = Gallery::all();

        $album = Album::all();
        return view('administrator.gallery.create', compact(['gallery', 'album']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
        $validated = $request->validate([
            'jdl_gallery' => 'required|string|max:255',
            'gbr_gallery' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_album' => 'required|exists:album,id_album',
        ]);

        $jdl_gallery = $request->jdl_gallery;
        $gambarName = null;

        if($request->hasFile('gbr_gallery')) {
            $gbr_gallery = $request->file("gbr_gallery");
            $gambarName = $jdl_gallery."_">Str::random(25).".".$gbr_gallery->getClientOriginalExtension();
            $gbr_gallery->move("./img_gallery", $gambarName);
        }
        $keterangan = $request->keterangan;

        $username = $request->username ?: 'admin';

        Gallery::create([
            "jdl_gallery" => $jdl_gallery,
            "gallery_seo" => Str::slug($validated['jdl_gallery']),
            "username" => $username,
            "gbr_gallery" => $gambarName,
            "keterangan" => $keterangan,
            "id_album" => $validated['id_album'],
        ]);

        session()->flash("pesan", "Gallery berhasil Ditambah");
        return redirect()->route('administrator.gallery.index')->with(['success'=>'Gallery berhasil Ditambah']);
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
    public function edit(string $id_gallery):View
    {
        //
        $album = Album::all();
        $gallery = Gallery::where('id_gallery', $id_gallery)->firstOrFail();

        return view('administrator.gallery.edit', compact(['gallery', 'album']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_gallery)
    {
        //
        $validated = $request->validate([
            'jdl_gallery' => 'required|string|max:255',
            'gbr_gallery' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'id_album' => 'required|exists:album,id_album',
        ]);

        $gallery = Gallery::findOrFail($id_gallery);

        $jdl_gallery = $request->jdl_gallery;

        $username = $request->username ?: 'admin';

        if ($request->hasFile('gbr_gallery')) {
            $gbr_gallery = $request->file("gbr_gallery");
            $gambarName = $jdl_gallery."_".Str::random(25).".".$gbr_gallery->getClientOriginalExtension();
            $gbr_gallery->move("./img_gallery/", $gambarName);
            $gallery->gbr_gallery = $gambarName;
        }
        $keterangan = $request->keterangan;

        $gallery->update([
            "jdl_gallery" => $jdl_gallery,
            "gallery_seo" => Str::slug($validated['jdl_gallery']),
            "username" => $username,
            "keterangan" => $keterangan,
            "id_album" => $validated['id_album'],
        ]);

        session()->flash("pesan", "Gallery berhasil Diperbarui");
        return redirect()->route('administrator.gallery.index')->with(['success' => 'Gallery berhasil Diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_gallery):RedirectResponse
    {
        //
        $gallery = Gallery::findOrFail($id_gallery);
        $gallery->delete();

        session()->flash("pesan", "Gallery berhasil Dihapus");
        return redirect()->route('administrator.gallery.index')->with(['success'=>'Gallery berhasil Dihapus']);
    }
}

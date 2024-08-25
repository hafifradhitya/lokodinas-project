<?php

namespace App\Http\Controllers;

use App\Models\Tagvideo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class TagvideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {
        //
        $search = $request->search;
        if(!empty($search)) {
            $tagvid = Tagvideo::latest()
            ->where('nama_tag', 'like', "%$search%")
            ->paginate(5);
        } else {
            $tagvid = Tagvideo::paginate(5);
        }

        return view('administrator.tagvideo.index', compact(['tagvid']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
        return view('administrator.tagvideo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        //
        $validated = $request->validate([
            'nama_tag' => 'required|string|max:255'
        ]);

        $username = $request->username ?: 'admin';

        Tagvideo::create([
            'nama_tag' => $validated['nama_tag'],
            'tag_seo' => Str::slug($validated['nama_tag']),
            'username' => $username,
            'count' => 0 // Tambahkan ini
        ]);

        session()->flash("pesan", "Data berhasil Ditambah");
        return redirect()->route('administrator.tagvideo.index')->with(['success'=>'Data berhasil Ditambah']);
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
    public function edit(string $id_tag):View
    {
        //
        $tagvid = Tagvideo::findOrFail($id_tag);
        return view('administrator.tagvideo.edit', compact(['tagvid']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_tag)
    {
        //
        $validated = $request->validate([
            'nama_tag' => 'required|string|max:255'
        ]);

        $tagvid = Tagvideo::findOrFail($id_tag);

        $nama_tag = $request->nama_tag;
        $username = $request->username ?: 'admin';

        $tagvid->update([
            "nama_tag" => $nama_tag,
            "video_seo" => Str::slug($validated['nama_tag']),
            "username" => $username
        ]);

        session()->flash("pesan", "Data berhasil Diperbarui");
        return redirect()->route('administrator.tagvideo.index')->with(['success' => 'Data berhasil Diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_tag):RedirectResponse
    {
        //
        $tagvid = Tagvideo::findOrFail($id_tag);

        $tagvid->delete();

        session()->flash("pesan", "Data berhasil Dihapus");
        return redirect()->route('administrator.tagvideo.index')->with(['success', 'Data berhasil Dihapus']);
    }
}

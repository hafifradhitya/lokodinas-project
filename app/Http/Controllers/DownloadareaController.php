<?php

namespace App\Http\Controllers;

use App\Models\Downloadarea;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DownloadareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        //
        $search = $request->search;
        if (!empty($search)) {
            $downloads = Downloadarea::latest()
                ->where('id_download', 'like', "%$search%")
                ->orWhere('judul', 'like', "%$search%")
                ->paginate(10);
        } else {
            $downloads = Downloadarea::orderBy('id_download', 'desc')->paginate(10);
        }

        return view('administrator.downloadarea.index', compact('downloads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //
        return view('administrator.downloadarea.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'nama_file' => 'required|file|mimes:pdf,doc,docx,xls,txt,xlsx,ppt,pptx,txt|max:2048'
        ]);

        $judul = $request->judul;
        $namaFile = null;

        if ($request->hasFile('nama_file')) {
            $file = $request->file("nama_file");
            $namaFile = $judul . "_" . Str::random(25) . "." . $file->getClientOriginalExtension();
            $file->move("./downloads/", $namaFile);
        } else {
            return redirect()->route('administrator.downloadarea.index')->with(['error' => 'File harus dimasukan']);
        }

        Downloadarea::create([
            "judul" => $judul,
            "nama_file" => $namaFile,
            "tgl_posting" => now(),
            "hits" => 0
        ]);

        session()->flash("pesan", "File berhasil ditambahkan");
        return redirect()->route('administrator.downloadarea.index')->with(['success' => 'File berhasil ditambahkan']);
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id_download):BinaryFileResponse
    {
        //
        $download = Downloadarea::findOrFail($id_download);

        if ($request->has('download')) {
            $download->increment('hits');

            $filePath = public_path('downloads/' . $download->nama_file);

            if (file_exists($filePath)) {
                return response()->download($filePath, $download->nama_file);
            } else {
                session()->flash("pesan", "File tidak ditemukan");
                return redirect()->back()->with(['error' => 'File tidak ditemukan']);
            }
        }

        // Logika untuk menampilkan detail download jika tidak di-download
        return view('administrator.downloadarea.show', compact('download'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_download)
    {
        //
        $download = Downloadarea::where('id_download', $id_download)->firstOrFail();
        return view('administrator.downloadarea.edit', compact('download'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_download)
    {
        //
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,txt,xlsx,ppt,pptx,txt|max:2048'
        ]);

        $download = Downloadarea::findOrFail($id_download);

        $judul = $request->judul;

        if ($request->hasFile('file')) {
            $file = $request->file("file");
            $namaFile = $judul . "_" . Str::random(25) . "." . $file->getClientOriginalExtension();
            $file->move("./downloads/", $namaFile);
            $download->nama_file = $namaFile;
        }

        $download->update([
            "judul" => $judul,
            "tgl_posting" => now(),
        ]);

        session()->flash("pesan", "File berhasil Diperbarui");
        return redirect()->route('administrator.downloadarea.index')->with(['success' => 'File berhasil Diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_download)
    {
        //
        $download = Downloadarea::findOrFail($id_download);
        $download->delete();
        session()->flash("pesan", "Berita berhasil Dihapus");
        return redirect()->route('administrator.downloadarea.index')->with(['success' => 'Berita berhasil Dihapus']);
    }
}

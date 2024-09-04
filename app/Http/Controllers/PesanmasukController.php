<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Identitaswebsite;
use App\Models\Pesanmasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class PesanmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {
        //
        $search = $request->search;
        if (!empty($search)) {
            $pesan = Pesanmasuk::latest()
            ->where('id_hubungi', 'like', "%$search%")
            ->orWhere('nama', 'like', "%$search%")
            ->paginate(10);
        } else {
            $pesan = Pesanmasuk::orderBy('tanggal', 'desc')->paginate(10);
        }

        return view('administrator.pesanmasuk.index', compact('pesan'));
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
    public function show(string $id):View
    {
        //
        Pesanmasuk::where('id_hubungi', $id)->update(['dibaca' => 'Y']);
        $proses = Pesanmasuk::where('id_hubungi', $id)->first();
        $alamat = Alamat::where('id_alamat', 1)->first();
        $identitas = Identitaswebsite::where('id_identitas', 1)->first();

        $row = $identitas; // $row adalah objek model Identitaswebsite

        $data = [
            'title' => 'Hubungi Kami',
            'description' => 'Silahkan Mengisi Form Dibawah ini untuk menghubungi kami',
            'keywords' => 'hubungi, kontak, kritik, saran, pesan',
            'rows' => $row,
        ];

        return view('administrator.pesanmasuk.detail', compact(['pesan', 'alamat', 'identitas']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_hubungi)
    {
        //
        $pesan = Pesanmasuk::findOrFail($id_hubungi);
        $pesan->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}

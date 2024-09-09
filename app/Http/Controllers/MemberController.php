<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $email = $request->email;  

        $query = Member::query();

        if (!empty($search)) {
            $query->where('nama', 'like', "%$search%")->orWhere('email', 'like', "%$search%");
        }
  
        if (!empty($email)) {
            $query->where('email', $email);
        }

        $members = $query->paginate(10);

        $emails = Member::select('email')
                    ->groupBy('email')
                    ->get();

        return view('administrator.member.index', compact(['members', 'emails']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $rates = Rating::all();
        return view('administrator.member.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "nama" => 'required|string|max:255',
            "email" => 'required|string|email|max:255',
            'password' => 'required|string|min:6'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $nama = $request->nama;
        $email = $request->email;


        Member::create([
            "nama" => $nama,
            "email" => $email,
            "password" => $validated['password'],
        ]);

        return response()->json([
            'url' => route('administrator.member.index'),
            'success' => true,
            'message' => 'Data Member Berhasil Ditambah'
        ]);
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
    public function edit(string $id)
    {
        // $rates = Rating::all();
        return view('administrator.member.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            "nama" => 'required|string|max:255',
            "email" => 'required|string|email|max:255',
            'password' => 'nullable|string|min:6'
        ]);

        // $validated['password'] = bcrypt($validated['password']);

            // Jika password diisi, enkripsi password baru
        if ($request->filled('password')) {
            $validated['password'] = bcrypt($request->password);
        } else {
            // Jika password tidak diisi, gunakan password lama
            unset($validated['password']);
        }

        $members = Member::findOrFail($id);

        $nama = $request->nama;
        $email = $request->email;

        // $fotoName = $users->foto;

        // if ($request->hasFile('foto')) {
        //     $foto = $request->file("foto");
        //     $fotoName = $foto->getClientOriginalName();
        //     $foto->move("./foto_user/", $fotoName);
        //     $users->foto = $fotoName;
        // }

        $members->update([
            "nama" => $nama,
            "email" => $request->email
        ]);

        if (isset($validated['password'])) {
            $members->update(['password' => $validated['password']]);
        }

        return response()->json([
            'url' => route('administrator.member.index'),
            'success' => true,
            'message' => 'Data Member Berhasil Diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $members = Member::findOrFail($id);
        $members->delete();
        return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}

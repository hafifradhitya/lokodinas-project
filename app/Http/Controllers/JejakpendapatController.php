<?php

namespace App\Http\Controllers;
use App\Models\Poling;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class JejakpendapatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {
        //
        $search = $request->search;
        if (!empty($search)) {
            $polings = Poling::latest()
                ->where('id_poling', 'like', "%$search%")
                ->orWhere('pilihan', 'like', "%$search%")
                ->paginate(10);
        } else {
            $polings = Poling::orderBy('id_poling', 'desc')->paginate(10);
        }

        return view('administrator.jejakpendapat.index', compact('polings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //
        return view('administrator.jejakpendapat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        //
        $validated = $request->validate([
            'pilihan' => 'required|string',
            'status' => 'required|string',
            'aktif' => 'required|string'
        ]);

        $username = $request->username ?: 'admin';

        Poling::create([
            "pilihan" => $validated['pilihan'],
            "status" => $request->status,
            "aktif" => $request->aktif ?? 'Y',
            "username" => $username
        ]);

        session()->flash("pesan", "Jejak pendapat berhasil Ditambah");
        return redirect()->route('administrator.jejakpendapat.index')->with(['success' => 'Jejak pendapat berhasil Ditambah']);

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
    public function edit(string $id_poling):View
    {
        //
        $poll = Poling::where('id_poling', $id_poling)->firstOrFail();
        return view('administrator.jejakpendapat.edit', compact('poll'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_poling):RedirectResponse
    {
        //
        $validated = $request->validate([
            'pilihan' => 'required|string',
            'status' => 'required|string',
            'aktif' => 'nullable|string'
        ]);

        $poling = Poling::findOrFail($id_poling);

        $poling->update([
            "pilihan" => $validated['pilihan'],
            "status" => $request->status,
            "aktif" => $request->aktif ?? 'Y'
        ]);

        session()->flash("pesan", "Jejak pendapat berhasil Diubah");
        return redirect()->route('administrator.jejakpendapat.index')->with(['success' => 'Jejak pendapat berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_poling)
    {
        //
        $poling = Poling::findOrFail($id_poling);
        $poling->delete();

        session()->flash("pesan", "Jejak pendapat berhasil Dihapus");
        return redirect()->route('administrator.jejakpendapat.index')->with(['success' => 'Jejak pendapat berhasil Dihapus']);
    }
}

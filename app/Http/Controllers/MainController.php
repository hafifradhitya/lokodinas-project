<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Alamatkontak;
use App\Models\Background;
use App\Models\Bannerhome;
use App\Models\Bannerslider;
use App\Models\Berita;
use App\Models\Identitaswebsite;
use App\Models\Logo;
use App\Models\Menuwebsite;
use App\Models\Poling;
use App\Models\Sekilasinfo;
use App\Models\Template;
use App\Models\Video;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $identitas = Identitaswebsite::first();
        $banners = Bannerslider::all();
        $alamat = Alamatkontak::first();
        $logo = Logo::orderBy('id_logo', 'DESC')->first();
        $links = Bannerhome::orderBy('id_iklantengah', 'ASC')->limit(10)->get();
        $beritau = Berita::where('id_kategori', 63)->orderBy('id_berita', 'DESC')->limit(5)->get();
        $beritao = Berita::where('id_kategori', 62)->orderBy('id_berita', 'DESC')->limit(5)->get();
        $beritad = Berita::where('id_kategori', 61)->orderBy('id_berita', 'DESC')->limit(5)->get();
        $beritas = Berita::orderBy('id_berita', 'DESC')->limit(5)->get();
        $infos = Sekilasinfo::all();
        $videos = Video::all();
        $polings = Poling::where('id_poling');
        $agendas = Agenda::all();
        $pilihan = Poling::where('status', 'Pertanyaan')->get();
        $jawaban = Poling::where('status', 'Jawaban')->get();
        $menus = Menuwebsite::where('id_parent', 0)
            ->with('children.children') // Menyertakan children hingga 2 level
            ->orderBy('position', 'asc')
            ->get();

        // dd($menus);
        $gambar = $request->query('gambar', 'default'); // Mengambil parameter 'gambar' dari query string
        // $background = Background::where('gambar', $gambar)->first();

        // if ($background) {
        //     return response()->json(['color' => $background->gambar]);
        // } else {
        //     return response()->json(['color' => 'darkslateblue']); // Warna default jika tidak ditemukan
        // }
        $templateDinas3 = Template::where('folder', 'dinas-3')->first();
        $templateDinas2 = Template::where('folder', 'dinas-2')->first();
        $templateDinas1 = Template::where('folder', 'dinas-1')->first();

        if ($templateDinas3 && $templateDinas3->aktif === 'Y') {
            // Jika 'dinas-3' aktif (aktif = 'Y'), tampilkan view dari folder 'dinas-3'
            return view('dinas-3.dashboard', compact('identitas','polings','logo', 'banners', 'pilihan', 'jawaban', 'links', 'menus', 'alamat', 'beritas', 'infos', 'agendas', 'beritau', 'beritao', 'beritad', 'videos'));
        } elseif ($templateDinas2 && $templateDinas2->aktif === 'Y') {
            // Jika 'dinas-2' aktif (aktif = 'Y'), tampilkan view dari folder 'dinas-2'
            return view('dinas-2.dashboard', compact('identitas','polings', 'logo', 'banners', 'pilihan', 'jawaban', 'links', 'menus', 'alamat', 'beritas', 'infos', 'agendas', 'beritau', 'beritao', 'beritad', 'videos'));
        } elseif ($templateDinas1 && $templateDinas1->aktif === 'Y') {
            // Jika 'dinas-1' aktif (aktif = 'Y'), tampilkan view dari folder 'dinas-1'
            return view('administrator.dashboard', compact('identitas','polings', 'logo', 'banners', 'pilihan', 'jawaban', 'links', 'menus', 'alamat', 'beritas', 'infos', 'agendas', 'beritau', 'beritao', 'beritad', 'videos'));
        } else {
            // Jika tidak ada template yang aktif, tampilkan view default
            return view('administrator.dashboard', compact('identitas','polings','logo', 'banners', 'pilihan', 'jawaban', 'links', 'menus', 'alamat', 'beritas', 'infos', 'agendas', 'beritau', 'beritao', 'beritad', 'videos'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $links = Bannerhome::orderBy('id_iklantengah', 'ASC')->limit(10)->get();
        // return view('dinas-1.sliderlogo', compact('links'));
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
    public function show()
    {
        //

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
    public function destroy(string $id)
    {
        //
    }
}

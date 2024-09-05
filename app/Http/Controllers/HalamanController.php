<?php

namespace App\Http\Controllers;

use App\Models\Alamatkontak;
use App\Models\Bannerslider;
use App\Models\Berita;
use App\Models\Halamanbaru;
use App\Models\Identitaswebsite;
use App\Models\Logo;
use App\Models\Menuwebsite;
use App\Models\Template;
use Illuminate\Http\Request;

class HalamanController extends Controller
{
    //
    public function sejarah_instansi()
    {
        $beritas = Berita::orderBy('id_berita', 'DESC')->limit(10)->get();
        $identitas = Identitaswebsite::first();
        $logo = Logo::orderBy('id_logo', 'DESC')->first();
        $banners = Bannerslider::all();
        $menus = Menuwebsite::where('id_parent', 0)
        ->with('children.children') // Menyertakan children hingga 2 level
        ->orderBy('position', 'asc')
        ->get();
        $alamat = Alamatkontak::first();
        $halamanbaru = Halamanbaru::where('judul_seo', 'sejarah-instansi')->first(); // Ganti dengan kondisi yang sesuai
        $template = Template::where('aktif', 'Y')->first();
        return view($template->folder . ".sejarahinstansi", compact('identitas','beritas','logo', 'banners', 'menus', 'alamat', 'halamanbaru'));
    }

    public function struktur_organisasi()
    {
        $beritas = Berita::orderBy('id_berita', 'DESC')->limit(10)->get();
        $identitas = Identitaswebsite::first();
        $logo = Logo::orderBy('id_logo', 'DESC')->first();
        $banners = Bannerslider::all();
        $menus = Menuwebsite::where('id_parent', 0)
        ->with('children.children') // Menyertakan children hingga 2 level
        ->orderBy('position', 'asc')
        ->get();
        $alamat = Alamatkontak::first();
        $halamanbaru = Halamanbaru::where('judul_seo', 'struktur-organisasi')->first(); // Ganti dengan kondisi yang sesuai
        $template = Template::where('aktif', 'Y')->first();
        return view($template->folder . ".strukturorganisasi", compact('identitas','beritas','logo', 'banners', 'menus', 'alamat', 'halamanbaru'));
    }

    public function visi_dan_misi()
    {
        $beritas = Berita::orderBy('id_berita', 'DESC')->limit(10)->get();
        $identitas = Identitaswebsite::first();
        $logo = Logo::orderBy('id_logo', 'DESC')->first();
        $banners = Bannerslider::all();
        $menus = Menuwebsite::where('id_parent', 0)
        ->with('children.children') // Menyertakan children hingga 2 level
        ->orderBy('position', 'asc')
        ->get();
        $alamat = Alamatkontak::first();
        $halamanbaru = Halamanbaru::where('judul_seo', 'visi-dan-misi')->first(); // Ganti dengan kondisi yang sesuai
        $template = Template::where('aktif', 'Y')->first();
        return view($template->folder . ".visidanmisi", compact('identitas','beritas','logo', 'banners', 'menus', 'alamat', 'halamanbaru'));
    }
}

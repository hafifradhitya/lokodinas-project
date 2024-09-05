<?php

namespace App\Http\Controllers;

use App\Models\Alamatkontak;
use App\Models\Bannerslider;
use App\Models\Halamanbaru;
use App\Models\Identitaswebsite;
use App\Models\Logo;
use App\Models\Menuwebsite;
use Illuminate\Http\Request;

class HalamanController extends Controller
{
    //
    public function sejarah_instansi()
    {
        $identitas = Identitaswebsite::first();
        $logo = Logo::orderBy('id_logo', 'DESC')->first();
        $banners = Bannerslider::all();
        $menus = Menuwebsite::where('id_parent', 0)
        ->with('children.children') // Menyertakan children hingga 2 level
        ->orderBy('position', 'asc')
        ->get();
        $alamat = Alamatkontak::first();
        $halamanbaru = Halamanbaru::where('judul_seo', 'sejarah-instansi')->first(); // Ganti dengan kondisi yang sesuai
        return view("dinas-3.halaman.detail.sejarahinstansi", compact('identitas', 'logo', 'banners', 'menus', 'alamat', 'halamanbaru'));
    }
}

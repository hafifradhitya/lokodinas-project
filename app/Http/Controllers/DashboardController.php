<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Halamanbaru;
use App\Models\Agenda;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $berita['total_berita'] = Berita::count();
        $halamanbaru['total_halamanbaru'] = Halamanbaru::count();
        $agenda['total_agenda'] = Agenda::count();
        $users['total_users'] = User::count();

        return view('administrator.dashboard', compact('berita', 'halamanbaru', 'agenda', 'users'));
    }
}